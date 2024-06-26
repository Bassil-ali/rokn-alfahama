<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Jobs\CustomerEmail;


class OrderController extends BaseController
{

    public static function routeName()
    {
        return Str::snake("Order");
    }
    public function __construct(Request $request)
    {
       
    }
    public function index(Request $request)
    {
        if($request->page >=1){
            return OrderResource::collection(Order::where('total','>',0)->status($request)->search($request)->sort($request)->latest()->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));


        }else{
            return OrderResource::collection(Order::status($request)->search($request)->sort($request)->latest()->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));


        }
        
    }
    public function store(Request $request)
    {
        // if (!$this->user->is_permitted_to('store', Order::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), Order::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $order = Order::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $order->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        // dispatch(new CustomerEmail($request));

        return new OrderResource($order);
    }
    public function show(Request $request, Order $order)
    {
        // if (!$this->user->is_permitted_to('view', Order::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);
        return new OrderResource($order);
    }
    public function update(Request $request, Order $order)
    {
        // if (!$this->user->is_permitted_to('update', Order::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);
        if($request->update_status == 1){
           $order->update([
               'status'=>$request->status
           ]);
           return true;
        }
        $validator = Validator::make($request->all(), Order::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
     
        if ($request['items']) {
            $newOrder = $order->calcOrderItems($request['items']);
            $order->update($newOrder);
        } else {
            $order->update($validator->validated());
        }

        if ($request->translations) {
            foreach ($request->translations as $translation)
                $order->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new OrderResource($order);
    }
    public function destroy(Request $request, Order $order)
    {
        // if (!$this->user->is_permitted_to('delete', Order::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);
        $order->delete();

        return new OrderResource($order);
    }
}
