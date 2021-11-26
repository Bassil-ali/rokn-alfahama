<?php

namespace App\Http\Controllers;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CouponController extends Controller
{

    public static function routeName(){
        return Str::snake("Coupon");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return CouponResource::collection(Coupon::search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Coupon::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Coupon::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $coupon = Coupon::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $coupon->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new CouponResource($coupon);
    }
    public function show(Request $request,Coupon $coupon)
    {
        if(!$this->user->is_permitted_to('view',Coupon::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new CouponResource($coupon);
    }
    public function update(Request $request, Coupon $coupon)
    {
        if(!$this->user->is_permitted_to('update',Coupon::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Coupon::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $coupon->update($validator->validated());
          if ($request->translations) {
            foreach ($request->translations as $translation)
                $coupon->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new CouponResource($coupon);
    }
    public function destroy(Request $request,Coupon $coupon)
    {
        if(!$this->user->is_permitted_to('delete',Coupon::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $coupon->delete();

        return new CouponResource($coupon);
    }
}
