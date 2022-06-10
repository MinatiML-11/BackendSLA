<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClothesRequest;
use App\Models\Clothes;
use Exception;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $clothes = Clothes::orderBy('id', 'asc')->get();
            $datum = [];
            foreach ($clothes as $cloth) {
                array_push($datum, [
                    'id' => $cloth['id'],
                    'item_id' => $cloth['item_id'],
                    'item_description' => $cloth['item_description']
                ]);
            }

            if (sizeof($datum) > 0) {
                return response()->json([
                    'messasge' => 'success',
                    'clothes' => $datum
                ], 200);
            } else {
                return response()->json([
                    'message' => 'success',
                    'clothes' => 'No data available yet'
                ], 200);
            }
        } catch (Exception $exception) {
            return response()->json([
                'mmessage' => $exception->getMessage()
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
    public function store(ClothesRequest $clothesRequest)
    {
        try {
            $clothes = Clothes::create([
                'item_id' => $clothesRequest['item_id'],
                'item_description' => $clothesRequest['item_description']
            ]);
            if ($clothes) {
                return response()->json([
                    'message' => 'success',
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
            $cloth = Clothes::where('id', $id)->first();
            if ($cloth) {
                $data = [
                    'id' => $cloth['id'],
                    'item_id' => $cloth['item_id'],
                    'item_description' => $cloth['item_description']
                ];
                return response()->json([
                    'message' => 'success',
                    'cloth' => $data
                ], 200);
            } else {
                return response()->json([
                    'message' => 'success',
                    'cloth' => 'No data cloth available yet'
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
    public function update(ClothesRequest $clothesRequest, $id)
    {
        try {
            $cloth = Clothes::find($id);
            $cloth['item_id'] = $clothesRequest['item_id'];
            $cloth['item_description'] = $clothesRequest['item_description'];
            $update = $cloth->save();

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
            $cloth = Clothes::find($id)->delete();
            if ($cloth) {
                return response()->json([
                    'message' => 'success',
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
