<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menara extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_menara',
        'email',
        'nomor',
        'lokasi',
        'altitude',
        'latitude',
        'longitude',
    ];
    public function Tagihan()
    {
        return $this->hasMany(Tagihan::class, 'menara_id', 'id');
    }
}
