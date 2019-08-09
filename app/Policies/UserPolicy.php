<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    //检查用户数据更新时候，现用户和目标用户是否相同
    public function update(User $currentUser,User $user){
        return $currentUser ->id === $user->id;
    }
    //检查删除用户的时候，现用户是否是管理员，同时管理员不能删除自己。
    public function destroy(User $currentUser,User $user){
        return $currentUser ->is_admin && $currentUser ->id !== $user->id;
    }

}
