<?php

namespace App\Http\Controllers;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FavoriteController extends Controller
{

    public static function routeName(){
        return Str::snake("Favorite");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return FavoriteResource::collection(Favorite::search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Favorite::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Favorite::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $favorite = Favorite::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $favorite->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new FavoriteResource($favorite);
    }
    public function show(Request $request,Favorite $favorite)
    {
        if(!$this->user->is_permitted_to('view',Favorite::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new FavoriteResource($favorite);
    }
    public function update(Request $request, Favorite $favorite)
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
    public function destroy(Request $request,Favorite $favorite)
    {
        if(!$this->user->is_permitted_to('delete',Favorite::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $favorite->delete();

        return new FavoriteResource($favorite);
    }
}
