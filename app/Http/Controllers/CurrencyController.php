<?php

namespace App\Http\Controllers;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CurrencyController extends BaseController
{

    public static function routeName(){
        return Str::snake("Currency");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return CurrencyResource::collection(Currency::search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Currency::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Currency::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $currency = Currency::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $currency->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new CurrencyResource($currency);
    }
    public function show(Request $request,Currency $currency)
    {
        if(!$this->user->is_permitted_to('view',Currency::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new CurrencyResource($currency);
    }
    public function update(Request $request, Currency $currency)
    {
        if(!$this->user->is_permitted_to('update',Currency::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Currency::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $currency->update($validator->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $currency->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new CurrencyResource($currency);
    }
    public function destroy(Request $request,Currency $currency)
    {
        if(!$this->user->is_permitted_to('delete',Currency::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $currency->delete();

        return new CurrencyResource($currency);
    }
}
