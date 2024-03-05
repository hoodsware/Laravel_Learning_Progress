<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('DEBUG: listing all data');

        // $products = DB::table('products')->get();

        // return view('product.index', [
        //     'products' => DB::table('products')->get()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // show add form

        return view('product.create');
    }

    public function store(Request $request)
    {
        // insert product in the db record (be sure to declare the variables in migration or model)
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        $products = Product::insert();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd("DEBUG: displaying products of the parameter id");
        // $products = DB::select('SELECT * FROM products WHERE id = :id', ['id' => 1]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Need a reference to query and modify the data in the form

        return view('product.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd("DEBUG: updated");

        // $products = DB::update('UPDATE products set price = ? WHERE id = ?', [
        //     '$33', $id
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd("DEBUG: deleted");

        // Product::destroy($id);

        // return redirect(route('product.index'))->with('message', 'Product has been deleted.');
    }
}
