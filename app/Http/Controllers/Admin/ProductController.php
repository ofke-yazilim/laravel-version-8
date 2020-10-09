<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(\Session::get("data")){
            $data = \Session::get("data");
        }
        //Bütün product listesi alınıyor
        $data['products'] = Product::all();
        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Yeni ürün eklem sayfası
        $data['products'] = "";
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        try {
            $data['result'] = Product::create([
                'name'=>$request->name,
                'description'=>$request->desc,
                'content'=>$request->_content,
                'price'=>$request->price
            ]);

            $data['type']    = 1;
            $data['message'] = "Kayıt işlemi başarılı";
        } catch (\Exception $e){
            $data['type']    = 2;
            $data['message'] = "İşlem başarısız ".$e->getMessage();
        }

        //Bütün product listesi alınıyor
        $data['products'] = Product::all();
        return view('admin.product.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['product'] = $product;
        //
        return view('admin.product.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        try {
            $data['result'] = Product::where("id",$product->id)->update([
                'name'=>$request->name,
                'description'=>$request->desc,
                'content'=>$request->_content,
                'price'=>$request->price
            ]);

            $data['type']    = 1;
            $data['message'] = "Güncelle işlemi başarılı";
        } catch (\Exception $e){
            $data['type']    = 2;
            $data['message'] = "İşlem başarısız ".$e->getMessage();
        }

        //Bütün product listesi alınıyor
        $data['products'] = Product::all();
        return view('admin.product.index', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        //
        try {
            $data['result'] = Product::where("id",$product->id)->delete();

            $data['type']    = 1;
            $data['message'] = "Silme işlemi başarılı";
        } catch (\Exception $e){
            $data['type']    = 2;
            $data['message'] = "İşlem başarısız ".$e->getMessage();
        }

        //Ürün listesi sayfasına yçönlendiriliyor
        return redirect()->route('admin.products.index')->with('data', $data);
    }
}
