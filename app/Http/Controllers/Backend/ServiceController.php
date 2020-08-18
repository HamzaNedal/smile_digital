<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service_Categories_Translation;
use App\Models\ServiceCategory;
use App\Models\Services_Translation;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.services.index');
    }
    protected function datatable()
    {
        $services = Services_Translation::where('lang_code','ar')->get();
        $route = 'service';
        $fk = 'fk_services';
        return DataTables::of($services)->addColumn('actions', function ($data) use ($route,$fk) {
            return view('backend.datatables.actions', compact('data','fk', 'route'));
        })->addColumn('category', function ($data) {
            return $data->category->name;
        })->rawColumns(['actions'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ServiceCategory::get();
        return view('backend.services.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request)
    {
        $input = $request->except(['_method', '_token']);
        $service =  Service::create();
        $id =  $service->id;
        $category_id_request = $input['category_id'];
        unset($input['category_id']);
        foreach ($input as $key => $value) {
           $category_id = Service_Categories_Translation::where(['fk_service_categories'=>$category_id_request,'lang_code'=>$key])->first()->id;
           Services_Translation::create([
                'fk_services' => $id,
                'lang_code' => $key,
                'fk_category_translation' => $category_id,
                'name' => $value['title'],
                'description' => $value['description'],
            ]);
        }
        return redirect()->route('admin.service.index')->with('success', 'تم إضافة الخدمة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $Service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = ServiceCategory::get();
        return view('backend.services.edit', compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        $id = (int) $id;
        $input = $request->except(['_token', '_method']);
        Service::findOrFail($id);
        $category_id_request = $input['category_id'];
        unset($input['category_id']);
        foreach ($input as $key => $value) {
            $category_id = Service_Categories_Translation::where(['fk_service_categories'=>$category_id_request,'lang_code'=>$key])->first()->id;
            Services_Translation::where(['fk_services'=> $id,'lang_code'=>$key])->update([
                'name' => $value['title'],
                'fk_category_translation' => $category_id,
                'description' => $value['description'],
            ]);
        }
        return redirect()->route('admin.service.index')->with('success', 'تم تعديل بيانات الخدمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int) $id;
        $service = Service::findOrFail($id);
        $service->translation()->delete();
        Service::destroy($id);
        return redirect()->back()->with('success', 'تم حذف الخدمة بنجاح');
    }


    public function serviceResquests()
    {
        //    $serviceResquests =  ServiceRequests::get();
        return view('backend.services.service_requests.index');
    }
    // protected function datatableServiceResquests()
    // {
    //     $serviceResquests = ServiceRequests::get();
    //     $route = 'service_requests';
    //     return DataTables::of($serviceResquests)->addColumn('actions', function ($data) use ($route) {
    //         return view('backend.datatables.actions', compact('data', 'route'));
    //     })->addColumn('title', function ($data) {
    //         return $data->getService->title;
    //     })->addColumn('sector_of_project_id', function ($data) {
    //         return $data->getSector->name;
    //     })->addColumn('file', function ($data) {
    //         return '<a href="' . asset("/files/" . $data->file) . '">Download File</a>';
    //     })->rawColumns(['file', 'title', 'sector_of_project_id', 'actions'])
    //         ->make(true);
    // }
    // public function destroyserviceResquests($id)
    // {
    //     $id = (int) $id;
    //     $serviceRequests = ServiceRequests::findOrFail($id);
    //     ServiceRequests::destroy($id);
    //     return redirect()->back()->with('success', 'The Service Resquest has been deleted successfully');
    // }
}
