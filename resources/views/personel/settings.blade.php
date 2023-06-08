
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
            <h5 class="text-right"><i class="fa fa-cogs" aria-hidden="true"></i> Logs</h5>


            <a style="text-decoration: none; color: black" href="/open_new_personel"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Personel</a>
			| |
			<a style="text-decoration: none; color: black" href="/open_new_official"><i class="fa fa-star" aria-hidden="true"></i> New Officials</a>

        </div>


        <br>



        <h5><i class="fa fa-list"></i> Logs</h5>
        <div class="container" id="logs" style="height: 300px; overflow-y: scroll;">
            	<table class="table">
        		<thead>
        			<tr>
        				<th>
        					Time
        				</th>
        				<th>
        					Description
        				</th>
        			</tr>
        		</thead>
        		<tbody>
        	@foreach($log as $lg)
				@if($lg->resident_id != "")
					<tr>
						<td>
							{{$lg->log_time}}
						</td>
						<td>
							Personel #{{$lg->personel_id}} Action: {{$lg->log_description}} - Resident ID: #{{$lg->resident_id}}.
						</td>
					</tr>
				@endif	


				@if($lg->blotter_id != "")
					<tr>
						<td>
							{{$lg->log_time}}
						</td>
						<td>
							Personel #{{$lg->personel_id}} Action: {{$lg->log_description}} - {{$lg->blotter_id}}.
						</td>
					</tr>
				@endif	


				@if($lg->personel_added_id != "")
					<tr>
						<td>
							{{$lg->log_time}}
						</td>
						<td>
							Personel #{{$lg->personel_id}} Action: {{$lg->log_description}} - Resident ID: #{{$lg->personel_added_id}}.
						</td>
					</tr>
				@endif	

			@endforeach
				</tbody>
			</table>
        </div>



