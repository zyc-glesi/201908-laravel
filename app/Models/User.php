<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

  /*  */
    /**
     * @var string
     * 据教科书，插入了一个属性table，这是原本没有的。
     * protected $table = 'users';
     *
     * Eloquent模型默认表格名字。--见鬼我还写错了名字。模型要用单数，不能用users
     */


    /**
     *
     */

    
}
