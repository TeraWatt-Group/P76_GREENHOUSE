<?php

namespace Terawatt\Greenhouse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechnologiesController extends Controller
{
	public function index(Request $request)
	{
	    return view('green.technologies');
	}
}