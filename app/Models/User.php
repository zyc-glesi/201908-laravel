<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->activation_token = str_random(30);
        });
    }
    //

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }



    /*  */
    /**
     * @var string
     * 据教科书，插入了一个属性table，这是原本没有的。
     * protected $table = 'users';
     *
     * Eloquent Article 模型默认情况下会使用类的「下划线命名法」与「复数形式名称」来作为数据表的名称生成规则。
     */


    /**
     * 使用全球通用头像，没有换国内cdn
     */
    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }



}
