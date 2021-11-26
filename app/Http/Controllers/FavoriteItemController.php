<?php

namespace App\Http\Controllers;

use App\Http\Resources\FavoriteItemResource;
use App\Models\Favorite;
use App\Models\FavoriteItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class FavoriteItemController extends Controller
{
    public static function routeName(){
        return Str::snake("FavoriteItem");
    }
    public $childRelationName; 
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->childRelationName = Pluralizer::plural(Str::snake(array_slice(explode('\\', FavoriteItem::class), -1)[0]));
    }
    public function index(Request $request,Favorite $favorite)
    {
        $childRelationName = $this->childRelationName;
        return FavoriteItemResource::collection($favorite->$childRelationName()->search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request, Favorite $favorite)
    {
        if(!$this->user->is_permitted_to('store',FavoriteItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),FavoriteItem::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $favoriteItem = FavoriteItem::create($validator->validated());
        $childRelationName = $this->childRelationName;
        $favorite->$childRelationName()->save($favoriteItem);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $favoriteItem->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new FavoriteItemResource($favoriteItem);
    }
    public function show(Request $request,Favorite $favorite, FavoriteItem $favoriteItem)
    {
        if(!$this->user->is_permitted_to('view',FavoriteItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new FavoriteItemResource($favoriteItem);
    }
    public function update(Request $request, Favorite $favorite, FavoriteItem $favoriteItem)
    {
        if(!$this->user->is_permitted_to('update',FavoriteItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),FavoriteItem::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $favoriteItem->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $favoriteItem->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new FavoriteItemResource($favoriteItem);

    }

    public function destroy(Request $request,Favorite $favorite, FavoriteItem $favoriteItem)
    {
        if(!$this->user->is_permitted_to('delete',FavoriteItem::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $favoriteItem->delete();
        return new FavoriteItemResource($favoriteItem);
    }
}
