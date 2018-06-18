<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Tag;

class CategoriesController extends Controller
{
    public function createCategory(Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);

        $category = new Category;
        $category->category = $request->input('category');
        $category->save();

        return back()->with('session_code', 'categoryCreated');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $subcategories = Subcategory::where('category_id', $id)->get();

        foreach ($subcategories as $subcategory) {
            $subcategory->delete();
        }

        $category->delete();

        return back()->with('session_code', 'categoryDelete');
    }

    public function createSubcategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory' => 'required'
        ]);

        $subcategory = new Subcategory;
        $category = Category::where('id', $request->input('category_id'))->first();
        $subcategory->subcategory = $request->input('subcategory');
        $category->subcategories()->save($subcategory);

        return back()->with('session_code', 'subcategoryCreated');
    }

    public function getSubcategory($id)
    {
        $subcategories = Subcategory::where('category_id', $id)->get();

        return response(json_encode($subcategories));
    }

    public function deleteSubcategory($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        return back()->with('session_code', 'subcategoryDelete');
    }

    public function createTag(Request $request)
    {
        $request->validate([
            'tag' => 'required'
        ]);

        $tag = new Tag;
        $tag->tag = $request->input('tag');
        $tag->save();

        return back()->with('session_code', 'tagCreated');
    }

    public function deleteTag($id)
    {
        $tag = Tag::find($id);
        $tag->products()->detach();
        $tag->delete();

        return back()->with('session_code', 'tagDeleted');
    }
}
