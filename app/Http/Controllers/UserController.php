<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public static function routeName(){
        return Str::snake("User");
    }
    public $childRelationName; 
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->childRelationName = Pluralizer::plural(Str::snake(array_slice(explode('\\', User::class), -1)[0]));
    }
    public function index(Request $request,User $user)
    {
        $childRelationName = $this->childRelationName;
        return UserResource::collection($user->$childRelationName()->search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request, User $user)
    {
        if(!$this->user->is_permitted_to('store',User::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),User::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $user = User::create($validator->validated());
        $childRelationName = $this->childRelationName;
        $user->$childRelationName()->save($user);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $user->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new UserResource($user);
    }
    public function show(Request $request,User $user)
    {
        if(!$this->user->is_permitted_to('view',User::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new UserResource($user);
    }
    public function update(Request $request, User $user)
    {
        if(!$this->user->is_permitted_to('update',User::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),User::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $user->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $user->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new UserResource($user);

    }

    public function destroy(Request $request,User $user)
    {
        if(!$this->user->is_permitted_to('delete',User::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $user->delete();
        return new UserResource($user);
    }
}
