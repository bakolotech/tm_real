<?php

namespace App\Http\Controllers;
// require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;


use Illuminate\Http\Request;
use App\Models\PhoneVerificationUser;
use App\User;

class SMS extends Controller
{
    //

    public function send(Request $request) {
        $FourDigitRandomNumber = rand(1231,7879);
        // return $FourDigitRandomNumber;
        $code = 'TM-'.$FourDigitRandomNumber;

        $recipients = "+24165609219";
        $stephane = "+24165609219";
        $uriel = "+24162955997";
        $chrismed = "+24162756478";
        $message = "Votre code de vérification à usage unique est:".$code;
        $num_phone = '+241'.$request->num_tel;

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);

        $client->messages->create($num_phone,
                ['from' => $twilio_number, 'body' => $message]);

        $user_phone = PhoneVerificationUser::create([
            'user_id' => $_SESSION['id_utilisateur'],
            'phone_number' => $request->num_tel,
            'code' => $code,
            'isVerified' => false
        ]);

        return 'success';

    }

    public function sendClient(Request $request) {
        $FourDigitRandomNumber = rand(1231,7879);
        // return $FourDigitRandomNumber;
        $code = 'TM-'.$FourDigitRandomNumber;

        $message = "Votre code de vérification à usage unique est:".$code;
        $num_phone = '+241'.$request->num_tel;

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);

        $client->messages->create($num_phone,
                ['from' => $twilio_number, 'body' => $message]);

        $user_phone = PhoneVerificationUser::create([
            'user_id' => $_SESSION['config']['user-logged']["id"],
            'phone_number' => $request->num_tel,
            'code' => $code,
            'isVerified' => false
        ]);

        return 'success';

    }

    public function check(Request $request) {

        $val = $request->code;

        $code = PhoneVerificationUser::where('code', $val)
        ->where('phone_number', $request->phone_number)
        ->get();

        if (count($code) > 0) {
            return 'success';
        }else {
            return 'code incorrect';
        }

    }

    public function checkIfPhoneExist(Request $request) {
        $user = User::where('portable', $request->num_tel)
        ->where('deleted', 0)
        ->first();

        if ($user) {
            return response()->json(['status' => '200']); // user exist in db
        }else {

            $phone_confirmation = [
                'phone_number' => $request->num_tel,
                'code' => $request->code_verification,
                'user_id' => 0
            ];

             $phone_verification = PhoneVerificationUser::create($phone_confirmation);

             return response()->json(['status' => '201', 'data' => $phone_verification]); // user don't exist in db

        }

    }
}
