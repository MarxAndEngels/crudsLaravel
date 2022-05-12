<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'comments';
    protected $guarded = false;

    public function user()
    {
       return $this->belongsTo(User::class,'user_id', 'id'); //взяли всеъ юзера к одному комменту
    }

    public function getDateCarboneAttribute()
    {
       return Carbon::parse($this->created_at);
    }

    
}
