<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{HomeBanner,Category};
use Validator;
use Yajra\DataTables\DataTables;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;

class BannnerController extends Controller
{
     public function index()
    {
      $data['category'] = Category::where('is_deleted',0)->get();
      return view('admin.home_banner',$data);
    }//end of method
    
    public function save(Request $request){
                    // dd($request->all(),$request->file());
        $id = $request->id;
        if (!empty($id)) {
            $validator = Validator::make($request->all(),[
                'cat1'=>'required',
                'cat2'=>'required',
                'cat3'=>'required',
                'cat4'=>'required',
            ]);
        }else{
            $validator = Validator::make($request->all(),[
                'cat1'=>'required',
                'cat2'=>'required',
                'cat3'=>'required',
                'cat4'=>'required',
                'image'=>'required',
                'image1'=>'required',
                'image2'=>'required',
                'image3'=>'required',
            ]);
        }
        if($validator->passes()) {
                    
            $formdata['cat_id1'] = $request->cat1;
            $formdata['cat_id2'] = $request->cat2;
            $formdata['cat_id3'] = $request->cat3;
            $formdata['cat_id4'] = $request->cat4;
            if(!empty($request->file('image'))){
                    $img = $request->file('image');
                    $formdata['banner1'] = url('uploads').'/'.uniqid().'-'.$img->getClientOriginalName(); 
                    $request->file('image')->move(public_path('uploads'), $formdata['banner1']);
            }

            if(!empty($request->file('image1'))){
                    $img = $request->file('image1');
                    $formdata['banner2'] = url('uploads').'/'.uniqid().'-'.$img->getClientOriginalName(); 
                    $request->file('image1')->move(public_path('uploads'), $formdata['banner2']);
            }

            if(!empty($request->file('image2'))){
                    $img = $request->file('image2');
                    $formdata['banner3'] = url('uploads').'/'.uniqid().'-'.$img->getClientOriginalName(); 
                    $request->file('image2')->move(public_path('uploads'), $formdata['banner3']);
            }

            if(!empty($request->file('image3'))){
                    $img = $request->file('image3');
                    $formdata['banner4'] = url('uploads').'/'.uniqid().'-'.$img->getClientOriginalName(); 
                    $request->file('image3')->move(public_path('uploads'), $formdata['banner4']);
            }
            if (!empty($id)) {
                $formdata['updated_by'] = Auth::user()->id;
                $row = HomeBanner::where('id',$id)->update($formdata);
                $msg = 'Data Updated';
            }else{
                $formdata['added_by'] = Auth::user()->id;
                $row = HomeBanner::insertGetId($formdata);
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


    public function show(Request $request){
        if ($request->ajax()) {
            $data = HomeBanner::join('categories','categories.id','=','home_banners.cat_id1')->join('categories as cat2','cat2.id','=','home_banners.cat_id2')->join('categories as cat3','cat3.id','=','home_banners.cat_id3')->join('categories as cat4','cat4.id','=','home_banners.cat_id4')->where(['home_banners.is_deleted'=>0,'categories.is_deleted'=>0])->orderBy('home_banners.id','DESC')->get(['home_banners.id','home_banners.active_status','home_banners.banner1','home_banners.banner2','home_banners.banner3','home_banners.banner4','categories.name as cat1','cat2.name as cat2','cat3.name as cat3','cat4.name as cat4']);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<ul class="orderDatatable_actions mb-0 d-flex flex-wrap" style="min-width:90px;justify-content:unset;"> ';
                           $btn .= '<li onclick="edit(\''.$row->id.'\')"> <a href="#" class="edit"> <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a> </li>';

                           $btn .='<li onclick="deletes(\''.$row->id.'\')"> <a href="javascript:void[0]" class="remove"> <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> </li> ';
                           $btn .= '</ul>';
                            return $btn;
                    })

                    ->addColumn('image', function($row){
                           $btn = '<a href="'.$row->banner1.'" target = "_blank"><img style="height: 50px; width:50px" src="'.$row->banner1.'"></a><br><strong>'.$row->cat1.'</strong>';
                          
                            return $btn;
                    })

                    ->addColumn('image1', function($row){
                        if ($row->banner2) {
                           $btn = '<a href="'.$row->banner2.'" target = "_blank"><img style="height: 50px; width:50px" src="'.$row->banner2.'"></a><br><strong>'.$row->cat2.'</strong>';
                        }else{
                           $btn = '<img style="height: 50px; width:50px" src="'.asset('/uploads/default/default-image.jpg').'">';
                       }
                          
                            return $btn;
                    })

                    ->addColumn('image2', function($row){
                        if (!empty($row->banner3)) {
                            $btn = '<a href="'.$row->banner3.'" target = "_blank"><img style="height: 50px; width:50px" src="'.$row->banner3.'"></a><br><strong>'.$row->cat3.'</strong>';
                        }else{
                           $btn = '<img style="height: 50px; width:50px" src="'.asset('/uploads/default/default-image.jpg').'">';
                       }
                          
                            return $btn;
                    })

                    ->addColumn('image3', function($row){
                        if (!empty($row->banner4)) {
                            $btn = '<a href="'.$row->banner4.'" target = "_blank"><img style="height: 50px; width:50px" src="'.$row->banner4.'"></a><br><strong>'.$row->cat4.'</strong>';
                        }else{
                           $btn = '<img style="height: 50px; width:50px" src="'.asset('/uploads/default/default-image.jpg').'">';
                       }
                          
                            return $btn;
                    })

                    ->addColumn('status', function($row){
                        if ($row->active_status == 1) {
                           $btn = '<span class="badge badge-success" style="cursor:pointer;" onclick="status('.$row->id.',0)">Active</span>';
                        }else{
                           $btn = '<span class="badge badge-warning" style="cursor:pointer;" onclick="status('.$row->id.',1)">De-Active</span>';

                        }
                          
                            return $btn;
                    })
                    ->rawColumns(['image','image1','image2','image3','action','status'])
                    ->make(true);
        }
    }//end of method

    public function edit(request $request){
        $data = HomeBanner::where('id',$request->id)->first();
        // dd($data);
        if(empty($data)){
            return ['message'=>"Something went wrong !",'status_code'=>201];
        }else{
            return ['message'=>'Success !','status_code'=>200 , 'data' => $data];
        }

    }//end of method

    public function delete(Request $request){
        $data['is_deleted'] = 1;
        $formdata['deleted_by'] = Auth::user()->id;
        $row = HomeBanner::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Delete!",'status_code'=>201];
        }else{
            return ['message'=>'Deleted !','status_code'=>200];
        }
    }//end of method


    public function status(Request $request){
        $data['active_status'] = $request->status;
        $data['updated_by'] = Auth::user()->id;
        $row = HomeBanner::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Update Status!",'status_code'=>201];
        }else{
            return ['message'=>'Status Updated!','status_code'=>200];
        }
    }//end of method
}
