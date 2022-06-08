<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusOrderRequest;
use App\Models\StatusOrder;
use Exception;
use Illuminate\Http\Request;

class StatusOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $statusOrders = StatusOrder::orderBy('name', 'asc')->get();
            $datum = [];
            foreach ($statusOrders as $statusOrder) {
                array_push($datum, [
                    'id' => $statusOrder['id'],
                    'name' => $statusOrder['name']
                ]);
            }
            if (sizeof($datum) > 0) {
                return response()->json([
                    'message' => 'success',
                    'statusOrders' => $datum
                ], 200);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
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
    public function store(StatusOrderRequest $statusOrderRequest)
    {
        try {
            $statusOrder = StatusOrder::create([
                'name' => strtolower($statusOrderRequest['name'])
            ]);

            if ($statusOrder) {
                return response()->json([
                    'message' => 'success'
                ], 201);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $statusOrder = StatusOrder::where('id', $id)->first();
            if ($statusOrder) {
                $data = [
                    'id' => $statusOrder['id'],
                    'name' => $statusOrder['name']
                ];
                return response()->json([
                    'message' => 'success',
                    'statusOrder' => $data
                ], 200);
            } else {
                return response()->json([
                    'message' => 'succes',
                    'service' => 'No data yet'
                ], 200);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
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
    public function update(StatusOrderRequest $statusOrderRequest, $id)
    {
        try {
            $statusOrder = StatusOrder::find($id);
            $statusOrder->name = $statusOrderRequest['name'];
            $update = $statusOrder->save();

            if ($update) {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $statusOrder = StatusOrder::find($id)->delete();
            if ($statusOrder) {
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
