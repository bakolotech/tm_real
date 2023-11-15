<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\User;

class InviteNotification extends Notification
{
    use Queueable;
    public $notification_url;
    /**
     * Create a new notification instance.
     *
     * @param $notification_url
     * @return void
     */
    public function __construct($notification_url)
    {
        $this->notification_url = $notification_url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // url('/')
        $username = Auth::user()->nom." ".Auth::user()->prenom;
        // return (new MailMessage)->greeting('Monsieur,Madame')
        //             ->line("Vous avez été invité par ".$username." à vous inscrire sur Toulè Market")
        //             // ->from('barrett@example.com', 'Barrett Blair')
        //             ->subject('Notification Toulè Market')
        //             ->action('Cliquer ici pour valider', $this->notification_url)
        //             ->line('Merci de faire un tour sur notre application!');

        return (new MailMessage)->greeting('Monsieur,Madame')
        ->line("Félicitation! vous venez de créer votre compte vendeur sur TouleMarket")
        ->line("Votre compte est en cours de traitement")
        // ->from('barrett@example.com', 'Barrett Blair')
        ->subject('Notification Toulè Market')
        ->action('Cliquer ici pour retourner sur l\'application', $this->notification_url)
        ->line('Merci de patienter quelque munites avant la validation de votre compte!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
