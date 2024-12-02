<?php

namespace App\Http\Controllers;

use App\Models\DataPemesanan;
use Illuminate\Http\Request;

class DataPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $dataPemesanan = DataPemesanan::all();
            return response()->json([
                'status' => 'success',
                'data' => $dataPemesanan
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
            $dataPemesanan = DataPemesanan::create($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $dataPemesanan
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
    public function show(DataPemesanan $dataPemesanan)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $dataPemesanan
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
    public function update(Request $request, DataPemesanan $dataPemesanan)
    {
        try{
            $dataPemesanan->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $dataPemesanan
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
    public function destroy(DataPemesanan $dataPemesanan)
    {
        try {
            $dataPemesanan->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data pemesanan berhasil dihapus'
            ], status: 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], status: 400);
        }
    }
}
