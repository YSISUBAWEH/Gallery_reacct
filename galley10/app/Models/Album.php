<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    public $table = 'album';
    protected $fillable = [
        'NamaAlbum',
        'deskripsi',
        'users_id',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id'); // Tentukan nama foreign key jika tidak mengikuti konvensi
    }
}
