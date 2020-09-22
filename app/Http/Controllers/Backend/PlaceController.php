<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Static_Page_Translation;
use App\Models\StaticPage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class PlaceController extends Controller
{
    public function index()
    {
        return view('backend.static_page.place.index');
    }
    public function create()
    {
        return view('backend.static_page.place.create');
    }
    public function edit($id)
    {
        $place = StaticPage::findOrFail($id);
        return view('backend.static_page.place.edit',compact('place'));
    }
    public function placesSmileInWorldsStore(Request $request)
    {
        $input = $request->except(['_method', '_token']);
          StaticPage::create(['key'=>'place','name'=>'place','value'=>$input['name']]);
        return redirect()->route('admin.place.index')->with('success', 'تم إضافة البيانات بنجاح');
    }

    public function placesSmileInWorldsUpdate(Request $request,$id)
    {
        $input = $request->except(['_method', '_token']);
        StaticPage::where('id',$id)->update(['value' => $input['name']]);
        return redirect()->route('admin.place.index')->with('success', 'تم تحديث البيانات بنجاح');
    }

    public function placesSmileInWorldsDestroy($id)
    {
        $palce = StaticPage::findOrFail($id);
        $palce->delete();
        return redirect()->route('admin.place.index')->with('success', 'تم إزالة البيانات بنجاح');
    }

    protected function datatable()
    {
        $places = StaticPage::where('key','place')->get();
        $route = 'place';
        return DataTables::of($places)->addColumn('actions', function ($data) use ($route) {
            return view('backend.datatables.normalActions', compact('data', 'route'));
        })->rawColumns(['actions'])->make(true);
    }
}
