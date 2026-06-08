<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $table = 'resources';

    /**
     * Field yang boleh diisi massal (mass assignment).
     * Selain ini, akan diabaikan oleh Laravel.
     */
    protected $fillable = [
        'user_id',
        'nama',
        'deskripsi',
        'sumber',
    ];

    /**
     * Relasi: Setiap resource milik satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}