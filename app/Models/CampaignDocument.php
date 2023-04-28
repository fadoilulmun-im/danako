<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class CampaignDocument extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function deleteFile()
    {
        if(File::exists(public_path('uploads'. $this->path))){
            File::delete(public_path('uploads'. $this->path));
        }
    }
}
