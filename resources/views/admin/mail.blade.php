<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
      <div style="margin:50px auto;width:70%;padding:20px 0">
        <div style="border-bottom:1px solid #eee">
          <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">{{$data['name']}}</a>
        </div>
        <p style="font-size:1.1em">Hi, {{$data['username']}}</p>

        <p>Thank you for choosing {{$data['name']}}</p>

        @if($data['check'] == 1)
          <p> Please enter this otp <strong>{{$data['otp']}}</strong></p>
        @else
        <p> . Click on the given link to fill more details. This link is only for one time Use</p>

        <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">


          <a href="{{$data['token']}}">Verify</a></h2>
          @endif

        <p style="font-size:0.9em;">Regards,<br />{{$data['name']}}</p>
        <hr style="border:none;border-top:1px solid #eee" />
        <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
          <p>{{$data['name']}} Inc</p>
          <p>India</p>
          <p>India</p>
        </div>
      </div>
    </div>
</body>
</html>