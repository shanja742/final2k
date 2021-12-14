<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $data = Category::orderBy('id','DESC')->get();
        return view('backend.category.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();
        $category = Category::create($input);

        echo "success";

        $notification = array(
            'message' => 'Created successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')
                    ->with($notification);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();
        $category = Category::find($id);
        $category->update($input);

        echo "success";

        $notification = array(
            'message' => 'Updated successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')
                    ->with($notification);
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        echo "success";

        $notification = array(
            'message' => 'Deleted successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')
                    ->with($notification);
    }
}
