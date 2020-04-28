<?php

namespace App\Observers;

use App\Event;
use App\User;


class UserObserver
{
    const EVENT_NAME = 'Пользователь';
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $event = new Event([
            'name'  => self::EVENT_NAME,
            'description'   => 'Был создан  пользователь: ' . $user->name
        ]);

        $event->save();
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $event = new Event([
           'name' => self::EVENT_NAME,
           'description' => 'Был изменен пользователь: ' . $user->name
        ]);
        $event->save();
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $event = new Event([
           'name'   => self::EVENT_NAME,
           'description'    => 'Был удален пользователь: ' . $user->name
        ]);

        $event->save();
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
