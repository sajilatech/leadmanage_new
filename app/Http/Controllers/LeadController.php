<?php

namespace App\Http\Controllers;
use App\Models\Lead;

use Illuminate\Http\Request;

class LeadController extends Controller
{

    protected $perPage = 5;
    protected $title='Projects';
    protected $userName;
   

     public function __construct()
    {
       
       
     
    }
    function index(){ 
          $this->sess_data = session()->all();
      if(!isset($this->sess_data['username'])){
          return redirect()->route('login');
        }
         $userName =$this->sess_data['username'];
        $admin_type =$this->sess_data['admin_type'];
        $data['admin_type']=$admin_type;
        $logged_id=$this->sess_data['logged_id'];
        if($admin_type=='admin'){
            $records = Lead::paginate($this->perPage);
        }
        else{
           $records = Lead::where('employ_id', $logged_id)
                       ->paginate($this->perPage);
        }
        
        $data['title']=$this->title;
        $data['records']=$records;
        return view('leads/list', $data);
    }


      function create(){
         $this->sess_data = session()->all();
      if(!isset($this->sess_data['username'])){
          return redirect()->route('login');
        }
         $userName =$this->sess_data['username'];
        $admin_type =$this->sess_data['admin_type'];
        $logged_id=$this->sess_data['logged_id'];
        $data['title']=$this->title;
        $data['login_name']=$userName;
        return view('leads/create', $data);
    }


    function add(Request $request){
         $this->sess_data = session()->all();
      if(!isset($this->sess_data['username'])){
          return redirect()->route('login');
        }
         $userName =$this->sess_data['username'];
        $admin_type =$this->sess_data['admin_type'];
        $logged_id=$this->sess_data['logged_id'];
         $data['title']=$this->title;
        $validation_array = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];
    
        $res = $request->validate($validation_array);
      

            $input_fields = [
                'lead_name' => $request->input('name'),
                 'lead_phone' => $request->input('phone'),
                'lead_email' => $request->input('email'),
                'employ_id'=>$logged_id
                ];

           Lead::create($input_fields);
            return redirect()->route('leads.list')
            ->with('success', 'Lead created successfully.');

    }
}
