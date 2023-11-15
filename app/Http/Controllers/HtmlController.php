<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HtmlController extends Controller
{
    public static function badNofificationIcon($echo = false)
    {
        $str = "<div class='notification-icon icon-notification-danger'>
                    <i class='far fa-times color-danger'></i>
                </div>";
        if ($echo) echo $str; else return $str;
    }

    /**
     * @param bool $echo
     * @return string
     */
    public static function timeNofificationIcon($echo = false)
    {
        $str = "<div class='notification-icon icon-notification-warning'>
                    <i class='far fa-clock color-warning'></i>
                </div>";
        if ($echo) echo $str; else return $str;
    }

    /**
     * @param bool $echo
     * @return string
     */
    public static function conversationCountMessage($echo = false)
    {
        $str = "<div class='conversation-counter-div'>
                    <div class='counter-number'>99+</div>
                </div>";
        if ($echo) echo $str; else return $str;
    }
}
