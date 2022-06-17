<?php

namespace App\Http\Controllers\Admin;

use App\Models\MepService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class MepServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mep =MepService::latest()->get();
        $title='Mep Services';
        return view('admin.pages.mep.index',compact('title','mep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.mep.add');
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
                'title'=>'required|max:220|unique:mep_services,title',
                'image'=>'required|image|max:2048',
                'position'=>'required',
                'text'=>'nullable|string|max:65535',
            ]);
            // dd($request);
            $imageName = null;
            $message = "Data has been added successfully!";
            if ($request->hasFile('image')) {

                $file=$request->file('image');
                 $imageName  = time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/mep/'.$imageName;
                Image::make($file)->resize(840, 640,function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath);

            }
            $mepservice = new MepService();
            $mepservice->title =   Str::title($request->title);
            $mepservice->slug =  Str::slug($request->title);
            $mepservice->text =  $request->text;
            $mepservice->image =  $imageName;
            $mepservice->position =  $request->position;
            $mepservice->save();
            return redirect()->back()->with('success', $message);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MepService  $mepService
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = MepService::where('slug',$slug)->first();
        return view('admin.pages.mep.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MepService  $mepService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data['title'] = "Edit";
        $data = MepService::find($id);
        $data['data'] = json_decode(json_encode($data), true);
        return view('admin.pages.mep.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MepService  $mepService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'title'=>'required|max:220|unique:mep_services,title,'.$id,
            'image'=>'nullable|image|max:2048',
            'position'=>'required',
            'text'=>'nullable|string|max:65535',
        ]);
        // dd($request);
        // $imageName = null;
        $message = "Data has been added successfully!";
        $mep = MepService::findOrFail($id);
        if ($request->hasFile('image')) {
            $file=$request->file('image');

            $old_pic_name= $mep->image;
            $path = public_path('uploads/mep/').$old_pic_name;
            if ($old_pic_name != 'default.jpg' && file_exists($path)) {
                unlink($path);
            }
            $imageName  = 'main'.str_replace("-", " ",$mep->title)."-".date('h-m-s').".".$file->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/mep/'.$imageName;
            Image::make($file)->resize(840, 640,function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath);
            $mep->image =  $imageName;
        }

        $mep->text =  $request->text;
        $mep->position =  $request->position;
        $mep->title =   Str::title($request->title);
        $mep->slug =  Str::slug($request->title);
        $mep->save();
        return redirect()->back()->with('success', $message);
    }





    public function update_mep_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            MepService::where('id', $data['update_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'update_id' => $data['update_id']]);
        }
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MepService  $mepService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $mep = MepService::findOrFail($id);

            $old_pic_name= $mep->image;
            $path = public_path('uploads/mep/').$old_pic_name;
            if ($old_pic_name != 'default.jpg'&& file_exists($path)) {
                // unlink(base_path($old_pic_location));
                unlink($path);
            }

            $mep->delete();
            return redirect()->back()->with('success', 'Your data has been deleted!');
        } catch (\Throwable $th) {
           // dd($th);
            return redirect()->back()->with('success', 'Your data not deleted!');

        }
    }
}
