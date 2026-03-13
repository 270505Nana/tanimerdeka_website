<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\AnggotaTani;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow($idAnggota)
    {
        $user = auth()->user();

        $tani = AnggotaTani::find($idAnggota);
        if (!$tani) {
            return response()->json([
                'message' => 'Anggota tani tidak ditemukan'
            ], 404);
        }

        // cek sudah follow belum
        $exists = Follower::where('follow_from', $user->id_user)
            ->where('follow_to', $idAnggota)
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Sudah follow'
            ], 400);
        }

        Follower::create([
            'follow_from' => $user->id_user,
            'follow_to' => $idAnggota
        ]);

        return response()->json([
            'message' => 'Berhasil follow'
        ]);
    }

    // unfollow supplier
    public function unfollow($idAnggota)
    {
        $user = auth()->user();

        Follower::where('follow_from', $user->id_user)
            ->where('follow_to', $idAnggota)
            ->delete();

        return response()->json([
            'message' => 'Berhasil unfollow'
        ]);
    }

    public function followingSuppliers()
    {
        $data = auth()->user()
            ->followingTani()
            ->get();

        return response()->json($data);
    }

    public function followersSupplier($idAnggota)
    {
        $tani = AnggotaTani::findOrFail($idAnggota);

        return response()->json(
            $tani->followers()->get()
        );
    }
}
