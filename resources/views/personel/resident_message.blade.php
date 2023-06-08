




<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>
    @include('include.style_v2')
    @include('include.nav_bar_style')
</head>

<body onload="">




<div class="wrapper">
        <!-- Sidebar  -->
        @include('include.menu')


        <!-- Page Content  -->
        <div id="content">
            @include('include.nav_top')


            @foreach($resident as $res)


	        <div class="container">
	            <h5 class="text-right"><i class="fa fa-info" aria-hidden="true"></i> Send text message</h5>
	        </div>


                    <form action="/view_resident" method="get">
                        <input type="hidden" name="resident_id" value="{{$res->resident_id}}">
	                    <button class="btn btn-info float-right"><i class="fa fa-info-circle"></i></button>
                    </form>
	  
	        <div class="row">
	        	<div class="col-sm-2">
	        		<img src="{{ asset('uploads/user_img/' . $res->resident_image) }}" alt="Image not found" style="width: 150px; height: 150px; margin-right: 1px;" onerror="this.src='fallback-img.jpg'">
	        	</div>

	        	<div class="col-sm-4">
	        		<h6>{{$res->resident_lastname}}, {{$res->resident_firstname}} {{$res->resident_middlename}} {{$res->resident_suffix}}</h6>
                    <h6>{{$res->resident_gender}}</h6>
	        	</div>
	        </div>



	        <form action="/send_message" method="get">
			    <div class="form-group">
			    <label>Message</label>
			    <input type="hidden" name="type" value="single">
			    <input type="hidden" name="resident_contactnumber" value="{{$res->resident_contactnumber}}">
			<textarea class="form-control" rows="3" name="message">Type Message Here...</textarea>
			    <small>Send message to all selected recepient below.</small>
			    </div>

			    <button class="btn btn-info"><i class="fa fa-send"></i> SEND</button>
			</form>


			@endforeach



			

	    </div>
</div>





</body>
</html>

