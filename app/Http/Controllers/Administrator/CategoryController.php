<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{   
    // View category table and pass all data to it
    public function index()
    {
        $category = Category::all();
        return view('administrator.category.index', compact('category'));
    }

    // View all category API
    public function categoryAPI()
    {
        $category = Category::all();
        return response()->json($category);
    }

    public function create()
    {
        return view('administrator.category.add');
    }

    // Store new data
    public function store(Request $request)
    {
        $category = new Category();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        Alert::success('Success', 'Category Added Successfully');
        return redirect(route('administrator.categories'));
    }

    // Add new category API
    public function addCategoryAPI(Request $request)
    {
        $category = new Category();
        
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->image = $request->input('image');
        $category->save();
        return response()->json($category);
    }

    // Return data in category table based on the $id
    public function edit($id)
    {
        $category = Category::find($id);
        return view('administrator.category.edit', compact('category'));
    }

    // Return data in category table based on the $id API
    public function editCategoryAPI($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    // User the $id to identify the category
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assests/uploads/category'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();
        Alert::success('Success', 'Category Updated Successfully');
        return redirect(route('administrator.categories'));
    }

    // Update category API
    public function updateCategoryAPI(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->image = $request->input('image');
        $category->update();
        return response()->json($category);
    }

    // Delete a category
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        Alert::toast('Category Deleted', 'success');
        return redirect(route('administrator.categories'));
    }

    // Delete a category API
    public function deleteCategoryAPI($id)
    {
        if (Category::find($id))
        {
            $category = Category::find($id);
            $category->delete();    
        }
        else
        {
            return response()->json(['error' => 'Category Not Found']);
        }
        
        return response()->json($category);
    }
}
