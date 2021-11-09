<?php

namespace Terawatt\Greenhouse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipments;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        return view('green.equipment.index')
            ->withEquipments(Equipments::select()->get());
    }
}