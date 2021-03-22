<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "retrieved" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function retrieved(User $user)
    {
        foreach ($user->typeable->toarray() as $key => $value){
            $user->setAttribute($key,$value);
        }
    }


}
