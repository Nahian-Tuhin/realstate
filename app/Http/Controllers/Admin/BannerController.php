<?php
namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function banners()
    {
        $title = "Banner";
        $banners = Banner::latest()->get();
        //dd($data['banners']);
        return view('admin.pages.banner.index',compact(['title','banners']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = "New Banner";
        // $data['banner_data']   = new Banner();
        return view("admin.pages.banner.add", $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
            'title'=>'required|max:220',
            'banner_image'=>'required|image',
            'background_img'=>'required|image',
            'link'=>'nullable|max:255',
            'text'=>'nullable|string|max:65535',
        ]);
        $message = "Data has been added successfully!";
            $image = $request->file('banner_image');
            if (isset($image)) {

                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/banner/'.$imageName;
                $bannerImage = Image::make($image)->resize(640, 426,function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath);

            } else {
                $imageName = "default.png";
            }
            //Background Image
            $bgImage = $request->file('background_img');
            if (isset($bgImage)) {
                $bgImageName  ='bg'.time() .'.' . $bgImage->getClientOriginalExtension();
                $destinationPathbg = public_path().'/uploads/banner/'.$bgImageName;
                $bannerBgImage = Image::make($bgImage)->resize(1170, 480,function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPathbg);

            } else {
                $bgImageName = "default.png";
            }


            // $bannerFillable           = $request->only($banner->getFillable());
            // $bannerFillable['banner_image']  = $imageName;
            // $bannerFillable['background_img']  = $bgImageName;
            // $banner->fill($bannerFillable)->save();

            $banner =New Banner();
            $banner->title =  $request->title;
            $banner->text =  $request->text;
            $banner->link =  $request->link;
            $banner->banner_image =  $imageName;
            $banner->background_img =  $bgImageName;
            $banner->save();
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back()->with('success', 'Banner has been saved successfully!');
        }
    }

    // public function addEditBanner(Request $request, $id = null)
	// {
    //    //dd($request->all());
	// 	if ($id == "") {
	// 		// Add Coupon Code
	// 		$banner = new Banner();
	// 		$title = "Add banner";
	// 		$buttonText = "Save";
	// 		$message = "Banner has been saved successfully!";

	// 	} else {
	// 		// Update Coupon Code
	// 		$banner = Banner::findOrFail($id);
	// 		$title = "Edit banner";
	// 		$buttonText = "Update";
	// 		$message = "Banner has been updated successfully!";
	// 	}
	// 	if ($request->isMethod('post')) {
    //         $link=null;

    //         $data = $request->all();

    //         //echo '<pre>'; print_r($data); die;
	// 		//Validation rules
	// 		$rules = [
	// 			'title' => 'required',
	// 			'link' => '255',
	// 			// 'text' => 'required',
	// 			'banner_image' => 'required',
	// 			'background_img' => 'required'
	// 		];
	// 		//Validation message
	// 		$customMessage = [
	// 			'title.required' => 'Banner title is required',
	// 			'banner_image.required' => 'banner_image is required',
	// 			'background_img.required' => 'Background image is required'
	// 		];
    //         // $link=$data['link'];
	// 		$this->validate($request, $rules, $customMessage);
	// 		//Upload banner image
	// 		if ($request->hasfile('banner_image')) {
	// 			$image_tmp = $request->file('banner_image');
	// 			if ($image_tmp->isValid()) {
    //                 $imageName  = $request->title.time() . '.' . $image_tmp->getClientOriginalExtension();
    //                 $destinationPath = public_path().'/uploads/banner/'.$imageName;
    //                 $bannerImage = Image::make($image_tmp)->resize(640, 426,function ($constraint) {
    //                     $constraint->aspectRatio();
    //                 })->save($destinationPath);
	// 				$banner->banner_image = $imageName;
	// 			}
	// 		}
    //         else {
	// 			$imageName = $banner->banner_image;
	// 		}
	// 		//Upload background img
	// 		if ($request->hasfile('background_img')) {
	// 			$bgImage = $request->file('background_img');
	// 			if ($bgImage->isValid()) {
    //                 $bgImageName  ='bg'.time() .'.' . $bgImage->getClientOriginalExtension();
    //                 $destinationPathbg = public_path().'/uploads/banner/'.$bgImageName;
    //                 $bannerBgImage = Image::make($bgImage)->resize(1170, 480,function ($constraint) {
    //                     $constraint->aspectRatio();
    //                 })->save($destinationPathbg);
	// 				$banner->background_img = $bgImageName;
	// 			}
	// 		}
    //         else {
	// 			$bgImageName = $banner->background_img;
	// 		}
	// 		//Saving other field to property table
	// 		$banner->title = $data['title'];
	// 		$banner->link = $link;
	// 		$banner->text = $data['text'];
	// 		// $banner->banner_image = $data['banner_image'];
	// 		// $banner->background_img = $data['background_img'];
	// 		$banner->status = 1;
	// 		$banner->save();
	// 		return redirect()->back()->with('success', $message);
	// 	}
	// 	return view('admin.pages.banner.addEditBanner', compact('title', 'buttonText', 'banner', 'message'));
	// }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Edit";
        $banner_data = Banner::find($id);
        $data['banner_data'] = json_decode(json_encode($banner_data), true);
        return view('admin.pages.banner.edit', $data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        try {
            $request->validate([
                'title'=>'required|max:220',
                'banner_image'=>'nullable|image',
                'background_img'=>'nullable|image',
                'link'=>'nullable|max:255',
                'text'=>'nullable|string|max:65535',
            ]);
            $banner = Banner::findOrFail($id);

            if ($request->hasfile('banner_image')) {
				$image_tmp = $request->file('banner_image');


                    $old_pic_name= $banner->banner_image;
                    $path = public_path('uploads/banner/').$old_pic_name;
                    if ($old_pic_name != 'default.jpg' && file_exists($path)) {
                        unlink($path);
                    }
                    $imageName  = 'main'.str_replace("-", " ",$banner->title)."-".date('h-m-s').".".$image_tmp->getClientOriginalExtension();

                    $destinationPath = public_path().'/uploads/banner/'.$imageName;
                    Image::make($image_tmp)->resize(640, 426,function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath);

					$banner->banner_image= $imageName;
			}
            if ($request->hasfile('background_img')) {
				$bgImage = $request->file('background_img');

                    $old_pic_namebg = $banner->background_img;

                    $path = public_path('uploads/banner/').$old_pic_namebg;
                    if ($old_pic_namebg != 'default.jpg' && file_exists($path)) {
                        unlink($path);
                    }

                    $imageNameBG  = 'bg'.str_replace("-", " ",$banner->title)."-".date('h-m-s').".".$bgImage->getClientOriginalExtension();
                    // $bgImageName  =$old_pic_namebg;
                    $destinationPathbg = public_path().'/uploads/banner/'.$imageNameBG;

                    Image::make($bgImage)->resize(1170, 480,function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPathbg);
					$banner->background_img = $imageNameBG;
			}


            $banner->title =$request->title;
            $banner->link =$request->link;
            $banner->text =$request->text;
            $banner->save();
            return redirect()->route('sadmin.banners')->with('success', 'Banner has been updated successfully!');
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route('sadmin.banners')->with('success', 'Banner not updated successfully!');
        }
    }

    public function update_banner_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Banner::where('id', $data['banner_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'banner_id' => $data['banner_id']]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $banner = Banner::findOrFail($id);

            $old_pic_name= $banner->banner_image;
            $path = public_path('uploads/banner/').$old_pic_name;
            if ($old_pic_name != 'default.jpg' && empty($old_pic_name)==false && file_exists($path)) {
                // unlink(base_path($old_pic_location));
                unlink($path);
            }
            $old_pic_namebg= $banner->background_img;
            $pathbg = public_path('uploads/banner/').$old_pic_namebg;
            if ($old_pic_namebg != 'default.jpg' && empty($old_pic_namebg)==false && file_exists($pathbg)) {
                // unlink(base_path($old_pic_location));
                unlink($pathbg);
            }
            $banner->delete();
            return redirect()->back()->with('success', 'Your banner has been deleted!');
        } catch (\Throwable $th) {
           // dd($th);
            return redirect()->back()->with('success', 'Your banner not deleted!');

        }
    }
}
