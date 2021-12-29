<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingResource;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class UserSettingController extends BaseController
{
    public static function routeName(){
        return Str::snake("UserSetting");
    }
    public $childRelationName; 
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->childRelationName = Pluralizer::plural(Str::snake(array_slice(explode('\\', Setting::class), -1)[0]));
    }
    public function index(Request $request,User $user)
    {
        $childRelationName = $this->childRelationName;
        return SettingResource::collection($user->$childRelationName()->search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request, User $user)
    {
        if(!$this->user->is_permitted_to('store',Setting::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Setting::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $setting = Setting::create($validator->validated());
        $childRelationName = $this->childRelationName;
        $user->$childRelationName()->save($setting);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $setting->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new SettingResource($setting);
    }
    public function show(Request $request,User $user, Setting $setting)
    {
        if(!$this->user->is_permitted_to('view',Setting::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new SettingResource($setting);
    }
    public function update(Request $request, User $user, Setting $setting)
    {
        if(!$this->user->is_permitted_to('update',Setting::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Setting::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $setting->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $setting->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new SettingResource($setting);

    }

    public function destroy(Request $request,User $user, Setting $setting)
    {
        if(!$this->user->is_permitted_to('delete',Setting::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $setting->delete();
        return new SettingResource($setting);
    }
}
