<?php

namespace App\Mail;

use App\Models\Invite;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Invite $invite)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('you@example.com')
                    ->subject('Invitation')
                    ->view('email.invite')
                    ->with(['organizationName' => 'IGSPROTECH', 'invite' => $this->invite]); // Pass the organization name and invite to the view
    }
}
