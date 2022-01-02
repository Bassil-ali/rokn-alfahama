<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ItemController extends BaseController
{

    public static function routeName()
    {
        return Str::snake("Item");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return ItemResource::collection(Item::search($request)->sort($request)->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request)
    {
        dd($request->all());
        if (!$this->user->is_permitted_to('store', Item::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), Item::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $item = Item::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $item->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ItemResource($item);
    }
    public function show(Request $request, Item $item)
    {
        if (!$this->user->is_permitted_to('view', Item::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        return new ItemResource($item);
    }
    public function update(Request $request, Item $item)
    {
        if (!$this->user->is_permitted_to('update', Item::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $validator = Validator::make($request->all(), Item::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $item->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $item->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ItemResource($item);
    }
    public function destroy(Request $request, Item $item)
    {
        if (!$this->user->is_permitted_to('delete', Item::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $item->delete();

        return new ItemResource($item);
    }
}
