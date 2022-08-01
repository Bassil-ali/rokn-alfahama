<?php

namespace App\Http\Controllers;
use App\Http\Resources\UnitResource;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UnitController extends BaseController
{

    public static function routeName(){
        return Str::snake("Unit");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        if($request->per_page =-1){
            return UnitResource::collection(Unit::search($request)->sort($request)->latest()->get());

        }else{
            return UnitResource::collection(Unit::search($request)->sort($request)->latest()->paginate((request('per_page')??request('itemsPerPage'))??15));

        }
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Unit::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Unit::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $unit = Unit::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $unit->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new UnitResource($unit);
    }
    public function show(Request $request,Unit $unit)
    {
        if(!$this->user->is_permitted_to('view',Unit::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new UnitResource($unit);
    }
    public function update(Request $request, Unit $unit)
    {
        if(!$this->user->is_permitted_to('update',Unit::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Unit::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $unit->update($validator->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $unit->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new UnitResource($unit);
    }
    public function destroy(Request $request,Unit $unit)
    {
        if(!$this->user->is_permitted_to('delete',Unit::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $unit->delete();

        return new UnitResource($unit);
    }
}
