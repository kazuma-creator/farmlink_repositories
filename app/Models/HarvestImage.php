<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HarvestImage extends Model
{
    protected $fillable = ['harvest_batch_id', 'image_path'];

    public function batch()
    {
        return $this->belongsTo(HarvestBatch::class);
    }
}
