<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Mail\Registration;
use Mail;
use Image;

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {   
        $Users['users']=User::get();
         $Users['title'] = 'Users List';
         $Users['subtitle'] = 'Add User';
         $Users['routes'] = "users";
        $Users['pagetitle'] = 'Add User | Laravel Practical';
        return view('admin/user/addUser',$Users);   
    }

    public function show(User $user)
    {   
        $userid = Session::get('userid');
         $Users['users']=User::get();
        $Users['title'] = 'Users List';
        $Users['routes'] = "users";
        $Users['pagetitle'] = 'Users List | Laravel Practical';
        

        return view('admin.user.users',$Users);
    }
    public function store(Request $request)
    {
         
         $this->validate($request,[
             'name' => 'required',
            'email' => 'required',
            'email' => 'unique:users|max:255',
            'password' => 'required|min:8',
           ]);
    

        //create object of Property model
        
        $res = new User;
        $res->name = ucwords($request->input('name'));
        $res->email = trim($request->input('email'));
        $res->role_name = 'admin';
        $res->password = Hash::make($request->input('password'));
        
         $name = $request->input('name');
         $email= $request->input('email');
         $password = $request->input('password');

          $details['registration'] =array(
                 'name' =>$name,
                'email' => $email,
                'password' => $password,
                'subject' => "Laravel Practical Registration."
           );
        // echo "<pre>";
        //  print_r($details);exit();
        //send mail to registered broker
        Mail::to($email)->send(new Registration($details));
          //check mail send
        if( count(Mail::failures()) > 0 ) {
            
            request()->session()->flash('error','Error, Please try again');
        
        } else {
               request()->session()->flash('success','User successfully created');
           
         }
        return redirect('users');

    }
    public function update(Request $request,$id)
    {  
         
         $this->validate($request,[
             'name' => 'required',
           
            'email' => 'required|email|unique:users,email,'.$id,
           ]);
        //create object of Property model
         $res = User::find($id);
         $res->name = ucwords($request->input('name'));
         $res->email = trim($request->input('email'));
        
        if(isset($password) && $password != ''){
            $res->password = Hash::make($request->input('password'));
        }
    
        $res->save();
        request()->session()->flash('success','User successfully updated');
        return redirect('users');
    }
    public function edit(User $user, $id)
    {   
      
         $result['title'] = 'User List';
        $result['subtitle'] = 'Edit User';
        $result['routes'] = "users";
        $result['pagetitle'] = 'Edit User | Laravel Practical';
        $result['editdata'] = User::find($id);
        return view('admin/user/edituserdetails',$result);   
    }

    public function destroy(User $User, $id)
    {    
       $user=User::where('id',$id)->select('id','img')->get();


         if(isset($user[0]->img) && $user[0]->img != ''){
                $path = public_path().'/uploads/user/'.$user[0]->img ;
            if (file_exists($path)) {
                 unlink($path);
            }
        }
        //remove image from table
        User::destroy(array('id',$id));
        $Users['users'] = User::all();
       
        // display image delete success message
        session::flash('msg','User deleted successfully.');
        Session::flash('alert-class', 'alert-danger');
        
        return redirect('users');
    }
     public function statuschange_user(Request $request)
        { 

         
          $status = $request->status;


            $id = $request->user_id;

            $res = User::find($id);
            $res->status = $status;
            $res->save();


            $data['status'] =200;
            return response()->json($data);
        }


        public function profileUpdate(User $user, $id)
    {   
      
        
        $result['title'] = 'User Profile';
        $result['routes'] = "profile-update/".$id;
        $result['pagetitle'] = 'User Profile | Laravel Practical';
        $result['editdata'] = User::find($id);
        return view('admin/user/profileUpdate',$result);   
    }

    public function change_Status(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}