<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReactionResource;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class UserReactionController extends Controller
{
    public static function routeName(){
        return Str::snake("Reaction");
    }
    public $childRelationName; 
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->childRelationName = Pluralizer::plural(Str::snake(array_slice(explode('\\', Reaction::class), -1)[0]));
    }
    public function index(Request $request,User $user)
    {
        $childRelationName = $this->childRelationName;
        return ReactionResource::collection($user->$childRelationName()->search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request, User $user)
    {
        if(!$this->user->is_permitted_to('store',Reaction::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Reaction::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $reaction = Reaction::create($validator->validated());
        $childRelationName = $this->childRelationName;
        $user->$childRelationName()->save($reaction);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $reaction->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ReactionResource($reaction);
    }
    public function show(Request $request,User $user, Reaction $reaction)
    {
        if(!$this->user->is_permitted_to('view',Reaction::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new ReactionResource($reaction);
    }
    public function update(Request $request, User $user, Reaction $reaction)
    {
        if(!$this->user->is_permitted_to('update',Reaction::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Reaction::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $reaction->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $reaction->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ReactionResource($reaction);

    }

    public function destroy(Request $request,User $user, Reaction $reaction)
    {
        if(!$this->user->is_permitted_to('delete',Reaction::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $reaction->delete();
        return new ReactionResource($reaction);
    }
}
