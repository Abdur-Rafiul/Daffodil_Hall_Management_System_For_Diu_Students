<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Hash;
use Session;

use Illuminate\Support\Facades\Auth;
class AdminLoginController extends Controller
{
    public function index1()
    {
        return view('backend.auth.login');
    }

    public function customLogin1(Request $request)
    {
        //dd($request->all());
        //dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->put('admin','email');

            return redirect()->intended('/dashboard1')
                ->withSuccess('Signed in');
        }

        return redirect("adminlogin")->withSuccess('Login details are not valid');
    }

    public function registration1()
    {
        return view('backend.auth.registration');
    }

    public function customRegistration1(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        //$request->session()->flush();
        return redirect("adminlogin")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('/dashboard1');
        }

        return redirect("adminlogin")->withSuccess('You are not allowed to access');
    }

    public function signOut1(Request $request) {
        $request->session()->forget('admin');
        Auth::guard('admin')->logout();

        return Redirect('adminlogin');
    }
}
