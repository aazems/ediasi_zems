<?php

namespace App\Http\Controllers;

use App\Models\Ideasis;
use Illuminate\Http\Request;

use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IdeasisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
       

        $id_user = auth()->user()->id; 
        $ideasis = Ideasis::join('users', 'ideasis.slug', '=', 'users.id')
        ->select('ideasis.*', 'users.name as user_name', 'users.profile_picture as user_image')
        ->get();
        $ideasis = Ideasis::where('slug', $id_user)->get(); 
 
        $profile = User::find($id_user);
        return view('dashboard',compact('profile','ideasis'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    public function myideasi()
    {
        if(Auth::check()){

        $id_user = auth()->user()->id; 
        $ideasis = Ideasis::join('users', 'ideasis.slug', '=', 'users.id')
        ->select('ideasis.*', 'users.name as user_name', 'users.profile_picture as user_image')
        ->where('ideasis.slug', $id_user)
        ->get();

        $profile = User::find($id_user);
        return view('Stories\mystories',compact('profile','ideasis'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){

        $id_user =  auth()->user()->id;
        $profile = User::find($id_user);
        $ideasis = Ideasis::all();
        
        return view('stories\Createideasi',compact('profile','ideasis'));

        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $id_user =  auth()->user()->id;
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content' => 'required|string',
            'content_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8024',
            'slug' => 'nullable|string|max:255',
            'redirect_link' => 'nullable|string|max:255',
            'slug'=> 'nullable|string',
        ]);

        $imagePath = null;
        $imageName = null;


        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->extension(); // Membuat nama file unik
            $request->file('image')->move(public_path('images/stories'), $imageName); // Memindahkan file ke folder public/images
            $imagePath = 'stories/'.$imageName; // Menyimpan path file
        }

          
        $ideasi = Ideasis::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'subtitle' => $request->subtitle,
            'subtitle_en' => $request->subtitle_en,
            'content' => $request->content,
            'content_en' => $request->content_en,
            'image' => $imageName, // Menggunakan path yang benar
            'redirect_link' => $request->redirect_link,
            'slug' => $id_user,

        ]);

       

        return redirect()->route('my.ideasi')->with('success', 'Idea successfully created.');

       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(Auth::check()){
        // $ideasis = Ideasis::findOrFail($id);
        $id_user =  auth()->user()->id;
        $profile = User::find($id_user);

        $ideasis = Ideasis::join('users', 'ideasis.slug', '=', 'users.id')
        ->select('ideasis.*', 'users.name as user_name', 'users.profile_picture as user_image')
        ->where('ideasis.id', $id)
        ->first();
        
        
        return view('Stories\Mystoriesshow', compact('ideasis','profile'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
   
    public function show2($id)
    {
        if(Auth::check()){
        // $ideasis = Ideasis::findOrFail($id);
        $id_user =  auth()->user()->id;
        $profile = User::find($id_user);

        $ideasis = Ideasis::join('users', 'ideasis.slug', '=', 'users.id')
        ->select('ideasis.*', 'users.name as user_name', 'users.profile_picture as user_image')
        ->where('ideasis.id', $id)
        ->first();

        return view('Stories\Mystoriesshow2', compact('ideasis','profile'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(Auth::check()){
            $ideasis = Ideasis::findOrFail($id);
            $id_user =  auth()->user()->id;
            $profile = User::find($id_user);
    
        return view('Stories\Editideasi',  compact('ideasis','profile'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $ideasis = Ideasis::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content' => 'required|string',
            'content_en' => 'required|string',
            'is_approved' => 'nullable|in:0,1',
            'is_share' => 'nullable|in:0,1',
            'slug' => 'nullable|string|max:255',
        ]);

        $id_user =  auth()->user()->id;
        $imagePath = null;
        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->extension(); // Membuat nama file unik
            $request->file('image')->move(public_path('images/stories'), $imageName); // Memindahkan file ke folder public/images
            $imagePath = 'stories/'.$imageName; // Menyimpan path file
        }

       $data =  $ideasis->update([
            'title' => $request->input('title'),
            'title_en' => $request->input('title_en'),
            'subtitle' => $request->input('subtitle'),
            'subtitle_en' => $request->input('subtitle_en'),
            'content' => $request->input('content'),
            'content_en' => $request->input('content_en'),
            'image' => $imageName,
            'redirect_link' => $request->input('redirect_link'),
            'slug'=> $id_user,
        ]);
         
        return redirect()->route('my.ideasi')->with('success', 'Idea successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
    
        $ideasis_del = Ideasis::find($id);
        if ($ideasis_del) {
         
            $ideasis_del->delete();
            $id_user =  auth()->user()->id;
            $profile = User::find($id_user);
            $ideasis = Ideasis::all();
            return view('stories\mystories',compact('profile','ideasis'));
        }
        return redirect()->route('ideasis.index')->withError('Data tidak ditemukan.');
    }
}
