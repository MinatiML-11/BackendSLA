<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders = Order::orderBy('id', 'desc')->get();
            $datum = [];
            foreach ($orders as $order) {
                $userName = User::where('id', $order['user_id'])->first()->name;
                $laundryName = Laundry::where('id', $order['laundry_id'])->first()->name;
                $status_orders = StatusOrder::where('id', $order['status_order_id'])->first()->name;
                array_push($datum, [
                    'id' => $order['id'],
                    'user_name' => $userName,
                    'laundry_name' => $laundryName,
                    'delivery_price' => $order['delivery_price'],
                    'item_price' => $order['item_price'],
                    'service_price' => $order['service_price'],
                    'total_price' => $order['total_price'],
                    'status_order' => $status_orders,
                    'order_date' => $order['created_at']
                ]);
            }

            if ($datum) {
                return response()->json([
                    'message' =>  'success',
                    'orders' => $datum
                ], 200);
            } else {
                return response()->json([
                    'message' =>  'success',
                    'orders' => 'No data available yet'
                ], 200);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
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
    public function store(OrderRequest $orderRequest)
    {
        try {
            // $datum = Order::create([
            //     'user_id' => $orderRequest['user_id'],
            //     'laudnry_id' => $orderRequest['laundry_id'],
            //     'item' => $orderRequest['item'],
            //     'delivery_price' => 'required',
            //     'item_price' => 'required',
            //     'total_price' => 'required',
            //     'status_orders_id' => 'required'
            // ]);
            return response()->json([
                'message' => $orderRequest['item']
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
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
