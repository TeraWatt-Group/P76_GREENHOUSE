<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Artisan;
use File;

class LanguageController extends Controller
{
    public function index()
    {
        return view('admin.languages.index')
            ->withRows(Language::all());
    }

    public function edit(Language $language)
    {
        try {
            if (file_exists(base_path().'/resources/lang/'.$language->locale.'.json')) {
                $translations = [];
                foreach (json_decode(File::get(base_path().'/resources/lang/'.$language->locale.'.json'), true, 512, JSON_THROW_ON_ERROR) as $key => $value) {
                    $translations[] = ['key' => $key, 'value' => $value];
                }
                return view('admin.languages.edit')
                    ->withLang($language)
                    ->withRows($translations);
            }

            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => __('No translations found for the selected language')]);
        } catch (\Throwable $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
        }
    }

    public function sync()
    {
        try {
            $languages = Language::all();
            foreach ($languages as $index => $language) {
                @Artisan::call('translatable:export', ['lang' => $language->locale]);
            }
            return redirect()->route('admin.languages.index')->with('flash.banner', __('Translation files updated correctly'));
        } catch (\Throwable $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with(['flash.bannerStyle' => 'danger', 'flash.banner' => $e->getMessage()]);
        }
    }
}
