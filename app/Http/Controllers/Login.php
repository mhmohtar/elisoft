<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use GuzzleHttp\Client;

use App\Models\UserModel;

class Login extends Controller
{
    // jawaban no 4 
    // http://127.0.0.1:8000/products   
    public function products(){
        $client = new Client();
        $response = $client->post('http://149.129.221.143/kanaldata/Webservice/bank_account', [
            'form_params' => [
                'bank_id' => '2'
            ]
        ]);
        $data = json_decode($response->getBody()->getContents(), true);
        if ($data['status'] == 0) {
            return response()->json(['message' => 'Tidak ada data yang ditemukan.']);
        } else {
            return response()->json($data);
        }
    }

    // jawabah no 5
    // http://127.0.0.1:8000/users
    public function users(){
        $users = UserModel::all();
        //return response()->json(['data' => $users]);
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $users,
        ]);
    }

    public function index(){
        return view('login',[
            'title' => 'Halaman Login'
        ]);
    }
    public function register(){
        return view('register',[
            'title' => 'Halaman Daftar'
        ]);
    }

    public function simpanRegister(Request $request){
        $validateData = $request->validate([
            'email'  => 'required|unique:users,email',
        ],[
            'email.unique'  => 'Email has been registered',
        ]);
        DB::table('users')->insert([
            'id'    => null,
            'name'  => $request->nama,
            'email' => $request->email,
            'email_verified_at' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/');
    }

    public function AuthLogin(Request $request){
        
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if(Auth::Attempt($data)){
            return redirect('home');
        }else{
            return 'gagal';
        }
    }

    public function home(){
        $datas = UserModel::all();
        return view('home', compact('datas'),[
            'title' => 'Home'
        ]);
    }

    public function create(){
        return view('create', [
            'title' => 'Tambah Baru'
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'email'  => 'required|unique:users,email',
        ],[
            'email.unique'  => 'Email has been registered',
        ]);
        DB::table('users')->insert([
            'id'    => null,
            'name'  => $request->nama,
            'email' => $request->email,
            'email_verified_at' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('home');
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'email'  => 'required|unique:users,email'.$id,
        ],[
            'email.unique'  => 'Email has been registered',
        ]);
        
        $user = UserModel::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('home');
    }

    public function edit($id){
        $user = UserModel::find($id);
        if (!$user) {
            //return redirect()->back()->with('error', 'User tidak ditemukan!');
            return redirect('home');
        }
        return view('edit', compact('user'));
    }

    public function delete($id){
        // cek apakah user yang ingin dihapus bukan user yang sedang login
        if ($id == auth()->user()->id) {
            return 'maaf user sedang login';
        }
        DB::table('users')->where('id', $id)->delete();
        return redirect('home');
        //return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}
