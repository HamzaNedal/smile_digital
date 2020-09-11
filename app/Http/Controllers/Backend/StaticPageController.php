<?php

namespace App\Http\Controllers\Backend;

use App\Models\StaticPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Http\Requests\UpdateStaticPageCompanyRequest;
use App\Http\Requests\UpdateStaticPageOrderRequest;
use App\Http\Requests\UpdateStaticPageRequest;
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
    public function store(UpdateStaticPageRequest $request,ImageService $imageService)
    {
        $input = $request->all();
       

        if (request()->hasfile('profile_ar')) {
            $input['profile_ar'] =  $imageService->upload($input['profile_ar'],'files');
        }
        if (request()->hasfile('profile_en')) {
            $input['profile_en'] =  $imageService->upload($input['profile_en'],'files');
        }
        if (request()->hasfile('profile_tr')) {
            $input['profile_tr'] =  $imageService->upload($input['profile_tr'],'files');
        }
        // dd($input);
            // StaticPage::create([
            //     'key'=>'profile_ar',
            //     'name'=>'الملف الشخصي',
            //     'value'=>$input['profile_ar']
            // ]);
            // StaticPage::create([
            //     'key'=>'profile_en',
            //     'name'=>'Profile',
            //     'value'=>$input['profile_en']
            // ]);
            // StaticPage::create([
            //     'key'=>'profile_tr',
            //     'name'=>'Profil',
            //     'value'=>$input['profile_tr']
            // ]);
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
        $profile = StaticPage::where(['key'=>'profile_'.session('lang')])->first();
        if(!$profile->value){
            return back();
        }
        return redirect(asset('files/'.$profile->value));
    }
    public  function downloadFromAdminPanel($lang)
    {
        $profile = StaticPage::where(['key'=>'profile_'.$lang])->first();
        if(!$profile->value){
            return back();
        }
        return redirect(asset('files/'.$profile->value));
    }
    public function about_company(UpdateStaticPageCompanyRequest $request,ImageService $imageService,ModelServices $modelServices)
    {
        
        $input = $request->except('_token');  
        // dd($input);
        foreach ($input as $key => $value) {
           StaticPage::create([
               'key'=>'company_'.$key,
               'name'=>$value['title'],
               'value'=>$value['description'],
               'file'=>'15994666335f55ec8921002.mp4',
           ]);
        // if(array_key_exists('file',$value)){
        //     if(file_exists($value['file'])){
        //         $value['file'] =  $imageService->upload($value['file'],'files');
        //         StaticPage::where(['key'=>'company_'.$key])->update([
        //             'name'=>$value['title'],
        //             'value' => $value['description'],
        //             'file' => $value['file'],
        //         ]);
        //     }
        // }else{
        //     StaticPage::where(['key'=>'company_'.$key])->update([
        //         'name'=>$value['title'],
        //         'value' => $value['description'],
        //     ]);
        // }
       

        }
        // if (request()->hasfile('file')) {
        //     $input['file'] =  $imageService->upload($input['image'],'files');
        //     // StaticPage::where(['key'=>'company'])->update(['file'=>$input['image']]);
        //     // unset($input['image']);
        // }
        // $fk_static_pages = StaticPage::where(['key'=>'company'])->first()->id;
        // $modelServices->update($input,$fk_static_pages);
        return redirect()->route('admin.static_page.index')->with('success', 'تم تحديث البيانات بنجاح');
    }
    public function order(UpdateStaticPageOrderRequest $request,ModelServices $modelServices)
    {
        $input = $request->except('_token');
        StaticPage::where(['key'=>'order'])->update(['value'=>$input['link']]);
        unset($input['link']);
        $fk_static_pages = StaticPage::where(['key'=>'order'])->first()->id;
        $modelServices->update($input,$fk_static_pages);
        return redirect()->route('admin.static_page.index')->with('success', 'تم تحديث البيانات بنجاح');
    }

}
