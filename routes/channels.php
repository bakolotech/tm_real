<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;
use App\Models\RecapCommande;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::private('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('events', function ($user) {
    return true;
});

Broadcast::channel('orders.{orderId}', function ($user, $orderId) {
    return $user->id === User::findOrNew($orderId)->user_id;
});

Broadcast::channel('user.{userId}', function ($user) {
    return $user->id;
});

Broadcast::channel('commande.{userId}', function($user, $order_id) {
    return true;
    // return $user->id === RecapCommande::findOrNew($order_id)->user_id;
})

?>
