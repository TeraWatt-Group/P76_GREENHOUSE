<?php

namespace Terawatt\Greenhouse\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.roles.index')
            ->withSearch($request->search ?: null)
            ->withRoles(Role::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.add')
            ->withGuards(config('auth.guards'))
            ->with('permissions', Permission::get()->toArray());
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
            'guard_name'=>'required',
        ]);

        try {
            \DB::transaction(function () use ($request) {
                $role = Role::create([
                    'name' => $request->name,
                    'guard_name' => $request->guard_name,
                ]);

                $role->syncPermissions($request->permissions);
            });

            return redirect()->route('admin.roles.index')->with('flash.banner', __('Success!'));
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
        try {
            $role = Role::findOrFail($id);
            return view('admin.roles.edit')
                ->withGuards(config('auth.guards'))
                ->withRole($role)
                ->withPermissions(Permission::orderBy('id', 'desc')->orderBy('guard_name')->get())
                ->withSuper($role->name == 'super-admin');
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
        $request->validate([
            'name'=>'required',
        ]);

        try {
            $role = Role::findByid($id);

            $role->update(['name' => $request->name]);

            if(isset($request->permissions)) {
                $role->syncPermissions($request->permissions);
            }

            return redirect()->route('admin.roles.index')->with('flash.banner', __('Success!'));
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
    public function destroy($id)
    {
        try {
            if (!is_null(RoleUsers::find($id))) {
                \Log::alert(__('Дана роль використовуется!'));
                return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => __('Дана роль використовуется!')]);

            } else {
                Role::destroy($id);

                return redirect()->route('admin.roles.index')->with('flash.banner', __('Success!'));
            }
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
        }
    }

    public function restore($id)
    {
        try {
            $roles = Role::withTrashed()->findOrFail($id);
            $roles->restore();

            return redirect()->route('admin.roles.index')->with('flash.banner', __('Success!'));
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
        }
    }

    public function forceDelete($id)
    {
        try {
            $roles = Role::withTrashed()->findOrFail($id);
            $roles->forceDelete();

            return redirect()->route('admin.roles.index')->with('flash.banner', __('Success!'));
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
        }
    }
}
