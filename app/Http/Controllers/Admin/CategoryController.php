<?php

namespace App\Http\Controllers\Admin;


use App\Models\Section;
use App\Models\Category;

use App\Models\AdminRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        Session::put('page', 'categories');
        $title = "Category";
        $categories = DB::table('categories')->get();
        return view('admin.pages.category.categories', compact('categories','title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = "Category";
        $data['category']   = new Category();
        return view("admin.pages.category.add", $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_category_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'category_id' => $data['category_id']]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {
        try {
            $categoryFillable           = $request->only($category->getFillable());
            $category->fill($categoryFillable)->save();
            return redirect()->route('sadmin.categories')->with('success','Category has been saved successfully!!');
        } catch (\Throwable $th) {
            dd($th);
            toast("Category has been saved successfully", 'warning', 'top-right');
            return redirect()->back();
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit";
        $category = Category::find($id);
        //dd($category);
        return view('admin.pages.category.edit', compact('title', 'category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try {
            $image = $request->file('image');
            if (isset($image)) {
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('category')) {
                    Storage::disk('public')->makeDirectory('category');
                }
                //Delelte existiing image
                if (Storage::disk('public')->exists('category/'.$category->image)){
                    Storage::disk('public')->delete('category/'.$category->image);
                }
                //Saving image
                $categoryImage = Image::make($image)->resize(200, 200)->save(storage_path('category'));
                Storage::disk('public')->put('category/'. $imageName, $categoryImage);
            } else {
                //If someone update without changing image
                $imageName = $category->image;
            }
            $categoryFillable           = $request->only($category->getFillable());
            $categoryFillable['image']  = $imageName;
            $category->fill($categoryFillable)->save();
            return redirect()->route('sadmin.categories')->with('success','Category has been updated successfully');
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->back('sadmin.categories')->with('Category not updated successfully!!');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $image_path  = public_path('/storage/category/') . $category->image;
            if (!is_null($category)) {
                $category->delete();
                unlink($image_path);
                return redirect()->route('sadmin.categories')->with('success','Your category has been deleted!!');
            }
        } catch (\Throwable $th) {
            //dd($th);
            return redirect()->route('sadmin.categories')->with('success','Your category not deleted!!');
        }
    }
}
