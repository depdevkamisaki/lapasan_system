<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		WELCOME
	</title>

	@include('include.style_v2')


</head>
<body>
    

@if(session()->has('notification'))
    <script>
        swal("{{session()->get('notification')}}");
    </script>
    
   
@endif
@if(session()->has('log_out'))
@endif

	

<div style="padding: 20px;">
	<img class="small_logo" src="{{url('uploads/user_img/logo.png')}}" >
	<h2 class="text-center system_title">BARANGAY LAPASAN RESIDENTS RECORDS MANAGEMENT  AND INSSUANCE SYSTEM</h2>
</div>


<br>
<br>

<div class="login">

	<h5 class="text-center">Personel Login</h5>
	<form action="/login_personel" method="get">

	  <div class="form-group">
	    <label for="username_id">Username</label>
	    <input type="text" class="form-control" id="username_id" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
	    <small id="emailHelp" class="form-text text-muted">Input username.</small>
	  </div>

	  <div class="form-group">
	    <label for="password_id">Password</label>
	    <input type="password" class="form-control" id="password_id" name="password" placeholder="Password">
	  </div>

	  <button type="submit" class="btn btn-primary">Login</button>
	</form>

</div>



















<script>
	

		function open_notif() {
		  document.getElementById("my_notif").style.display = "block";
		}

		function closenotif() {
		  document.getElementById("my_notif").style.display = "none";
		}

</script>
</body>
</html>

