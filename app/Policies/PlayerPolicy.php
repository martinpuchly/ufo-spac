<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Player;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\RedirectResponse as HttpRedResp;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class PlayerPolicy
{
    
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response|bool
    {
        if($user->hasPerm('admin-player-add')){
            return true;
        }
        return abort(403);
    }

    /**
     * Determine whether the user can create models.
     */
    public function edit(User $user): Response|bool
    {
        if($user->player()->exists())
        {
            return true;
        }       
        return abort(403);
    }

    /**
     * Determine whether the user can create models.
     */
    public function editAdmin(User $user): Response|bool
    {
        if($user->hasPerm('admin-player-edit'))
        {
            return true;
        }       
        return abort(403);
    }



}
