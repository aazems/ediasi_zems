<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\ideasis;
use App\Models\ideasiscomment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DashboardController extends Controller
{
   
    public function dashboard()
    {
        if(Auth::check()){
            // $ideasis = Ideasis::all();
            $id_user =  auth()->user()->id;
            $profile = User::find($id_user);

            // $ideasis = Ideasis::join('users', 'ideasis.slug', '=', 'users.id')
            // ->select('ideasis.*', 'users.name as user_name', 'users.profile_picture as user_image')
            // ->get();

            // $ideasis = Ideasis::join('users', 'ideasis.slug', '=', 'users.id')
            // ->leftJoin('ideasis_comment', 'ideasis.id', '=', 'ideasis_comment.id') // Gabungkan dengan tabel komentar
            // ->select(
            //     'ideasis.*',
            //     'users.name as user_name',
            //     'users.profile_picture as user_image',
            //     DB::raw('COUNT(ideasis_comment.id_comment) as comment_count') // Hitung jumlah komentar
            // )
            // ->groupBy('ideasis.id', 'users.name', 'users.profile_picture', 'ideasis.title', 'ideasis.slug', 'ideasis.created_at') // Kelompokkan berdasarkan kolom yang diambil
            // ->get();

            $ideasis = Ideasis::join('users', 'ideasis.slug', '=', 'users.id')
            ->leftJoin('ideasis_comment', 'ideasis.id', '=', 'ideasis_comment.id')  // Menggabungkan dengan tabel komentar
            ->leftJoin('ideasis_like', 'ideasis.id', '=', 'ideasis_like.id')  // Menggabungkan dengan tabel like
            ->select(
                'ideasis.*',
                'users.name as user_name',
                'users.profile_picture as user_image',
                DB::raw('COUNT(DISTINCT ideasis_comment.id_comment) as comment_count'),  // Menghitung jumlah komentar yang unik
                DB::raw('COUNT(DISTINCT ideasis_like.id_like) as like_count')  // Menghitung jumlah like yang unik
            )
            ->groupBy(
                'ideasis.id', 
                'users.name', 
                'users.profile_picture', 
                'ideasis.title', 
                'ideasis.slug', 
                'ideasis.created_at'
            )  // Kelompokkan berdasarkan kolom yang diambil
            ->get();

           
            $comments = IdeasisComment::join('ideasis', 'ideasis_comment.id', '=', 'ideasis.id')
                ->join('users', 'ideasis_comment.user', '=', 'users.id') // Join dengan tabel users
                ->where('ideasis.slug', $id_user) // Filter berdasarkan user yang login
                ->select(
                    'ideasis_comment.*',
                    'ideasis.title as idea_title',
                    'users.profile_picture as image',
                    'users.name as comentator_name'
                )
                ->get();


                $notif = DB::table('ideasis_comment')
                ->join('ideasis', 'ideasis_comment.id', '=', 'ideasis.id')
                ->join('users', 'ideasis_comment.user', '=', 'users.id')
                ->where('ideasis.slug', $id_user)
                ->select(
                    DB::raw("'comment' as type"),
                    'ideasis_comment.id_comment as action_id',
                    'ideasis_comment.comment as content',
                    'ideasis_comment.created_date',
                    'users.name as actor_name',
                    'users.profile_picture as actor_image'
                )
                ->unionAll(
                    DB::table('ideasis_like')
                        ->join('ideasis', 'ideasis_like.id', '=', 'ideasis.id')
                        ->join('users', 'ideasis_like.user', '=', 'users.id')
                        ->where('ideasis.slug', $id_user)
                        ->select(
                            DB::raw("'like' as type"),
                            'ideasis_like.id_like as action_id',
                            DB::raw('NULL as content'),
                            'ideasis_like.created_date',
                            'users.name as actor_name',
                            'users.profile_picture as actor_image'
                        )
                )
                ->orderBy('created_date', 'DESC')
                ->get();
           
            return view('dashboard', compact('profile','ideasis','comments','notif'));
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    public function overview()
    {
        if(Auth::check()){
            // $ideasis = Ideasis::all();
            $id_user =  auth()->user()->id;
            $profile = User::find($id_user);

            $ideasis = Ideasis::join('users', 'ideasis.slug', '=', 'users.id')
            ->select('ideasis.*', 'users.name as user_name', 'users.profile_picture as user_image')
            ->get();

            $totals = [
                'total_users' => DB::table('users')->count(),
                'total_ideasis' => DB::table('ideasis')->count(),
                'total_comments' => DB::table('ideasis_comment')->count(),
                'total_likes' => DB::table('ideasis_like')->count(),
            ];

            
            return view('overview', compact('profile','ideasis','totals'));
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    public function Message()
    {
        if(Auth::check()){
            // $ideasis = Ideasis::all();
            $id_user =  auth()->user()->id;
            $profile = User::find($id_user);

            $ideasis = Ideasis::join('users', 'ideasis.slug', '=', 'users.id')
            ->select('ideasis.*', 'users.name as user_name', 'users.profile_picture as user_image')
            ->get();


            $comments = DB::table('ideasis_comment')
            ->join('ideasis', 'ideasis.id', '=', 'ideasis_comment.id')
            ->join('users', 'users.id', '=', 'ideasis_comment.user')
            ->where('ideasis.slug', $id_user) // Menggunakan slug dari user yang sedang login
            ->select('ideasis_comment.id as comment_id', 
                    'ideasis_comment.comment', 
                    'ideasis_comment.created_date', 
                    'users.name as commentator_name', 
                    'users.profile_picture as image', 
                    'ideasis.title as idea_title',
                    'ideasis.content as content',
                    'ideasis.slug as idea_slug')
            ->get();
            
            
            
            return view('message', compact('profile','ideasis','comments'));
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }



}
