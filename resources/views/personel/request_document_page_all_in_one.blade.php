@include('include.style')
@include('include.menu')











<div class="right_main">

	<h2 style="width: 100%; text-align: center;">BARANGAY LAPASAN RESIDENTS RECORDS MANAGEMENT  AND INSSUANCE SYSTEM</h2>
	<div style="text-align: right;">
		<p class="header3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Barangay {{session()->get('session_document_name')}}</p>
	</div>



    <p>Step 1</p>
    <p>Select Resident</p>
    
	<div>
		<form action="/search_resident_for_document_v2" method="get">
			<input style="padding: 5px 20px;" type="text" name="search" placeholder="Enter Lastname or Fullname" required="">
			<button style="background-color: transparent; border-style: none;"><i class="fa fa-search" aria-hidden="true"></i></button>
		</form>
	</div>



	<a href="/request_documents" style="text-decoration: none; color: black"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
	| |
	<a href="/rq_document_resident_official_template"  style="text-decoration: none; color: black"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>









<div style="height: 200px; overflow-y: scroll; padding-bottom:50px;">
@foreach($resident as $res)

	<div class="card_1"  style="float: left; width: 97%;">
		<div class="col4">
			<img src="{{ asset('uploads/user_img/' . $res->resident_image) }}" alt="Image not found" style="width: 100px; height: 100px; margin-right: 1px;">
		</div>
		<div class="col2 header6">
			<p>{{$res->resident_lastname}}, {{$res->resident_firstname}} {{$res->resident_middlename}} {{$res->resident_suffix}} </p>

			<p>{{$res->resident_gender}}</p>
			<p>Monthly Income: {{$res->resident_monthlyincome}}
			@if($res->resident_monthlyincome <= 10000)
				<span style="color: green"> * Indigent</span>
			@endif
			</p>
		</div>
		<div  style="text-align: right;">
			<form action="/set_resident_for_document_request/#step_2" method="get">
				<input type="hidden" name="resident_id" value="{{$res->resident_id}}">
				<button class="button">SELECT</button>
			</form>
		</div>
	</div>
@endforeach
</div>

<hr> 

<section id="step_2">
    <p>Step 2</p>
    <p>Select Authorized official</p>
    <div style="height: 40vh; overflow-y: scroll;border-style: solid; border-width: 0.5px; padding: 10px;" >
    	@foreach($position as $pos)
    		<p class="label" style="margin-top: 20px; margin-bottom: 5px; font-weight:600">{{$pos->official_position}}</p>
    		@foreach($officials as $offi)
    			@if($pos->official_position == $offi->official_position)
    				<form action="/set_official_for_document_request/#step_3" method="get" style="margin: 1px;">
    					<input type="hidden" name="official_name" value="{{$offi->official_name}}">
    					<input type="hidden" name="official_position" value="{{$offi->official_position}}">
    					<button style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2); width: 100%; text-align: left; padding: 7px;margin-left:20px; background-color: transparent; border-style: none; margin-bottom:3px;">{{$offi->official_name}}</button>
    				</form>
    			@endif
    		@endforeach
    	@endforeach
    </div>
</section>


<hr>


<section id="step_3">
    <p>Step 3</p>
    <p>Select Template</p>
    
    
    
    <form action="/set_document_template_v2_def/#step_4" method="get">
        <p>Default Template</p>
        <button>Select Default Template</button>
    </form>
    
    
    <form action="create_new_template" method="get">
        <button>Create New Template</button>
    </form>
    
    
    

</section>

<hr>


<section id="step_4"> 
    <p>Step 4</p>
    <p>Information Assign for Barangay {{session()->get('session_document_name')}}</p>
    
    
    @foreach($resident as $res)
        @if(session()->get('session_resident_for_document_v2') == $res->resident_id)
            
        			<img src="{{ asset('uploads/user_img/' . $res->resident_image) }}" alt="Image not found" style="width: 100px; height: 100px; margin-right: 1px;">
        	
        			<p>{{$res->resident_lastname}}, {{$res->resident_firstname}} {{$res->resident_middlename}} {{$res->resident_suffix}} </p>
        			<p>{{$res->resident_gender}}</p>
        			<p>Birthdate:{{$res->resident_birthdate}}</p>
        			<p>Date of Residency: {{$res->resident_dateofresidency}}</p>
        			<p>Monthly Income: {{$res->resident_monthlyincome}}
        			@if($res->resident_monthlyincome <= 10000)
        				<span style="color: green"> * Indigent</span>
        			@endif
        			</p>
        @endif
    @endforeach
    
    
    
    <p>Selected Authorized Official</p>
    <p>{{session()->get('session_official_name_for_document_v2')}}</p>
    <p>{{session()->get('session_official_position_for_document_v2')}}</p>
    
    <p>Template for {{session()->get('session_document_name')}}: {{session()->get('session_template_for_document_v2')}}.</p>



    <div style="text-align:right;">
        <form action="proceed_printing_v2" method="get">
            <button class="button">Proceed to Printing</button>
        </form>
    </div>
</section>








<!--======================-->

</div>