<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class WithdrawalDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function withdrawal(){
        return $this->belongsTo(Withdrawal::class);
    }

    public function deleteFile()
    {
        if(File::exists(public_path('uploads'. $this->path))){
            File::delete(public_path('uploads'. $this->path));
        }
    }
}
