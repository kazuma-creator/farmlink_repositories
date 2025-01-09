<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HarvestBatch extends Model
{
    protected $fillable = [
        'harvest_id',
        'field_id',
        'quantity',
        'unit',
        'worker_id',
        'equipment_id',
        'notes',
    ];

    // 収穫
    public function harvest()
    {
        return $this->belongsTo(Harvest::class);
    }

    // 圃場
    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    // 作業者
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    // 機器設備
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function images()
    {
        return $this->hasMany(HarvestImage::class);
    }    
}
