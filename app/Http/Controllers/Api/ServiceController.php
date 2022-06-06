<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Laundry;
use App\Models\Service;
use App\Models\ServiceList;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $services = Service::orderBy('id', 'asc')->get();
            $datum = [];
            foreach ($services as $service) {
                $laundryName = Laundry::where('id', $service['laundry_id'])->first()->name;
                $serviceListName = ServiceList::where('id', $service['service_list_id'])->first()->name;
                array_push($datum, [
                    'id' => $service['id'],
                    'laundry_name' => $laundryName,
                    'service_list_id' => $serviceListName,
                    'price' => $service['price'],
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
                    'services' => 'no service available yet'
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
    public function store(ServiceRequest $serviceRequest)
    {
        try {
            $data = Service::create([
                'laundry_id' => $serviceRequest['laundry_id'],
                'service_list_id' => $serviceRequest['service_list_id'],
                'price' => $serviceRequest['price']
            ]);

            if ($data) {
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
            $service = Service::where('id', $id)->first();
            if ($service) {
                $laundryName = Laundry::where('id', $service['laundry_id'])->first()->name;
                $serviceListName = ServiceList::where('id', $service['service_list_id'])->first()->name;
                $data = [
                    'id' => $service['id'],
                    'laundryName' => $laundryName,
                    'serviceListName' => $serviceListName,
                    'price' => $service['price']
                ];
                return response()->json([
                    'message' => 'success',
                    'service' => $data
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
    public function update(ServiceRequest $serviceRequest, $id)
    {
        try {
            $service = Service::find($id);
            $service->laundry_id = $serviceRequest['laundry_id'];
            $service->service_list_id = $serviceRequest['service_list_id'];
            $service->price = $serviceRequest['price'];
            $update = $service->save();

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
            $service = Service::find($id)->delete();
            if ($service) {
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
