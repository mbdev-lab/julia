<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserMute extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'user_mute';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'muter_user_id',
        'muted_user_id',
    ];


}
