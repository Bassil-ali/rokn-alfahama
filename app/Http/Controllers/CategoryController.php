<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{

    public static function routeName()
    {
        return Str::snake("Category");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {

        return CategoryResource::collection(Category::paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request)
    {
        if (!$this->user->is_permitted_to('store', Category::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), Category::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $category = Category::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $category->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new CategoryResource($category);
    }
    public function show(Request $request, Category $category)
    {
        // if (!$this->user->is_permitted_to('view', Category::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);
        return new CategoryResource($category);
    }
    public function update(Request $request, Category $category)
    {
        if (!$this->user->is_permitted_to('update', Category::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $validator = Validator::make($request->all(), Category::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        if($request->parent_id == $request->id){
            return new CategoryResource($data);
        }
        if(!isset($request->parent_id)){
          $data['parent_id'] = null;
        }
        $category->update($data);
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $category->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new CategoryResource($data);
    }
    public function destroy(Request $request, Category $category)
    {
        if (!$this->user->is_permitted_to('delete', Category::class, $request))
            return response()->json(['message' => 'not_permitted'], 422);
        $category->delete();

        return new CategoryResource($category);
    }
}
