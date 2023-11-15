<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\InStockNotifyer;

class InStockNotifyerController extends Controller
{
    //

    public function verifierProductNotificationActivated(Request $request, $id) {

        if (Auth::check()) {

            $check_notifyed = 
            DB::table('in_stock_notifyers')
            ->where('user_id', Auth::user()->id)
            ->where('id_produit', $id)
            ->get();

            if (count($check_notifyed) > 0) {
                return 1;
            }else {
                return 0;
            }
        } else {
            return 0;
        }

    }
}
