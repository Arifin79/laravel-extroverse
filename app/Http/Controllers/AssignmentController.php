<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    //
    public function index(Request $request)
    {
        $assignment = Assignment::orderby('created_at')->get();
        $keyword = $request->get('search');
        $perPage = 5;

        if(!empty($keyword)){
            $assignment = Assignment::where('name', 'LIKE', "%$keyword%")
                        ->orWhere('category', 'LIKE', "%$keyword%")
                        ->latest()->paginate($perPage);
        } else {
            $assignment = Assignment::latest()->paginate($perPage);
        }

        return view ('assignment/index', ['assignment' => $assignment])->with('i', (request()->input('page', 1)-1) *5);
    }

    public function create()
    {
        return view('assignment/create');
    }

    public function store(Request $request){

        $product = new Assignment;

        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif,svg|max:2028'
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $file_name;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $product->save();
        return redirect()->route('assignment/index')->with('success', 'Assignment Added successfully');

    }

    public function edit($id){
        $assignment = Assignment::findOrFail($id);
        return view('assignment/edit', ['assignment' => $assignment]);
    }

    public function update(Request $request, Assignment $assignment){
        $request->validate([
            'name' => 'required'
        ]);

        $file_name = $request->hidden_product_image;

        if($request->image != ""){
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $file_name);
        }

        $assignment = Assignment::find($request->hidden_id);

        $assignment->name = $request->name;
        $assignment->description = $request->description;
        $assignment->image = $file_name;
        $assignment->category = $request->category;
        $assignment->quantity = $request->quantity;
        $assignment->price = $request->price;

        $assignment->save();

        return redirect()->route('assignment/index')->with('success', 'Product Has Been Updated Successfully');

    }

    public function destroy($id){
        $assignment = Assignment::findOrFail($id);
        $image_path = public_path(). "/images/";
        $image = $image_path. $assignment->image;
        if(file_exists($image)){
            @unlink($image);
        }
        $assignment->delete();
        return redirect('assignment')->with('success', 'product Deleted!');
    }

}
