<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdeasisLike;

class IdeasislikeController extends Controller
{
    //
    public function storeLike(Request $request)

        {
           
            $id_user =  auth()->user()->id;
               
            // Periksa apakah user sudah menyukai ide ini
            $existingLike = IdeasisLike::where('id', $request->id)
                ->where('user', $id_user)
                ->first();

            if ($existingLike) {
                // Jika sudah like, hapus like (toggle functionality)
                $existingLike->delete();
                return response()->json(['message' => 'Like removed']);
            }

            // Tambahkan like baru
            IdeasisLike::create([
                'id' => $request->id_post,
                'user' => $id_user,
            ]);
            
            return redirect()->back()->with('success', 'Like added successfully!');
    
}



// public function toggleLike(Request $request)
// {
//     $userId = auth()->id(); // ID user yang login
//     $ideaId = $request->id;

//     // Cek apakah user sudah menyukai postingan ini
//     $existingLike = IdeasisLike::where('id', $ideaId)->where('user', $userId)->first();

//     if ($existingLike) {
//         // Jika sudah ada, hapus Like
//         $existingLike->delete();
//         return response()->json(['message' => 'Like dihapus']);
//     } else {
//         // Jika belum ada, tambahkan Like
//         IdeasisLike::create([
//             'id' => $ideaId,
//             'user' => $userId,
//             'created_date' => now(),
//         ]);
//         return response()->json(['message' => 'Like disimpan']);
//     }
// }


}
