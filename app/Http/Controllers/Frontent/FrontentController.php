<?php

namespace App\Http\Controllers\Frontent;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontentController extends Controller
{

    public function main()
    {
        return view('frontent.main');
    }


    public function index()
    {

        if(\Session::get("data")){
            $data = \Session::get("data");
        }
        //Bütün product listesi alınıyor
        $data['products'] = Product::all();
        return view('frontent.dashboard', $data);
    }


    public function show(Request $request)
    {
        $data['product'] = Product::find($request->product);
        //
        return view('frontent.product.show', $data);

    }

    public function order(Request $request)
    {
        $basket = Basket::where("user_id",Auth::user()->id)->get();
        try {

            //Sipariş ekleniyor
            $order = Order::create([
                'total'=>$request->total,
                'user_id'=>Auth::user()->id,
                'payment_type'=>0,
                'verified'=>0,
                'addres'=>$request->addres
            ]);

            foreach ($basket as $product){
                $op = OrderProduct::create([
                    'order_id'=>$order->id,
                    'product_id'=>$product->id,
                    'product_price'=>$product->product->price,
                    'quantity'=>$product->quantity
                ]);
            }
            $data['type']    = 1;
            $data['message'] = "Sipariş  ekleme işlemi başarılı";

            Basket::where("user_id",Auth::user()->id)->delete();
        } catch (\Exception $e){
            $data['type']    = 2;
            $data['message'] = "İşlem başarısız ".$e->getMessage();
        }

        //Sipariş listesi sayfasına gidiyor
        return redirect()->route('frontent.orders')->with('data', $data);

    }

    public function basket(Request $request)
    {
        //
        if(isset($request->create)){
            try {
                if(Basket::where("product_id",$request->product)->where("user_id",Auth::user()->id)->first()){
                    $data['result'] = Basket::where("product_id",$request->product)
                        ->where("user_id",Auth::user()->id)
                        ->increment('quantity', 1);
                } else{
                    $data['result'] = Basket::create([
                        'product_id'=>$request->product,
                        'user_id'=>Auth::user()->id,
                        'quantity'=>$request->count,
                        'product_price'=>0
                    ]);
                }

                $data['type']    = 1;
                $data['message'] = "Sepete ekleme işlemi başarılı";
            } catch (\Exception $e){
                $data['type']    = 2;
                $data['message'] = "İşlem başarısız ".$e->getMessage();
            }
        }


        //Bütün product listesi alınıyor
        $data['products'] = Product::all();
        $data['baskets']  = Basket::where("user_id",Auth::user()->id)->get();
        return view('frontent.product.basket', $data);

    }

    public function orders(Request $request)
    {
        $data = array();
        if(\Session::get("data")){
            $data = \Session::get("data");
        }

        //Bütün product listesi alınıyor
        $data['orders']   = Order::where("user_id",Auth::user()->id)->get();
        return view('frontent.order.index', $data);

    }

    public function orderShow(Request $request)
    {
        $data['order'] = Order::find($request->order);
        $data['products'] = $data['order']->products;

        //
        return view('frontent.order.show', $data);
    }

    public function logout(Request $request)
    {
        Auth::guard("web")->logout();
        return redirect("dashboard");
    }

}
