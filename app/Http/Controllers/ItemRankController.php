<?php

namespace App\Http\Controllers;

use App\Http\Resources\RankResource;
use App\Models\Item;
use App\Models\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class ItemRankController extends BaseController
{
    public static function routeName(){
        return "item.rank";
    }
    public $childRelationName; 
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->childRelationName = Pluralizer::plural(Str::snake(array_slice(explode('\\', Rank::class), -1)[0]));
    }
    public function index(Request $request,Item $item)
    {
        $childRelationName = $this->childRelationName;
        return RankResource::collection($item->$childRelationName()->search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request, Item $item)
    {
        if($request->edit == 1){
            Rank::where('item_id',$request->item_id)->update([
                'rank' => $request->rank
            ]);

            return true;

        }
        if(!$this->user->is_permitted_to('store',Rank::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Rank::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $rank = Rank::create($validator->validated());
        $childRelationName = $this->childRelationName;
        $item->$childRelationName()->save($rank);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $rank->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        $rank->item;
        return new RankResource($rank);
    }
    public function show(Request $request,Item $item, Rank $rank)
    {
        if(!$this->user->is_permitted_to('view',Rank::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new RankResource($rank);
    }
    public function update(Request $request, Item $item, Rank $rank)
    {
        // if(!$this->user->is_permitted_to('update',Rank::class,$request))
        //     return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Rank::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $rank->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $rank->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new RankResource($rank);

    }

    public function destroy(Request $request,Item $item, Rank $rank)
    {
        if(!$this->user->is_permitted_to('delete',Rank::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $rank->delete();
        return new RankResource($rank);
    }
}
