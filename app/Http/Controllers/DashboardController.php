<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardResource;
use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends BaseController
{
    public static function routeName()
    {
        return Str::snake("Dashboard");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$this->user) return response('not permeted', 403);
        $arr = ['categories' => 0, 'items' => 0, 'tax' => 0, 'users' => 0, 'orders' => 0, 'payments_totlas' => 0];

        $arr['categories'] = Category::count();
        $arr['items'] = Item::count();
        $arr['users'] = User::count();
        $arr['orders'] = Order::count();
        $arr['payments_totlas'] = Payment::where('status', 1)->sum('amount');

        return new DashboardResource($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
