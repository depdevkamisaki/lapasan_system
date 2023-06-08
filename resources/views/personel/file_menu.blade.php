


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




        <form action="/open_barangay_clearance" method="get">
        	<button class="btn btn-dark form-control">BARANGAY CLEARANCE</button>
        </form>
        <br>

        <form action="/open_barangay_indigency" method="get">
        	<button class="btn btn-dark form-control">BARANGAY INDIGENCY</button>
        </form>
        <br>


        <form action="/open_barangay_residency" method="get">
        	<button class="btn btn-dark form-control">BARANGAY RESIDENCY</button>
        </form>









<div style="margin-top:800px;">
    <a class="" href="/open_barangay_clearance_v2">BARANGAY CLEARANCEv2</a>
	<a class="" href="/open_barangay_indigency_v2">BARANGAY INDIGENCYv2</a>
	<a class="" href="/open_barangay_residency_v2">BARANGAY RESIDENCYv2</a>
</div>


</div>





















        </div>
</div>


<script>
	



</script>

</body>



