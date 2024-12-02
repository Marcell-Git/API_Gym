<?php

namespace App\Http\Controllers;

use App\Models\PersonalTrainer;
use Illuminate\Http\Request;

class PersonalTrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $personalTrainer = PersonalTrainer::all();
            return response()->json([
                'status' => 'success',
                'data' => $personalTrainer
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
            $personalTrainer = PersonalTrainer::create($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $personalTrainer
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
    public function show(PersonalTrainer $personalTrainer)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $personalTrainer
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
    public function update(Request $request, PersonalTrainer $personalTrainer)
    {
        try{
            $personalTrainer->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $personalTrainer
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
    public function destroy(PersonalTrainer $personalTrainer)
    {
        try {
            $personalTrainer->delete();
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
