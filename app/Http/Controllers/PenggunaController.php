<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pengguna = Pengguna::all();
            return response()->json([
                'status' => 'success',
                'data' => $pengguna
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
        try {
            // Enkripsi kata sandi sebelum menyimpan
            $data = $request->all();
            $data['kataSandi'] = bcrypt($request->kataSandi);

            // Simpan data pengguna
            $pengguna = Pengguna::create($data);

            return response()->json([
                'status' => 'success',
                'data' => $pengguna,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 400);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Pengguna $pengguna)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $pengguna
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
    public function update(Request $request, Pengguna $pengguna)
    {
        try{
            $pengguna->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $pengguna
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
    public function destroy(Pengguna $pengguna)
    {
        try {
            $pengguna->delete();
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
    
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaPengguna' => 'required|string',
            'kataSandi' => 'required|string',
        ]);

        // Kredensial login
        $credentials = [
            'namaPengguna' => $request->namaPengguna,
            'password' => $request->kataSandi, // Laravel akan mencocokkan dengan kolom `kataSandi` karena sudah diatur di model
        ];

        // Autentikasi pengguna
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json(['data' => $user], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

}

