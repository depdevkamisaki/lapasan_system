
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
            <h5 class="text-right"><i class="fa fa-folder" aria-hidden="true"></i> Deleted Records</h5>
        </div>

<!-- 
        <form action="/search_resident" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Lastname Firstname Middlename" aria-label="Lastname Firstname Middlename" name="search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-info" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
        </form>
       




    <div class="container">
            <a href="/new_resident" style="text-decoration: none; color: black"><i class="fa fa-user-plus" aria-hidden="true"></i> New Resident</a>

    | |
    <a href="/resident_records"  style="text-decoration: none; color: black"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>
        </div>

 -->

    <table class="table">
        <thead >
            <tr>
                <th class="">
                    Image
                </th>
                <th class="col">
                    Information
                </th>
               
                <th class="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($residents as $res)
                @if($res->resident_deleted == "yes")
                <tr>
                    <td>
                        <img src="{{ asset('uploads/user_img/' . $res->resident_image) }}" alt="Image not found" style="width: 50px; height: 50px; margin-right: 1px;" onerror="this.src='fallback-img.jpg'">
                    </td>
                    <td>
                        <h6>{{$res->resident_lastname}}, {{$res->resident_firstname}} {{$res->resident_middlename}} {{$res->resident_suffix}}</h6>
                        <h6>{{$res->resident_gender}}</h6>
                    </td>
             
          
                    <td>
                        <form action="/view_resident" method="get">
                            <input type="hidden" name="resident_id" value="{{$res->resident_id}}">
                            <button class="btn btn-info">Open</button>
                        </form>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>


</div>
            </div>


        </div>
</div>


<script>
    



</script>

</body>