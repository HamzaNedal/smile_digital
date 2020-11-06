<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\AchievementCategory;
use App\Models\AchievementCategoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AchievementCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.achievements.categories.index');
    }
    public function datatable(){
        $categories = AchievementCategory::get();
        $route = 'achievements.category';
         return DataTables::of($categories)->addColumn('actions', function ($data) use($route,$categories) {

             return view('backend.datatables.actions-for-achievement-cat',compact('data','categories','route'));
         })->addColumn('name',function ($data) {
            $data = $data->translation->where('lang_code','ar')->first();
            return $data->name;
         })
         ->rawColumns(['actions','name'])
         ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.achievements.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input = $request->except(['_method', '_token']);
        $category =  AchievementCategory::create();
        $id =  $category->id;
        foreach ($input as $key => $value) {
            AchievementCategoryTranslation::create([
                'fk_achievement_category' => $id,
                'lang_code' => $key,
                'name' => $value['title'],
            ]);
        }
        return redirect()->route('admin.achievements.category.index')->with('success', 'تم اضافة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AchievementCategory  $achievementCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AchievementCategory $achievementCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AchievementCategory  $achievementCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AchievementCategory $id )
    {
        $category = $id;
       return view('backend.achievements.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AchievementCategory  $achievementCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AchievementCategory $id)
    {
        $category =  $id;
        $input = $request->except(['_method', '_token']);
        foreach ($input as $key => $value) {
            AchievementCategoryTranslation::where(['fk_achievement_category'=>$category->id,'lang_code' => $key])->update([
                'name' => $value['title'],
            ]);
        }
        return redirect()->route('admin.achievements.category.index')->with('success', 'تم تحديث القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AchievementCategory  $achievementCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::commit();
            $id = (int) $id;
            $category = AchievementCategory::findOrFail($id);
    
            if ($category->achievements->IsNotEmpty()) {
                $category->achievements[0]->translation()->delete();
            }
            $category->achievements()->delete();
            $category->translation()->delete();
            AchievementCategory::destroy($category->id);
            
            return redirect()->back()->with('success', 'تم ازالة القسم بنجاح');
        } catch (\Throwable $th) {
           DB::rollBack();
        }

    }
    public function updateCategoryForServices()
    {
         Achievement::where('fk_achievement_category',request()->old_category_id)->update(['fk_achievement_category'=>request()->new_category_id]);
       
         $this->destroy(request()->old_category_id);
        return response()->json([
            'message'=>'success',
            'status'=>200
        ]);
    }
}
