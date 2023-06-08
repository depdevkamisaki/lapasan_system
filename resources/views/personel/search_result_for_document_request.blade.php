



@include('include.style')


@include('include.menu')



<div class="right_main">

	<h2 style="width: 100%; text-align: center;">BARANGAY LAPASAN RESIDENTS RECORDS MANAGEMENT  AND INSSUANCE SYSTEM</h2>



	<div style="text-align: right;">
		<p class="header3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Resident Records for Document Request</p>
	</div>





	<div>
		<form action="/search_for_document_request_1" method="get">
			<input style="padding: 5px 20px;" type="text" name="search" placeholder="Enter Lastname or Fullname" required="">
			<button style="background-color: transparent; border-style: none;"><i class="fa fa-search" aria-hidden="true"></i></button>
		</form>
	</div>


	<a href="/request_documents" style="text-decoration: none; color: black"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>

	| |
	<a href="/search_for_request_document_"  style="text-decoration: none; color: black"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>


	<br>
	<br>
	<p class="header6">Search Result</p>


<div style="height: 80vh; overflow-y: scroll;">

@foreach($resident as $res)

	<div class="card_1"  style="float: left; width: 97%;">
		<div class="col4">
			<img src="{{ asset('uploads/user_img/' . $res->resident_image) }}" alt="Image not found" style="width: 100px; height: 100px; margin-right: 1px;">
		</div>
		<div class="col2 header6">
			<p>{{$res->resident_lastname}}, {{$res->resident_firstname}} {{$res->resident_middlename}} {{$res->resident_suffix}} </p>

			<p>{{$res->resident_gender}}</p>

			<p>{{$res->resident_gender}}</p>
			<p>Monthly Income: {{$res->resident_monthlyincome}}

			@if($res->resident_monthlyincome <= 10000)
				<span style="color: green"> * Indigent</span>
			@endif

		</div>
		<div  style="text-align: right;">
			<form action="/open_for_document_official_select" method="get">
				<input type="hidden" name="resident_id" value="{{$res->resident_id}}">
				<button class="button">SELECT</button>
			</form>
		</div>
	</div>
@endforeach


</div>

</div>