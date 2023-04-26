<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $table = 'tb_mst_villages';

    protected $guarded = [];

    public function subdistrict()
    {
        return $this->belongsTo(SubDistrict::class, 'district_id', 'id');
    }
}
