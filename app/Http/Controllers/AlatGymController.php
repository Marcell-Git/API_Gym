<?php

namespace App\Http\Controllers;

use App\Models\AlatGym;
use Illuminate\Http\Request;

class AlatGymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $alatGym = AlatGym::all();
            return response()->json([
                'status' => 'success',
                'data' => $alatGym
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
            $alatGym = AlatGym::create($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $alatGym
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
    public function show(AlatGym $alatGym)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $alatGym
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
    public function update(Request $request, AlatGym $alatGym)
    {
        try {
            $alatGym->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $alatGym
            ], status: 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], status: 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlatGym $alatGym)
    {
        try {
            $alatGym->delete();
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
