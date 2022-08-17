<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends BaseController
{

    public static function routeName()
    {
        return Str::snake("Property");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return PropertyResource::collection(Property::search($request)->sort($request)->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request)
    {
       
      


        if (!$this->user->is_permitted_to('store', Property::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), Property::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        foreach ($validator->validated() as  $value) {
            $property = Property::updateOrCreate($value);
        }
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $property->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new PropertyResource($property);
    
    }
    public function show(Request $request, Property $property)
    {
        if (!$this->user->is_permitted_to('view', Property::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        return new PropertyResource($property);
    }
    public function update(Request $request, Property $property)
    {
        if (!$this->user->is_permitted_to('update', Property::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $validator = Validator::make($request->all(), Property::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $property->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $property->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new PropertyResource($property);
    }
    public function destroy(Request $request, Property $property)
    {
        if (!$this->user->is_permitted_to('delete', Property::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $property->delete();

        return new PropertyResource($property);
    }
}
