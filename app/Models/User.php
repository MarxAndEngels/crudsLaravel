<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\SendVerifyWithNotifiation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;

    public static function getRoles(){
        return[
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_READER => 'Читатель'
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function sendEmailVerificationNotification(){
        $this->notify( new SendVerifyWithNotifiation());
    }
    public function likedPost(){
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }
    public function comment(){
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
}
