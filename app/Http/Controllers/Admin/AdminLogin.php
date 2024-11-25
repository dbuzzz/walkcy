<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\{User,Role,Attribute};

class AdminLogin extends Controller
{

    public function admin_login()
    {
        if(Auth::user()){
            if (Auth::user()) {
                if (Auth::user()->user_type == 1 or Auth::user()->user_type == 5 or Auth::user()->user_type == 2 or Auth::user()->user_type == 3) {
                    return redirect('dashboard');
                }
            }
        }
      return view('admin.admin_login');
    }//end of method


     public function Adminlogin(Request $request){
        $validated = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);
        if($validated->passes()){
            if(Auth::attempt(['email'=>$request->email , 'password' => $request->password])){
                if((Auth::user()->user_type == 1 or Auth::user()->user_type == 3 or Auth::user()->user_type == 5) and Auth::user()->is_deleted == 0){
                    return response()->json(['status_code'=>200]);
                }else{
                    return response()->json(['status_code'=>201 , 'message' => 'Account is not active']);
                }
            }else{
                return response()->json(['status_code'=>201 , 'message' => 'Wrong Username or Password']);
            }
        }else{
            return response()->json(['status'=>'error','status_code'=>202,'error' => $validated->errors()->all() ]);
        }
    }//end of method

    public function SignUp()
    {
        $data['role'] = Role::where(['is_deleted'=>0,'active_status'=>1])->where('id','>',2)->get();
      return view('admin.signup',$data);
    }//end of method

    public function verification($token = '')
    {
      $data['user'] = User::join('forms','forms.role_id','=','users.user_type')->where(['users.token'=>$token,'forms.is_deleted'=>0,'forms.active_status'=>1])->first(['users.name','users.token','forms.title','forms.attribute_id']);
      $data['attribute'] = Attribute::whereIn('id',explode(',',$data['user']->attribute_id))->where(['active_status'=>1,'is_deleted'=>0])->get(['id','title','type','name','is_required']);
      // dd($data);
      return view('admin.verification',$data);
    }//end of method

    public function saveSignUp(Request $request){
            $validated = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/|unique:users',
            'password'=>'required|min:8',
            'confirm_password'=>'required_with:password|same:password',
            'mobile' => 'required|numeric|digits:10|regex:/^[6-9]{1}[0-9]{9}$/|unique:users', 
           ]);
        if($validated->passes()){
            $token = md5($request->mobile.$request->email.date('d-m-y h:i:s'));
            $formdata['name'] = $request->name;
            $formdata['email'] = $request->email;
            $formdata['password'] = bcrypt($request->password);
            $formdata['mobile'] =$request->mobile;
            $formdata['token'] =$token;
            $formdata['user_type'] =$request->role;
            $formdata['active_status'] =0;
                $this->SendMail($request->email,$token,$request->name);
            $res = User::insertGetId($formdata);
            if($res){
                return response()->json(['status'=>'sucess','status_code'=>200,'message'=>'A link Send to the Given Mail','token'=>url('/verification',$token)]);
             }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Signup !"]);
            }
        }else{
                return response()->json(['status'=>'error','status_code'=>202,'error' => $validated->errors()->all() ]);
        }
    }

    public function verify(Request $request){
        if ($request->file()) {
            foreach ($request->file() as $key => $value) {
                $img = $value;
                    $path = url('uploads').'/'.time().'-'.$img->getClientOriginalName(); 
                    $img->move(public_path('uploads'), $path);
                $file[$key] =$path;
            }
            $formdata['extra_file'] =json_encode($file);
        }
            $formdata['extra_info'] =json_encode($request->post());
            $formdata['token'] ='';
            $res = User::where('token',$request->token)->update($formdata);
            if($res){
                return response()->json(['status'=>'sucess','status_code'=>200,'message'=>'Sign Up successfully!']);
             }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Signup !"]);
            }
       
    }

     public function logout(){
        Auth::logout();
        return redirect("admin");
    }
}
