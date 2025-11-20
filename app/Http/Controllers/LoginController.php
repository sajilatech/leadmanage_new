<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Employeeuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
     protected $title = 'Login';

     function index(){
        $data['title']=$this->title;
        return view('login', $data);
    }

    function authenticate(Request $request){
        $validation_array = [
            'username' => 'required',
            'password' => 'required'
           
        ];
    
        $res = $request->validate($validation_array);
       
        $record = Employeeuser::where('status', 1)
        ->where('employ_username', $request->username)
        ->first();
       
        if ($record && Hash::check($request->password, $record->employ_password)) {
            if ($record) { 
                session([
                    'username' => $record->employ_name,
                    'email' => $record->employ_email,
                    'admin_type'=>$record->employ_type,
                    'logged_id' => $record->employ_id,
                ]);
               return redirect()->route('dashboard')->with('success_msg', 'Logged successfully.');
               // return response()->json(['message' => 'Login successful', 'user' => $record]);
            } else {
                return redirect()->back()->with('error_msg', 'Invalid credentials');
        
            }
   
         
         } else {
            
             return redirect()->back()->with('error_msg', 'Invalid User.');
         }
    }

  

   

    function dashboard(){
        $data['title']='Admin: Dashboard';
        $session_data=session()->all();
       
        $userName =$session_data['username'];
        $admin_type = $session_data['admin_type'];
        $data['login_name']=$userName;
        $data['admin_type']=$admin_type;
        $data['total_users']=Employeeuser::count();
        return view('dashboard', $data);
    }

    function logout(Request $request){
        $request->session()->invalidate();
        return redirect()->route('login')
        ->with('success_msg', 'Logged Out successfully.');
    }
}