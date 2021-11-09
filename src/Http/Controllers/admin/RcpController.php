<?php

namespace Terawatt\Greenhouse\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rcp;
use App\Models\Option;
use App\Models\RcpOption;

class RcpController extends Controller
{
    public function __construct()
    {
        $this->columns = [];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.rcp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rcp.add')
            ->withOptions(Option::orderBy('option_id', 'desc')->pluck('type'));
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
    public function edit($id, $rcp)
    {
        try {
            return view('admin.rcp.edit')
                ->withProducts(Product::get_one_product($id))
                ->withRcp(Rcp::where('rcpid', $rcp)->with('options')->first())
                ->withOptions(Option::orderBy('option_id')->pluck('type', 'option_id'));
        } catch (\Throwable $e) {
            dd($e);
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
            if(isset($request->column)) {
                $validator = $request->validate([
                    'rcpid' => 'required',
                    'rcp_version' => 'required',
                    'column.*.name' => 'required|string|distinct',
                    'column.*.option_id' => 'required|string',
                    'column.*.value' => 'required|string',
                ]);

                foreach ($request->column as $key => $value) {
                    $this->columns[] = [
                        'rcpid' => $request->rcpid,
                        'rcp_version' => $request->rcp_version,
                        'name' => $value['name'],
                        'tag_name' => \Str::upper(\Str::slug($value['name'], '_')),
                        'option_id' => $value['option_id'],
                        'value' => $value['value'],
                    ];
                };

                \DB::transaction(function () use ($request) {
                    RcpOption::where('rcpid', $request->rcpid)->delete();
                    RcpOption::insert($this->columns);
                });
            }

            return redirect()->route('admin.product.edit', $id)->with('flash.banner', __('Success!'));
        } catch (\Throwable $e) {
            \Log::alert($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()])->withErrors(method_exists($e, 'errors') ? $e->errors() : '')->withInput();
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
