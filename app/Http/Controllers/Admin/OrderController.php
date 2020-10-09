<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        //Bütün sipariş listesi alınıyor
        $data['orders'] = Order::with('user')->get();
        return view('admin.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $data['order'] = $order;
        $data['products'] = $order->products;

        foreach ($order->products as $item) {
            //dd($item);
        }

        //
        return view('admin.order.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Order  $order
 * @return \Illuminate\Http\Response
 */
    public function destroy(Order $order)
    {
        //
        try {
            $data['result'] = Order::where("id",$order->id)->delete();

            $data['type']    = 1;
            $data['message'] = "Silme işlemi başarılı";
        } catch (\Exception $e){
            $data['type']    = 2;
            $data['message'] = "İşlem başarısız ".$e->getMessage();
        }

        //Ürün listesi sayfasına yçönlendiriliyor
        return redirect()->route('admin.orders.index')->with('data', $data);
    }

    /**
     * verify the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        //
        try {
            $data['result'] = Order::where("id",$request->order)->update([
                'verified'=>1
            ]);

            $data['type']    = 1;
            $data['message'] = "Onaylama işlemi başarılı";
        } catch (\Exception $e){
            $data['type']    = 2;
            $data['message'] = "Onaylama İşlemi başarısız ".$e->getMessage();
        }

        //Ürün listesi sayfasına yçönlendiriliyor
        return redirect()->route('admin.orders.index')->with('data', $data);
    }
}
