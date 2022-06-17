<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\PropertyQuery;
use App\Mail\PropertyQueryMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
        $data['ongoing'] = DB::table('properties')->orderBy('id', 'desc')->select('id', 'slug', 'description', 'title', 'image')->where('status', 1)->where('is_ongoing', 'ongoing')->get();
        return view('frontend.pages.index', $data);
    }

    public function propertyQuery(Request $request)
    {
        $data = $request->all();
        $data['property_id'] = $request->property_id;
        PropertyQuery::create($data);

        $email = 'aa8403997@gmail.com';
        $messageData = [
            'name' => $c['name'],
            'email' => $email,
            'subject' => $c['subject'],
            'user_message' => $c['user_message'],
        ];
        //Send mail to admin email
        Mail::send('emails.enquiry', $messageData, function ($message) use ($email) {
            $message->to($email);
            $message->subject('Enquiry real estate website');
        });
        return redirect()->back()->with('success', 'Query has been sent successfully to admin!');
    }
    public function sitemap(Request $request)
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->select('title', 'slug', 'created_at')->get();
        return response()->view('frontend.sitemap.sitemap', compact('categories'))->header('Content-Type', 'text/xml');
    }
}
