<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CmsPage;
use App\Models\Property;
use App\Mail\ContactMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function cms_page(Request $request)
    {
        $currentRoute = url()->current();
        $currentRoute = Str::replace('http://ibasae.esnlgroup.com/', '', $currentRoute);
        $cmsRoutes = CmsPage::where('status', 1)->get()->pluck('slug')->toArray();
        if (in_array($currentRoute, $cmsRoutes)) {
            $cmsPageDetails = CmsPage::where('slug', $currentRoute)->first()->toArray();
            // dd($cmsPageDetails);
            return view('frontend.pages.cms.cms_page', compact('cmsPageDetails'));
        } else {
            abort(404);
        }
    }

    public function contactUs(Request $request)
    {
        $data['title'] = "Contact";
        if ($request->isMethod('POST')) {
            //Receive contact form data
            $data = $request->all();
            //dd($data);
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'user_message' => 'required',
            ];
            //Validation message
            $customMessage = [
                'name.required' => 'Name is required',
                'email.email' => 'Email is required and Valid Mail is required',
                'subject.required' => 'Subject is required',
                'user_message.required' => 'Message is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);
            // Check validation failure
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = [
                'name' => $data['name'],
                'email' => $data['email'],
                'subject' => $data['subject'],
                'user_message' => $data['user_message'],
            ];
            Mail::to('property@ibasuae.com')->send(new ContactMail($data));
            return redirect()->back()->with('success_mail', 'Thanks for your enquiry. We will get back to you soon');
        }
        return view('frontend.pages.contact', $data);
    }
    public function properties()
    {
        $data['categoryList'] = Property::with('category')->select('category_id')->distinct()->get();
        $data['bathrooms'] = DB::table('properties')->select('bathroom')->distinct()->get()->pluck('bathroom');
        $data['bedrooms'] = DB::table('properties')->select('bedroom')->distinct()->get()->pluck('bedroom');
        $data['rental_periods'] = DB::table('properties')->select('rental_period')->distinct()->get()->pluck('rental_period');
        $data['prices'] = DB::table('properties')->select('price')->distinct()->get()->pluck('price');
        $data['allProperty'] = Property::with('category')->where('status', 1)->get();
        return view('frontend.pages.property', $data);
    }

    public function propertyDetails($slug)
    {
        $propertyDetails = Property::where('status', 1)->where('slug', $slug)->firstOrFail();
        return view('frontend.pages.propertyDetails', compact('propertyDetails'));
    }

    public function searchProperty(Request $request)
    {
        $min = $request->price_from ?? 0.00;
        $max = $request->price_to ?? null;
        $searchData = Property::whereBetween('price', [$min, $max])
            ->where('category_id', $request->category_id)
            ->where('bathroom', $request->bathroom)
            ->where('bedroom', $request->bedroom)
            ->where('rental_period', $request->rental_period)
            ->get();
        //dd($searchData);
        return view('frontend.pages.search-page', compact('searchData'));
    }



    public function about_us(){
        // $data['title'] = "About Us";
        return view('frontend.pages.about_us');
    }
    public function alamin(){
        return view('frontend.pages.alamin');
    }
    public function fullpower(){
        return view('frontend.pages.fullpower');
    }
    public function crownvalley(){
        return view('frontend.pages.crownvalley');
    }
    public function trustfamous(){
        return view('frontend.pages.trustfamous');
    }

}
