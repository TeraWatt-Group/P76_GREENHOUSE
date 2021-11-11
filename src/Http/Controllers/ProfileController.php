<?php

namespace Terawatt\Greenhouse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipments;
use App\Models\Items;
use App\Models\History;

class ProfileController extends Controller
{
	public function greenhouse(Request $request)
	{
	    return view('green.user.greenhouse.index')
	    	->withEquipments(Equipments::select()
	    						->leftJoin('equipments_description', 'equipments_description.equipmentid', 'equipments.equipmentid')
	    						->join('users_equipments', function ($join) {
						            $join->on('users_equipments.equipmentid', 'equipments.equipmentid')
						                 ->where('users_equipments.userid', \Auth::id());
						        })->get());
	}

	public function show($equipmentid)
	{
	    return view('green.user.greenhouse.dashbord')
	    	->withEquipment(Equipments::select()
	    						->leftJoin('equipments_description', 'equipments_description.equipmentid', 'equipments.equipmentid')
	    						->join('users_equipments', function ($join) use ($equipmentid) {
						            $join->on('users_equipments.equipmentid', 'equipments.equipmentid')
						                 ->where('users_equipments.userid', \Auth::id())
						                 ->where('equipments.equipmentid', $equipmentid);
						        })->first())
	    	->withHistory(History::select()
	    						->join('items', function ($join) use ($equipmentid) {
						            $join->on('items.itemid', 'history.itemid')
						                 ->where('items.equipmentid', $equipmentid);
						        })
						        ->where('history.clock', '>', time()-3)
						        ->orderBy('history.clock', 'desc')
						        ->get());
	}
}