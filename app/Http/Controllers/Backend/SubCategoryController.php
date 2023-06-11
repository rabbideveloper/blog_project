<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_categories = SubCategory::with('category')->orderBy('order_by')->get();
        return view('backend.modules.sub_categories.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('backend.modules.sub_categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:sub_categories',
            'order_by' => 'required|numeric',
            'status' => 'required',
            'category_id' => 'required'
        ]);

        $sub_category_data = $request->all();
        $sub_category_data['slug'] = Str::slug($request->input('slug'));
        SubCategory::create($sub_category_data);

        Session::flash('cls', 'success');
        Session::flash('msg', 'Sub Category Created Successfully.');

        return redirect()->route('sub-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        $subCategory->load('category');
        return view('backend.modules.sub_categories.show', compact('subCategory'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::pluck('name', 'id');
        return view('backend.modules.sub_categories.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @throws ValidationException
     */
    public function update(Request $request, SubCategory $subCategory): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:sub_categories,slug,' . $subCategory->id,
            'order_by' => 'required|numeric',
            'status' => 'required',
            'category_id' => 'required'
        ]);

        $sub_category_data = $request->all();
        $sub_category_data['slug'] = Str::slug($request->input('slug'));
        $subCategory->update($sub_category_data);

        Session::flash('cls', 'success');
        Session::flash('msg', 'Sub Category Updated Successfully.');
        return redirect()->route('sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory): RedirectResponse
    {
        $subCategory->delete();
        Session::flash('cls', 'danger');
        Session::flash('msg', 'Sub Category Deleted Successfully.');
        return redirect()->route('sub-category.index');
    }

    public function getSubCategoryByCategoryId(int $id): JsonResponse
    {
        $sub_categories = SubCategory::select('id','name')->where('status',1)->where('category_id', $id)->get();
        return response()->json($sub_categories) ;
    }
}
