<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongListItems extends Model
{
    use HasFactory;

    protected $fillable = ['songlist_id', 'song_id', 'position'];
}
