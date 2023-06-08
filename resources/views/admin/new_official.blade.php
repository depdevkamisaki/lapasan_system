
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
	            <h5 class="text-right"><i class="fa fa-star" aria-hidden="true"></i> New Official</h5>
	        </div>

			<a href="/settings_page" style="text-decoration: none; color: black;"><i class="fa fa-reply"></i> BACK</a>



	        <form action="/add_official" method="get">
			  <div class="form-group">
			    <label >Official Fullname</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Personel fullname" name="official_name">
			  </div>

			  <div class="form-group">
			    <label >Position</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Personel Username" name="official_position">
			  </div>

			  <div class="form-group">
			    <label >Introduction</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Password" name="personel_password">
			  </div>

			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>



			<div style="height: 200px;"></div>
		</div>
</div>



</body>
</html>
