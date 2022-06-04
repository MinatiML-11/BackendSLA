<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LaundryRequest;
use App\Models\Laundry;
use Exception;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $laundries = Laundry::orderBy('id', 'asc')->get();
            $data = [];
            if ($laundries) {
                foreach ($laundries as $laundry) {
                    array_push($data, [
                        'id' => $laundry['id'],
                        'owner' => $laundry->user['name'],
                        'name' => $laundry['name'],
                        'address' => $laundry['address'],
                        'longlat' => $laundry['longlat']
                    ]);
                }
            }
            return response()->json([
                'message' => 'success',
                'laundries' => $data
            ], 400);
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
    public function store(LaundryRequest $laundryRequest)
    {
        try {
            $data = Laundry::create([
                'user_id' => $laundryRequest['user_id'],
                'name' => $laundryRequest['name'],
                'address' => $laundryRequest['address'],
                'longlat' => $laundryRequest['longlat']
            ]);
            if ($data) {
                return response()->json([
                    'message' => 'success',
                    'name' => $laundryRequest['name']
                ], 200);
            } else {
                return response()->json([
                    'message' => 'fail',
                ], 400);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
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
            if ($id) {
                $laundry = Laundry::where('id', $id)->first();
                if ($laundry) {
                    $data = [
                        'id' => $laundry['id'],
                        'owner' => $laundry->user['name'],
                        'name' => $laundry['name'],
                        'address' => $laundry['address'],
                        'longlat' => $laundry['longlat']
                    ];

                    return response()->json([
                        'message' => 'success',
                        'laundry' => $data,
                    ]);
                } else {
                    return response()->json([
                        'message' => 'no data provided'
                    ]);
                }
            } else {
                return response()->json([
                    'message' => 'no data provided'
                ]);
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
    public function update(LaundryRequest $laundryRequest, $id)
    {
        try {
            $laundry = Laundry::find($id);

            $laundry->user_id = $laundryRequest['user_id'];
            $laundry->name = $laundryRequest['name'];
            $laundry->address = $laundryRequest['address'];
            $laundry->longlat = $laundryRequest['longlat'];
            $update = $laundry->save();

            if ($update) {
                return response()->json([
                    'message' => 'success',
                    'laundry' => $laundryRequest['name']
                ]);
            } else {
                return response()->json([
                    'message' => 'fail'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
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
            $laundry = Laundry::find($id)->delete();
            if ($laundry) {
                return response()->json([
                    'message' =>  'success'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'fail'
                ], 400);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 400);
        }
    }
}
