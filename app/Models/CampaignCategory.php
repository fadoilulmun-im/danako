<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class CampaignCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot(){
        parent::boot();
        static::deleting(function($file) {
            if($file->isForceDeleting()){
                if(File::exists(public_path('uploads'. $file->logo_path))){
                    File::delete(public_path('uploads'. $file->logo_path));
                }
            }
        });
    }

    public function deleteLogoFile()
    {
        if(File::exists(public_path('uploads'. $this->logo_path))){
            File::delete(public_path('uploads'. $this->logo_path));
        }
    }

    public function getLogoLinkAttribute($val)
    {
        if(!$val) return null;
        return asset('uploads'. $val);
    }
}
