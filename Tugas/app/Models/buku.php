<?php

namespace App\Models;

use App\Models\anggota;
use App\Models\kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class buku extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'buku';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>
     */
    protected $guarded = ['id_buku'];


    /**
     * Get all of the comments for the buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kategori(): HasMany
    {
        return $this->hasMany(kategori_buku::class, 'id_buku', 'id_buku');
    }

    /**
     * Get the user associated with the buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function peminjam(): HasOne
    {
        return $this->hasOne(anggota::class, 'id_anggota', 'id_anggota');
    }
}
