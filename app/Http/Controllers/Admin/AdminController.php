<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('admin');
    //     echo $this->middleware('admin');
    // }
    public function index(){
        $totalproduct = Product::count('id');
        $totalorders = Order::count('id');
        $totalusers = User::count('id');
        $totaldelivered = Order::where('status', 'Delivered')->count('id');
        return view('admin.dashboard', compact(['totalproduct', 'totalusers', 'totalorders', 'totaldelivered']));
    }
}
