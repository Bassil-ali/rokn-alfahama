<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderItemResource;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShowOrderItemController extends BaseController
{
    public static function routeName(){
        return "orderitem";
    }
    public function __construct(Request $request)
    {
         parent::__construct($request);
    }
    public function index(Request $request,OrderItem $orderItem)
    {
       
        return OrderItemResource::collection($orderItem->where('order_id',$request->order_id)->get());
    }
    public function store(Request $request, OrderItem $orderItem)
    {
        if(!$this->user->is_permitted_to('store',OrderItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),OrderItem::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $orderItem = OrderItem::create($validator->validated());
        $childRelationName = $this->childRelationName;
        $orderItem->$childRelationName()->save($orderItem);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $orderItem->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new OrderItemResource($orderItem);
    }
    public function show(Request $request)
    {
        if(!$this->user->is_permitted_to('view',OrderItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new OrderItemResource($orderItem);
    }
    public function update(Request $request)
    {
        if(!$this->user->is_permitted_to('update',OrderItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),OrderItem::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $orderItem->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $orderItem->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new OrderItemResource($orderItem);

    }

    public function destroy(Request $request)
    {
        if(!$this->user->is_permitted_to('delete',OrderItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $orderItem->delete();
        return new OrderItemResource($orderItem);
    }
}
