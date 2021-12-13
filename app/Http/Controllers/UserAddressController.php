<?php

namespace App\Http\Controllers;

use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class UserAddressController extends BaseController
{
    public static function routeName(){
        return Str::snake("Address");
    }
    public $childRelationName; 
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->childRelationName = Pluralizer::plural(Str::snake(array_slice(explode('\\', Address::class), -1)[0]));
    }
    public function index(Request $request,User $user)
    {
        $childRelationName = $this->childRelationName;
        return AddressResource::collection($user->$childRelationName()->search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request, User $user)
    {
        if(!$this->user->is_permitted_to('store',Address::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Address::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $address = Address::create($validator->validated());
        $childRelationName = $this->childRelationName;
        $user->$childRelationName()->save($address);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $address->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new AddressResource($address);
    }
    public function show(Request $request,User $user, Address $address)
    {
        if(!$this->user->is_permitted_to('view',Address::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new AddressResource($address);
    }
    public function update(Request $request, User $user, Address $address)
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

    public function destroy(Request $request,User $user, Address $address)
    {
        if(!$this->user->is_permitted_to('delete',Address::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $address->delete();
        return new AddressResource($address);
    }
}
