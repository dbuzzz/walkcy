<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
	#invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 70mm;
  background: #FFF;
  
  
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
 
#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 100px;}
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
	background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
	background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;} 
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE
}
.tabletitle{
  //padding: 5px;
  font-size: .5em;
  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}

#legalcopy{
  margin-top: 5mm;
}

  
  
}
	</style>
</head>
<body>

  <div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>Walkcy</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
        <h4><strong>Invoice Number</strong>: {{$_GET['id']}}</h4>
        @if($order_details[0]->coupon_id)
        <h4><strong>GSTN</strong>: 09ADQPV7223F1Z1</h4>
        @endif
        <p> 
            Address     : Walkcy Near Hanumangadi Mandir Rikabganj, <br>Ram path Road, beside Sagar Life Style., Faizabad/Ayodhya</br>
            Website     : www.walkcy.com</br>
            Mobile      : 9335336433</br>
        </p>
        
      <!--  <address>-->
      <!--{{$order->name}}<br />-->
      <!--{{$order->address}},{{$order->city}}<br />-->
      <!--{{$order->state}}<br />-->
      <!--{{$order->country}}-->
      <!--</address>-->
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td style=" padding: 5px; "><h4>Name</h4></td>
								<td style=" padding: 5px; "><h4>Price</h4></td>
								<td style=" padding: 5px; "><h4>Qty</h4></td>
								<!-- <td style=" padding: 5px; "><h4>Tax</h4></td> -->
								<td style=" padding: 5px; "><h4>Total</h4></td>
							</tr>

							
							
							 @if($order_details)
            @php
              $tax=0;
              $price=0;
            @endphp
            @foreach($order_details as $key=>$value)
            <tr class="service">
								<td style=" padding: 5px; "><p class="itemtext">{{$value->name}}</p></td>
								<td style=" padding: 5px; "><p class="itemtext">{{$value->price}}</p></td>
								<td style=" padding: 5px; "><p class="itemtext">{{$value->quantity}}</p></td>
								<!-- <td style=" padding: 5px; "><p class="itemtext">{{$value->tax}}</p></td> -->
								<td style=" padding: 5px; "><p class="itemtext">{{($value->price +$value->tax)}}</p></td>
							</tr>
              @php
                $tax+=$value->tax;
                $price+=$value->price;
              @endphp
            @endforeach
            @endif
            
            <tr class="tabletitle">
				<td></td>
				<td></td>
				<td class="Rate"><h4>Gross Total</h4></td>
				<td class="payment"><h4>{{$price}}</h4></td>
			</tr>
			
			<tr class="tabletitle">
				<td></td><td></td>
				<td class="Rate"><h4>Discount</h4></td>
				<td class="payment"><h4>{{$order->discount?$order->discount:0}}</h4></td>
			</tr>
			
			<tr class="tabletitle">
				<td></td><td></td>
				<td class="Rate"><h4>Total</h4></td>
				<td class="payment"><h4>{{($price+$tax)-$order->discount}}</h4></td>
			</tr>
			<tr class="tabletitle">
				<td></td><td></td>
				<td class="Rate"><h4>Payment via</h4></td>
				<td class="payment"><h4>{{$order->city}}</h4></td>
			</tr>
         
          	</table>
					</div><!--End Table-->

					<div id="legalcopy">
						<p class="legal"><strong>Thank you for Shopping with Walkcy!</strong> 
						</p>
						<div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a><a style="float:right" href="{{Url('/')}}" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Home</a></div>
					</div>

				</div><!--End InvoiceBot-->
  </div><!--End Invoice-->

</body>
</html>