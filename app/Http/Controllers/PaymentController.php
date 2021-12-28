<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use net\authorize\api\controller as AnetController;
use net\authorize\api\contract\v1 as AnetAPI;


class PaymentController extends BaseController
{

    public static function routeName()
    {
        return Str::snake("Payment");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return PaymentResource::collection(Payment::search($request)->sort($request)->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Payment::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Payment::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $payment = Payment::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $payment->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new PaymentResource($payment);
    }
    public function show(Request $request, Payment $payment)
    {
        if (!$this->user->is_permitted_to('view', Payment::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        return new PaymentResource($payment);
    }
    public function update(Request $request, Payment $payment)
    {
        if (!$this->user->is_permitted_to('update', Payment::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $validator = Validator::make($request->all(), Payment::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $payment->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $payment->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new PaymentResource($payment);
    }
    public function destroy(Request $request, Payment $payment)
    {
        if (!$this->user->is_permitted_to('delete', Payment::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $payment->delete();

        return new PaymentResource($payment);
    }

    public function handleonlinepay(Request $request)
    {
        $request = $request->input();

        /* Create a merchantAuthenticationType object with authentication details
          retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        $cardNumber = preg_replace('/\s+/', '', $request['cardNumber']);

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $creditCard->setExpirationDate($request['expiration-year'] . "-" . $request['expiration-month']);
        $creditCard->setCardCode($request['cvv']);

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($request['amount']);
        $transactionRequestType->setPayment($paymentOne);

        // Assemble the complete transaction request
        $requests = new AnetAPI\CreateTransactionRequest();
        $requests->setMerchantAuthentication($merchantAuthentication);
        $requests->setRefId($refId);
        $requests->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($requests);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

        if ($response != null) {
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getMessages() != null) {
                    $message_text = $tresponse->getMessages()[0]->getDescription() . ", Transaction ID: " . $tresponse->getTransId();
                    $msg_type = "success_msg";

                    Payment::create([
                        'amount' => $request['amount'],
                        'response_code' => $tresponse->getResponseCode(),
                        'transaction_id' => $tresponse->getTransId(),
                        'auth_id' => $tresponse->getAuthCode(),
                        'message_code' => $tresponse->getMessages()[0]->getCode(),
                        'name_on_card' => trim($request['owner']),
                        'quantity' => 1
                    ]);
                } else {
                    $message_text = 'There were some issue with the payment. Please try again later.';
                    $msg_type = "error_msg";

                    if ($tresponse->getErrors() != null) {
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                        $msg_type = "error_msg";
                    }
                }
                // Or, print errors if the API request wasn't successful
            } else {
                $message_text = 'There were some issue with the payment. Please try again later.';
                $msg_type = "error_msg";

                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $message_text = $tresponse->getErrors()[0]->getErrorText();
                    $msg_type = "error_msg";
                } else {
                    $message_text = $response->getMessages()->getMessage()[0]->getText();
                    $msg_type = "error_msg";
                }
            }
        } else {
            $message_text = "No response returned";
            $msg_type = "error_msg";
        }
        return response(["msg_type" => $msg_type, "message_text" => $message_text], 200);
    }
}
