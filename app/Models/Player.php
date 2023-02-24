<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Player extends Model
{
    use HasFactory;

    protected $fillable =   ['first_name', 'first_name_visibility', 'last_name', 'last_name_visibility', 
                                'nickname', 'nickname_visibility', 'birth_date', 'birth_date_visibility', 
                                'photo', 'photo_visibility', 'shirt_number', 'shirt_number_visibility', 
                                'about', 'about_visibility', 'user_id', 'user_visibility', 
                            ];

    /*
    * možnosti nastavenia zviditeľnenia jednotlivých atribútov
    */
    public static VISIBILITY = [
        1=>'verejné',
        2=>'iba hráči',
        3=>'neverejné'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
