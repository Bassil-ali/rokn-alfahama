<?php

namespace App\Http\Controllers;

use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class UserFavoriteController extends Controller
{
    public static function routeName(){
        return Str::snake("Favorite");
    }
    public $childRelationName; 
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->childRelationName = Pluralizer::plural(Str::snake(array_slice(explode('\\', Favorite::class), -1)[0]));
    }
    public function index(Request $request,User $user)
    {
        $childRelationName = $this->childRelationName;
        return FavoriteResource::collection($user->$childRelationName()->search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request, User $user)
    {
        if(!$this->user->is_permitted_to('store',Favorite::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Favorite::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $favorite = Favorite::create($validator->validated());
        $childRelationName = $this->childRelationName;
        $user->$childRelationName()->save($favorite);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $favorite->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new FavoriteResource($favorite);
    }
    public function show(Request $request,User $user, Favorite $favorite)
    {
        if(!$this->user->is_permitted_to('view',Favorite::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new FavoriteResource($favorite);
    }
    public function update(Request $request, User $user, Favorite $favorite)
    {
        if(!$this->user->is_permitted_to('update',Favorite::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Favorite::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $favorite->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $favorite->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new FavoriteResource($favorite);

    }

    public function destroy(Request $request,User $user, Favorite $favorite)
    {
        if(!$this->user->is_permitted_to('delete',Favorite::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $favorite->delete();
        return new FavoriteResource($favorite);
    }
}
