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
        'user_id', 'category_id', 'title', 'description', 'img_path', 'slug', 'target_amount', 'start_date', 'end_date', 'receiver', 
        'purpose', 'address_receiver', 'detail_usage_of_funds', 'real_time_amount', 'verification_status', 'activity'
    ];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(CampaignCategory::class);
    }
}
