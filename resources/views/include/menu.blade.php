@include('include.notification')






<nav id="sidebar">
    <div class="sidebar-header text-center">
        <img src="{{ asset('uploads/user_img/logo.png') }}" alt="Image not found" style="width: 25%; height: 25%;">
        <h4>Barangay Lapasan</h4>
    </div>

    <ul class="list-unstyled">
        <p class="text-right">{{session()->get('session_personel_name')}}</p>

        <li>
        	<a href="/dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown "><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        </li>
        <li class="">
            <a href="#" data-toggle="collapse" aria-expanded="false" id="RESIDENTMENU" class="dropdown-toggle "><i class="fa fa-user" aria-hidden="true"></i> Resident</a>
            <ul class="collapse list-unstyled" id="RESIDENTSUBMENU">
                <li>
                   <a href="/new_resident"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Resident</a>
                </li>
                <li>
                    <a href="/resident_records"><i class="fa fa-list" aria-hidden="true"></i> Records</a>
                </li>
                <li>
                    <a href="/resident_records_bin"><i class="fa fa-trash" aria-hidden="true"></i>  Recycle Bin</a>
                </li>
            </ul>
        </li>


        <li class="">
            <a href="#" data-toggle="collapse" aria-expanded="false" id="DOCUMENTMENU" class="dropdown-toggle "><i class="fa fa-file-text" aria-hidden="true"></i> Request Documents</a>
            <ul class="collapse list-unstyled" id="DOCUMENTSUBMENU">
                <li>
                   <a href="/request_documents"><i class="fa fa-file-text" aria-hidden="true"></i> Request Document</a>
                </li>
                <li>
                    <a href="/open_barangay_clearance"><i class="fa fa-trash" aria-hidden="true"></i>  Clearance</a>
                </li> 
                <li>
                    <a href="/open_barangay_indigency"><i class="fa fa-list" aria-hidden="true"></i> Indigency</a>
                </li>
                <li>
                    <a href="/open_barangay_residency"><i class="fa fa-trash" aria-hidden="true"></i>  Residency</a>
                </li>          
            </ul>
        </li>



        <li class="">
            <a href="#" data-toggle="collapse" aria-expanded="false" id="BLOTTERMENU" class="dropdown-toggle "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Blotter</a>
            <ul class="collapse list-unstyled" id="BLOTTERSUBMENU">
                <li>
                   <a  href="/blotter_records_unsettled"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Unsettled Blotter</a>
                </li>

                <li>
                   <a  href="/blotter_records_settled"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Settled Blotter</a>
                </li>

                <li>
                    <a href="/open_new_blotter"><i class="fa fa-plus" aria-hidden="true"></i> New Blotter</a>
                </li> 
         
            </ul>
        </li>

        <li class="">
            <a href="#" data-toggle="collapse" aria-expanded="false" id="SETTINGSMENU" class="dropdown-toggle "><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
            <ul class="collapse list-unstyled" id="SETTINGSSUBMENU">
                <li>
                   <a  href="/settings_page/#personels_section"><i class="fa fa-user" aria-hidden="true"></i> Personels</a>
                </li>
                <li>
                    <a href="/settings_page/#officials_section"><i class="fa fa-star" aria-hidden="true"></i> Officials List</a>
                </li> 
                <li>
                    <a href="/settings_page/#sitio_section"><i class="fa fa-star" aria-hidden="true"></i> Sitio Leaders</a>
                </li> 

                <li>
                    <a href="/messaging"><i class="fa fa-envelope" aria-hidden="true"></i> Message</a>
                </li>

				<li>
                    <a href="/settings_page/#Statistics_section"><i class="fa fa-list" aria-hidden="true"></i> Statistics</a>
                </li>
         
            </ul>
        </li>

        <li>
        	<a href="/" data-toggle="collapse" aria-expanded="false" class="dropdown "><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
        </li>





      


        <li style="text-align: center;">
        	<p>{{date('Y-m-d')}}</p>
        </li>
</nav>





<script>
	function open_notif() {
	  document.getElementById("my_notif").style.display = "block";
	}
	function closenotif() {
	  document.getElementById("my_notif").style.display = "none";
	}
	function myFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
			x.className += " responsive";
			} else {
				x.className = "topnav";
			}
	}

    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
        $('#RESIDENTMENU').click(function(){
            $("#RESIDENTSUBMENU").toggle();
        });
        $('#DOCUMENTMENU').click(function(){
            $("#DOCUMENTSUBMENU").toggle();
        });
        $('#BLOTTERMENU').click(function(){
            $("#BLOTTERSUBMENU").toggle();
        });
        $('#SETTINGSMENU').click(function(){
            $("#SETTINGSSUBMENU").toggle();
        });
    });

</script>


