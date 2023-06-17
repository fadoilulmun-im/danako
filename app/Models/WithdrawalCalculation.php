<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WithdrawalCalculation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'withdrawal_calculation';

    protected $guarded = [];

    public function withdrawal()
    {
        return $this->belongsTo(Withdrawal::class);
    }
}
