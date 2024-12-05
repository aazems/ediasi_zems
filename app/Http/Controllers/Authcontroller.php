<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class Authcontroller extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
   public function index(): View
   {
       return view('login');
   }  
    
     /**
     * Write code on Method
     *
     * @return response()
     */

 

public function postLogin(Request $request): RedirectResponse
{

   
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);
    


    $credentials = $request->only('email', 'password');


    if (Auth::attempt($credentials)) {
        return redirect()->intended('dashboard')
                    ->withSuccess('You have successfully loggedin');
    }

    return redirect("login")->withError('Opps! You have entered invalid credentials');
}

public function registration(): View
{
    return view('registration');
}
  
public function postRegistration(Request $request): RedirectResponse
    {  

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|ends_with:@edi-indonesia.co.id|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.ends_with' => 'Email harus menggunakan domain @edi-indonesia.co.id.',
            'email.unique' => 'Email sudah terdaftar.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Buat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' =>'active'
        ]);
    
        // Redirect ke halaman sukses atau login
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }


    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
    
    
    public function profile()
    {
        if(Auth::check()){
            
            $id =  auth()->user()->id;
            $profile = User::find($id);
            
       
            return view('Profile',compact('profile'));
      
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    
    public function updateprofile(Request $request)
{
    $user = Auth::user(); // Mendapatkan user yang sedang login

    // Validasi gambar
    $request->validate([
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);


    $imagePath = null;
    $imageName = null;

    if ($request->hasFile('profile_picture')) {
        $imageName = time().'.'.$request->file('profile_picture')->extension(); // Membuat nama file unik
        $request->file('profile_picture')->move(public_path('images/profile'), $imageName); // Memindahkan file ke folder public/images
        $imagePath = 'images/profile/'.$imageName; // Menyimpan path file
        $user->profile_picture = $imageName;
    }


    $user->save();

    return redirect()->back()->with('success', 'Photo Profile updated successfully.');
  }



public function updatedataProfile(Request $request)
{
    // Validasi input
    $request->validate([
        'username' => 'required|string|max:255',
        'role' => 'required|string|in:Administration,Super Admin', // Sesuaikan dengan opsi yang ada
        'divisi' => 'required|string|in:Corporate Secretariat,Human Resource,Legal,General Affair,Finance,Management,Staff,IT Support,Front Office', // Sesuaikan dengan opsi yang ada
    ]);

    // Ambil data pengguna yang sedang login
    $user = Auth::user();

    if ($user) {
        
        $user->update([
            'name' => $request->input('username'),
            'role' => $request->input('role'),
            'divisi' => $request->input('divisi'),
            'status' => $request->input('status'),
        ]);

   

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data Profile has been changes.');
    }

    return redirect("login")->withSuccess('Opps! You do not have access');
    }


    public function password()
    {
        if(Auth::check()){
            
            $id =  auth()->user()->id;
            $profile = User::find($id);
            
    
            return view('Changepass',compact('profile'));
      
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    


    public function Neighborhood()
    {
        if(Auth::check()){
            
            $id =  auth()->user()->id;
            $profile = User::find($id);
            
            $neighbors = User::where('id', '<>', $id)->get();

            return view('Neighborhood', compact('profile', 'neighbors'));
      
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function changePassword(Request $request)
    {
    // Validasi input
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    // Periksa apakah password lama cocok
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('error', 'Password lama tidak sesuai.');
    }

    // Update password
    $user->update([
        'password' => Hash::make($request->new_password),
    ]);

    return back()->with('success', 'Password berhasil diubah.');
}

     

}