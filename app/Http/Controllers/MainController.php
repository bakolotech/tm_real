<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public static function is_connected(){
    $connected = @fsockopen("www.google.com", 80);
        //website, port  (try 80 or 443)
        if ($connected){
            $is_conn = true; //action when connected
            fclose($connected);
        }
        else{
            $is_conn = false; //action in connection failure
        }
        return $is_conn;

    }

    public static function getCiel()
    {
        $hour = date('H', strtotime('+1 hour'));

        if (in_array($hour, [24, 0, 1, 2, 3])) {
            return asset('assets/images2/ciel/00h-04h.webp');
        }
        if (in_array($hour, [4, 5])) {
            return asset('assets/images2/ciel/04h-06.webp');
        }
        if ($hour == 6) {
            return asset('assets/images2/ciel/06h.webp');
        }
        if (in_array($hour, [7, 8, 9])) {
            return asset('assets/images2/ciel/07h.webp');
        }
        if ($hour == 10) {
            return asset('assets/images2/ciel/10h.webp');
        }
        if ($hour == 11) {
            return asset('assets/images2/ciel/11h.webp');
        }
        if ($hour == 12) {
            return asset('assets/images2/ciel/12h.webp');
        }
        if (in_array($hour, [13, 14, 15])) {
            return asset('assets/images2/ciel/13h.webp');
        }
        if ($hour == 16) {
            return asset('assets/images2/ciel/16h.webp');
        }
        if ($hour == 17) {
            return asset('assets/images2/ciel/17h.webp');
        }
        if ($hour == 18) {
            $minute = date('i', strtotime('+1 hour'));
            if ($minute < 30) {
                return asset('assets/images2/ciel/18h-1.webp');
            }
            else return asset('assets/images2/ciel/18h-2.webp');
        }
        if ($hour == 19) {
            return asset('assets/images2/ciel/19.webp');
        }
        if (in_array($hour, [20, 21, 22, 23])) {
            return asset('assets/images2/ciel/20h-00h.webp');
        }
    }
}
