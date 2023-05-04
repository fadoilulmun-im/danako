<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionReport extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'distribution_reports';

    protected $guarded = [];

    public function withdrawal(){
        return $this->belongsTo(Withdrawal::class, 'withdrawal_id', 'id');
    }
}
