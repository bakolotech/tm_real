<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserInRayon implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public string $message;
    public int $id;
    public int $id_produit;
    public int $type_event;
    public function __construct(string $message, int $id, int $id_produit, $type_event)
    {
        //
        $this->message = $message;
        $this->id = $id;
        $this->id_produit = $id_produit;
        $this->type_event = $type_event;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn():Channel
    {
        return new PrivateChannel('App.User.'.$this->id);
    }
}
