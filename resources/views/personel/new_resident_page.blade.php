<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	@include('include.style_v2')
    @include('include.nav_bar_style')
</head>

<body onload="auto_cal();">




<div class="wrapper">
        <!-- Sidebar  -->
        @include('include.menu')


        <!-- Page Content  -->
        <div id="content">

            @include('include.nav_top')


            <!-- ====================================================== -->

            <div class="row container"> 
				<img src="{{ asset('uploads/user_img/user_img.jpg') }}" alt="Image not found" style="width: 100px; height: 100px;">	
            </div>
            <div class="row container">
            	<p class="" style="color:green;">Image Uploading is done in Step 2</p><br>
            </div>

            <br>

            
<form action="/add_resident" method="get">

	<div class="form-row">
	    <div  class="form-group col-md-4">
	    	<label>Lastname</label>
	    	<input type="text" class="form-control" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" name="resident_lastname" placeholder="Last Name">
	    </div>
	    <div class="form-group col-md-4">
	    	<label>Firstname</label>
	    	<input type="text" class="form-control" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" name="resident_firstname" placeholder="First Name">
	    </div>
	   	<div  class="form-group col-md-3">
	    	<label>Middlename</label>
	    	<input type="text" class="form-control" required="" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" name="resident_middlename" placeholder="Middle Name">
	    </div>

	   	<div  class="form-group col-md-1">
	    	<label>Suffix</label>
	    	<input type="text" class="form-control" onkeydown="return /[a-z, ]/i.test(event.key)" onblur="if (this.value == '') {this.value = '';}" onfocus="if (this.value == '') {this.value = '';}" name="resident_suffix" placeholder="Suffix (Jr./ Sr./ I.)">
	    </div>	     
	</div>



	<div class="form-row">
		<div  class="form-group col-md-2">
			<label>Gender</label>
			<select name="resident_gender" class="form-control">
				<option>Female</option>
				<option>Male</option>
			</select>
		</div>

	    <div  class="form-group col-md-3">
	    	<label>Birthdate</label>
	    	<input type="date" class="form-control" onchange="auto_cal();" id="DOB" required="" name="resident_birthdate" min="1900-01-01">
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
	    	<input type="text" class="form-control" required="" name="resident_contactnumber" placeholder="Phone Number">
	    </div>	
	</div>


	<div class="form-row" id="SENIOR_ID">
		<div class="form-group col-md-3">
			<label>Senior citizen ID</label>
			<input type="text" class="form-control"  name="resident_srid" placeholder="Sernior ID">
		</div>
	</div>


	<div class="form-row">
		<div class="form-group col-md-5">
			<label>House no.</label>
			<input type="text" class="form-control" name="resident_housenumber" placeholder="Door No. / Building Name">
		</div>
		<div class="form-group col-md-4">
			<label>Street</label>
			<input type="text" class="form-control"  name="resident_street" placeholder="Street">
		</div>
		<div class="form-group col-md-3">
			<label>Barangay</label>
			<input type="text" class="form-control"  name="resident_barangay" placeholder="Barangay" value="Lapasan" readonly="">
		</div>


	</div>



	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Sitio</label>
			<select name="resident_sitio" class="form-control">
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
			<input type="text" class="form-control" name="resident_village" placeholder="Village">
		</div>
		<div class="form-group col-md-4" >
			<label>City</label>
			<input type="text" class="form-control" name="resident_city" placeholder="City" value="Cagayan De Oro City" readonly="">
		</div>
	</div>




	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Date of Residency</label>
			<input type="date" class="form-control" required=""  id="DATEOFRESIDENCY" name="resident_dateofresidency"  min="1900-01-01">
		</div>
		<div class="form-group col-md-6">
			<label>Province</label>
			<input type="text" class="form-control" required="" name="resident_province" value="Misamis Oriental" readonly="">
		</div>
		<div class="form-group col-md-2">
			<label>Zipcode</label>
			<input type="text" class="form-control" required="" name="resident_zipcode" value="9000" readonly="">
		</div>
	</div>



	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Occupatio</label>
			<input type="text" class="form-control" name="resident_occupation" placeholder="Occupation" value="N/A">
		</div>
		<div class="form-group col-md-4">
			<label>Monthly Income</label>
			<input type="number" class="form-control" id="INCOME" onkeyup="cal_income();" required="" name="resident_monthlyincome" placeholder="Monthly Income">
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
				<option>Single</option>
				<option>Married</option>
				<option>Widowed</option>
				<option>Separated</option>
			</select>
		</div>

		<div class="form-group col-md-4">
			<label>Sector</label>
			<input type="text" class="form-control" name="resident_sector" id="SECTOR" readonly="" placeholder="Sector">
		</div>
		<div class="form-group col-md-4" id="SPOUSE_NAME">
			<label>Spouse</label>
			<input type="text" class="form-control" name="resident_spouse" placeholder="Spouse">	
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
			<input type="text" class="form-control" name="resident_pwdid"  placeholder="PWD ID Number">
		</div>		
	</div>


	<div  class="form-row">
		<div class="form-group col-md-4">
			<label>Longitude</label>
			<input type="text" class="form-control" name="resident_longitude_name"  placeholder="Coordinate Longitude"  id="resident_longitude" readonly="">
		</div>	
		<div class="form-group col-md-4">
			<label>Latitude</label>
			<input type="text" class="form-control" name="resident_latitude_name" id="resident_latitude" placeholder="Coordinate Latitude" readonly="">
		</div>
	</div>	

	<div class="form-row">
		<div class="form-group col-md-4">
			<button type="button" onclick="getLocation();" class=" btn btn-info"><i class="fa fa-map-pin"></i> Pin Location</button>
		</div>
	</div>


	<div class="row">
		<div class="container">
			<p>Please pin the exact house location to get coordinates.</p>
		    <!-- <div id="osm-map"></div> -->
		    <div id="node1Map" style="height:400px;"></div>
		</div>
	</div>

	
	<br>

	<div class="form-row">
		<div class="form-group col-md-4">
			<button class="btn btn-info">NEXT</button>
		</div>
	</div>
    </form>
        </div>


            <!-- ====================================================== -->
        </div>
</div>

@include('include.sys_javascript')

</body>

</html>







