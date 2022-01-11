<?php

namespace App\Http\Controllers;
use App\Models\Size;
use App\Http\Controllers\Controller;
use App\Http\Resources\SizeResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends BaseController
{

    public static function routeName(){
        return Str::snake("Size");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return SizeResource::collection(Size::search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Size::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Size::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $size = Size::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $size->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new SizeResource($size);
    }
    public function show(Request $request,Size $size)
    {
        if(!$this->user->is_permitted_to('view',Size::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new SizeResource($size);
    }
    public function update(Request $request, Size $size)
    {
        if(!$this->user->is_permitted_to('update',Size::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Size::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $size->update($validator->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $size->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new SizeResource($size);
    }
    public function destroy(Request $request,Size $size)
    {
        if(!$this->user->is_permitted_to('delete',Size::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $size->delete();

        return new SizeResource($size);
    }
}
