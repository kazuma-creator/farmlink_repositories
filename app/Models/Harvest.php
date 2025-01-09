<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    protected $fillable = [
        'cropping_id',
        'harvest_date',
        'lot_number',
        'notes',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];  

    // 作付
    public function cropping()
    {
        return $this->belongsTo(Cropping::class);
    }

    // 収穫ロット
    public function batches()
    {
        return $this->hasMany(HarvestBatch::class);
    }

    public function getTotalYieldAttribute()
    {
        return $this->batches->sum('quantity');
    }

    public function getYieldUnitsAttribute()
    {
        return $this->batches->pluck('unit')->unique()->implode(', ');
    }
}
