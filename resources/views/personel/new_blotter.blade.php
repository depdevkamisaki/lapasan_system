
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
	            <h5 class="text-right"><i class="fa fa-plus" aria-hidden="true"></i> New Blotter</h5>
	        </div>


	        <form action="/add_blotter" method="get">
			  <div class="form-group">
			    <label >Complainant</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Complainant fullname" name="blotter_complainant">
			  </div>

			  <div class="form-group">
			    <label >Complainant</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Offender fullname" name="blotter_offender">
			  </div>

			  <div class="form-group">
			    <label >Category</label>
			    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Category" name="blotter_category">
			  </div>



			  <div class="form-group">
			    <label >Date</label>
			    <input type="date" class="form-control" id="date" name="blotter_date" aria-describedby="" placeholder="Category" name="blotter_category">
			  </div>
			  

			  <div class="form-group">
			    <label>Remarks</label>
			    <textarea class="form-control" rows="3" name="blotter_remarks"></textarea>
			  </div>

			  <div class="form-group">
			    <label>Description</label>
			    <textarea class="form-control" rows="3" name="blotter_remarks" name="blotter_description"></textarea>
			  </div>


			  <div class="form-group">
			    <label>Description</label>
			  		<select class="form-control" name="blotter_status">
						<option>Not Settled</option>
						<option>Settled</option>
					</select>
				</div>

			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>



			<div style="height: 200px;"></div>
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

