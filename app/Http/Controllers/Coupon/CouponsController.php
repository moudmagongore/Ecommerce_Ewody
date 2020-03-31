<?php

namespace App\Http\Controllers\Coupon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Coupon;

class CouponsController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
    	return view('templateadmin.coupons.list', compact('coupons'));
    }


     public function postAddCoupon(Request $request)
    {
        $this->validate($request, [
        'code' =>'required',
        'remise_en_pourcentage' =>'required',
    
       ]);
       Coupon::create([       
           'code' =>$request->code,
           'remise_en_pourcentage' =>$request->remise_en_pourcentage,
          
       ]);
       return redirect()->back();
    }


    public function postEditCoupon(Request $request, $id)
    {
         $this->validate($request, [
            'code' => 'required',
            'remise_en_pourcentage' => 'required'
        ]);

        $coupons = Coupon::findOrFail($id);

        $coupons->update([
            'code' => $request->code,
            'remise_en_pourcentage' => $request->remise_en_pourcentage
        ]);

        return redirect()->route('list-coupon');
    }



    public function destroyCoupon($id)
    {
    	 Coupon::destroy($id);
        return redirect()->route('list-coupon');
    }
}
