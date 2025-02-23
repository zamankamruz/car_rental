<?php

namespace App\Mail;

use App\Models\Rental;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RentalConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $rental;
    public $isAdminNotification;

    public function __construct(Rental $rental, $isAdminNotification = false)
    {
        $this->rental = $rental;
        $this->isAdminNotification = $isAdminNotification;
    }

    public function build()
    {
        return $this->subject($this->isAdminNotification ? 'New Rental Booking Alert' : 'Your Rental Confirmation')
                    ->view('emails.rental_confirmation');
    }
}
