<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'artist', 'status_id', 'singer', 'notes'];

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
