<?php

namespace App\Http\Controllers;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AddressController extends BaseController
{

    public static function routeName(){
        return Str::snake("Address");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return AddressResource::collection(Address::search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Address::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Address::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $address = Address::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $address->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new AddressResource($address);
    }
    public function show(Request $request,Address $address)
    {
        if(!$this->user->is_permitted_to('view',Address::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new AddressResource($address);
    }
    public function update(Request $request, Address $address)
    {
        if(!$this->user->is_permitted_to('update',Address::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Address::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $address->update($validator->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $address->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new AddressResource($address);
    }
    public function destroy(Request $request,Address $address)
    {
        if(!$this->user->is_permitted_to('delete',Address::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $address->delete();

        return new AddressResource($address);
    }
}
