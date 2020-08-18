<?php

namespace App\Http\Controllers\Backend;

use App\Models\StaticPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Models\Static_Page_Translation;
use App\Services\ImageService;
use App\Services\ModelServices;

class StaticPageController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_static = StaticPage::get();
        // dd();
        return view('backend.static_page.create', compact('page_static'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $page_static = StaticPage::get();
        // return view('backend.static_page.create', compact('page_static'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ImageService $imageService)
    {
        $input = $request->all();
        if (request()->hasfile('profile')) {
            $input['profile'] =  $imageService->upload($input['profile'],'files');
        }
        foreach ($input as $key => $value) {
            StaticPage::where(['key'=>$key])->update([
                'value' =>  $value,
            ]);
        }
        return redirect()->route('admin.static_page.index')->with('success', 'تم تحديث البيانات بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = (int) $id;
        $static = StaticPage::findOrFail($id);
        return view('backend.static_page.edit', compact('keys'));
    }


    public function showAboutUs()
    {
        $about_us = StaticPage::where('key', 'about_us')->first();
        return view('backend.about_us.create', compact('about_us'));
    }

    public function updateAboutUs(UpdateAboutUsRequest $request)
    {
        $input = $request->except('_token');
        // unset($input['_token']);
        $fk_static_pages = StaticPage::where(['key'=>'about_us'])->first()->id;
        foreach ($input as $key => $value) {
            foreach ($value as $key2 => $val) {
                Static_Page_Translation::where(['fk_static_pages'=>$fk_static_pages,'lang_code'=>$key,'name'=>$key2])->update([
                    'value' => $val['value'],
                ]);
            }
        }
        return redirect()->route('admin.about_us.show')->with('success', 'تم تحديث البيانات بنجاح');
    }
    

    public  function download()
    {
        $profile = StaticPage::where(['key'=>'profile'])->first();
        if(!$profile->value){
            return back();
        }
        return redirect(asset('files/'.$profile->value));
    }
    public function about_company(Request $request,ImageService $imageService,ModelServices $modelServices)
    {
        $input = $request->all();
        unset($input['_token']);
        if (request()->hasfile('image')) {
            $input['image'] =  $imageService->upload($input['image'],'files');
            StaticPage::where(['key'=>'company'])->update(['file'=>$input['image']]);
            unset($input['image']);
        }
        $fk_static_pages = StaticPage::where(['key'=>'company'])->first()->id;
        $modelServices->update($input,$fk_static_pages);
        return redirect()->route('admin.static_page.index')->with('success', 'تم تحديث البيانات بنجاح');
    }
    public function order(Request $request,ModelServices $modelServices)
    {
        $input = $request->all();
        unset($input['_token']);
        StaticPage::where(['key'=>'order'])->update(['value'=>$input['link']]);
        unset($input['link']);
        $fk_static_pages = StaticPage::where(['key'=>'order'])->first()->id;
        $modelServices->update($input,$fk_static_pages);
        return redirect()->route('admin.static_page.index')->with('success', 'تم تحديث البيانات بنجاح');
    }

}
