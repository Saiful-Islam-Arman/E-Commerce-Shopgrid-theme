<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcommerceController extends Controller
{
   public function index()
   {
       return view('front.home.home');
   }

    public function categoryProduct()
    {
        return view('front.category.category-product');
    }

    public function productDetail()
    {
        return view('front.product.detail');
    }
}
