<?php

namespace App\Http\Controllers;
use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Resources\ColorResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends BaseController
{

    public static function routeName(){
        return Str::snake("Color");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return ColorResource::collection(Color::search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Color::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Color::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $color = Color::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $color->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ColorResource($color);
    }
    public function show(Request $request,Color $color)
    {
        if(!$this->user->is_permitted_to('view',Color::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new ColorResource($color);
    }
    public function update(Request $request, Color $color)
    {
        if(!$this->user->is_permitted_to('update',Color::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Color::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $color->update($validator->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $color->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ColorResource($color);
    }
    public function destroy(Request $request,Color $color)
    {
        if(!$this->user->is_permitted_to('delete',Color::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $color->delete();

        return new ColorResource($color);
    }
}
