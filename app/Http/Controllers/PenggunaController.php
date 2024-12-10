<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


class PenggunaController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Enkripsi kata sandi sebelum menyimpan
        $data = $request->all();
        $data['kataSandi'] = Hash::make($request->kataSandi);

        // Simpan data pengguna
        $pengguna = Pengguna::create($data);

        return response()->json([
            'status' => 'success',
            'data' => $pengguna,
        ], 201);

    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaPengguna' => 'required|string',
            'kataSandi' => 'required|string',
        ]);

        $user = Pengguna::where('namaPengguna', $request->namaPengguna)->first();

        // Autentikasi pengguna
        if ($user && Hash::check($request->kataSandi, $user->kataSandi)) {

            $token = $user->createToken('Personal Access Token')->plainTextToken;

            return response()->json([
                'data' => $user,
                'token' => $token
                ], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function me(Request $request)
{
    try {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token tidak cocok dengan pengguna mana pun.',
                'debug' => [
                    'token' => $request->header('Authorization'),
                ],
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $user,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ], 500);
    }
}

    public function update(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Token tidak cocok dengan pengguna mana pun.',
                ], 404);
            }
            $validatedData = $request->validate([
                'namaPengguna' => 'string|max:255',
                'nomorIdentitas' => 'string|max:255',
                'jenisKelamin' => 'string|max:255',
                'umur' => 'integer|min:1|max:150',
                'email' => 'email|max:255',
                'nomorTelepon' => 'string|max:15',
                'kataSandi' => 'string|min:6|nullable',
            ]);
            if ($request->has('kataSandi') && $request->kataSandi) {
                $validatedData['kataSandi'] = Hash::make($request->kataSandi);
            }
            
            $user->update($validatedData);

            return response()->json([
                'status' => 'success',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

public function logout(Request $request)
    {
        try {
            $user = $request->user();
            if ($user) {
                $user->currentAccessToken()->delete();            }

            return response()->json([
                'status' => 'success',
                'message' => 'Logout berhasil.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


}

