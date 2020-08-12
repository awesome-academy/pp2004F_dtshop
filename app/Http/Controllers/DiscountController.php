<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\Http\Requests\DiscountRequest;

class DiscountController extends Controller
{
    public function index(){
        $discounts = Discount::paginate(6);
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
        return redirect()->route('create_discount')->with('status','Your discount has been create ! Its unique code id is : '.$slug);
    }
    public function destroy($id){
        $discount = Discount::whereId($id)->firstOrFail();
        $discount->delete();
        return redirect()->route('dis',[$discount]);
    }
}
