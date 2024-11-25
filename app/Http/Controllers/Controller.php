<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function SendMail($email = '',$token = '',$username='') {
      $data['data'] = array('name'=>"Ayusharogyam",'token'=>url('/verification',$token),'username'=>$username,'check'=>0);
   
     $ms =  Mail::send('admin.mail', $data, function($message) use($email) {
         $message->to($email, 'Verification Mail')->subject('Profile Verification Mail');
         $message->from('xyz@gmail.com','Ayusharogyam');
      });
     
      return true;
   }

   public function send_invoice($email = '',$username='',$data) {
   
     $ms =  Mail::send('frontend.invoice', $data, function($message) use($email) {
         $message->to($email, 'Ayusharogyam Invoice')->subject('Invoice');
         $message->from('xyz@gmail.com','Ayusharogyam');
      });
      return true;
   }

   public function send_otp($email = '',$token = '',$username='') {
      $data['data'] = array('name'=>"Walkcy",'token'=>url('/verification',$token),'username'=>$username,'otp'=>$token,'check'=>1);
   
     $ms =  Mail::send('admin.mail', $data, function($message) use($email) {
         $message->to($email, 'Verification Mail')->subject('Profile Verification Mail');
         $message->from('xyz@gmail.com','Walkcy');
      });
      // print_r($ms);die;
     
      return true;
   }
}
