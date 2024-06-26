<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReactionResource;
use App\Models\Item;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class ItemReactionController extends BaseController
{
    public static function routeName()
    {
        return "item.reaction";
    }
    public $childRelationName;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->childRelationName = "reactions";
    }
    public function index(Request $request, Item $item)
    {
        $childRelationName = $this->childRelationName;
        return ReactionResource::collection($item->$childRelationName()->search($request)->sort($request)->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request, Item $item)
    {
        if (!$this->user->is_permitted_to('store', Reaction::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), Reaction::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $reaction_id =  Reaction::where('item_id', $validator->validated()['item_id'])->where('user_id', $validator->validated()['user_id'])->pluck('id');
        if (count($reaction_id) > 0) {
            $reaction = Reaction::destroy($reaction_id);
            return $reaction;
        } else {
            $reaction = Reaction::create($validator->validated());
        }
        // $reaction = Reaction::create($validator->validated());
        $childRelationName = $this->childRelationName;
        $item->$childRelationName()->save($reaction);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $reaction->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ReactionResource($reaction);
    }
    public function show(Request $request, Item $item, Reaction $reaction)
    {
        if (!$this->user->is_permitted_to('view', Reaction::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        return new ReactionResource($reaction);
    }
    public function update(Request $request, Item $item, Reaction $reaction)
    {
        if (!$this->user->is_permitted_to('update', Reaction::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $validator = Validator::make($request->all(), Reaction::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $reaction->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $reaction->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ReactionResource($reaction);
    }

    public function destroy(Request $request, Item $item, Reaction $reaction)
    {
        if (!$this->user->is_permitted_to('delete', Reaction::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $reaction->delete();
        return new ReactionResource($reaction);
    }
}
