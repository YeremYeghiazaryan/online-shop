<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $categories = CategoryResource::collection($categories);
        return inertia("Admin/Category/Index",compact("categories"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryResource::collection(Category::all())->resolve();
        return inertia("Admin/Category/Create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $category = CategoryService::store($data);
        return CategoryResource::make($category)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = CategoryResource::make($category)->resolve();
        return inertia("Admin/Category/Show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = CategoryResource::make($category)->resolve();
        return inertia("Admin/Category/Edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category = CategoryService::update($category, $data);
        return CategoryResource::make($category)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            "message" => "Category deleted successfully"
        ], Response::HTTP_OK);
    }
}
