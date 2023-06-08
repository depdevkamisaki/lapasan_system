<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	@include('include.style_v2')
    @include('include.nav_bar_style')
</head>

<body onload="auto_cal();getLocation();">




<div class="wrapper">
        <!-- Sidebar  -->
        @include('include.menu')


        <!-- Page Content  -->
        <div id="content">

            @include('include.nav_top')

			@foreach($resident as $res)
            <!-- ====================================================== -->

            <div class="row container"> 
				<img src="{{ asset('uploads/user_img/' . $res->resident_image) }}" alt="Image not found" style="width: 100px; height: 100px;">
            </div>

            <div class="row container">
            	<p>Please Upload a 2x2 Picture.</p>
            </div>




			<div class="row container">
				<form action="/update_image_resident" method="post" enctype="multipart/form-data">
				    {{csrf_field()}}
				    <div  class="form-group col-md-3">
				    	<input type="hidden" name="resident_id" value="{{$res->resident_id}}">
						<input type="file" class="" name="image" required="">
				    </div>
				    <div  class="form-group col-md-3">
				    	<button class="btn btn-info">Upload</button>
				    </div>

				    
					
					
				</form>
			</div>

            <br>

            
<form action="/save_resident" method="get">
	<input type="hidden" name="resident_id" value="{{$res->resident_id}}">


	<div class="form-row">
	    <div  class="form-group col-md-4">
	    	<label>Lastname</label>
	    	<input type="text" class="form-control" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" name="resident_lastname" placeholder="Last Name" value="{{$res->resident_lastname}}">
	    </div>
	    <div class="form-group col-md-4">
	    	<label>Firstname</label>
	    	<input type="text" class="form-control" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" name="resident_firstname" placeholder="First Name" value="{{$res->resident_firstname}}">
	    </div>
	   	<div  class="form-group col-md-3">
	    	<label>Middlename</label>
	    	<input type="text" class="form-control" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" name="resident_middlename" placeholder="Middle Name" value="{{$res->resident_middlename}}">
	    </div>

	   	<div  class="form-group col-md-1">
	    	<label>Suffix</label>
	    	<input type="text" class="form-control" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" name="resident_suffix" placeholder="Suffix (Jr./ Sr./ I.)" value="{{$res->resident_suffix}}">
	    </div>	     
	</div>



	<div class="form-row">
		<div  class="form-group col-md-2">
			<label>Gender</label>
			<select name="resident_gender" class="form-control">
				<option>{{$res->resident_gender}}</option>
				<option>Female</option>
				<option>Male</option>
			</select>
		</div>

	    <div  class="form-group col-md-3">
	    	<label>Birthdate</label>
	    	<input type="date" class="form-control" onchange="auto_cal();" id="DOB" required="" name="resident_birthdate" min="1900-01-01" value="{{$res->resident_birthdate}}">
	    </div>
	    <div  class="form-group col-md-2">
	    	<label>Age</label>
	    	<input class="form-control" type="text" id="AGE" name="age" placeholder="Age" readonly="">
	    </div>
	    <div  class="form-group col-md-2">
	    	<label>Age Category</label>
	    	<input class="form-control"  id="AGECATEG" type="text" placeholder="Age Category" readonly="">
	    </div>
	    <div  class="form-group col-md-3">
	    	<label>Phone no.</label>
	    	<input type="text" class="form-control" required="" name="resident_contactnumber" placeholder="Phone Number" value="{{$res->resident_contactnumber}}">
	    </div>	
	</div>


	<div class="form-row" id="SENIOR_ID">
		<div class="form-group col-md-3">
			<label>Senior citizen ID</label>
			<input type="text" class="form-control"  name="resident_srid" placeholder="Sernior ID" value="{{$res->resident_srid}}">
		</div>
	</div>


	<div class="form-row">
		<div class="form-group col-md-5">
			<label>House no.</label>
			<input type="text" class="form-control" name="resident_housenumber" placeholder="Door No. / Building Name" value="{{$res->resident_housenumber}}">
		</div>
		<div class="form-group col-md-4">
			<label>Street</label>
			<input type="text" class="form-control"  name="resident_street" placeholder="Street" value="{{$res->resident_street}}">
		</div>
		<div class="form-group col-md-3">
			<label>Barangay</label>
			<input type="text" class="form-control"  name="resident_barangay" placeholder="Barangay" value="Lapasan" readonly="" value="{{$res->resident_barangay}}">
		</div>
	</div>



	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Sitio</label>
			<select name="resident_sitio" class="form-control">
				<option>{{$res->resident_sitio}}</option>
			    <option> BITAN-AG</option>
			    <option> CAMP ALAGAR</option>
			    <option> CENTRO LAPASAN</option>
			    <option> CENTRO KULAMBOG</option>
			    <option> FATIMA</option>
			    <option> GAABUCAYAN</option>
			    <option> HILLSIDE VILLAGE</option>
				<option> LAPAZ 2, KULAMBOG</option>
				<option> LAPAZ 1</option>
				<option> LAMBAGO</option>
				<option> LAWESBRA</option>
				<option> LUPSUP</option>
				<option> LITTLE CEBU</option>
				<option> MAMBATO</option>
				<option> SAN JUAN 1</option>
				<option> SAN JUAN </option>
				<option> SAN ROQUE</option>
				<option> SAN MIGUEL VILLAGE</option>
				<option> SAN LAZARO</option>
				<option> SAN ISIDRO LABRADOR</option>
				<option> SAN AUGUSTINE</option>
				<option> SEASIDE KOLAMBOG</option>
				<option> STA. CRUZ 1</option>
				<option> STA. CRUZ 2</option>
				<option> STO. NINO</option>
				<option> UPPER KULAMBOG</option>
				<option> WESTERN KOLAMBOG</option>
			</select>
		</div>
		<div class="form-group col-md-4">
			<label>Subdivision/Village</label>
			<input type="text" class="form-control" name="resident_village" placeholder="Village" value="{{$res->resident_village}}">
		</div>
		<div class="form-group col-md-4" >
			<label>City</label>
			<input type="text" class="form-control" name="resident_city" placeholder="City" value="Cagayan De Oro City" readonly="" value="{{$res->resident_city}}">
		</div>
	</div>




	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Date of Residency</label>
			<input type="date" class="form-control" required=""  id="DATEOFRESIDENCY" name="resident_dateofresidency"  min="1900-01-01" value="{{$res->resident_dateofresidency}}">
		</div>
		<div class="form-group col-md-6">
			<label>Province</label>
			<input type="text" class="form-control" required="" name="resident_province" value="Misamis Oriental" readonly="" value="{{$res->resident_province}}">
		</div>
		<div class="form-group col-md-2">
			<label>Zipcode</label>
			<input type="text" class="form-control" required="" name="resident_zipcode" value="9000" readonly="" value="{{$res->resident_zipcode}}">
		</div>
	</div>



	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Occupatio</label>
			<input type="text" class="form-control" name="resident_occupation" placeholder="Occupation" value="{{$res->resident_occupation}}" >
		</div>
		<div class="form-group col-md-4">
			<label>Monthly Income</label>
			<input type="number" class="form-control" id="INCOME" onkeyup="cal_income();" required="" name="resident_monthlyincome" placeholder="Monthly Income" value="{{$res->resident_monthlyincome}}">
		</div>
		<div class="form-group col-md-4">
			<label>Indigency Status</label>
			<input type="text" id="INDIGENCY" name="" class="form-control"  placeholder="Indigency Status" readonly="">
		</div>
	</div>




	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Civil Status</label>
			<select name="resident_civilstatus"  class="form-control" onchange="auto_cal();" id="CIVIL_STATUS"> 
				<option>{{$res->resident_civilstatus}}</option>
				<option>Single</option>
				<option>Married</option>
				<option>Widowed</option>
				<option>Separated</option>
			</select>
		</div>

		<div class="form-group col-md-4">
			<label>Sector</label>
			<input type="text" class="form-control" name="resident_sector" id="SECTOR" readonly="" placeholder="Sector" value="{{$res->resident_sector}}">
		</div>
		<div class="form-group col-md-4" id="SPOUSE_NAME">
			<label>Spouse</label>
			<input type="text" class="form-control" name="resident_spouse" placeholder="Spouse" value="{{$res->resident_spouse}}">	
		</div>
	</div>
	

	
	<div class="form-check">
		<div class="form-check form-check-inline">
			<input type="checkbox" class="form-check-input sectors_check_class" name="PWD" onclick="select_checkbox_list();" onchange="pwd_sector_clicked();" id="PWDCHB" value="PWD">
			<label class="form-check-label">PWD</label>
		</div>	
		<div class="form-check form-check-inline">
			<input type="checkbox" class="form-check-input sectors_check_class" name="Solo parent" value="Solo Parent" onclick="select_checkbox_list();">
			<label class="form-check-label">Solo Parent</label>
		</div>	
		<div class="form-check form-check-inline">
			<input type="checkbox" class="form-check-input sectors_check_class" name="4ps" value="4ps" onclick="select_checkbox_list();">
			<label class="form-check-label" >4ps</label>
		</div>	
		<div class="form-check form-check-inline">
			<input type="checkbox" class="form-check-input sectors_check_class" id="SCCH" name="Senior citizen" value="Senior citizen" onclick="select_checkbox_list();">
			<label class="form-check-label">Senior citizen</label>
		</div>		
	</div>

	<div  class="form-row" id="PWDIDNUM">
		<div class="form-group col-md-4">
			<label>PWD ID No.</label>
			<input type="text" class="form-control" name="resident_pwdid"  placeholder="PWD ID Number" value="{{$res->resident_pwdid}}">
		</div>		
	</div>











	<div  class="form-row">
		<div class="form-group col-md-4">
			<label>Longitude</label>
			<input type="text" class="form-control" name="resident_longitude_name"  placeholder="Coordinate Longitude"  id="resident_longitude" readonly="" value="{{$res->resident_longitude}}">
		</div>	
		<div class="form-group col-md-4">
			<label>Latitude</label>
			<input type="text" class="form-control" name="resident_latitude_name" id="resident_latitude" placeholder="Coordinate Latitude" readonly="" value="{{$res->resident_latitude}}">
		</div>
	</div>	

	<div class="form-row">
		<div class="form-group col-md-4">
			<button type="button" onclick="getLocation();" class=" btn btn-info"><i class="fa fa-map-pin"></i> Pin Location</button>
		</div>
	</div>


	<div class="form-row">
		<div class="container">
			<p>Please pin the exact house location to get coordinates.</p>
		    <!-- <div id="osm-map"></div> -->
		    <div id="node1Map" style="height:400px;"></div>
		</div>
	</div>

	<br>

	<div class="form-row" >
		<div class="form-group col-md-4">
			<button class="btn btn-info">Update Above Info</button>
		</div>
	</div>
    </form>
        <!-- ------------------- -->



    <br>
    <hr>

    <h5 id="child">Child</h5>



