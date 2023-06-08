<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::orderBy('order_by')->get();
        return view('backend.modules.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('backend.modules.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request,[
           'name' => 'required|min:3|max:255',
           'slug' => 'required|min:3|max:255|unique:categories',
            'order_by' => 'required|numeric',
            'status' => 'required'
        ]);

        $category_data = $request->all();
        $category_data['slug'] = Str::slug($request->input('slug'));
        Category::create($category_data);

        Session::flash('cls','success');
        Session::flash('msg','Category Created Successfully.');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('backend.modules.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('backend.modules.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @throws ValidationException
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:categories,slug,'.$category->id,
            'order_by' => 'required|numeric',
            'status' => 'required'
        ]);

        $category_data = $request->all();
        $category_data['slug'] = Str::slug($request->input('slug'));
        $category->update($category_data);

        Session::flash('cls','success');
        Session::flash('msg','Category Updated Successfully.');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('cls','danger');
        Session::flash('msg','Category Deleted Successfully.');
        return redirect()->route('category.index');
    }
}
