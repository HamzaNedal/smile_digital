<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactUsRequest;
use App\Models\Achievement;
use App\Models\Client;
use App\Models\ContactUs;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Testimon;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.home');
    }

    public function dashboard()
    {
        $categories = count(ServiceCategory::get()->toArray());
        $services = count(Service::get()->toArray());
        $contactus = count(ContactUs::get()->toArray());
        $clients = count(Client::get()->toArray());
        $achievements = count(Achievement::get()->toArray());
        $testimon = count(Testimon::get()->toArray());
        return view('backend.home',compact('testimon','categories','services','contactus','clients','achievements','testimon'));
        // return view('backend.home');

    }

    public function language($lang)
    {
        if (!in_array($lang, ['en', 'tr', 'ar'])) {
            return back();
        }
        session(['lang' => $lang]);
        return back();
    }

    public function storeContactUs(CreateContactUsRequest $request)
    {
        App::setLocale(session('lang'));
        ContactUs::Create($request->except('_token'));
        toastr()->success(__('home.message_toastr'), __('home.success'));
        return back();
    }
}
