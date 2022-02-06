<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use net\authorize\api\controller as AnetController;
use net\authorize\api\contract\v1 as AnetAPI;

class Payment extends BaseModel
{
    use HasFactory;
    protected $with = ['order'];
    protected $guarded = [];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public static function createRules($user)
    {
        return [
            'order_id' => 'sometimes|exists:orders,id',
            'user_id' => 'nullable',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'currency_id' => 'sometimes|exists:currencies,id',
            'main_currency_id' => 'sometimes|exists:currencies,id',
            'conversion_factor' => 'sometimes|numeric',
            'main_currency_amount' => 'sometimes|numeric',
            'currency' => 'nullable',
            'main_currency' => 'nullable',
            'status' => 'sometimes|in:0,1,255'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'order_id' => 'sometimes|exists:orders,id',
            'user_id' => 'nullable',
            'amount' => 'sometimes|numeric',
            'date' => 'sometimes|timestamp',
            'currency_id' => 'sometimes|exists:currencies,id',
            'main_currency_id' => 'sometimes|exists:currencies,id',
            'conversion_factor' => 'sometimes|numeric',
            'main_currency_amount' => 'sometimes|numeric',
            'currency' => 'sometimes',
            'main_currency' => 'sometimes',
            'status' => 'sometimes|in:0,1,255'
        ];
    }
    public function confirm()
    {
        $myOrder = $this->order;
        $myAddress = Address::find($myOrder->address_id);
        $amount = $myOrder->taxed_total;
         
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName('9SFx6RK9vVp');
        $merchantAuthentication->setTransactionKey('7J47Dda43zKp534s');

        // Set the transaction's refId
        $refId = 'ref' . time();


        $opaqueData = new AnetAPI\OpaqueDataType();
        $opaqueData->setDataDescriptor(request()->input('dataDescriptor'));
        $opaqueData->setDataValue(request()->input('dataValue'));


        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setOpaqueData($opaqueData);

        // Create order information
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($myOrder->id);
        $order->setDescription("payment for order with id : $myOrder->id ");

        // Set the customer's Bill To address
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName($myOrder->customer_name ?? "Ahmad");

        $customerAddress->setAddress("$myAddress->widget  $myAddress->area  $myAddress->street " ?? "12 Main Street");
        $customerAddress->setCity($myAddress->area);
        // $customerAddress->setState("TX");
        // $customerAddress->setZip("44628");
        // $customerAddress->setCountry("USA");

        // Set the customer's identifying information
        $customerData = new AnetAPI\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setId($myOrder->id);
        $customerData->setEmail($myOrder->user->email ?? $myOrder->customer_email );

        // Add values for transaction settings
        // $duplicateWindowSetting = new AnetAPI\SettingType();
        // $duplicateWindowSetting->setSettingName("duplicateWindow");
        // $duplicateWindowSetting->setSettingValue("60");

        // Add some merchant defined fields. These fields won't be stored with the transaction,
        // but will be echoed back in the response.
        $merchantDefinedField1 = new AnetAPI\UserFieldType();
        $merchantDefinedField1->setName("customerLoyaltyNum");
        $merchantDefinedField1->setValue("1128836273");

        $merchantDefinedField2 = new AnetAPI\UserFieldType();
        $merchantDefinedField2->setName("favoriteColor");
        $merchantDefinedField2->setValue("blue");

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setBillTo($customerAddress);
        $transactionRequestType->setCustomer($customerData);
        // $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
        // $transactionRequestType->addToUserFields($merchantDefinedField1);
        // $transactionRequestType->addToUserFields($merchantDefinedField2);

        // Assemble the complete transaction request
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);


        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();
                if ($tresponse != null && $tresponse->getMessages() != null) {
                    return ["status" => 200, "messages" => [
                        "Transaction ID" => $tresponse->getTransId(),
                        "Response Code" => $tresponse->getResponseCode(),
                        "Message Code" => $tresponse->getMessages()[0]->getCode(),
                        "Auth Code" => $tresponse->getAuthCode(),
                        " Description" => $tresponse->getMessages()[0]->getDescription()
                    ]];
                    // echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                    // echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                    // echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                    // echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                    // echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
                } else {
                    return ["status" => 500, "Transaction Failed \n"];
                    if ($tresponse->getErrors() != null) {
                        echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                        echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    }
                }
                // Or, print errors if the API request wasn't successful
            } else {
                return ["status" => 500, "messages" => "Transaction Failed "];
                // $tresponse = $response->getTransactionResponse();
                // if ($tresponse != null && $tresponse->getErrors() != null) {
                //     echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                //     echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                // } else {
                //     echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                //     echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                // }
            }
        } else {
            return ["status" => 404, "messages" => "No response returned "];
        }

        // if ($response->message == '') {
        // }
        // return $response;
    }
}
