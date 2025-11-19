<?php

namespace App\Http\Controllers;
use App\Models\Employeeuser;
use Illuminate\Http\Request;


class UserController extends Controller
{
     protected $perPage = 10;
    protected $title='Users';
    protected $userName;
   

     public function __construct()
    {
        $this->userName = session('username');
       
     
    }
      function index(){
       
        $records=Employeeuser::paginate($this->perPage);
      
        $data['title']=$this->title;
        $data['login_name']=$this->userName;
       
        $data['records']=$records;
        return view('users/list', $data);
    }

     function create(){
        $data['title']=$this->title;
        $data['login_name']=$this->userName;
      
        return view('users/create', $data);
    }


    function add(Request $request){
         $data['title']=$this->title;
        $validation_array = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            
           
        ];
    
        $res = $request->validate($validation_array);
      

            $input_fields = [
                'employ_name' => $request->input('name'),
                 'employ_phone' => $request->input('phone'),
                'employ_email' => $request->input('email'),
                'employ_username' => $request->input('username'),
                'employ_password' =>bcrypt($request->input('password')), 
              
                ];

           Employeeuser::create($input_fields);
    
            return redirect()->route('users.list')
            ->with('success', 'User created successfully.');

    }

     function edit($id){
         $data['title']=$this->title;
        $data['login_name']=$this->userName;
        $row=Employeeuser::find($id);
        $data['row']=$row;
       
        return view('users.edit', $data);
    }

     function update(Request $request){
        $id=$request->input('employ_id');
        $validation_array = [
             'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
           
        ];
    
        $res = $request->validate($validation_array);
        $input_fields = [
                'employ_name'      => $request->input('name'),
                'employ_phone'     => $request->input('phone'),
                'employ_email'     => $request->input('email'),
                'employ_username'  => $request->input('username'),
                'employ_password'  => bcrypt($request->input('password')),
            ];


                $model=Employeeuser::find($id);
                if ($model) {
                    try {
                        $model->fill($input_fields);
                        $model->save();
                        return redirect()->route('users.list')
                            ->with('success', 'Updated successfully.');
                    } catch (\Exception $e) {
                        return redirect()->route('users.edit', ['id' => $id])
                            ->with('error', 'Failed to update record. Please try again.');
                    }
                } else {
                    return redirect()->route('users.edit', ['id' => $id])
                        ->with('error', 'Problem finding record.');
                }
              
    }


      function status($id, $status){
        $model=Employeeuser::find($id);
        if($status=='1'){
            $update_status=0;
        }
        else{
            $update_status=1;
        }
        $input_fields=array('status'=>$update_status);
        $model->fill($input_fields);
        $model->save();
            return redirect()->route('users.list')  ->with('success', 'Status Updated successfully.');
    }

    function drop($id){
        $r = Employeeuser::find($id);
        $r->delete();
            return redirect()->route('users.list')  ->with('success', 'Status Updated successfully.');
    }
}
