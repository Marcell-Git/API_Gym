<?php

namespace App\Http\Controllers;

use App\Models\KelasOlahraga;
use Illuminate\Http\Request;

class KelasOlahragaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $kelasOlahraga = KelasOlahraga::all();
            return response()->json([
                'status' => 'success',
                'data' => $kelasOlahraga
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
            $kelasOlahraga = KelasOlahraga::create($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $kelasOlahraga
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
    public function show(KelasOlahraga $kelasOlahraga)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $kelasOlahraga
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
    public function update(Request $request, KelasOlahraga $kelasOlahraga)
    {
        try{
            $kelasOlahraga->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $kelasOlahraga
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
    public function destroy(KelasOlahraga $kelasOlahraga)
    {
        try {
            $kelasOlahraga->delete();
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
