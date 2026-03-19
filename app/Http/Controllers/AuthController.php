<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelompok_tani;
use App\Models\AnggotaTani;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;
use App\Http\Requests\LoginRequest; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function Beranda(){
        return view ('pages.dashboard');
    }

    public function RegisterPage(){

        // data provinsi diambil namanya trus ascending. bawaan dri laravoltna lngsung
        $provinsi = Province::orderBy('name','asc') -> get();
        return view ('anggota.pages.registration',compact ('provinsi'));
    }

    public function RegisterProcess(Request $request){

        // validation
        $request -> validate([
            'nama_lengkap' => 'required|string|max:50',
            'nik' => 'required|numeric|unique:anggota_tani,nik',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:anggota_tani,email',
            'no_hp' => 'required|numeric',
            'indonesia_village_id' => 'required',
            'alamat_detail' => 'nullable|string|max:250',
            'id_kelompok_tani' => 'nullable',
            'jabatan' => 'nullable|string|max:250',
            'password' => 'nullable|string|min:6',                       
        ]);

        $desa = Village::where('code', $request->indonesia_village_id)->first();

        // create data
        AnggotaTani::create([
            'nama_lengkap' => $request -> nama_lengkap,
            'nik' => $request -> nik,
            'jenis_kelamin' => $request -> jenis_kelamin,
            'email' => $request -> email,
            'no_hp' => $request -> no_hp,
            'indonesia_village_id' => $desa->id,
            'alamat_detail' => $request -> alamat_detail,
            'id_kelompok_tani' => $request->status_kelompok == 'sudah' ? $request->id_kelompok_tani : null,
            'jabatan' => $request->status_kelompok == 'sudah' ? $request->jabatan : null,
            'password' => Hash::make($request->password),
            'role' => 'anggota'  
        ]);

        return redirect()-> route('login')-> with('success','Pendaftaran Anda berhasil! Silahkan login dengan No HP dan password anda.');

    }
    public function LoginPage()
    {
        return view ('pages.login');
    }

    public function LoginProcess(LoginRequest $request)
    {      
        $credentials = $request->only('no_hp', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // crosscheck role. Admin not allowed
            if ($user->role === 'admin') {
                Auth::logout();
                // return message for json. Note: flutter
                if ($request->wantsJson()) {
                    return response()->json([
                        'message' => 'Akun Admin tidak boleh login di sini.'
                    ], 403);
                }

                return back()->withErrors(['no_hp' => 'Akun Admin harap login di portal khusus.']);
            }

            //JSON Flutter
            if ($request->wantsJson()) {
                $token = $user->createToken('mobile_token')->plainTextToken;
                return response()->json([
                    'status' => 'success',
                    'role' => $user->role, 
                    'user' => $user,
                    'token' => $token,
                ]);
            }

            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        if ($request->wantsJson()) {
            return response()->json(['message' => 'No HP atau password anda salah.'], 401);
        }

        return back()->withErrors([
            'no_hp' => 'No HP atau password anda salah.'
        ])->onlyInput('no_hp');
    }

    public function Logout(Request $request)
    {
        if ($request->wantsJson()) {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Logout berhasil']);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
