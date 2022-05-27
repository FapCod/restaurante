<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Mail\EnviarAvisoMailable;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
class EnviarAvisoController extends Controller
{
    public function store($product,$user){
        $product= Product::find($product);
        $presentations = $product->presentations;
        $user = User::find($user);
        $correo = new EnviarAvisoMailable($product,$user,$presentations);
        Mail::to($user->email)->send($correo);
        // aqui se puede actualizar al usuario.
        return back()->with('status', 'Se envio el correo✅👍');
    }
}
