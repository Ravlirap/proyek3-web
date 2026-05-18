<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /** Helper: kembalikan URL foto atau null */
    private function photoUrl(?string $path): ?string
    {
        return $path ? asset('storage/' . $path) : null;
    }

    // ──────────────────────────────────────────────────────────────────
    // R  – Tampil profile (nama, email, foto)
    // GET /api/profile
    // ──────────────────────────────────────────────────────────────────
    public function index(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'id'        => $user->id,
            'name'      => $user->name,
            'email'     => $user->email,
            'photo_url' => $this->photoUrl($user->photo),
        ]);
    }

    // ──────────────────────────────────────────────────────────────────
    // U  – Update nama / email (opsional ganti password)
    // PUT /api/profile
    // ──────────────────────────────────────────────────────────────────
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name'                  => ['sometimes', 'string', 'max:100'],
            'email'                 => ['sometimes', 'email', 'max:150', 'unique:users,email,' . $user->id],
            'password'              => ['sometimes', 'string', 'min:6', 'confirmed'],
            'current_password'      => ['required_with:password', 'string'],
        ]);

        // Kalau mau ganti password, verifikasi dulu password lama
        if (isset($validated['password'])) {
            if (!Hash::check($validated['current_password'], $user->password)) {
                return response()->json([
                    'message' => 'Password lama tidak sesuai',
                ], 422);
            }
            $user->password = Hash::make($validated['password']);
        }

        if (isset($validated['name']))  $user->name  = $validated['name'];
        if (isset($validated['email'])) $user->email = $validated['email'];

        $user->save();

        return response()->json([
            'message'   => 'Profile berhasil diupdate',
            'id'        => $user->id,
            'name'      => $user->name,
            'email'     => $user->email,
            'photo_url' => $this->photoUrl($user->photo),
        ]);
    }

    // ──────────────────────────────────────────────────────────────────
    // C  – Upload / tambah foto profile
    // POST /api/profile/photo
    // ──────────────────────────────────────────────────────────────────
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = $request->user();

        // Hapus foto lama kalau sudah ada
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $path = $request->file('photo')->store('profile_photos', 'public');

        $user->photo = $path;
        $user->save();

        return response()->json([
            'message'   => 'Foto profile berhasil diupload',
            'photo_url' => $this->photoUrl($path),
        ], 201);
    }

    // ──────────────────────────────────────────────────────────────────
    // U  – Update / ganti foto profile
    // POST /api/profile/photo/update  (pakai POST karena multipart)
    // ──────────────────────────────────────────────────────────────────
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = $request->user();

        // Hapus foto lama
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $path = $request->file('photo')->store('profile_photos', 'public');

        $user->photo = $path;
        $user->save();

        return response()->json([
            'message'   => 'Foto profile berhasil diupdate',
            'photo_url' => $this->photoUrl($path),
        ]);
    }

    // ──────────────────────────────────────────────────────────────────
    // D  – Hapus foto profile
    // DELETE /api/profile/photo
    // ──────────────────────────────────────────────────────────────────
    public function deletePhoto(Request $request)
    {
        $user = $request->user();

        if (!$user->photo) {
            return response()->json([
                'message' => 'Tidak ada foto untuk dihapus',
            ], 404);
        }

        if (Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->photo = null;
        $user->save();

        return response()->json([
            'message' => 'Foto profile berhasil dihapus',
        ]);
    }
}