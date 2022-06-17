<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Mail\MailEnquiry;
use App\Mail\PropertyMail;
use App\Mail\SendEmailLink;
use Illuminate\Http\Request;
use App\Models\PropertyQuery;
use App\Mail\PropertyQueryMail;
use App\Models\BusinessSetting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LatestUpdates;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['page_file_name'] = "index";
        $data['page_title'] = "Home";
        $data['sliders'] = DB::table('banners')->orderBy('id', 'desc')->where('status', '1')->take(4)->get();
        $data['updates'] =LatestUpdates::orderBy('id', 'desc')->where('status', '1')->take(10)->get();

        $data['ongoing'] = DB::table('properties')->orderBy('id', 'desc')->select('id', 'slug', 'description', 'title', 'image')->where('status', 1)->where('is_ongoing', 'ongoing')->get();
        return view('frontend.pages.index', $data);
    }

    public function bannerDetails(Request $request, $id)
    {
        $data['bannerDetails'] = Banner::findOrFail($id);
        return view('frontend.pages.banner_details', $data);
    }

    public function propertyQuery(Request $request)
    {
        $data = [
            'title' => $request->title,
            'slug' => $request->property_slug,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'default_message' => $request->default_message
        ];
        Mail::to('property@ibasuae.com')->send(new PropertyMail($data));
        return redirect()->back()->with('success','Property mail sent successfully');
    }
    public function sitemap(Request $request)
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->select('title', 'slug', 'created_at')->get();
        return response()->view('frontend.sitemap.sitemap', compact('categories'))->header('Content-Type', 'text/xml');
    }
}
