<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderItemResource;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class OrderItemController extends Controller
{
    public static function routeName(){
        return Str::snake("OrderItem");
    }
    public $childRelationName; 
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->childRelationName = Pluralizer::plural(Str::snake(array_slice(explode('\\', OrderItem::class), -1)[0]));
    }
    public function index(Request $request,Order $order)
    {
        $childRelationName = $this->childRelationName;
        return OrderItemResource::collection($order->$childRelationName()->search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request, Order $order)
    {
        if(!$this->user->is_permitted_to('store',OrderItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),OrderItem::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $orderItem = OrderItem::create($validator->validated());
        $childRelationName = $this->childRelationName;
        $order->$childRelationName()->save($orderItem);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $orderItem->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new OrderItemResource($orderItem);
    }
    public function show(Request $request,Order $order, OrderItem $orderItem)
    {
        if(!$this->user->is_permitted_to('view',OrderItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new OrderItemResource($orderItem);
    }
    public function update(Request $request, Order $order, OrderItem $orderItem)
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

    public function destroy(Request $request,Order $order, OrderItem $orderItem)
    {
        if(!$this->user->is_permitted_to('delete',OrderItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $orderItem->delete();
        return new OrderItemResource($orderItem);
    }
}
