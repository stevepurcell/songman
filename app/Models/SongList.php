<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongList extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'creator', 'private'];
}
