<?php

namespace Terawatt\Greenhouse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
	public function index(Request $request)
	{
	    return view('user.greenhouse');
	}
}