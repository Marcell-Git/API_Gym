<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pembayaran = Pembayaran::all();
            return response()->json([
                'status' => 'success',
                'data' => $pembayaran
            ], status: 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], status: 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $pembayaran = Pembayaran::create($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $pembayaran
            ], status: 201); 
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], status: 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $pembayaran
            ], status: 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], status: 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        try{
            $pembayaran->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $pembayaran
            ], status: 200); 
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], status: 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        try {
            $pembayaran->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ], status: 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], status: 400);
        }
    }
}
