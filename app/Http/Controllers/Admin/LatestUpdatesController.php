<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LatestUpdates;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class LatestUpdatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $updates =LatestUpdates::latest()->get();
        $title='Latest Updates';
        return view('admin.pages.updates.index',compact('title','updates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.updates.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|max:220',
            'image'=>'required|image',
            'text'=>'nullable|string|max:65535',
        ]);
        // dd($request);
        $imageName = null;
        $message = "Data has been added successfully!";
        if ($request->hasFile('image')) {

            $file=$request->file('image');
             $imageName  = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/latestupdates/'.$imageName;
            Image::make($file)->resize(840, 640,function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath);

        }
        $latestupdates = new LatestUpdates();
        $latestupdates->title =  $request->title;
        $latestupdates->text =  $request->text;
        $latestupdates->image =  $imageName;
        $latestupdates->save();
        return redirect()->back()->with('success', $message);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LatestUpdates  $latestUpdates
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = LatestUpdates::find($id);
        // $data['data'] = json_decode(json_encode($data), true);
        return view('admin.pages.updates.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LatestUpdates  $latestUpdates
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data['title'] = "Edit";
        $data = LatestUpdates::find($id);
        $data['data'] = json_decode(json_encode($data), true);
        return view('admin.pages.updates.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LatestUpdates  $latestUpdates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'title'=>'required|max:220',
            'image'=>'image',
            'text'=>'nullable|string|max:65535',
        ]);
        // dd($request);
        // $imageName = null;
        $message = "Data has been added successfully!";
        $latestUpdates = LatestUpdates::findOrFail($id);
        if ($request->hasFile('image')) {
            $file=$request->file('image');

            $old_pic_name= $latestUpdates->image;
            $path = public_path('uploads/latestupdates/').$old_pic_name;
            if ($old_pic_name != 'default.jpg' && file_exists($path)) {
                unlink($path);
            }
            $imageName  = 'main'.str_replace("-", " ",$latestUpdates->title)."-".date('h-m-s').".".$file->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/latestupdates/'.$imageName;
            Image::make($file)->resize(840, 640,function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath);
            $latestUpdates->image =  $imageName;
        }

        $latestUpdates->title =  $request->title;
        $latestUpdates->text =  $request->text;
        $latestUpdates->save();
        return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LatestUpdates  $latestUpdates
     * @return \Illuminate\Http\Response
     */
















    public function update_latestupdates_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            LatestUpdates::where('id', $data['update_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'update_id' => $data['update_id']]);
        }
    }
    
    public function destroy($id)
    {
        try {
            $latestupdates = LatestUpdates::findOrFail($id);

            $old_pic_name= $latestupdates->image;
            $path = public_path('uploads/latestupdates/').$old_pic_name;
            if ($old_pic_name != 'default.jpg'&& file_exists($path)) {
                // unlink(base_path($old_pic_location));
                unlink($path);
            }

            $latestupdates->delete();
            return redirect()->back()->with('success', 'Your data has been deleted!');
        } catch (\Throwable $th) {
           // dd($th);
            return redirect()->back()->with('success', 'Your data not deleted!');

        }
    }
}
