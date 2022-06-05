<?php

namespace App\Observers;

use App\Models\Activities;
use App\Models\User;
use App\Models\Weeks;
use App\Notifications\WelcomeNotification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function saving(User $user)
    {
        //
    }

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if ($user->parent_id) {
            $week = Weeks::create([
                'user_id'    => $user->id,
                'title'      => trans('Introduction'),
                'start_date' => date('Y-m-d'),
                'end_date'   => date('Y-m-d', strtotime('+10 days')),
            ]);

            for ($i = 0; $i <= 4; $i++) {
                Activities::create([
                    'week_id'    => $week->id,
                    'teacher_id' => 1,
                    'title'      => 'Introduction Work ' . $i,
                    'type'       => 'Child ' . $i,
                    'watch'      => $i >= 3 ? 'https://www.youtube.com/watch?v=YbJOTdZBX1g' : null,
                    'download'   => $i >= 3 ? 'upload/files/tenzone.pdf' : null,
                ]);
            }
        }

        $user->notify(new WelcomeNotification($user));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
