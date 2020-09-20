<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider_Translation;
use App\Services\ImageService;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.sliders.index');
    }
    protected function datatable(){
        $sliders = Slider_Translation::where('lang_code','ar')->get();
        $route = 'slider';
        $fk = 'fk_slider';
        return DataTables::of($sliders)->addColumn('action', function ($data) use($route,$fk) {
            return view('backend.datatables.actions',compact('data','route','fk'));
        })->addColumn('image', function ($data) {
           return view('backend.datatables.sliderImages',compact('data'));
        })->addColumn('background_image', function ($data) {
              return view('backend.datatables.background_imageSlider',compact('data'));
        })->addColumn('link', function ($data) {
            return '<a href="'.$data->parent->link.'">'.$data->parent->link.'</a>';
        })
        ->rawColumns(['image','link','background_image','action'])
        ->make(true);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSliderRequest $request,ImageService $imageService)
    {
        
       $input =  $request->except(['_method','_token']);
        if (request()->hasfile('background_image')) {
            $input['background_image'] = $imageService->upload($request->background_image,'background_image');
            $slider =   Slider::create(['background_image'=>$input['background_image'],'link'=>$input['link']]);
            unset($input['link'],$input['background_image']);
        }

        if (request()->hasfile('image')) {
            $input['image'] = $imageService->upload($request->image,'image');
            $slider->image =  $input['image'];
            $slider->save();
        }
        foreach ($input as $key => $value) {
            Slider_Translation::create([
                'fk_slider' => $slider->id,
                'lang_code' => $key,
                'title' => $value['title'],
                'description' => $value['description'],
            ]);
        }
        return redirect()->route('admin.slider.index')->with('success','تم إضافة السلايدر بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id =(int) $id;
        $slider = Slider::findOrFail($id);
        return view('backend.sliders.edit',compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, $id,ImageService $imageService)
    {
        $id = (int) $id;
        $slider = Slider::findOrFail($id);
        $input =  $request->except(['_token','_method']);      
        if (request()->hasfile('background_image')) {
            $input['background_image'] = $imageService->upload($request->background_image,'background_image');
            $slider->background_image = $input['background_image'];
        }

        $slider->link = $input['link'];
        $slider->save();
        unset($input['link'],$input['background_image']);

        if (request()->hasfile('image')) {
            $input['image'] = $imageService->upload($request->image,'image');
            $slider->image =  $input['image'];
            $slider->save();
        }
        foreach ($input as $key => $value) {
            Slider_Translation::where(['fk_slider'=>$id,'lang_code' => $key])->update([
                'title' => $value['title'],
                'description' => $value['description'],
            ]);
        }
        return redirect()->route('admin.slider.index')->with('success','تم تعديل البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->translation()->delete();
        Slider::destroy($id);
        return redirect()->back()->with('success','The Slider has been deleted successfully');
    }
}
