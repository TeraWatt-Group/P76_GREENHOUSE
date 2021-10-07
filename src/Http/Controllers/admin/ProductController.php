<?php

namespace Terawatt\Greenhouse\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add')
            ->withRoles(Role::orderBy('id', 'desc')->pluck('name'));
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
            return view('admin.product.edit')
                ->withUsers(User::findOrFail($id))
                ->withRoles(Role::orderBy('id', 'desc')->pluck('name'));
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
            $user = User::findOrFail($id);

            if (!is_null($request->role)) {
                $request->role = array_unique($request->role);
            }

            $user->syncRoles($request->role);

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