<form class="form-inline" action="/add_child/#child" method="get">
	<input type="hidden" name="resident_id" value="{{$res->resident_id}}">
	<div class="form-group mx-sm-3 mb-2">
	    <label class="sr-only">Child Name</label>
	    <input type="text" class="form-control" name="child_name"  placeholder="Child name">
	</div>
    <button type="submit" class="btn btn-primary mb-2">+</button>
</form>

<table class="table">
	<thead>
		
		<th class="col">Name</th>
		<th class="col">Action</th>
	</thead>
@foreach($child as $chi)
<tbody>
<tr>
	<form action="/delete_child/#child" method="get">
	<input type="hidden" name="child_id" value="{{$chi->child_id}}">

	<td>
		{{$chi->child_name}}
	</td>
	<td>
		<button class="btn btn"><i class="fa fa-trash"></i></button>
	</td>
</tr>
</tbody>
</form>
@endforeach
</table>




    <br>
    <hr>

    <h5 id="gurdian">Gurdian</h5>



<form class="form-inline" action="/add_gurdian/#gurdian" method="get">
	<input type="hidden" name="resident_id" value="{{$res->resident_id}}">
	<div class="form-group mx-sm-3 mb-2">
	    <label class="sr-only">Gurdian Name</label>
	    <input type="text" class="form-control" name="gurdian_name"  placeholder="Gurdian name">
	</div>
    <button type="submit" class="btn btn-primary mb-2">+</button>
