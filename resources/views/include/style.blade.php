<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<style>


	


body{
  background-image: url("uploads/user_img/bg.png");
 /* background-repeat: no-repeat;  */
  font-family: Arial, Helvetica, sans-serif;
  letter-spacing: 0.5px;
}

.sidenav {
  width: 20%;
  background: white;
  float: left;
  position: fixed;
}
.menu_links{
  padding: 10px;
  margin-top: 10px;
  display: block;
  text-decoration: none;
  color: black;
  font-size: 15px;
}

.menu_links:hover{
  background-color: black;
  color: white;
}

.card_1{
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
  padding: 10px;
  margin-top: 10px;
}

.right_main{
  width: 65%;
  float: right;
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
  padding: 50px;
  background-color: white;
  padding-top: 10px;
}
.trans_right_main{
  float: right;
  widows: 70%;
  text-align: center;
}
.con_3{
	box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
	width: 30%;
	margin: auto;
	padding: 10px;
}
.col2{
  width: 40%;
  float: left;
}
hr{
  margin: 50px;
}
.button{
  background-color: black;
  border-style: none;
  padding: 10px 20px;
  color: white;
}

.button:hover{
  background-color: white;
  border-style: solid;
  color: black;
}
.btn_2{
  background-color: black;
  padding:5px 10px;
  color: white;
  border-style: none;
}

.header3{
  font-size: 16px;

  font-weight: 600;
  margin: 0px;
}
.header6{
  font-size: 13px;
  font-weight: 600;
  margin: 0px;
}
.links_documents_menu{
  background-color: black;
  color: white;
  display: block;
  margin-top: 20px;
  text-decoration: none;
  padding: 20px;
  border-style: solid;

}
.links_documents_menu:hover{
  background-color: white;
  color:black;
  border-style: solid;
}
.login{
  padding: 20px;
  height: 300px;
  background-color: white;
}
.login input{
  width: 95%;
  margin-top: 20px;
  height: 20px;
}
.blotter input{
  width: 90%;
  margin-top: 10px;
  height: 28px;
}

.blotter textarea{
  width: 90%;
  margin-top: 10px;
  height: 70px;
}

.blotter select{
  width: 90%;
  margin-top: 10px;
  height: 30px;
}

.blotter_cards p{
  margin: 2px;
}
/*------------------------*/

.row{
  width: 100%;
  float: left;
  margin-bottom: 10px;
}
.col3{
  width: 33%;
  float: left;  
}
.col3 input{
  width: 95%;
  height: 20px;
}
.col4{
  width: 20%;
  float: left;
}
.col3 select{
  width: 96%;
  height: 25px;
}
.label{
  font-size: 11px;
  margin-top: -1px;
  
}

.pheader{
  font-weight: 600;
  margin: 1px;
}
.pbody{
  margin: 1px;
  margin-bottom: 0px;
}
.paragraph{
  font-size: 20px;
  line-height: 1.7;
  text-align: justify;
}

.logs_con{
  height: 50px;
  border-left-style: solid;
  padding: 5px;
  margin-top: 10px;
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
}
.trans_btn{
  background-color: transparent;
  border-style: none;
}
.official_input{
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
  width: 80%;
  padding: 10px;
}
.official_input input{
  width: 40%;
  height: 25px;
}

.box{
  float: left;
}

.not_box{
  background-color:white; 
  width: 30%; 
  height: 120px;
  border-style: solid; 
  border-width: 2px; 
  border-radius: 3px; 
  position:fixed; 
  top:20; 
  right: 35%;
  border-width: 1px;
  display: none;
  text-align: center;
  padding-top: 10px;
  margin-top: 3px;
}

.block_dis{
	
}

.login_logo{
    width:100px;
    float:left;
}
.login_title{
    width: 90%;
    margin:auto;
    text-align:center;
    font-size: 25px;
    font-weight: 900;
}
.login_box{
    width: 30%;
    margin-top:50px;
}
h2{
    font-size:20px;
    text-align:center;
    font-weight: 900;
}
/*============================*/
.topnav{
	display:none;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
    h2{
        font-size:14px;
        font-weight: 900;
    }
    .login_logo{
        width:50px;
    }
    .login_title{
        font-size:12px;
    }
    .login_box{
        width:80%;
        
    }
    
	.not_box{
		width:96%;
		position:none;
		margin:auto;
		right:1%;
	
	}
	.col3{
		width:100%;
		display:block;
	}
	.col4{
		width:100%;
		display:block;
	}
	.col2{
		width:100%;
		display:block;
	}
	.topnav{
		display:block;
		margin-bottom:10px;
	}
	.sidenav{
		display:none
	}
	.block_dis{
		display:block;
		width:90%;
	}
	.right_main{
		width:94%;
		padding:10px;
	}
	.topnav.responsive {position: relative;}
	.topnav.responsive .icon {
		position: absolute;
		right: 0;
		top: 0;
		}
	.topnav.responsive a {
		float: none;
		display: block;
		text-align: left;
		}
}



</style>