<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Event};
use Validator;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Softon\Indipay\Facades\Indipay; 

class CalendarController extends Controller
{
        public function index(){
        $data['title'] = "Manage Event";
        $data['manage_lables'] = "event";
        // $data['event_label'] = Label::where(['is_deleted' => 1,'context' => 'event'])->get(['id','title']);
        $data['event'] = Event::where(['is_deleted' => 1])->get(['id','title','color',DB::raw("CONCAT(start_date,' ',start_time) AS start"),DB::raw("CONCAT(end_date,' ',end_time) AS end")]);
        // $data['client'] =  Client::where('is_deleted',1)->get(['id','name']);
        return view('frontend.calendar',$data);
        
    }//end of function

    public function saveEvent(Request $request){
        $id = $request->id;
            $validator = Validator::make($request->all(),[
             'title'=>'required',
             'start_date'=>'required',
             'start_time'=>'required',
            ]);
            if($validator->passes()) {
             $formdata['title'] = $request->title;
             $formdata['start_date'] = $request->start_date;
             $formdata['end_date'] = $request->start_date;
             $formdata['start_time'] = $request->start_time;
             $formdata['end_time'] = date("g:i a", strtotime($request->start_time) + 60*59);
             $formdata['client_id'] = $request->client;

             if (!empty($id)) {
                 $formdata['updated_by'] = 1;
                 $row = Event::where('id',$id)->update($formdata);
                 $msg = "Updated Successfully !";
             }else{
                 $formdata['created_by'] = 1;
                 $row = Event::insertGetId($formdata);
                 $msg = "Added Successfully !";
             }
             if($row){
                $event = Event::where(['is_deleted' => 1])->get(['id','title','color',DB::raw("CONCAT(start_date,' ',start_time) AS start"),DB::raw("CONCAT(end_date,' ',end_time) AS end")]);
                 return ['status_code' => 200 , 'message' => $msg , 'data' => json_encode($event)];
             }else{
                 return ['status_code' => 201 , 'message' => "Something went wrong !"];
             }
            }    
         return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of Function
}
