<?php

namespace App\Http\Controllers;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SettingCountroller extends Controller
{

    public static function routeName(){
        return Str::snake("Setting");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return SettingResource::collection(Setting::search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Setting::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Setting::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $setting = Setting::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $setting->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new SettingResource($setting);
    }
    public function show(Request $request,Setting $setting)
    {
        if(!$this->user->is_permitted_to('view',Setting::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new SettingResource($setting);
    }
    public function update(Request $request, Setting $setting)
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
    public function destroy(Request $request,Setting $setting)
    {
        if(!$this->user->is_permitted_to('delete',Setting::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $setting->delete();

        return new SettingResource($setting);
    }
}
