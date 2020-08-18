<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Client_Translation;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.clients.index');
    }

    protected function datatable(){
        $categories = Client_Translation::where('lang_code','ar')->get();
        // dd($categories);
        $route = 'client';
        $fk = 'fk_clients';
         return Datatables::of($categories)->addColumn('actions', function ($data) use($route,$fk) {
             return view('backend.datatables.actions',compact('data','fk','route'));
         })->addColumn('image', function ($data) {
            return '<img src="'.asset('images/'. $data->parent->image).'"  style="width: 60px;height:60px">';
        })->addColumn('link', function ($data) {
           return '<a href="'.$data->parent->link.'">'.$data->parent->link.'</a>';
        })->rawColumns(['actions','image','link'])
         ->make(true);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.clients.create');
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
        $client =  Client::create(['image'=>$input['image'],'link'=>$input['link']]);
        unset($input['image']);
        unset($input['link']);
        $id =  $client->id;
        foreach ($input as $key => $value) {
            Client_Translation::create([
                'fk_clients' => $id,
                'lang_code' => $key,
                'name' => $value['title'],
            ]);
        }
        return redirect()->route('admin.client.index')->with('success', 'تمت الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Client $Category)
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
        $client = Client::findOrFail($id);
        return view('backend.clients.edit', compact('client'));
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
        Client::findOrFail($request->id);
        $input = $request->except(['_method', '_token']);
        
        if (request()->hasfile('image')) {
            $input['image'] =  $imageService->upload($request->image,'images');
        }

        Client::where('id',$id)->update($input);
        foreach ($input as $key => $value) {
            Client_Translation::where(['fk_clients'=>$id,'lang_code' => $key])->update([
                'name' => $value['title'],
            ]);
        }
        return redirect()->route('admin.client.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id =(int) $id;
        $client = Client::findOrFail($id);
        Client::destroy($id);
        return redirect()->back()->with('success', 'تم ازالة العميل بنجاح');
    }
}
