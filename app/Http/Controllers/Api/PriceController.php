<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceRequest;
use App\Models\Clothes;
use App\Models\Laundry;
use App\Models\Price;
use Exception;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $prices = Price::orderBy('id', 'asc')->get();
            $datum = [];
            foreach ($prices as $price) {
                $cloth_name = Clothes::where('id', $price['clothes_id'])->first()->item_description;
                $cloth_code = Clothes::where('id', $price['clothes_id'])->first()->item_id;
                $laundryName = Laundry::where('id', $price['laundry_id'])->first()->name;
                array_push($datum, [
                    'id' => $price['id'],
                    'cloth_name' => $cloth_name,
                    'cloth_code' => $cloth_code,
                    'laundry_name' => $laundryName,
                    'price' => $price['price']
                ]);
            }
            if (sizeof($datum) > 0) {
                return response()->json([
                    'message' => 'success',
                    'services' => $datum
                ], 200);
            } else {
                return response()->json([
                    'message' => 'success',
                    'services' => 'no price list available yet'
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
    public function store(PriceRequest $priceRequest)
    {
        try {
            $data = Price::create([
                'clothes_id' => $priceRequest['clothes_id'],
                'laundry_id' => $priceRequest['laundry_id'],
                'price' => $priceRequest['price']
            ]);
            if ($data) {
                return response()->json([
                    'message' => 'success',
                ], 201);
            } else {
                return response()->json([
                    'mmessage' => 'fail'
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
            $price = Price::where('id', $id)->first();
            if ($price) {
                $cloth_name = Clothes::where('id', $price['clothes_id'])->first()->item_description;
                $cloth_code = Clothes::where('id', $price['clothes_id'])->first()->item_id;
                $laundryName = Laundry::where('id', $price['laundry_id'])->first()->name;
                $data = [
                    'id' => $price['id'],
                    'cloth_name' => $cloth_name,
                    'cloth_code' => $cloth_code,
                    'laundry_name' => $laundryName,
                    'price' => $price['price']
                ];
                return response()->json([
                    'message' => 'success',
                    'price ' => $data
                ], 200);
            } else {
                return response()->json([
                    'message' => 'success',
                    'price ' => 'No price data available yet'
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
    public function update(PriceRequest $priceRequest, $id)
    {
        try {
            $price = Price::find($id);
            $price['clothes_id'] = $priceRequest['clothes_id'];
            $price['laundry_id'] = $priceRequest['laundry_id'];
            $price['price'] = $priceRequest['price'];
            $update = $price->save();

            if ($update) {
                return response()->json([
                    'message' => 'success',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'fail',
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
            $price = Price::find($id)->delete();
            if ($price) {
                return response()->json([
                    'message' => 'success',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'fail',
                ], 400);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
