<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Service_Categories_Translation;
use App\Models\ServiceCategory;
use App\Services\ImageService;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.services.categories.index');
    }

    protected function datatable(){
        $categories = Service_Categories_Translation::where('lang_code','ar')->get();
        $route = 'category';
        $fk = 'fk_service_categories';
         return Datatables::of($categories)->addColumn('actions', function ($data) use($route,$fk) {
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
        return view('backend.services.categories.create');
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
        $category =  ServiceCategory::create(['image'=>$input['image']]);
        unset($input['image']);
        $id =  $category->id;
        foreach ($input as $key => $value) {
            Service_Categories_Translation::create([
                'fk_service_categories' => $id,
                'lang_code' => $key,
                'name' => $value['title'],
            ]);
        }
        return redirect()->route('admin.category.index')->with('success', 'تم اضافة الفسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCategory $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ServiceCategory::findOrFail($id);
        return view('backend.services.categories.edit', compact('category'));
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
        ServiceCategory::findOrFail($request->id);
        $input = $request->except(['_method', '_token']);
       

        if (request()->hasfile('image')) {
            $input['image'] =  $imageService->upload($request->image,'images');
            ServiceCategory::where('id',$id)->update(['image'=>$input['image']]);
        }
        unset($input['image']);
        foreach ($input as $key => $value) {
            Service_Categories_Translation::where(['fk_service_categories'=>$id,'lang_code' => $key])->update([
                'name' => $value['title'],
            ]);
        }
        return redirect()->route('admin.category.index')->with('success', 'تم تحديث القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id =(int) $id;
        ServiceCategory::findOrFail($id);
        ServiceCategory::destroy($id);
        return redirect()->back()->with('success', 'تم ازالة القسم بنجاح');
    }
}
