<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $transactions = Transaction::all();
            return response()->json($transactions, 200);
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
                // 'user_id' => 'required', // Add more fields as needed.
                'category_id' => 'required',
                'topic_id' => 'required',
                // 'transaction_date' => 'required',
                'amount' => 'required',
                'type' => 'required|string|in:income,expense',
                'description' => 'required',
            ]);

            $data = [...$validated->validate(), 'user_id' => Auth::user()->id, 'transaction_date' => Carbon::now()];

            $transaction = Transaction::create($data);
            //code...
            return $this->responseMessage($transaction, 'Transactions berhasil ditambahkan');
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
                // 'user_id' => 'required', // Add more fields as needed.
                'category_id' => 'required',
                'topic_id' => 'required',
                // 'transaction_date' => 'required',
                'amount' => 'required',
                'type' => 'required|string|in:income,expense',
                'description' => 'required',
            ]);

            $data = [...$validated->validate(), 'user_id' => Auth::user()->id, 'transaction_date' => Carbon::now()];

            $transaction = Transaction::find($id)->update($data);
            //code...
            return $this->responseMessage($transaction, 'Transactions berhasil ditambahkan');
        } catch (\Throwable $th) {
            return $this->responseMessage($th->getTraceAsString(), $th->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::find($id)->delete();
        try {
            if ($transaction) {
                return $this->responseMessage($transaction, 'Data dihapus');
            } else {
                return $this->responseMessage($transaction, 'Data gagal dihapus', 400);
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
