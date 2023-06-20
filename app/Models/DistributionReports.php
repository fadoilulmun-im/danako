<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistributionReports extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function withdrawal()
    {
        return $this->belongsTo(Withdrawal::class, 'withdrawal_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(DistributionReportImage::class, 'distribution_report_id', 'id');
    }
}