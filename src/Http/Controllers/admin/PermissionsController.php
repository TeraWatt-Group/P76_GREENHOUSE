<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.permissions.index')
            ->withPermissions(Permission::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.add')
            ->withGuards(config('auth.guards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        try {
            Permission::create([
                'name' => $request->name,
            ]);

            return redirect()->route('admin.permissions.index')->with('flash.banner', __('Success!'));
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()])->withInput();
        }
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
        return view('admin.permissions.edit')
            ->withGuards(config('auth.guards'));
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
        return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => ' ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (!is_null(PermissionRole::find($id))) {
                \Log::alert(__('Данний дозвіл використовуется!'));
                return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => __('Данний дозвіл використовуется!')]);
            } else {
                Permission::destroy($id);

                return redirect()->route('admin.permissions.index')->with('flash.banner', __('Success!'));
            }
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
        }
    }

    public function restore($id)
    {
        try {
            $permission = Permission::withTrashed()->findOrFail($id);
            $permission->restore();

            return redirect()->route('admin.permissions.index')->with('flash.banner', __('Success!'));
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
        }
    }

    public function forceDelete($id)
    {
        try {
            $permission = Permission::withTrashed()->findOrFail($id);
            $permission->forceDelete();

            return redirect()->route('admin.permissions.index')->with('flash.banner', __('Success!'));
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
        }
    }
}
