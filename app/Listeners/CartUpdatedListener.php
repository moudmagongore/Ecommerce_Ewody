<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


use Gloudemans\Shoppingcart\Facades\Cart;
use App\models\Coupon;

class CartUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */

   /* La fuction handle() elle reactualise le coupon en session*/
    public function handle($event)
    {
        //On recupere le coupon
       $code = request()->session()->get('coupon');

       //Dans coupon on recupere le code ou le code = au code que l'user a saisi
       $coupon = Coupon::where('code', $code)->first();

       if ($coupon) {

            request()->session()->put('coupon', [

                'code' => $coupon->code,
                'remise_en_pourcentage' => $coupon->discount(Cart::subtotal())
            ]);
       }
    }
}
