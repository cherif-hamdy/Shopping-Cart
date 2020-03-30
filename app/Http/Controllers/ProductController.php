<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (session('success')) {
            Alert::success('Success', session()->get('success'));
        }

        $products = Product::all();

        return view('welcome', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('admin')) {
            return view('products.create');
        } else {
            return abort(401, 'Un Authorized Action');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Gate::allows('admin')) {
            $request->validate([
                'title' => 'required',
                'price' => 'required|numeric',
                'image' => 'required|image'
            ]);

            Product::create([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'image' => $request->file('image')->store('uploads', 'public'),
            ]);

            return redirect(route('products.index'))->with('success', 'Product Created Successfully');
        } else {
            return abort(401, 'Un Authorized Action');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (Gate::allows('admin')) {
            return view('products.create', compact('product'));
        } else {
            return abort(401, 'Un Authorized Action');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if (Gate::allows('admin')) {
            $request->validate([
                'title' => 'required',
                'price' => 'required|numeric'
            ]);

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image'
                ]);
                $image = $request->file('image')->store('uploads', 'public');
                $product->update([
                    'title' => $request->title,
                    'price' => $request->price,
                    'image' => $image
                ]);
            } else {
                $product->update([
                    'title' => $request->title,
                    'price' => $request->price,
                ]);
            }

            return redirect(route('products.index'))->with('success', 'Product Updated');
        } else {
            return abort(401, 'Un Authorized Action');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (Gate::allows('admin')) {
            $product->delete();
            return redirect(route('products.index'))->with('success', "Product Deleted");
        } else {
            return abort(401, 'Un Authorized Action');
        }
    }
}