<hr>





        <h5><i class="fa fa-star"></i> Officials</h5>
        <div class="container" id="officials_section">



			<a style="text-decoration: underline; color: black" href="/open_new_official">New Officials</a>
        	



        	<table class="table">
        		<thead>
        			<tr>
        				<th>
        					Name
        				</th>
        				<th>
        					Position
        				</th>
        				<th>
        					Action
        				</th>
        			</tr>
        		</thead>
        		
        		<tbody>
        			@foreach($official as $offi)
                        @if($offi->official_deleted == "" && $offi->official_position != "Sitio Leader")
        			<tr>
        				<td>
        					<form action="/save_official" method="get" style="display: inline;">
								<input type="hidden" name="official_id" value="{{$offi->official_id}}">
								<input type="text" name="official_name" placeholder="Official Name" required="" class="form-control" value="{{$offi->official_name}}">	
        				</td>
        				<td>
        					<input type="text" name="official_position" required="" placeholder="Position" class="form-control" value="{{$offi->official_position}}">
        				</td>

        				<td>
        					<button class="btn btn-info"><i class="fa fa-save"></i></button>
							</form>

							<form action="/delete_official" method="get"  style="display: inline;">
								<input type="hidden" name="official_id" value="{{$offi->official_id}}">
								<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
							</form>
        				</td>

        			</tr>
                    @endif
	    			@endforeach
				</tbody>
				
			</table>
        </div>






        <h5><i class="fa fa-user"></i> Personels</h5>
        <div class="container" id="personels_section">


        	<a href="/open_new_personel" style="text-decoration: underline;">New Personel</a>

        	<table class="table">
        		<thead>
        			<tr>
        				<th>
        					Name
        				</th>
        				<th>
        					Username
        				</th>
        				<th>
        					Password
        				</th>
        				<th>
        					Action
        				</th>
        			</tr>
        		</thead>
        		
        		<tbody>
        			@foreach($personel as $per)
        			<tr>
        				<td>
        					<form action="/save_personel" method="" style="display: inline;">
								<input type="hidden" name="personel_id" value="{{$per->personel_id}}">

								<input type="text" class="form-control" name="personel_name" value="{{$per->personel_name}}" placeholder="Name" required="">
		        		</td>
		        				
		        					
        			
        				<td>
        					<input type="text" class="form-control" name="personel_username" value="{{$per->personel_username}}" placeholder="Username" required="">
        				</td>
        				<td>
        					<input type="text" class="form-control" name="personel_password" value="" placeholder="Password" required="">
        				</td>

        				<td>
        					<button class="btn btn-info"><i class="fa fa-save"></i></button>
							</form>
       
        					<form action="/delete_personel" method="get" style="display: inline;">
								<input type="hidden" name="personel_id" value="{{$per->personel_id}}">
								<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
							</form>
        				</td>

        			</tr>
	    			@endforeach
				</tbody>
				
			</table>
        </div>







       
        <div class="container" id="sitio_section">
         <h5><i class="fa fa-user"></i> Sitio Leader</h5>
         


            <form action="/add_sitio_leader/#sitio_section" method="get">
                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Sitio Leader fullname" name="official_name">
                </div>
                <div class="form-group">
                    <label >Sitio</label>
                    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Sitio" name="official_sitio">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>

            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Sitio
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($official as $offi)
                        @if($offi->official_position == "Sitio Leader" && $offi->official_deleted == "")
                        <tr>
                            <td>
                            <form action="/save_sitio_leader/#sitio_section" method="get" style="display: inline;">
                                <input type="hidden" name="official_id" value="{{$offi->official_id}}">
                                <input type="text" name="official_name" placeholder="Official Name" required="" class="form-control" value="{{$offi->official_name}}">  
                            </td>
                            <td>
                                <input type="text" name="official_sitio" required="" placeholder="Sitio" class="form-control" value="{{$offi->official_sitio}}">
                            </td>

                            <td>
                                <button class="btn btn-info"><i class="fa fa-save"></i></button>
                                </form>
                                <form action="/delete_official/#sitio_section" method="get"  style="display: inline;">
                                    <input type="hidden" name="official_id" value="{{$offi->official_id}}">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>

                        </tr>
                        @endif
                    @endforeach
                </tbody>
                
            </table>
        </div>
        <div style="height: 200px;">
        	
        </div>








        
        <div class="container" id="Statistics_section">
        	<div style="height: 100px;">
        		
        	</div>
        	<h5><i class="fa fa-user"></i> Statistics</h5>

        	<div class="row">
        		<div class="col-sm-4">
        			<div class="box">
        				<div class="chart" data-percent="{{session()->get('per_female')}}">{{session()->get('per_female')}}%</div>
		        	    <p class="header6">Female Count: {{session()->get('female')}}</p>
        			</div>
        		</div>
        		<div class="col-sm-4">
        			<div class="box">
        				<div class="chart" data-percent="{{session()->get('per_male')}}">{{session()->get('per_male')}}%</div>
		        		<p class="header6">Male Count: {{session()->get('male')}}</p>
        			</div>
        		</div>
        	</div>

        	<div class="row">
        		 <div class="col-sm-4">
        		 	<div class="box">
        		 		<div class="chart" data-percent="{{session()->get('per_indigent')}}">{{session()->get('per_indigent')}}%</div>
		        	    <p class="header6">Indigent Count: {{session()->get('indigent')}}</p>
        		 	</div>
        		 </div>
        		 <div class="col-sm-4">
        		 	<div class="box">
        		 		<div class="chart" data-percent="{{session()->get('per_pwd')}}">{{session()->get('per_pwd')}}%</div>
		        		<p class="header6">PWD Count: {{session()->get('pwd')}}</p>
        		 	</div>
        		 </div>
        	</div>
        </div>








<div style="height: 500px;">
	
</div>



	

	




</div>
</div>


<script>
$(function() {
  $('.chart').easyPieChart({
    size: 160,
    barColor: "#36e617",
    scaleLength: 0,
    lineWidth: 15,
    trackColor: "#525151",
    lineCap: "circle",
    animate: 2000,
  });
});
</script>
</body>











