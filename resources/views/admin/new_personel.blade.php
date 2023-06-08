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
	            <h5 class="text-right"><i class="fa fa-user-plus" aria-hidden="true"></i> New Personel</h5>
	        </div>

			<a href="/settings_page" style="text-decoration: none; color: black;"><i class="fa fa-reply"></i> BACK</a>



	        <form action="/add_personel" method="get">
			  <div class="form-group">
			    <label >Fullname</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Personel fullname" name="personel_name">
			  </div>

			  <div class="form-group">
			    <label >Username</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Personel Username" name="personel_username">
			  </div>

			  <div class="form-group">
			    <label >Password</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Password" name="personel_password">
			  </div>


			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>



			<div style="height: 200px;"></div>
		</div>
</div>





<script>


</script>

</body>
</html>

