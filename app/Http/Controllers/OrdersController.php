<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Validator;
use App\OrderDetail;
use App\Product;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id',auth()->id())->orderBy('id','desc')->with('orderItems.product')->get();

        return view('orders.index')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(json_decode($request->vlerat), [ 
            'input.*.prod_id'=>'required|unique',
            'input.*.sasia'=>'required'
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = json_decode($request->vlerat); 

        if(empty($input)) {
            return redirect('/orders')->with('error','Order Not Created');
        }

        $order = new Order;
        $order->user_id = auth()->id();
        $orderSaved = $order->save();
    
            foreach($input as $orderItem) {
                //dd($orderItem);
                $input = array_merge((array)$orderItem,['order_id' => $order->id]);
                
                $orderDetails = OrderDetail::create($input);
            }
        
        return redirect('/orders')->with('success','Order Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::where('id',$id)->where('user_id',auth()->id())->with('orderItems.product')->get();
        $orders = $orders->find($id)->orderItems;

        return view('orders.show')->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
