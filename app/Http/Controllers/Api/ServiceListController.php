<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceListRequest;
use App\Models\ServiceList;
use Exception;
use Illuminate\Http\Request;

class ServiceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $serviceLists = ServiceList::orderBy('id', 'asc')->get();
            $datum = [];

            foreach ($serviceLists as $serviceList) {
                array_push($datum, [
                    'id' => $serviceList['id'],
                    'name' => $serviceList['name']
                ]);
            }
            return response()->json([
                'message' => 'success',
                'service_list' => $datum
            ], 200);
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
    public function store(ServiceListRequest $serviceListRequest)
    {
        try {
            $data = ServiceList::create([
                'name' => strtolower($serviceListRequest['name']),
            ]);

            if ($data) {
                return response()->json([
                    'message' => 'success',
                    'serviceList' => strtolower($serviceListRequest['name'])
                ], 201);
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
            $serviceList = ServiceList::where('id', $id)->first();
            if ($serviceList) {
                $data = [
                    'id' => $serviceList['id'],
                    'name' => $serviceList['name']
                ];
                return response()->json([
                    'message' => 'success',
                    'serviceList' => $data
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
    public function update(ServiceListRequest $serviceListRequest, $id)
    {
        try {
            $serviceList = ServiceList::find($id);
            $serviceList->name = strtolower($serviceListRequest['name']);
            $update = $serviceList->save();

            if ($update) {
                return response()->json([
                    'message' => 'success',
                    'serviceList' => $serviceList->name,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'fail'
                ], 400);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' =>  $exception->getMessage()
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
            $serviceList = ServiceList::find($id)->delete();
            if ($serviceList) {
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
                'message' =>  $exception->getMessage()
            ], 400);
        }
    }
}
