<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class PagesController extends Controller
{
    public function apropos()
    {
        return view('apropos');
    }

    public function services()
    {
        $produits = Product::orderBy('product_name', 'asc')->paginate();
        /* $produits = DB::table('products')
            ->inRandomOrder()
            ->paginate(1);*/
        return view('services')->with('produits', $produits);
    }
    public function show($id)
    {

        /*  $produit = DB::table('products')
            ->where('id', $id)
            ->first();*/
        $produit = Product::find($id);
        return view('show')->with('produit', $produit);
    }

    public function create()
    {
        return view('create');
    }

    public function saveproduct(Request $request)
    {
        /*$product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->description = $request->product_description;

        $product->save();*/

        $data = array();
        $data["product_name"] = $request->input('product_name');
        $data["product_price"] = $request->input('product_price');
        $data["description"] = $request->input('product_description');

        DB::table('products')
            ->insert($data);



        Session::put('message', 'le produit a été inséré avec succès');

        return redirect('/create');
    }
    /* public function edit($id)
    {

        $produit = Product::find($id);
        return view('edit_product')->with('product', $produit);
    }*/


    public function edit(Product $product)
    {
        return view('edit_product', compact('product'));
    }


    public function update(Product $product, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->description;

        $product->save();
        return redirect('/services')->with('success', 'product updated successfully!');
    }




    public function modifierProduit(Request $request)
    {
        $produit = Product::find($request->input('id'));

        $produit->product_name = $request->input('product_name');
        $produit->product_price = $request->input('product_price');
        $produit->description = $request->input('product_description');
        $produit->update();



        return redirect('/services')->with('status', 'le produit' . $produit->product_name . 'été modifié avec succès');
    }
}
