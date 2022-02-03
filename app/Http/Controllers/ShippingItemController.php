<?php

namespace App\Http\Controllers;

use App\Models\ShippingItem;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShippingItemResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingItemController extends BaseController
{

    public static function routeName()
    {
        return "shippinga";
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return ShippingItemResource::collection(ShippingItem::search($request)->sort($request)->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request)
    {
        if (!$this->user->is_permitted_to('store', ShippingItem::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), ShippingItem::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        foreach ($validator->validated() as  $value) {
            $shippingItem = ShippingItem::updateOrCreate($value);
        }


        return new ShippingItemResource($shippingItem);
    }
    public function show(Request $request, ShippingItem $shippingItem)
    {
        if (!$this->user->is_permitted_to('view', ShippingItem::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        return new ShippingItemResource($shippingItem);
    }
    public function update(Request $request,  $shippingItem_id)
    {
        
        $shippingItem = ShippingItem::find($shippingItem_id);
       
        if (!$this->user->is_permitted_to('update', ShippingItem::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $validator = Validator::make($request->all(), ShippingItem::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $shippingItem->update($validator->validated());
 
        return new ShippingItemResource($shippingItem);
    }
    public function destroy(Request $request, ShippingItem $shippingItem)
    {
        if (!$this->user->is_permitted_to('delete', ShippingItem::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $shippingItem->delete();

        return new ShippingItemResource($shippingItem);
    }
}
