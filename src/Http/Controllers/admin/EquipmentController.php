<?php

namespace Terawatt\Greenhouse\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipments;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.equipment.index')
            ->withRows(Equipments::with('descriptions')->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipment.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            return view('admin.equipment.edit')
                ->withEquipments(Equipments::get_one($id));
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            dd($request->product);

            return redirect()->route('admin.product.index')->with('flash.banner', __('Success!'));
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $curent_user_id = \Auth::id();

        if ($curent_user_id != $id) {
            if (User::where('id', $id)->max('status') === 10 && $request->type === 'restore') {
                User::where('id', $id)
                        ->where('id', '<>', $curent_user_id)
                        ->update(['status' => 6]);

                return redirect()->back()->with('flash.banner', __('Success!'));
            } elseif ($request->type === 'soft_delete') {
                User::where('id', $id)
                        ->where('id', '<>', $curent_user_id)
                        ->update(['status' => 10]);

                return redirect()->back()->with('flash.banner', __('Success!'));
            } elseif ($request->type === 'delete') {
                User::where('id', '<>', $curent_user_id)
                        ->destroy($id);

                return redirect()->back()->with('flash.banner', __('Success!'));
            }
        }

        return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => ' ']);
    }
}
