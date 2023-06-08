
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
            <h5 class="text-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Blotter Records</h5>
        </div>

        <form action="/search_blotter" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Complainant name" aria-label="Complainant name" name="search" aria-describedby="basic-addon2">

            <div class="input-group-append">
                <button class="btn btn-outline-info" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
        </form>
       


	<a href="/open_new_blotter" style="text-decoration: none; color: black"><i class="fa fa-plus" aria-hidden="true"></i> New Blotter</a>

	| |
	<a href="/blotter_records"  style="text-decoration: none; color: black"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>


	


<h6 class="text-right">Not Settled</h6>


{!! $blotter->links('pagination::bootstrap-4') !!}
    <table class="table">
    	
        <thead >
            <tr>
                <th>
                  Status
                </th>
                <th >
                   Date
                </th>
               
                <th >
                	Complainant
                </th>
                <th>
                	Offender
                </th>
                <th>
                	Action
                </th>
            </tr>
        </thead>

        <tbody>
        	@foreach($blotter as $blot)
				
           
                <tr>
                    <td>
                       {{$blot->blotter_status}}
                    </td>
                    <td>
            			{{$blot->blotter_date}}
                    </td>
                    <td>
                    	{{$blot->blotter_complainant}}
                    </td>
                    <td>
                    	{{$blot->blotter_offender}}
                    </td>
             
                    <td>
						<form action="/blotter_info" method="get">
							<input type="hidden" name="blotter_id" value="{{$blot->blotter_id}}">
							<button class="btn btn-info"><i class="fa fa-file"></i> OPEN</button>
						</form>
                        
                    </td>
                </tr>
           
            @endforeach 
        </tbody>
    </table>



</div>
</div>





<script>
    



</script>

</body>






