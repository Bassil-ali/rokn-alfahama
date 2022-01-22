<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShippingResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingController extends BaseController
{

    public static function routeName()
    {
        return Str::snake("Shipping");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return ShippingResource::collection(Shipping::search($request)->sort($request)->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request)
    {
        if (!$this->user->is_permitted_to('store', Shipping::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), Shipping::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $shipping = Shipping::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $shipping->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ShippingResource($shipping);
    }
    public function show(Request $request, Shipping $shipping)
    {
        if (!$this->user->is_permitted_to('view', Shipping::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        return new ShippingResource($shipping);
    }
    public function update(Request $request, Shipping $shipping)
    {
        if (!$this->user->is_permitted_to('update', Shipping::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $validator = Validator::make($request->all(), Shipping::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $shipping->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $shipping->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ShippingResource($shipping);
    }
    public function destroy(Request $request, Shipping $shipping)
    {
        if (!$this->user->is_permitted_to('delete', Shipping::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $shipping->delete();

        return new ShippingResource($shipping);
    }
}
