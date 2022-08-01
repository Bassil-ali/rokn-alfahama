<?php

namespace App\Http\Controllers;
use App\Http\Resources\TaxResource;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TaxController extends BaseController
{

    public static function routeName(){
        return Str::snake("Tax");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        if($request->per_page =-1){
            return TaxResource::collection(Tax::search($request)->sort($request)->latest()->get());

        }else{
        return TaxResource::collection(Tax::search($request)->sort($request)->latest()->paginate((request('per_page')??request('itemsPerPage'))??15));
        }
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Tax::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Tax::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $tax = Tax::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $tax->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new TaxResource($tax);
    }
    public function show(Request $request,Tax $tax)
    {
        if(!$this->user->is_permitted_to('view',Tax::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new TaxResource($tax);
    }
    public function update(Request $request, Tax $tax)
    {
        if(!$this->user->is_permitted_to('update',Tax::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Tax::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $tax->update($validator->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $tax->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new TaxResource($tax);
    }
    public function destroy(Request $request,Tax $tax)
    {
        if(!$this->user->is_permitted_to('delete',Tax::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $tax->delete();

        return new TaxResource($tax);
    }
}
