
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
            <h5 class="text-right"><i class="fa fa-envelope" aria-hidden="true"></i> Message</h5>
        </div>


        <form action="/search_resident" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Lastname Firstname Middlename" aria-label="Lastname Firstname Middlename" name="search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-info" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
        </form>
       



<h5 class="text-right">Residents</h5>


    {!! $residents->links('pagination::bootstrap-4') !!}
    <table class="table">
        <thead >
            <tr>
                <th >
                    Image
                </th>
                <th class="col">
                    Information
                </th>
               
    
            </tr>
        </thead>

        <tbody>
            @foreach($residents as $res)
                @if($res->resident_deleted == "" && $res->resident_message == "")
                <tr>
                    <td>
                        <img src="{{ asset('uploads/user_img/' . $res->resident_image) }}" alt="Image not found" style="width: 50px; height: 50px; margin-right: 1px;" onerror="this.src='fallback-img.jpg'">
                    </td>
                    <td>
                        <h6>{{$res->resident_lastname}}, {{$res->resident_firstname}} {{$res->resident_middlename}} {{$res->resident_suffix}}</h6>
                        <h6>{{$res->resident_gender}}</h6>
                    </td>
             
        

                    <td>
                        <form action="/single_message" method="get">
                            <input type="hidden" name="resident_id" value="{{$res->resident_id}}">
                            <button class="btn btn-dark"><i class="fa fa-envelope"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="/view_resident" method="get">
                            <input type="hidden" name="resident_id" value="{{$res->resident_id}}">
                            <button class="btn btn-info"><i class="fa fa-info-circle"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="/add_to_recepient" method="get">
                            <input type="hidden" name="resident_id" value="{{$res->resident_id}}">
                            <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                        </form>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>






<hr id="selected_recepients">







<form action="/send_message" method="get">
    <div class="form-group">
    <label>Message</label>
    <input type="hidden" name="type" value="multiple">
<textarea class="form-control" rows="3" name="message">Type Message Here...</textarea>
    <small>Send message to all selected recepient below.</small>
    </div>

    <button class="btn btn-info"><i class="fa fa-send"></i> SEND</button>
</form>



<hr>


<h5 class="text-right">Selected Recepients</h5>

<form action="remove_all_re/#selected_recepients" class="" method="get">
    <button class="btn btn-danger"><i class="fa fa-trash"></i> Remove all</button>
</form>



<br>
    <table class="table">
        <thead >
            <tr>
                <th class="">
                    Image
                </th>
                <th class="col">
                    Information
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach($residents_selected as $res)
                @if($res->resident_deleted == "")
                <tr>
                    <td>
                        <img src="{{ asset('uploads/user_img/' . $res->resident_image) }}" alt="Image not found" style="width: 50px; height: 50px; margin-right: 1px;" onerror="this.src='fallback-img.jpg'">
                    </td>
                    <td>
                        <h6>{{$res->resident_lastname}}, {{$res->resident_firstname}} {{$res->resident_middlename}} {{$res->resident_suffix}}</h6>
                        <h6>{{$res->resident_gender}}</h6>
                    </td>
             
        

                    <td>
                        <form action="/remove_to_recepient/#selected_recepients" method="get">
                            <input type="hidden" name="resident_id" value="{{$res->resident_id}}">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>

                    <td>
                        <form action="/view_resident/#selected_recepients" method="get">
                            <input type="hidden" name="resident_id" value="{{$res->resident_id}}">
                            <button class="btn btn-info"><i class="fa fa-info-circle"></i></button>
                        </form>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>





    <div style="height: 500px;">
        
    </div>

</div>
</div>







<script>
    



</script>

</body>