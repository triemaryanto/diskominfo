<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tagihan extends Model
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'menara_id',
        'tarif',
        'status',
        'bulan',
        'tahun',
    ];
    public function menara()
    {
        return $this->belongsTo(Menara::class, 'id', 'menara_id');
    }
}
