<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Withdrawal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'withdrawals';

    protected $guarded = [];

    public function distributionReport()
    {
        return $this->hasOne(DistributionReport::class, 'withdrawal_id', 'id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function document()
    {
        return $this->hasMany(WithdrawalDocument::class, 'withdrawal_id', 'id');
    }

    public function calculation()
    {
        return $this->hasOne(WithdrawalCalculation::class, 'withdrawal_id', 'id');
    }
}
