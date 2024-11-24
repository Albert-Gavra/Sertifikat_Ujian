<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class anggota extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggota';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>
     */
    protected $guarded = ['id_anggota'];

    /**
     * Get all of the buku for the anggota
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buku(): HasMany
    {
        return $this->hasMany(buku::class, 'id_anggota', 'id_anggota');
    }
}
