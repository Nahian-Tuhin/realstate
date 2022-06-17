<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function properties()
    {
        Session::put('page', 'properties');
        $title = "Property";
        $properties = DB::table('properties')->get();
        return view('admin.pages.property.properties', compact('properties','title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = "Property";
        $data['property']   = new Property();
        $getCategories   = DB::table('categories')->where('status', 1)->get();
        $data['getCategories'] = json_decode($getCategories, true);
        return view("admin.pages.property.add", $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_property_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Property::where('id', $data['property_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'property_id' => $data['property_id']]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addEditProperty(Request $request, $id = null)
	{
		if ($id == "") {
			// Add Coupon Code
			$property = new Property();
			$title = "Add property";
			$buttonText = "Save";
			$message = "Property has been saved successfully!";
		} else {
			// Update Coupon Code
			$property = Property::find($id);
			$title = "Edit Property";
			$buttonText = "Update";
			$message = "Property has been updated successfully!";
		}
		if ($request->isMethod('post')) {
			$data = $request->all();
			//echo '<pre>'; print_r($data); die;
			//Validation rules
			$rules = [
				'category_id' => 'required',
				'title' => 'required',
				'bathroom' => 'required',
				'bedroom' => 'required',
				'price' => 'required',
				'rental_period' => 'required',
				'meta_title' => 'required',
				'description' => 'required',
				'meta_description' => 'required'
			];
			//Validation message
			$customMessage = [
				'category_id.required' => 'Category is required',
				'title.required' => 'Property title is required',
				'bathroom.required' => 'Bathroom is required',
				'bedroom.required' => 'Bedroom is required',
				'price.required' => 'Price is required',
				'rental_period.required' => 'Rental period is required',
				'meta_title.required' => 'Meta title is required',
				'description.required' => 'Post description is required',
				'meta_description.required' => 'Meta desc is required',
			];
			$this->validate($request, $rules, $customMessage);
			//Upload property image
			if ($request->hasfile('image')) {
				$image_tmp = $request->file('image');
				if ($image_tmp->isValid()) {
					$imageName  = time() . '.' . $image_tmp->getClientOriginalExtension();
					$property_image_path = 'uploads/property_img/' . $imageName;
					Image::make($image_tmp)->resize(650, 480)->save($property_image_path);
					$property->image = $imageName;
				}
			} else {
				$imageName = $property->image;
			}
			//Saving other field to property table
			$property->category_id = $data['category_id'];
			$property->title = $data['title'];
			$property->bathroom = $data['bathroom'];
			$property->bedroom = $data['bedroom'];
			$property->price = $data['price'];
			$property->rental_period = $data['rental_period'];
			$property->meta_title = $data['meta_title'];
			$property->meta_description = $data['meta_description'];
			$property->description = $data['description'];
			$property->address = $data['address'];
			$property->admin_id =  Auth::guard('admin')->user()->id;
			$property->status = 1;
			$property->save();
			return redirect()->back()->with('success', $message);
		}
		$categories = Category::select('title', 'id')->get();
		return view('admin.pages.property.addEditProperty', compact('title', 'buttonText', 'property', 'message', 'categories'));
	}
    public function addImages(Request $request, $id)
    {
        //dd($id);
        $title = "Images";
		$property_data =  Property::with('images')->select('id', 'title')->find($id);
		$property_data = json_decode(json_encode($property_data),  true);
		if ($request->isMethod('post')) {
			if ($request->hasFile('images')) {
				$images = $request->file('images');
				foreach ($images as $key => $image) {
					$propertyImage = new PropertyImage();
					$image_tmp = Image::make($image);
					$imageName  = time() . '.' . $image->getClientOriginalExtension();
					$large_image_path = 'uploads/large_image/' . $imageName;
					Image::make($image_tmp)->resize(1040, 1200)->save($large_image_path);
					$propertyImage->images = $imageName;
					$propertyImage->product_id = $id;
					$propertyImage->save();
				}
				return redirect()->back()->with('Property Images been saved successfully', 'success');
			}
		}
		return view('admin.pages.property.addImages', compact('property_data', 'title'));
	}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $category
     * @return \Illuminate\Http\Response
     */
    public function deleteProperty($id)
    {
        try {
            $property = Property::findOrFail($id);
            $image_path  = public_path('uploads/property_img/') . $property->image;
            if (!is_null($property)) {
                $property->delete();
                unlink($image_path);
                return redirect()->back()->with('success','Your property has been deleted!!');
            }
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('success','Your property not deleted!!');
        }
    }
}
