<?php

namespace App\Listeners;

use Mail;
use App\User;
use App\Events\UserWasCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserWasCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasCreatedEvent  $event
     * @return void
     */
    public function handle(UserWasCreatedEvent $event)
    {
      $data = User::select('name')->where('name', $event->user)->first()->toArray();

      $admins = User::where('is_admin', $event->is_admin)->get();

      foreach ($admins as $admin) {
        // print_r($email);
        Mail::send('email', $data, function ($message) use($admin) {

            $message->from('bps.phi@gmail.com','tugas.dev');

            $message->to($admin->email)->subject('New user was created !');

        });
      }

    }
}
