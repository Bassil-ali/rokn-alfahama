<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentResource;
use App\Mail\WelcomeMail;
use App\Models\Address;
use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        // parent::__construct($request);
    }
    public function index(Request $request)
    {
        return PaymentResource::collection(Payment::search($request)->sort($request)->latest()->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request)
    {
        // if (!$this->user->is_permitted_to('store', Payment::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), Payment::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
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
        // if (!$this->user->is_permitted_to('view', Payment::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);
        return new PaymentResource($payment);
    }
    public function update(Request $request, Payment $payment)
    {
        // if (!$this->user->is_permitted_to('update', Payment::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);
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
        // if (!$this->user->is_permitted_to('delete', Payment::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);
        $payment->delete();

        return new PaymentResource($payment);
    }

    public function createAnAcceptPaymentTransaction($myOrderId)
    {
        $myOrder = Order::find($myOrderId);

        $validator = Validator::make([
            'order_id' => $myOrderId,
            "amount" => $myOrder->taxed_total,
            "date" => Carbon::now(), "status" => 0,
            'user_id' => $myOrder->user_id
        ], Payment::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $payment = Payment::create($validator->validated());

        $confirmation = $payment->confirmAndSendMail();
        if ($confirmation === true) {
            return redirect("/main/seccessful-payment/$myOrderId");
        } else if ($confirmation === false) {
            return redirect("/main/error-payment/$myOrderId");
        } else {
            return redirect("/main/error-payment/$myOrderId?" . $confirmation['messages']);
        }
    }
}
