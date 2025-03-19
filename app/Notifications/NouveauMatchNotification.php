<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Matche;

class NouveauMatchNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $matche;

    public function __construct(Matche $matche)
    {
        $this->matche = $matche;
    }

    public function via($notifiable)
    {
        return ['mail']; // Envoyer par email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouveau Match Programmé ⚽')
            ->greeting('Bonjour !')
            ->line("Un nouveau match a été programmé entre **{$this->matche->equipe1->nom}** et **{$this->matche->equipe2->nom}**.")
            ->line("Date : **{$this->matche->date}**")
            ->line("Heure : **{$this->matche->heure}**")
            ->action('Voir les détails', url('/matchs'))
            ->line('Bonne chance aux équipes !');
    }
}
