<?php

namespace Terawatt\Greenhouse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('green.product.index')
            ->withProduct(Category::select(\DB::raw('category_description.name as category, product.product_id as product_id, product_description.name as name, product.image as image'))
                                ->leftJoin('category_description', 'category_description.category_id', 'category.category_id')
                                ->leftJoin('product_to_category', 'product_to_category.category_id', 'category.category_id')
                                ->leftJoin('product', 'product.product_id', 'product_to_category.product_id')
                                ->leftJoin('product_description', 'product_description.product_id', 'product.product_id')
                                ->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cost.proc.add')
            ->withDep(Dep::get()->pluck('dep_name', 'dep_erp_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'dep_id' => 'required',
            'otiz_id' => 'required',
            'norma_godun_for_one' => 'required',

            'one' => 'required',
            'unit' => 'required',
        ]);

        $proc = new Proc;
        $proc->name = $request->name;
        $proc->description = $request->description;
        $proc->dep_id = $request->dep_id;
        $proc->otiz_id = $request->otiz_id;
        $proc->norma_godun_for_one = $request->norma_godun_for_one;
        $proc->one = $request->one;
        $proc->unit = $request->unit;
        $proc->save();

        return redirect()->route('cost.proc.index')->with('success', ' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('green.product.show')
            ->withProduct(Product::get_one_product($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cost.proc.edit')
            ->withProc(Proc::findOrFail($id))
            ->withDep(Dep::get()->pluck('dep_name', 'dep_erp_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'dep_id' => 'required',
            'otiz_id' => 'required',
            'norma_godun_for_one' => 'required',

            'one' => 'required',
            'unit' => 'required',
        ]);

        $proc = Proc::find($id);
        $proc->name = $request->name;
        $proc->description = $request->description;
        $proc->dep_id = $request->dep_id;
        $proc->otiz_id = $request->otiz_id;
        $proc->norma_godun_for_one = $request->norma_godun_for_one;
        $proc->one = $request->one;
        $proc->unit = $request->unit;
        $proc->save();

        return redirect()->route('cost.proc.index')->with('success', ' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Proc::destroy($id);

            return redirect()->route('cost.proc.index')->with('success', ' ');
        } catch (\Throwable $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function refresh()
    {
        try {
            // set_time_limit(600);

            if (extension_loaded('dbase')) {
                $db = \dbase_open('/mnt/shares/zrp/db07/C_VIDR.DBF', 0);

                if ($db) {
                    $record_numbers = dbase_numrecords($db);
                    for ($i = 1; $i <= $record_numbers; $i++) {
                        $res = dbase_get_record($db, $i);

                        switch ($res[6]) {
                            case 21:
                                $ed = 100;
                                break;
                            case 1:
                            case 33:
                                $ed = 1000;
                                break;
                            case 15:
                            case 30:
                            default:
                                $ed = 1;
                                break;
                        }

                        if ($res['deleted'] == 0) {
                            Proc::updateOrCreate([
                                'otiz_id' => $res[0],
                            ],
                            [
                                'dep_id' => 2102,
                                'one' => $ed,
                                'name' => iconv('windows-1251', 'utf-8', $res[1]),
                                'norma_godun_for_one' => $res[3],
                                'rc' => $res[2],
                            ]);
                        }
                    }

                    \dbase_close($db);

                    return redirect()->back()->with('success', ' ');
                } else {
                    \Log::error('Модуль dbase не встановлено');
                    return redirect()->back()->with('error', 'Модуль dbase не встановлено');
                }
            } else {
                \Log::error('Модуль dbase не встановлено');
                return redirect()->back()->with('error', 'Модуль dbase не встановлено');
            }
        } catch (\Throwable $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
