<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAchievementRequest;
use App\Http\Requests\UpdateAchievementRequest;
use App\Models\Achievement;
use App\Models\Achievements_Translation;
use App\Services\ImageService;
use Yajra\Datatables\Datatables;
class AchievementController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.achievements.index');
    }

    protected function datatable(){
        $achievements_translation = Achievements_Translation::where('lang_code','ar')->get();
        $route = 'achievement';
        $fk = 'fk_achievements';
         return Datatables::of($achievements_translation)->addColumn('actions', function ($data) use($route,$fk) {
             return view('backend.datatables.actions',compact('data','fk','route'));
         })->addColumn('link', function ($data) {
            return '<a href="'.$data->achievement->link.'">'.$data->achievement->link.'</a>';
        })->addColumn('image', function ($data) {
            return '<img src="'.asset('images/'. $data->achievement->image).'"  style="width: 60px;height:60px">';
        })->rawColumns(['actions','link','image'])
         ->make(true);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAchievementRequest $request,ImageService $imageService)
    {
        $input = $request->except(['_method', '_token']);
        if (request()->hasfile('image')) {
            $input['image'] =  $imageService->upload($request->image,'images');
        }
        $achievement =  Achievement::create(['image'=>$input['image'],'link'=>$input['link']]);
        unset($input['image']);
        $id =  $achievement->id;
        foreach ($input as $key => $value) {
            Achievements_Translation::create([
                'fk_achievements' => $id,
                'lang_code' => $key,
                'name' => $value['title'],
            ]);
        }
        return redirect()->route('admin.achievement.index')->with('success', 'تم اضافة الانجاز بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
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
        $achievement = Achievement::findOrFail($id);
        return view('backend.achievements.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAchievementRequest $request,  $id,ImageService $imageService)
    {
        $id = (int) $id;
        Achievement::findOrFail($request->id);
        $input = $request->except(['_method', '_token']);
        if (request()->hasfile('image')) {
            $input['image'] =  $imageService->upload($request->image,'images');
            Achievement::where('id',$id)->update(['image'=>$input['image']]);
        }
          Achievement::where('id',$id)->update(['link'=>$input['link']]);
          unset($input['link']);
        foreach ($input as $key => $value) {
            Achievements_Translation::where(['fk_achievements'=>$id,'lang_code' => $key])->update([
                'name' => $value['title'],
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
        $achievement = Achievement::findOrFail($id);
        $achievement->translation()->delete();
        Achievement::destroy($id);
        return redirect()->back()->with('success', 'تم ازالة الانجاز بنجاح');
    }
}
