<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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
    public function author(User $user, Product $product){
        if($user->id == $product->user_id){
            return true;
        }else{
            return true;
        }
    }

    public function published(?User $user, Product $product){
        if($product->status == 2){
            return true;
        }else{
            return false;
        }
    }

}
