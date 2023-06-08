
@if(session()->has('notification'))
    <script>
        swal("{{session()->get('notification')}}");
    </script>
    
   
@endif
@if(session()->has('log_out'))
@endif




