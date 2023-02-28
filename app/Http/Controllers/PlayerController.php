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
use Illuminate\Support\Str;

class PlayerController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user): InertiaResponse|RedirectResponse
    {
        if($user->player()->exists()){
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
        if($user->player()->exists()){
            return redirect()->route('players.edit', $user->player->id)->with('notice', 'Hráč už bol vytvorený, môžete upravovať jeho profil.');
        }
        $player = Player::create(array_marge($request->validated(), ['user_id'=>$user->id]));
        return redirect()->route('players.edit', $player->id)->with('succeed', 'Hráč bol vytvorený, môžete upravovať jeho profil.');
    }


    /**
     * Display a listing of the resource.
     */
    public function adminList(): InertiaResponse
    {
        return Inertia::render('Admin/Players', [
            'players'=>Player::withTrashed()->with('user')->all()
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Players/Index', [
            'players'=>Player::all()
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(String $player_slug): InertiaResponse
    {
        if(!$player = Player::where('slug', $player_slug)->first()){
            return redirect()->route('/')->wit('error', 'Hráčsky profil neexistuje.');
        }
        return Inertia::render('Players/Show', [
            'player'=>$player
        ]);
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
        if($player->photo && $player->photo->isValid()) {
            $player->photo = photoUpload($player->photo);
        }
        $player->save();
        return redirect()->route('player.edit')->with('succeed', 'Profil hráča bol uložený.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAdmin(PlayerRequest $request, Player $player)
    {
        $player->fill($request->validated());
        if($player->photo && $player->photo->isValid()) {
            $player->photo = photoUpload($player->photo);
        }
        $player->save();
        return redirect()->route('admin.player.edit', $player->id)->with('succeed', 'Profil hráča bol uložený.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('/')->with('notice', 'Hráčsky profil bol vymazaný.');
    }


    /**
     * Remove the specified resource from storage permanently.
     */
    public function destroyForce(Player $player)
    {
        $player->forceDelete();
        return redirect()->route('admin.players')->with('error', 'Hráčsky profil bol vymazaný.');
    }

    // PHOTO UPLOAD
    private function photoUpload($photo): String
    {
            $fileName = Str::random(40).'.'.$photo->getClientOriginalExtension(); // MENO + KONCOVKA OBRAZKU        
            $image = Image::make($photo);
            $image->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path('uploads/players/'.$fileName));
            return $fileName;                
    }

}
