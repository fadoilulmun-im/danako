<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $table = 'campaigns';
    protected $fillable = 
    [
        'user_id', 'category_id', 'name', 'description', 'img_path', 'amount', 'start_date', 'end_date', 'receiver', 
        'purpose', 'address_receiver', 'real_time_amount', 'verification_status', 'activity'
    ];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Models\User','id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\CampaignCategory','id');
    }
}
