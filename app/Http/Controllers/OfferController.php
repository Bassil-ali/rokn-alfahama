<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Models\OfferItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends BaseController
{

    public static function routeName()
    {
        return Str::snake("Offer");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return OfferResource::collection(Offer::search($request)->sort($request)->latest()->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request)
    {
        if (!$this->user->is_permitted_to('store', Offer::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), Offer::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $offer = Offer::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $offer->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new OfferResource($offer);
    }
    public function show(Request $request, Offer $offer)
    {
        if (!$this->user->is_permitted_to('view', Offer::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        return new OfferResource($offer);
    }
    public function update(Request $request, Offer $offer)
    {
        if (!$this->user->is_permitted_to('update', Offer::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $validator = Validator::make($request->all(), Offer::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $offer->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $offer->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new OfferResource($offer);
    }
    public function destroy(Request $request, Offer $offer)
    {
        if (!$this->user->is_permitted_to('delete', Offer::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $offer_id = $offer->id;
        $offer->delete();
        $offer->delete();
        OfferItem::where('offer_id', $offer_id)->delete();
        return new OfferResource($offer);
    }
}
