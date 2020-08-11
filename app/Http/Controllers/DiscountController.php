<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\Http\Requests\DiscountRequest;

class DiscountController extends Controller
{
    public function index(){
        $discounts = Discount::all();
        return view ('admin.discount.index',compact('discounts'));
    }
    public function create(){
        return view ('admin.discount.create');
    }
    public function store(DiscountRequest $request){
        $slug = uniqid();
        $discount = new Discount(array(
            'code' => $request->get('code'),
            'discount' => $request->get('discount'),
            'expiration_date' => $request->get('expiration_date'),
            'slug' => $slug,
        ));
        $discount->save();
        return redirect('create_discount')->with('status','Your discount has been create ! Its unique code id is : '.$slug);
    }
    public function show($slug){
        $discount = Discount::whereSlug($slug)->firstOrFail();
        return view('admin.discount.show',compact('discount'));
    }
    public function edit($slug){
        $discount = Discount::whereSlug($slug)->firstOrFail();
        return view('admin.discount.edit', compact('discount'));
    }
    public function update(DiscountRequest $request,$slug){
        $discount = Discount::whereSlug($slug)->firstOrFail();
        $discount->discount = $request->get('discount');
        $discount->save();
        return redirect(action('DiscountController@edit', $discount->slug))->with('status', 'Your discount '.$slug.'has been update !');
    }
    public function destroy($slug){
        $discount = Discount::whereSlug($slug)->firstOrFail();
        return redirect('discount')->with('status','Your discount has been delete !');
    }
}
