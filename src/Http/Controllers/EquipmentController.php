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

    /**
     * Display the specified resource.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('green.equipment.show')
            ->withEquipment(Equipments::get_one($id));
    }
}