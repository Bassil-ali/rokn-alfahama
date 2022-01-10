<?php

namespace App\Http\Controllers;

use App\Models\OfferItem;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Http\Resources\OfferItemResource;
use App\Models\Item;
use App\Models\Offer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferItemController extends Basecontroller
{

    public static function routeName()
    {
        return "offer.item";
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request, Offer $offer)
    {

        return ItemResource::collection($offer->items()->search($request)->sort($request)->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request)
    {
        if (!$this->user->is_permitted_to('store', OfferItem::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), OfferItem::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $arr = $validator->validated();
        $offer_id = $arr['offer_id'];
        foreach ($arr['items_ids'] as $item_id) {
            $offerItem = OfferItem::create(['offer_id' => $offer_id, 'item_id' => $item_id]);
        }
        return new OfferItemResource($offerItem);
    }
    public function show(Request $request, OfferItem $offerItem)
    {
        if (!$this->user->is_permitted_to('view', OfferItem::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        return new OfferItemResource($offerItem);
    }
    public function update(Request $request, OfferItem $offerItem)
    {
        if (!$this->user->is_permitted_to('update', OfferItem::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $validator = Validator::make($request->all(), OfferItem::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $offerItem->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $offerItem->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new OfferItemResource($offerItem);
    }
    public function destroy(Request $request, OfferItem $offerItem)
    {
        if (!$this->user->is_permitted_to('delete', OfferItem::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $offerItem->delete();

        return new OfferItemResource($offerItem);
    }
}
