<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;

class TransbankController extends Controller
{
    public function __construct(){
        if(app()->environment('production')){
            WebpayPlus::configureForProduction(
                env('webpay_plus_cc'),
                env('webpay_plus_api_key'),
            );
        } else{
            WebpayPlus::configureForTesting();
        }
    }

    public function iniciar_compra(Request $request){
        $nueva_compra = new Compra();
        $nueva_compra->session_id = "123456";
        $nueva_compra->total = $request->total;
        $nueva_compra->save();
        $url_to_pay = self::start_web_pay_plus_transaction( $nueva_compra );
        return $url_to_pay;
    }

    public function start_web_pay_plus_transaction($nueva_compra)
    {
        $transaction = (new Transaction)->create(
            $nueva_compra->id,
            $nueva_compra->session_id,
            $nueva_compra->total,
            route('confirmar_pago')
        );
        $url = $transaction->getUrl().'?token_ws='.$transaction->getToken();
        return $url;
    }

    public function confirmar_pago(Request $request){
        $confirmacion = (new Transaction)->commit($request->get('token_ws'));
        $compra = Compra::where('id',$confirmacion->buyOrder)->first();

        if($confirmacion->isApproved()){
            $compra->status = 2;
            $compra->update();
            return redirect(env('URL_FRONTEND_AFTER_SUCCESS_PAYMENT')."?compra_id={$compra->id}");
        } else{
            return redirect(env('URL_FRONTEND_AFTER_FAILURE_PAYMENT')."?compra_id={$compra->id}");
        }
    }
}
