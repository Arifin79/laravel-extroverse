<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    //
    public function index()
    {
        $products = Assignment::orderby('created_at')->get();
        return view ('assignment/index', ['assignment' => $products]);
    }

    public function create()
    {
        return view('assignment/create');
    }

    public function store(Request $request){

        $product = new Assignment;

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $file_name;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $product->save();
        return redirect()->route('assignment/index')->with('success', 'Product Added successfully');

    }
}
