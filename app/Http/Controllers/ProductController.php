<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Products::all();
        return view('electronic-devices',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'photo'=>'required',
            'price'=>'required',
        ]);

        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('images'), $imageName);
        Products::create([
            'product_name'=> $request->input('product_name'),
            'image_path'=> $imageName,
            'price'=> $request->input('price'),
        ]);

        return redirect('/electronic-devices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function edit(Request $request)
    {
        $id = $request->product_id;
        return redirect()->route('edit.page',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function edit_page( $id)
    {
      return view('edit',compact('id'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Products $id)
    {
        request()->validate([
            'product_name'=>'required',
            'photo'=>'required',
            'price'=>'required',
        ]);

        $imageName = time().'.'.request()->photo->extension();  
        request()->photo->move(public_path('images'), $imageName);
        $id->update([
            'product_name'=> request('product_name'),
            'image_path'=> $imageName,
            'price'=> request('price'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $id)
    {
        $id->delete();

        return redirect ('/electronic-devices');
    }

    public function cart(){
        return view('cart');
    }
    
    public function addToCart($id){
        $product = Products::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "product_name" => $product->product_name,
                        "price" => $product->price,
                        "image_path" => $product->image_path
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        
        // if cart not empty then check if this product exist then increment quantity
        // if(isset($cart[$id])) {
        //     $cart[$id]['quantity']++;
        //     session()->put('cart', $cart);
        //     return redirect()->back()->with('success', 'Product added to cart successfully!');
        // }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_name" => $product->product_name,
            "price" => $product->price,
            "image_path" => $product->image_path
        ];
        session()->put('cart', $cart);
        return redirect('/cart')->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

}

