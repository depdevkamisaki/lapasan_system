




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


            @foreach($blotter as $blot)


	        <div class="container">
	            <h5 class="text-right"><i class="fa fa-info" aria-hidden="true"></i>  Blotter info</h5>
	        </div>


	        <form action="/save_blotter_info" method="get">
	        	<input type="hidden" name="blotter_id" value="{{$blot->blotter_id}}">
			  <div class="form-group">
			    <label >Complainant</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Complainant fullname" name="blotter_complainant"  value="{{$blot->blotter_complainant}}">
			  </div>

			  <div class="form-group">
			    <label >Offender</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Offender fullname" name="blotter_offender"  value="{{$blot->blotter_offender}}">
			  </div>

			  <div class="form-group">
			    <label >Category</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Category" name="blotter_category"  value="{{$blot->blotter_category}}">
			  </div>



			  <div class="form-group">
			    <label >Date</label>
			    <input type="date" class="form-control"  name="blotter_date" aria-describedby="" placeholder="Category" name="blotter_date"  value="{{$blot->blotter_date}}">
			  </div>
			  

			  <div class="form-group">
			    <label>Remarks</label>
<textarea class="form-control" rows="3" name="blotter_remarks">{{$blot->blotter_remarks}}</textarea>
			  </div>

			  <div class="form-group">
			    <label>Description</label>
<textarea class="form-control" rows="3" name="blotter_description">{{$blot->blotter_description}}</textarea>
			  </div>


			  <div class="form-group">
			    <label>Status</label>
			  		<select class="form-control" name="blotter_status">
			  			<option>{{$blot->blotter_status}}</option>
						<option>Not Settled</option>
						<option>Settled</option>
					</select>
				</div>

			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>









			<div style="height: 200px;"></div>

			

@if($blot->blotter_deleted == "")
<form action="/delete_blotter" method="get">
	<input type="hidden" name="resident_id" value="{{$blot->blotter_id}}">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Type 'CONFIRM' to delete Blotter" aria-label="" name="search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-danger" type="button"><i class="fa fa-trash"></i> DELETE</button>
        </div>
    </div> 
</form>
@endif

@if($blot->blotter_deleted == "yes")

<p class="tiny_message warning">This Blotter is Deleted, Do you wish to Restore? </p>
<form action="/restore_data" method="get">

	<input type="hidden" name="data_type" value="blotter">
	<input type="hidden" name="resident_id" value="{{$res->resident_id}}">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Type 'CONFIRM' to restore record" aria-label="" name="search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-info" type="button"><i class="fa fa-recycle"></i> RESTORE</button>
        </div>
    </div>
</form>
@endif     


@endforeach
		</div>
</div>







<script>
const dateInput = document.getElementById('date');

dateInput.value = formatDate();

console.log(formatDate());

function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

function formatDate(date = new Date()) {
  return [
    date.getFullYear(),
    padTo2Digits(date.getMonth() + 1),
    padTo2Digits(date.getDate()),
  ].join('-');
}

</script>

</body>
</html>

