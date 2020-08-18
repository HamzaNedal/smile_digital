<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Testimon;
use App\Models\Testimon_Translation;
use App\Services\ImageService;
use Yajra\DataTables\Facades\DataTables;
class TestimonController extends Controller
{
           /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.testimonies.index');
    }

    protected function datatable(){
        $testimon_translation = Testimon_Translation::where('lang_code','ar')->get();
        $route = 'testimon';
        $fk = 'fk_testimonies';
         return Datatables::of($testimon_translation)->addColumn('actions', function ($data) use($route,$fk) {
             return view('backend.datatables.actions',compact('data','fk','route'));
         })->addColumn('image', function ($data) {
            return '<img src="'.asset('images/'. $data->parent->image).'"  style="width: 60px;height:60px">';
        })->rawColumns(['actions','image'])
         ->make(true);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ImageService $imageService)
    {
        $input = $request->except(['_method', '_token']);
        if (request()->hasfile('image')) {
            $input['image'] =  $imageService->upload($request->image,'images');
        }
        $achievement =  Testimon::create(['image'=>$input['image']]);
        unset($input['image']);
        $id =  $achievement->id;
        foreach ($input as $key => $value) {
            Testimon_Translation::create([
                'fk_testimonies' => $id,
                'lang_code' => $key,
                'name' => $value['title'],
                'description' => $value['description'],
            ]);
        }
        return redirect()->route('admin.testimon.index')->with('success', 'تمت الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Testimon $testimon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimon = Testimon::findOrFail($id);
        return view('backend.testimonies.edit', compact('testimon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id,ImageService $imageService)
    {
        $id = (int) $id;
        Testimon::findOrFail($request->id);
        $input = $request->except(['_method', '_token']);
       

        if (request()->hasfile('image')) {
            $input['image'] =  $imageService->upload($request->image,'images');
            Testimon::where('id',$id)->update(['image'=>$input['image']]);
        }

        foreach ($input as $key => $value) {
            Testimon_Translation::where(['fk_testimonies'=>$id,'lang_code' => $key])->update([
                'name' => $value['title'],
                'description' => $value['description'],
            ]);
        }
        return redirect()->route('admin.achievement.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id =(int) $id;
        Testimon::findOrFail($id);
        Testimon::destroy($id);
        return redirect()->back()->with('success', 'تم الازالة بنجاح');
    }
}
