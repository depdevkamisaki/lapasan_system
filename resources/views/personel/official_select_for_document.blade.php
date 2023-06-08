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
	        <div class="container">
	            <h5 class="text-right"><i class="fa fa-file-text" aria-hidden="true"></i> Request for barangay {{session()->get('session_document_name')}}</h5>
	        </div>

	        <label>Select Autorized official</label>
            <div class="container" style="height: 400px; overflow-y: scroll;">
        		@foreach($position as $pos)
					<p class="label" style="margin-top: 20px; margin-bottom: 5px;">{{$pos->official_position}}</p>
					@foreach($officials as $offi)
						@if($pos->official_position == $offi->official_position)
							<form action="/assign_official_session/#second_s" method="get" style="margin: 1px;">
								<input type="hidden" name="official_name" value="{{$offi->official_name}}">
								<input type="hidden" name="official_position" value="{{$offi->official_position}}">

								<button style="width: 100%; text-align: left; padding: 5px; padding-left: 30px; background-color: transparent; border-style: none; ">{{$offi->official_name}}</button>
							</form>
						@endif
					@endforeach
				@endforeach

            </div>
            <div id="second_s"></div>
			<p>Please Select an authorized official</p>
            <hr>
			<form action="/final_printing" method="get">
				<input style="width: 100%; height: 25px;" type="text" id="AUTHORIZED_OFFICIAL"  name="official" placeholder="Authorized Official" value="{{session()->get('session_official_name')}}" required="" readonly="">
				<p class="label" >Authorized Official</p>


<textarea style="width: 100%; height: 100px; margin-top: 10px;" name="purpose"></textarea>
				<p class="label" >Purpose</p>

<textarea style="width: 100%; height: 100px; margin-top: 10px;" name="remarks"></textarea>
				<p class="label" >Remarks</p>

				<button class="btn btn-info">Next</button>
			</form>

        <!-- -------------------- -->
        <div style="height: 300px;"></div>
		</div>
</div>






</body>

</html>
