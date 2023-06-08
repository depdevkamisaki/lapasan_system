

	<script>

		function auto_cal() {

			document.getElementById("SENIOR_ID").style.display = "none";
			document.getElementById("SPOUSE_NAME").style.display = "none";
			var income = document.getElementById("INCOME").value;

			
		    var userinput = document.getElementById("DOB").value;

		    var civil = document.getElementById("CIVIL_STATUS");
			
			var civil_final = civil.options[civil.selectedIndex].text;
		    

		    if(civil_final == "Married"){
				document.getElementById("SPOUSE_NAME").style.display = "block";
		    } 
		    if(civil_final == "Widowed"){
				document.getElementById("SPOUSE_NAME").style.display = "block";
		    } 



		    var dob = new Date(userinput);
		    if(userinput== null || userinput=='') {
		      // document.getElementById("message").innerHTML = "**Choose a date please!";  
		      return false; 
		    } else {

			    var month_diff = Date.now() - dob.getTime();
			    var age_dt = new Date(month_diff);   
			    var year = age_dt.getUTCFullYear();
			    var age = Math.abs(year - 1970);
			    
			
            // ==========================
			    console.log(age);
			    

			    document.getElementById("AGE").value = age + " Year/s Old";
                
                if(age >= 0 && age <= 14 ){
    			    	document.getElementById("AGECATEG").value ="Child"; 
    			    
    			}
                if(age >= 15 && age <= 29 ){
    			    	document.getElementById("AGECATEG").value ="Youth"; 
    			}
                if(age >= 30 && age <= 59 ){
    			    	document.getElementById("AGECATEG").value ="Adult"; 
    			}

			    if(age >= 60 ){
			    	document.getElementById("AGECATEG").value ="Senior Citizen"; 
			    	document.getElementById("SENIOR_ID").style.display = "block";
			    	document.getElementById("SCCH").checked = true;
			    	
			    }


			 //   ===========================


			    if(income < 12000){
			    	document.getElementById("INDIGENCY").value ="Indigent"; 
			    }
			    if(income >= 12000){
			    	document.getElementById("INDIGENCY").value ="Not Indigent"; 
			    }

			     
		    }
		    
		}


		function cal_income() {
			var income = document.getElementById("INCOME").value;

		    if(income < 10000){
		    	document.getElementById("INDIGENCY").value ="Indigent"; 
		    }
		    else{
		    	document.getElementById("INDIGENCY").value ="Not Indigent";
		    }
		}


		function auto_cal_age_docs() {
			var userinput = document.getElementById("DOB").value;
			var total_year_residing = document.getElementById("DATERES").value;

			
			var total_year_residing_2 = new Date(total_year_residing);
			var month_diff_res = Date.now() - total_year_residing_2.getTime();
			var res_age = new Date(month_diff_res);
			var year_res = res_age.getUTCFullYear();
			var age_res_lived = Math.abs(year_res - 1970);
			document.getElementById("TOTALYRLIVED").innerHTML = age_res_lived;


			
			var dob = new Date(userinput);
			var month_diff = Date.now() - dob.getTime();
			var age_dt = new Date(month_diff);
			var year = age_dt.getUTCFullYear();
			var age = Math.abs(year - 1970);
			console.log(age);
			document.getElementById("AGE").innerHTML = age + " Year/s Old";
			auto_cal_date();
	
		}


		function auto_cal_date() {
			const date = new Date();

			const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];


			let month_name = month[date.getMonth()];
			let year = date.getFullYear();
			let day= date.getDate(); 

			document.getElementById("MONTH").innerHTML = month_name;
			document.getElementById("YEAR").innerHTML = year;
			document.getElementById("DAY").innerHTML = day;
		}
		function open_notif() {
		  document.getElementById("my_notif").style.display = "block";
		}

		function closenotif() {
		  document.getElementById("my_notif").style.display = "none";
		}
		
		
		var datePickerId = document.getElementById("DOB");
		datePickerId.max = new Date().toLocaleDateString('fr-ca');
		var datePickerId_res = document.getElementById("DATEOFRESIDENCY");
		datePickerId_res.max = new Date().toLocaleDateString('fr-ca');
		
		

        function select_checkbox_list() {
          
            var boxes = document.getElementsByClassName('sectors_check_class');
            var checked = [];
            for(var i=0; boxes[i]; ++i){
              if(boxes[i].checked){
                checked.push(boxes[i].name);
              }
            }
            
            var checkedStr = checked.join();
            document.getElementById("SECTOR").value = checkedStr;
            
            // alert(checkedStr);
            
            return false;
            
            
        }
        
        document.getElementById("PWDIDNUM").style.display = "none";
        function pwd_sector_clicked(){
            if(document.getElementById("PWDCHB").checked){
                document.getElementById("PWDIDNUM").style.display = "block";
            }
            else{
                document.getElementById("PWDIDNUM").style.display = "none";
            }
            
            
        }
        
        // -------------------- Mapping ----------------------------
                
        var resident_latitude = document.getElementById("resident_latitude");
        var resident_longitude = document.getElementById("resident_longitude");
        
        
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          } else { 
            y.value = "Geolocation is not supported by this browser.";
          }
        }
   
        var mymap = L.map('node1Map').setView([8.483136428669386,124.66495330806833], 15);
        
        const attribution ='&copy: <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

        const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        const tiles = L.tileLayer(tileUrl, { attribution });
        
        tiles.addTo(mymap);
        
        var lat, lng, marker;
        mymap.on("click", function (e) {
          if (marker) mymap.removeLayer(marker);
          lat = e.latlng.lat;
          lng = e.latlng.lng;
          console.log(lat);
          console.log(lng);
          marker = L.marker([lat, lng]).addTo(mymap);
          document.getElementById("resident_latitude").value = lat;
          document.getElementById("resident_longitude").value = lng;
        });
        
     
        function showPosition(position) {
            resident_latitude.value = position.coords.latitude;
            resident_longitude.value = position.coords.longitude;
            if (marker) mymap.removeLayer(marker);
            
            marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(mymap);
            mymap.setView([position.coords.latitude, position.coords.longitude], 18)
          
        
        }


        
        

        
        
	</script>
	
	




<style>
div[style*="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"] {
    display: none !important;
}

img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
    display: none !important;
}

a[href*="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"] {
    display: none !important;
}
</style>