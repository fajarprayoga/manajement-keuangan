<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $topics = Topic::all();
            return $this->responseMessage($topics, 'Sukses');
        } catch (\Throwable $th) {
            return $this->responseMessage($th->getTraceAsString(), $th->getMessage(), 400);
            //throw $th;
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
                'address' => 'required',
                'contact' => 'required'
            ]);

            $topic = Topic::create($validated->validate());
            //code...
            return $this->responseMessage($topic, 'Topic berhasil ditambahkan');
        } catch (\Throwable $th) {
            return $this->responseMessage($th->getTraceAsString(), $th->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $topics = Topic::with('transactions')->get();
            return $this->responseMessage($topics, 'Sukses');
        } catch (\Throwable $th) {
            return $this->responseMessage($th->getTraceAsString(), $th->getMessage(), 400);
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        try {
            $validated = Validator::make($request->all(), [
                'name' => 'required',
                'address' => 'required',
                'contact' => 'required'
            ]);


            $topic = Topic::find($id)->update($request->all());

            // return response()->json($topic, 200);
            return $this->responseMessage($topic, 'Update berhasil');
        } catch (\Throwable $th) {
            return $this->responseMessage($th->getTraceAsString(), $th->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::find($id)->delete();
        try {
            if ($topic) {
                return $this->responseMessage($topic, 'Data dihapus');
            } else {
                return $this->responseMessage($topic, 'Data gagal dihapus', 400);
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
