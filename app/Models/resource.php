<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resource extends Model
{
    use HasFactory;

    protected $table = 'resources';

    /**
     * Pastikan 'user_id' masuk ke sini agar bisa disimpan lewat Controller!
     */
    protected $fillable = [
        'user_id', // WAJIB DITAMBAHKAN
        'nama', 
        'deskripsi', 
        'sumber'
    ];

    /**
     * RELASI: Menyatakan bahwa resource ini dimiliki oleh satu User.
     * Ini memudahkan kamu jika suatu saat ingin menampilkan siapa pemilik data ini.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}