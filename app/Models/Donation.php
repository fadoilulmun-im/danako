<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donations';
    protected $fillable = ['user_id', 'campaign_id', 'name', 'amount_donations', 'hope'];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\User','id');
    }

    public function campaign()
    {
        return $this->HasOne('App\Models\Campaign','id');
    }
}
