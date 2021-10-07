<?php

namespace Terawatt\Greenhouse\Http\Controllers;

use App\Http\Controllers\Controller;
use Terawatt\Greenhouse\Models\Product;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome')
            ->withProduct(Product::get_all_product());
    }
}
