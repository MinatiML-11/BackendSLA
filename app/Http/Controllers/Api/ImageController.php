<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\ImageModel;
use Exception;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $images = ImageModel::orderBy('id', 'asc')->get();
            $datum = [];
            foreach ($images as $image) {
                array_push($datum, [
                    'id' => $image['id'],
                    'order_id' => $image['order_id'],
                    'image_name' => $image['image_name'],
                    'path' => '/images' . '/' . $image['image_name'],
                ]);
            }

            if (sizeof($datum) > 0) {
                return response()->json([
                    'message' => 'success',
                    'images' => $datum
                ], 200);
            } else {
                return response()->json([
                    'message' => 'success',
                    'images' => 'No image yet'
                ], 200);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 200);
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
    public function store(ImageRequest $imageRequest)
    {
        try {
            if ($imageRequest->hasFile('image_name')) {
                $imageName = time() . $imageRequest['image_name']->hashName();
                $imagePath = public_path('/images');
                $smallImage = Image::make($imageRequest['image_name']->path());
                $smallImage->resize(500, 500, function ($const) {
                    $const->aspectRatio();
                })->save($imagePath . '/' . $imageName);

                $addImages = ImageModel::create([
                    'order_id' => $imageRequest['order_id'],
                    'image_name' => $imageName
                ]);

                if ($addImages) {
                    return response()->json([
                        'message' => 'success'
                    ], 201);
                } else {
                    return response()->json([
                        'message' => 'fail'
                    ], 400);
                }
            } else {
                return response()->json([
                    'message' => 'failed',
                    'note' => 'require image file'
                ], 400);
            }
            return response()->json([
                'message' => $imageRequest->hasFile('image_name'),
                'test' => 1
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
        try {
            $image = ImageModel::where('id', $id)->first();
            if ($image) {
                $data = [
                    'id' => $image['id'],
                    'order_id' => $image['order_id'],
                    'image_name' => $image['image_name'],
                    'path' => '/images' . '/' . $image['image_name'],
                ];
                return response()->json([
                    'message' =>  'success',
                    'images' => $data
                ], 200);
            } else {
                return response()->json([
                    'message' =>  'success',
                    'images' => 'No image data availabe yet'
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
    public function update(ImageRequest $imageRequest, $id)
    {
        try {
            $image = ImageModel::where('id', $id)->first();
            $imageName = $image['image_name'];
            $updateImage = ImageModel::find($id);

            if ($imageRequest->hasFile('image_name')) {
                unlink(public_path("images/{$image['image_name']}"));

                $imageName = time() . $imageRequest['image_name']->hashName();
                $imagePath = public_path('/images');
                $smallImage = Image::make($imageRequest['image_name']->path());
                $smallImage->resize(500, 500, function ($const) {
                    $const->aspectRatio();
                })->save($imagePath . '/' . $imageName);
            }

            $updateImage->order_id = $image['order_id'];
            $updateImage->image_name = $imageName;
            $updated = $updateImage->save();

            if ($updated) {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $image = ImageModel::where('id', $id)->first();
            $imageName = $image['image_name'];
            $deleteImage = ImageModel::find($id)->delete();
            if ($deleteImage) {
                if (Storage::exists(public_path("images/{$imageName}"))) {
                    unlink(public_path("images/{imageName}"));
                }
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
