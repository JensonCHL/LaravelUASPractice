<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PurchaseController extends Controller
{
    //
    public function purchase(Product $product)
    {
        $user = Auth::user();

        // Debugging: Check if $user and $product are valid
        // dd($user, $product);

        if ($user->balance < $product->price) {
            return redirect()->route('dashboard')->with('error', 'Insufficient Balance');
        }

        $user->balance -= $product->price;
        $user->point += $product->point;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Purchase Successful');
    }
}
