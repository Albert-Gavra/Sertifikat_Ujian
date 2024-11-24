<?php

namespace App\Models;

use App\Models\kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori_buku extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'buku_kategori';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['id_buku', 'id_kategori'];

    /**
     * Get the user associated with the kategori_buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nama_kategori(): HasOne
    {
        return $this->hasOne(kategori::class, 'id_kategori', 'id_kategori');
    }
}
