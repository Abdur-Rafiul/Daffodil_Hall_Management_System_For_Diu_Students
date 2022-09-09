<?php
namespace App\Http\Controllers;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;

use App\Models\manyStudentModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('Frontend.auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'StudentID' => 'required',
            'password' => 'required',
        ],
        [
            'StudentID.required'=>'Student ID Must Be Filled Up.',
            'password.required'=>'Password Must Be Filled Up.'

        ]
        );

        //$msg = array('msg' => 'Current password is incorrect');



        $credentials = $request->only('StudentID','password');
        if (Auth::attempt($credentials)) {
            $request->session()->put('user','StudentID');

          return redirect()->intended('/')
                      ->with('Signed in');
//            return Redirect::back('/')
//                ->withErrors($msg);
        }

        return redirect("login")->with('success','Login details are not valid');
    }

    public function registration()
    {
        return view('Frontend.auth.registration');
    }

    public function customRegistration(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'StudentID' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],[
            'name.required'=>'Student name Must Be Filled Up.',
            'StudentID.required'=>'StudentID Must Be Filled Up.',
            'email.required'=>'email Must Be Filled Up.',
            'email.unique'=>'Email has been Already Taken.',
            'password.required'=>'password Must Be Filled Up.',
            'password.min'=>'The password must be at least 6 characters.',

        ]);

        $StudentID1 = $request->input('StudentID');

        $countValue1=manyStudentModel::where('student_id','=',$StudentID1)->count();
       // dd($countValue1);
       if($countValue1 == 1){



        $data = $request->all();
        $check = $this->create($data);
       // $request->session()->flush();
        return redirect("login")->with('failed','Registration Successfully');
    }else{

           return redirect("registration")->with('success','Please Real Student ID');
       }
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'StudentID' => $data['StudentID'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('/');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut(Request $request) {
        $request->session()->forget('user');
        Auth::guard('web')->logout();

        return Redirect('login');
    }

    public function changePassword($id, $img){
       //dd($id);
        return view('Frontend.auth.ChangePassword',['id'=>$id,'img'=>$img]);

    }

    public function changePasswordPost(Request $request){



        if (!(Hash::check($request->get('old'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(!(strcmp($request->get('new'), $request->get('conf')) == 0)){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }


        $request->validate([
            'old' => 'required|string|min:6',
            'new' => 'required|string|min:6',
            'conf' => 'required|same:new',

        ]);

        $data = $request->all();


        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new'));
        $user->save();
        // $request->session()->flush();
        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function reset(Request $request){
        //dd($id);
        return view('Frontend.auth.reset');

    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ],
        [
            'email.required'=>'Please Enter Your Valid Email Address',
            'email.exists'=>'Your Email is invalid'
        ]

        );

        $token = Str::random(64);


        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('Frontend.auth.customauth', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return redirect('reset')->with('message', 'We have e-mailed your password reset link!');
    }


}



