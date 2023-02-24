<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Player;
use App\Http\Request\PlayerRequest;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class PlayerController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user): InertiaResponse
    {
        return Inertia::render('Admin/Players/Create', [
            'user'=>$user,
            'player'=> new Player
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerRequest $request, User $user)
    {
        $player = new Player($request->validated());
        $player->save();
        return redirect()->route()->with('succeed', 'Hráč bol vytvorený, môžete upravovať jeho profil.');
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
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
