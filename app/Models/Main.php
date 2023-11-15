<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    public static function initSessions(User $user)
    {
        if(!is_null($user->devise_id)) $_SESSION['config']['user-devise'] = ($user->devise()->first())->toArray();
        if(!is_null($user->langue_id)) $_SESSION['config']['user-langue'] = ($user->langue()->first())->toArray();
        if(!is_null($user->city_id)) $_SESSION['config']['user-ville'] = ($user->maville()->first())->toArray();
    }

    /**
     * @param $pays_id
     */
    public static function setSessionPays($pays_id)
    {
        $_SESSION['config']['user-pays'] = $pays_id;
    }

    /**
     * @param $data
     */
    public static function setSessionIpInfo($data)
    {
        $_SESSION['config']['ip-info'] = $data;
    }

    /**
     * @param State $state
     */
    public static function setSessionProvince(State $state)
    {
        $_SESSION['config']['user-province'] = $state->toArray();
    }

    /**
     * @param City $ville
     */
    public static function setSessionVille(City $ville)
    {
        $_SESSION['config']['ma-ville'] = $ville->toArray();
    }

    /**
     * @param $data
     * @return array
     */
    public static function arrayFormat($data)
    {
        if (!empty($data)) {
            return $data->toArray();
        }
        return [];
    }

    public static function userExists($table_field = 'email', $value = '')
    {
        $user = User::where($table_field, $value)->get();
        if ($user->count() > 0) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public static function getUserKey()
    {
        do{
            $key = 'TM-'. self::getIntKey(2) . strtoupper(self::getStrKey(4)) . self::getIntKey(2);
            $users = User::where('personal_key', $key)->get();
        }
        while($users->count() > 0);
        return $key;
    }

    /**
     * @param int $length
     * @return false|string
     */
    public static function getStrKey($length = 60)
    {
        $alphabet = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
        return substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);
    }

    /**
     * @param int $length
     * @return false|string
     */
    public static function getIntKey($length = 10)
    {
        $alphabet = "0123456789";
        return substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);
    }

    /**
     * @param User $user
     */
    public static function setSessionNotificationConfig(User $user)
    {
        if (!isset($user->notificationConfig)) {
            $user->notificationConfig()->create();
        }
        $user->refreshAuthUser();
    }

}
