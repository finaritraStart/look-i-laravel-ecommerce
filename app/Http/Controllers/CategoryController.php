<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('admin.ajouterCategorie');
    }

    public function savecategory(Request $request)
    {
        $this->validate($request, ['category_name' => 'required | unique:categories']);
        $categorie = new Category();
        $categorie->category_name = $request->input('category_name');
        $categorie->save();

        return redirect('addcategory')->with('status', 'la catégorie' . $categorie->category_name . 'a été ajoutéeavec succès');
    }
    public function category()
    {

        $categories = Category::get();
        return view('admin.categories')->with('categories', $categories);
    }

    public function edit_category($id)
    {
        $categories = Category::find($id);
        return view('admin.editcategory')->with('categories', $categories);
    }

    public function update(Category $category, Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',

        ]);
        $category->category_name = $request->category_name;

        $category->save();
        return redirect('/category')->with('success', 'category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success', 'suppretion avec succès');
    }
}
