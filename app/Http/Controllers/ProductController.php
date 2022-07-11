<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function addproduct()
    {
        $categories = Category::All();
        return view('admin.ajouterproduit')->with('categories', $categories);
    }
    public function saveproduct(Request $request)
    {
        $this->validate($request, [
            'product_name',
            'product_price' => 'required',
            'product_category',
            'product_image' => 'image|nullable|max:1999'
        ]);
        if ($request->hasFile('product_image')) {
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->product_image = $fileNameToStore;
        $product->status = 1;
        $product->save();
        return redirect('/product')->with('status', 'le produit' . $product->product_name . 'a été inséré avec succès!');
    }

    public function product()
    {
        $produits = Product::get();
        return view('admin.produits')->with('produits', $produits);
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::All();

        return view('admin.editproduit')->with('product', $product)->with('categories', $categories);
    }

    public function modifier_product(Request $request)
    {
        $this->validate($request, [
            'product_name',
            'product_price',
            'product_category',
            'product_image' => 'image|nullable|max:1999'
        ]);

        $product = Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');



        if ($request->hasFile('product_image')) {
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

            if ($product->product_image != 'noimage.jpg') {
                Storage::delete('public/product_images/' . $product->product_image);
            }

            $product->product_image = $fileNameToStore;
        }
        $product->update();
        return redirect('/product')->with('status', 'le produit' . $product->product_name . 'a été modifié avec succès!');
    }


    public function delete_product($id)
    {
        $product = Product::find($id);
        if ($product->product_image != 'noimage.jpg') {
            Storage::delete('public/product_images/' . $product->product_image);
        }

        $product->delete();
        return redirect('/product')->with('status', 'le produit'  . $product->product_name . 'a été supprimé avec succès!');
    }
    public function activer_product($id)
    {
        $product = Product::find($id);
        $product->status = 1;
        $product->update();
        return redirect('/product')->with('status', 'le produit'  . $product->product_name . 'a été activé avec succès!');
    }




    public function desactiver_product($id)
    {
        $product = Product::find($id);
        $product->status = 0;
        $product->update();
        return redirect('/product')->with('status', 'le produit'  . $product->product_name . 'a été désactivé avec succès!');
    }
}
