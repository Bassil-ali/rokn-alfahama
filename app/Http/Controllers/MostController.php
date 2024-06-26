<?php

namespace App\Http\Controllers;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DB;

class MostController extends BaseController
{

    public static function routeName(){
        return Str::snake("Most");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public $childRelationName;

    public function index(Request $request)
    {
       $data = Item::withSum('orderItem','item_quantity')->orderBy('order_item_sum_item_quantity','desc')->paginate(15);
       return ItemResource::collection($data);
        
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Item::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Item::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $item = Item::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $item->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ItemResource($item);
    }
    public function show(Request $request,Item $item)
    {
        if(!$this->user->is_permitted_to('view',Item::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new ItemResource($item);
    }
    public function update(Request $request, Item $item)
    {
        if(!$this->user->is_permitted_to('update',Item::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Item::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $item->update($validator->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $item->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ItemResource($item);
    }
    public function destroy(Request $request,Item $item)
    {
        if(!$this->user->is_permitted_to('delete',Item::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $item->delete();

        return new ItemResource($item);
    }
}
