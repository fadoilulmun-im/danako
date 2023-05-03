<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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

    public function deleteImageFile()
    {
        if(File::exists(public_path('uploads'. $this->logo_path))){
            File::delete(public_path('uploads'. $this->logo_path));
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(CampaignCategory::class);
    }

    public function getImgPathAttribute($value){
        $path = File::exists(public_path('uploads'. $value)) ? asset('uploads'.$value) : asset('assets/images/image-solid.svg');
        return $path;
    }
}
