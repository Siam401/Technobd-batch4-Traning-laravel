<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);
//        foreach ($categories as $category){
//            echo $category->title.'<br>';
//        }
//        dd($categories);
        return view('categories.index', compact('categories'));
//        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {

//        $request->validate([
//            'title' => 'required',
//        ]);

//        $category = new Category();
//        $category->title = $request->title;
//        $category->save();

        Category::create($request->all());
        Session::flash('message', 'Created Successfully');
        return redirect()->route('categories.index');
    }

    public function show(Category $category)//dependency injection or route model binding
    {
//        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
//        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
//        $category = Category::findOrFail($id);
        $category->update($request->all());
        Session::flash('message', 'Updated Successfully');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
//        Category::destroy($id);
        $category->delete();
        Session::flash('message', 'Deleted Successfully');
        return redirect()->route('categories.index');
//        return redirect()->route('categories.index')->withMessage('Deleted Successfully !');
    }

}
