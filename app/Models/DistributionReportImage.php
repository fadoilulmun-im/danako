<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class DistributionReportImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function distributionReport(){
        return $this->belongsTo(DistributionReport::class);
    }

    public function deleteFile()
    {
        if(File::exists(public_path('uploads'. $this->path))){
            File::delete(public_path('uploads'. $this->path));
        }
    }
}
