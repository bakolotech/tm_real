<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Support\Facades\URL;

class RealtimeNegociation implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public string $message;
    public  $user;
    public int $id_marchand;
    public int $id_produit;
    public function __construct(User $user, $message, $id_marchand, $id_produit)
    {
        //
        $this->user = $user;
        $this->message = $message;
        $this->id_marchand = $id_marchand;
        $this->id_produit = $id_produit;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn():Channel
    {
        return new PrivateChannel('negociation.'.$this->id_marchand);
    }
}
