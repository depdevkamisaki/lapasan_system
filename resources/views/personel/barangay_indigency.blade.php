


<!DOCTYPE html>
<html>
<head>
	<title></title>
	@include('include.style')
	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body style="background-image: none;" onload="auto_cal_age_docs();">




<div style="text-align: right;">
	<a style=" text-decoration: none; color: black" href="/request_documents" style=""><i class="fa fa-reply" aria-hidden="true"></i> BACK</a>
</div>

<div 
	x-data="{
		printDiv() {
			var printContents = this.$refs.container.innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	}" 
	x-cloak
	x-ref="container">

	@isset($printButton)
		{{ $printButton }}

	@else

		<div style="position: fixed; top: 1px;">
			<button  class="button" style="padding: 8px 15px; border-style: solid; " x-on:click="printDiv()">PRINT <i class="fa fa-print" aria-hidden="true"></i></button>
		</div>
	@endisset

	<br>





<!-- =============== -->

<img src="{{url('uploads/user_img/Picture1.png')}}" width="1000px;" height="1250px" style="margin-top: 50px;">
		
		<div style="width: 25%; text-align: center;position: absolute;top: 15px;left: 16px; font-size: 14px;color: white;text-shadow: 0 0 0px #fff;" >
			<img src="{{url('uploads/user_img/logo.png')}}" width="150px;" height="150px;" style="margin-top: 120px;">
			<p class="pheader">SANGGUNIANG BARANGAY OFFICIALS STANDING COMMITTEES</p>

			<br>

			<p  class="pheader">HON. JULITO D. OGSIMER</p>
			<p class="pbody">BARANGAY CHAIRMAN</p>
			<br>


			<p  class="pheader">HON. ELSIE P. LOPOY</p>
			<p class="pbody">Chairperson, Finance Committee,
			Chairperson, Laws and Rules,
			Woman and Gender Development
			Family & Children’s Protection
			and Livelihood</p>
			<p  class="pheader">BARANGAY KAGAWAD</p>
			<br>


			<p  class="pheader">HON. KENNETH RAY E. LAO</p>
			<p class="pbody">Chairperson, Infrastructure and Public Works</p>
			<p  class="pheader">BARANGAY KAGAWAD</p>
			<br>




			<p  class="pheader">HON. MARK ANTHONY B. BUSTAMANTE</p>
			<p class="pbody">Chairperson, Peace and Order, Public Utility& Safety</p>
			<p  class="pheader">BARANGAY KAGAWAD</p>
			<br>


			<p  class="pheader">HON. ASPIRINO N.  BACONGA</p>
			<p class="pbody">Chairperson, Environmental Protection, Sanitation, Agriculture & Fisheries Development, Civic and Sitio Affairs</p>
			<p  class="pheader">BARANGAY KAGAWAD</p>
			<br>


			<p  class="pheader">HON. FORTUNATO S.  MELODIA</p>
			<p class="pbody">Chairperson, Health and Social Services Cooperatives, Business and Investment</p>
			<p>BARANGAY KAGAWAD</p>
			<br>


			<p  class="pheader">HON. ROWENA RAYE M. MEDIANA</p>
			<p class="pbody">Chairperson, Education and Tourism</p>
			<p  class="pheader">BARANGAY KAGAWAD</p>
			<br>


			<p  class="pheader">HON. CAROL JANE A. BILAR</p>
			<p class="pbody">Committee on Youth Sports and Cultural Development</p>
			<p  class="pheader">SK CHAIRMAN</p>
			<br>


			<p  class="pheader">VANIAH KATE C. TAPIA</p>
			<p>Barangay Secretary</p>



		</div>

		<div style="width: 60%; position: absolute;top: 8px;right: 50px; padding-top: 30px; font-size: 20px;">

		@foreach($resident as $res)
			<div style="text-align: center; margin-top: 60px;">
				<p class="pbody">Republic of the Philippines</p>
				<p class="pbody">City of Cagayan de Oro</p>
				<p style="font-weight: 600; margin: 1px; font-size: 25px">BARANGAY LAPASAN</p>
				<br>
				<p style="font-weight: 600; margin: 1px; font-size: 25px">OFFICE OF THE BARANGAY CHAIRMAN</p>
				<p style="font-size: 15px; margin: 1px;">Tel. No. (08822) 881-9850</p>
				<p style="margin: 1px; font-size: 15px; color: red;">E-mail: GodblessLapasan2018@gmail.com</p>
				<p style="font-weight: 900;font-size: 25px; text-decoration: underline;">CERTIFICATE OF INDIGENCY</p>
			
			</div>



			<table  style="width: 100%;">
				<tr>
					<td style="width: 100%;">
				
					</td>
					<td style="text-align: center;">
						<p style="font-weight: 900">Control #:<span style="text-decoration: underline;"><span id="DAY"></span>{{$res->resident_id}}</span></p>
						<p style="text-decoration: underline; font-weight: 900">_______________________<br>(Applicant signature)</p>
					</td>
				</tr>
			</table>

					
					
	

			<p style="font-weight: 600; font-size: 20px; ">To Whom It May Concern:</p>

			<input type="hidden" name="" id="DOB" value="{{$res->resident_birthdate}}">
			<p class="paragraph">
				This is to certify that  <span style="text-decoration: underline; text-transform: uppercase; font-weight: 600">{{$res->resident_fullname}}, <span id="AGE"></span></span> , a bonafide resident of Sitio {{$res->resident_sitio}} {{$res->resident_village}}, Lapasan, Cagayan de Oro City, is an INDIGENT as stated in his/her Sitio clearance submitted to this office.
			</p>

			<p class="paragraph">
				This certification is issued upon the request of the above name mentioned as a requirement for <span style="text-transform: uppercase; font-weight: 600; text-decoration: underline;">{{session()->get('session_document_purpose')}}</span> and for whatever legal intent it may serve him/her best. 
			</p>





			<p class="paragraph">
				Issued this <span id="DAY"></span> day of <span id="MONTH"></span>, <span id="YEAR"></span> at  LGU Barangay Lapasan, Cagayan de Oro City.	
			</p>

			<table  style="width: 100%;">
				<tr>
					<td style="width: 50%;">
				
					</td>
					<td style="text-align: center;">
						<p class="pheader">{{session()->get('session_official_name')}}</p>
                        <p>{{session()->get('session_official_position')}}</p>
					</td>
				</tr>
			</table>

					
					

	

		    
                                        

        <p class="pheader">By the authority of The Punong Barangay:</p>             
   
			<table  style="width: 100%; margin-top: 40px;" >
				<tr>
					<td style="width: 10%;">
				
					</td>
					<td style="text-align: center;">
						<p class="pheader">JEOFFREY E. BACONGA, IVLP FELLOW (USG ALUM)</p>
                        <p>Barangay Administrator</p>
					</td>
				</tr>
			</table>

			<p style="font-size: 12px; font-weight: 600">*Not valid without official dry seal.</p>
			


                         
                                              

			<!-- ========================= -->
<!-- 			<p>{{session()->get('session_document_remarks')}}</p> -->
<!-- 			
			<p>{{$res->resident_firstname}}</p>
			<p>{{$res->resident_lastname}}</p>
			<p>{{$res->resident_middlename}}</p>
			<p>{{$res->resident_birthdate}}</p> -->
		@endforeach
		</div>
<!-- ====== -->
	

</div>
  

 @include('include.sys_javascript')

</body>
</html>

