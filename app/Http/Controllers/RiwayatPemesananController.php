<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPemesanan;
use Illuminate\Http\Request;

class RiwayatPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $riwayatPemesanan = RiwayatPemesanan::all();
            return response()->json([
                'status' => 'success',
                'data' => $riwayatPemesanan
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
            $riwayatPemesanan = RiwayatPemesanan::create($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $riwayatPemesanan
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
    public function show(RiwayatPemesanan $riwayatPemesanan)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $riwayatPemesanan
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
    public function update(Request $request, RiwayatPemesanan $riwayatPemesanan)
    {
        try{
            $riwayatPemesanan->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $riwayatPemesanan
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
    public function destroy(RiwayatPemesanan $riwayatPemesanan)
    {
        try {
            $riwayatPemesanan->delete();
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
