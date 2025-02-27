<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\DatabaseConnectionTrait;
use App\Models\Product;

class ProductController extends Controller
{
    use DatabaseConnectionTrait;
    public function index()
    {
        return view('product');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $usercode = session('usercode');
        $dbConnection = $this->getDatabaseConnection($usercode);

        $product = Product::on($dbConnection)->create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'file' => $request->file,
            'url' => $request->url
        ]);

        return redirect('/dashboard')->with('message', 'Product Created Successfully');

        // return response()->json(['message' => 'Product Created Successfully', 'product' => $product]);


    }
}
