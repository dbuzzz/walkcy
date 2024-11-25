<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,DoctorInfo,Taxation,Brand,Product,ProductImage};
use Validator;
use Yajra\DataTables\DataTables;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;
class DoctorInfoController extends Controller
{
    public function index(Request $request)
    {
      $data['product'] = DoctorInfo::where('added_by',Auth::user()->id)->first();
      $data['cat'] = Category::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['tax'] = Taxation::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['brand'] = Brand::where(['is_deleted'=>0,'active_status'=>1])->get();
      return view('admin.doctor_info',$data);
    }//end of method


    public function save(Request $request){
        // dd($request->all());
        $id = $request->id;
        if (!empty($id)) {
            $validator = Validator::make($request->all(),[
                'heading'=>'required',
                'price'=>'required',
                'desc'=>'required',

            ]);
        }else{
            $validator = Validator::make($request->all(),[
                'image'=>'required',
                'heading'=>'required',
                'price'=>'required',
                'desc'=>'required',

            ]);
        }
        if($validator->passes()) {
                    
            $formdata['heading'] = $request->heading;
 
            $formdata['price'] = $request->price;
            $formdata['description'] = $request->desc;
            
            if(!empty($request->file('image'))){
                    $img = $request->file('image');
                    $filedata['path'] = $formdata['image'] = url('uploads').'/'.uniqid().'-'.$img->getClientOriginalName(); 
                    $request->file('image')->move(public_path('uploads'), $formdata['image']);
            }

            if (!empty($id)) {
                $formdata['updated_by'] = Auth::user()->id;
                $row = DoctorInfo::where('id',$id)->update($formdata);
                $msg = 'Data Updated';
            }else{
                $formdata['added_by'] = Auth::user()->id;
                $row = DoctorInfo::insertGetId($formdata);
                $msg = 'Data Inserted';

            }

           
            if($row){
                return ['status_code' => 200 , 'message' =>$msg];
            }else{
                return ['status_code' => 201 , 'message' => "Something went wrong !"];
            }
        }    
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method
}
