
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



            <div class="row"> 

                <div class="col-sm-6 text-center">
                    <h3>List of Barangay Officials</h3>
                    <br>
                    @foreach($official as $offi)
                        @if($offi->official_position != "Sitio Leader" && $offi->official_deleted == "")
                            <h5>{{$offi->official_name}}</h5>
                            <p style="margin-top: -10px;">{{$offi->official_position}}</p>
                        @endif
                    @endforeach
                </div>

                <div class="col-sm-6 text-center">
                    <h3>List of Barangay Lapasan sitio and Sitio Leaders</h3>
                    <br>
                    @foreach($official as $offi)
                        @if($offi->official_position == "Sitio Leader" && $offi->official_deleted == "")
                            <h5>{{$offi->official_name}}</h5>
                            <p style="margin-top: -10px;">{{$offi->official_position}} {{$offi->official_sitio}} </p>
                        @endif
                    @endforeach
                </div>



                


            </div>


        </div>
</div>


<script>
	



</script>

</body>