<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Clothes;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use App\Models\Price;
use App\Models\Laundry;
use App\Models\StatusOrder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

                $listItems = explode(',', $order['item']);

                $restoreItems = [];
                for ($i = 0; $i < sizeof($listItems); $i++) {
                    array_push($restoreItems, explode(':', $listItems[$i]));
                }

                $clothName = [];
                $clothQty = [];
                for ($j = 0; $j < sizeof($restoreItems); $j++) {
                    $cloth = Clothes::where('id', $restoreItems[$j][0])->first()->item_id;
                    array_push($clothName, $cloth);
                    array_push($clothQty, $restoreItems[$j][1]);
                }

                array_push($datum, [
                    'id' => $order['id'],
                    'user_id' => $order['user_id'],
                    'user_name' => $userName,
                    'laundry_id' => $order['laundry_id'],
                    'laundry_name' => $laundryName,
                    'item' => $order['item'],
                    'materialName' => json_encode($clothName),
                    'materialQty' => json_encode($clothQty),
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
            $user_id = Auth::user()->id;
            $services = Service::where('laundry_id', explode(',', $orderRequest['service']))->get();
            $arrService = explode(',', $orderRequest['service']);

            $listItems = explode(',', $orderRequest['item']);
            $restoreItems = [];
            for ($i = 0; $i < sizeof($listItems); $i++) {
                array_push($restoreItems, explode(':', $listItems[$i]));
            }

            // get total single cloth type
            $baseItemPrice = [];
            for ($j = 0; $j < sizeof($restoreItems); $j++) {
                $price = Price::where('clothes_id', $restoreItems[$j][0])->first()->price;
                array_push($baseItemPrice, $price * $restoreItems[$j][1]);
            }

            // get total item price
            $totalItemPrice = 0;
            for ($k = 0; $k < sizeof($baseItemPrice); $k++) {
                $totalItemPrice += $baseItemPrice[$k];
            }

            $serviceExpensive = 0;
            for ($i = 0; $i < sizeof($arrService); $i++) {
                if ($services[$i]['service_list_id'] == $arrService[$i]) {
                    $serviceExpensive += $services[$i]['price'];
                }
            }

            $grandTotal = $totalItemPrice + $serviceExpensive;

            $data = Order::create([
                'user_id' => $user_id,
                'laundry_id' => $orderRequest['laundry_id'],
                'item' => $orderRequest['item'],
                'service' => $orderRequest['service'],
                'total_price' => $grandTotal,
                'status_order_id' => $orderRequest['status_order_id'],
            ]);

            if ($data) {
                return response()->json([
                    'message' => 'success',
                    'order' => $data
                ], 201);
            }
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
        try {
            $order = Order::where('id', $id)->first();
            if ($order) {
                $userName = User::where('id', $order['user_id'])->first()->name;
                $laundryName = Laundry::where('id', $order['laundry_id'])->first()->name;
                $status_orders = StatusOrder::where('id', $order['status_order_id'])->first()->name;
                $listItems = explode(',', $order['item']);

                $datum = [];

                $restoreItems = [];
                for ($i = 0; $i < sizeof($listItems); $i++) {
                    array_push($restoreItems, explode(':', $listItems[$i]));
                }

                $clothName = [];
                $clothQty = [];
                for ($j = 0; $j < sizeof($restoreItems); $j++) {
                    $cloth = Clothes::where('id', $restoreItems[$j][0])->first()->item_id;
                    array_push($clothName, $cloth);
                    array_push($clothQty, $restoreItems[$j][1]);
                }

                array_push($datum, [
                    'id' => $order['id'],
                    'user_id' => $order['user_id'],
                    'user_name' => $userName,
                    'laundry_id' => $order['laundry_id'],
                    'laundry_name' => $laundryName,
                    'item' => $order['item'],
                    'materialName' => json_encode($clothName),
                    'materialQty' => json_encode($clothQty),
                    'total_price' => $order['total_price'],
                    'status_order' => $status_orders,
                    'order_date' => $order['created_at']
                ]);

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
    public function update(OrderRequest $orderRequest, $id)
    {
        try {
            $order = Order::find($id);

            $services = Service::where('laundry_id', explode(',', $orderRequest['service']))->get();
            $arrService = explode(',', $orderRequest['service']);

            $listItems = explode(',', $orderRequest['item']);
            $restoreItems = [];
            for ($i = 0; $i < sizeof($listItems); $i++) {
                array_push($restoreItems, explode(':', $listItems[$i]));
            }

            // get total single cloth type
            $baseItemPrice = [];
            for ($j = 0; $j < sizeof($restoreItems); $j++) {
                $price = Price::where('clothes_id', $restoreItems[$j][0])->first()->price;
                array_push($baseItemPrice, $price * $restoreItems[$j][1]);
            }

            // get total item price
            $totalItemPrice = 0;
            for ($k = 0; $k < sizeof($baseItemPrice); $k++) {
                $totalItemPrice += $baseItemPrice[$k];
            }

            $serviceExpensive = 0;
            for ($i = 0; $i < sizeof($arrService); $i++) {
                if ($services[$i]['service_list_id'] == $arrService[$i]) {
                    $serviceExpensive += $services[$i]['price'];
                }
            }

            $grandTotal = $totalItemPrice + $serviceExpensive;

            $order->user_id = $orderRequest['user_id'];
            $order->laundry_id = $orderRequest['laundry_id'];
            $order->item = $orderRequest['item'];
            $order->service = $orderRequest['service'];
            $order->total_price = $grandTotal;
            $order->status_order_id = $orderRequest['status_order_id'];
            $update = $order->save();

            if ($update) {
                return response()->json([
                    'message' =>  'success'
                ], 200);
            } else {
                return response()->json([
                    'message' =>  'fail'
                ], 400);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $order = Order::find($id)->delete();
            if ($order) {
                return response()->json([
                    'message' => 'success'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'fail'
                ], 400);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