</form>

<table class="table">
	<thead>
		
		<th class="col">Name</th>
		<th class="col">Action</th>
	</thead>
@foreach($gurdian as $gur)
<tbody>
<tr>
	<form action="/delete_gurdian/#gurdian" method="get">
	<input type="hidden" name="gurdian_id" value="{{$gur->gurdian_id}}">

	<td>
		{{$gur->gurdian_name}}
	</td>
	<td>
		<button class="btn btn"><i class="fa fa-trash"></i></button>
	</td>
</tr>
</tbody>
</form>
@endforeach
</table>



<!-- <div class="row container">
	<img src="{{ asset('uploads/user_img/' . $res->resident_image) }}" alt="Image not found" style="width: 100px; height: 100px;">
</div>
<div class="row container">
	<form action="/update_image_resident" method="post" enctype="multipart/form-data">
	    {{csrf_field()}}
	    <input type="hidden" name="resident_id" value="{{$res->resident_id}}">
		<input type="file" class="" name="image" required="">
		<button class="btn btn-info">Upload</button>
		
	</form>
</div>
 -->


            <!-- ====================================================== -->
            @endforeach



<form action="/finish_adding_resident" method="get">
	<div class="row container">
		<button class="btn btn-info ">FINISH</button>
	</div>
</form>            

<div style="height: 200px;"></div>
</div>

</div>




@include('include.sys_javascript')

</body>

</html>







