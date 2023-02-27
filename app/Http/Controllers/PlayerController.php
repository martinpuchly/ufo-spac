<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Player;
use App\Http\Requests\PlayerRequest;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class PlayerController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user): InertiaResponse|RedirectResponse
    {
        if($user->player){
            return redirect()->route('players.edit', $user->player->id)->with('notice', 'Hráč už bol vytvorený, môžete upravovať jeho profil.');
        }
        return Inertia::render('Admin/Players/Create', [
            'user'=>$user,
            'player'=> new Player
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerRequest $request, User $user): RedirectResponse
    {
        $player = new Player($request->validated());
        $player->save();
        return redirect()->route('players.edit', $player->id)->with('succeed', 'Hráč bol vytvorený, môžete upravovať jeho profil.');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): InertiaResponse
    {
        return Inertia::render('Players/Edit', [
            'player'=>Auth::user()->player
        ]);
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function editAdmin(Player $player): InertiaResponse
    {
        return Inertia::render('Players/Edit', [
            'player'=>Auth::user()->player
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PlayerRequest $request)
    {
        $player = Auth::user()->player;
        $player->fill($request->validated());
        $player->save();
        return redirect()->route('player.edit')->with('succeed', 'Profil hráča bol uložený.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAdmin(PlayerRequest $request, Player $player)
    {
        $player->fill($request->validated());
        $player->save();
        return redirect()->route('admin.player.edit', $player->id)->with('succeed', 'Profil hráča bol uložený.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
