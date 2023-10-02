<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::all();
            return response()->json($categories, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required'
            ]);

            $category = Category::create($validated->validate());
            //code...
            return $this->responseMessage($category, 'Kategori berhasil ditambahkan');
        } catch (\Throwable $th) {
            return $this->responseMessage($th->getTraceAsString(), $th->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required'
            ]);


            $category = Category::find($id)->update($request->all());

            // return response()->json($topic, 200);
            return $this->responseMessage($category, 'Update berhasil');
        } catch (\Throwable $th) {
            return $this->responseMessage($th->getTraceAsString(), $th->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id)->delete();
        try {
            if ($category) {
                return $this->responseMessage($category, 'Data dihapus');
            } else {
                return $this->responseMessage($category, 'Data gagal dihapus', 400);
            }
        } catch (\Throwable $th) {
            return $this->responseMessage($th->getTraceAsString(), $th->getMessage(), 400);
        }
    }

    function responseMessage($data = [], $message = '', $code = 200)
    {
        $response = [
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, $code);
    }
}
