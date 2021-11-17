<?php

namespace Terawatt\Greenhouse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipments;
use App\Models\Product;
use App\Models\Rcp;
use App\Models\Orders;
use App\Models\History;

class ProfileController extends Controller
{
	public function greenhouse(Request $request)
	{
		try {
			return view('green.user.greenhouse.index')
				->withEquipments(Equipments::select()
									->leftJoin('equipments_description', 'equipments_description.equipmentid', 'equipments.equipmentid')
									->join('users_equipments', function ($join) {
										$join->on('users_equipments.equipmentid', 'equipments.equipmentid')
											 ->where('users_equipments.userid', \Auth::id());
									})->get());
		} catch (\Throwable $e) {
			\Log::alert($e->getMessage());
			return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
		}
	}

	public function index(Request $request)
	{
		try {
			return view('green.user.greenhouse.orders.index')
				->withOrders(Orders::select()
								->with('equipments', 'products', 'rcps')
								->where('userid', \Auth::id())
								->orderBy('orderid', 'desc')
								->get());
		} catch (\Throwable $e) {
			\Log::alert($e->getMessage());
			return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
		}
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

	public function create()
	{
		return view('green.user.greenhouse.orders.add')
			->withEquipment(Equipments::select()
								->leftJoin('equipments_description', 'equipments_description.equipmentid', 'equipments.equipmentid')
								->join('users_equipments', function ($join) {
									$join->on('users_equipments.equipmentid', 'equipments.equipmentid')
										 ->where('users_equipments.userid', \Auth::id());
								})->pluck('name', 'uequipmentid'))
			->withProducts(Product::get_all()->pluck('name', 'productid'))
			->withRcp(Rcp::where('productid', 1)->pluck('rcp_version', 'rcpid'));
	}

	public function store(Request $request)
	{
		try {
			if (Orders::in_progres(\Auth::id()) === 0) {
				if (isset($request->equipment) && isset($request->product) && isset($request->rcp)) {
					\DB::transaction(function () use ($request) {
						Orders::insert([
							'userid' => \Auth::id(),
							'uequipmentid' => $request->equipment,
							'productid' => $request->product,
							'rcpid' => $request->rcp,
							'start' => time(),
							'end' => time(),
							'status' => 0
						]);
					});

					return redirect()->route('user.greenhouse.orders.index')->with('flash.banner', __('Success!'));
				} else {
					$error = __('Не всі параметри вказані вірно!');
					\Log::alert($error);
					return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $error])->withInput();
				}
			} else {
				$error = __('У Вас є активні замовлення. Cпочатку потрібно їх завершити!');
				\Log::alert($error);
				return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $error])->withInput();
			}
		} catch (\Throwable $e) {
			\Log::alert($e->getMessage());
			return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()])->withInput();
		}
	}

	public function destroy($id)
	{

	}
}