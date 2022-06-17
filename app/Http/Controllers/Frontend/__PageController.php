<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CmsPage;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
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
            //dd($cmsPageDetails);
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
                'email.email' => 'Email is required',
                'subject.required' => 'Subject is required',
                'user_message.required' => 'Message is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);
            // Check validation failure
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $email = 'aa8403997@gmail.com';
            $messageData = [
                'name' => $data['name'],
                'email' => $email,
                'subject' => $data['subject'],
                'user_message' => $data['user_message'],
            ];
            //Send mail to admin email
            Mail::send('emails.enquiry', $messageData, function ($message) use ($email) {
                $message->to($email);
                $message->subject('Enquiry eCommerce website');
            });
            return redirect()->back()->with('success', 'Thanks for your enquiry. We will get back to you soon');
        }
        return view('frontend.pages.contact', $data);
    }
    public function properties(Request $request)
    {
        $pType = Property::with('category')->select('category_id')->distinct()->get()->sort();
        $sizes = DB::table('properties')->select('size_sqft')->get()->pluck('size_sqft')->sort();
        $bedrooms = DB::table('properties')->select('bedroom')->distinct()->get()->pluck('bedroom')->sort();
        $bathrooms = DB::table('properties')->select('bathroom')->distinct()->get()->pluck('bathroom')->sort();
        $prices = DB::table('properties')->select('price')->get()->pluck('price')->sort();
        $properties = Property::get();
        $generalProperty = Property::get();

        if ($request->filled('category_id')) {
            $properties->where('category_id', $request->category_id);
        }
        if ($request->filled('bedroom')) {
            $properties->where('bedroom', $request->bedroom);
        }
        if ($request->filled('bathroom')) {
            $properties->where('bathroom', $request->bathroom);
        }
        if ($request->filled('size_sqft')) {
            $properties->where('size_sqft', $request->size_sqft);
        }
        return view('frontend.pages.property', compact(
            'pType',
            'sizes',
            'bedrooms',
            'bathrooms',
            'prices',
            'generalProperty',
            'properties'
        ));
    }


  




}
