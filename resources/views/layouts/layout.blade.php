<!DOCTYPE html>
<html>
<head>
<title>College</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
    <!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-left">College</span>
  
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    
    <div class=" w3-bar">
    <span>Welcome, <strong>{{Auth::user()->name}}</strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
   
    <div class="w3-dropdown-hover">
    <button class="w3-button">Users Management
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
    <a href="{{url('/admin/admin/list')}}" class="w3-bar-item w3-button "><i class="fa fa-circle-thin" aria-hidden="true"></i> Admins</a>
    <a href="{{url('/admin/student/list')}}" class="w3-bar-item w3-button "><i class="fa fa-circle-thin" aria-hidden="true"></i> Students</a>
    <a href="{{url('/admin/teacher/list')}}" class="w3-bar-item  w3-button"><i class="fa fa-circle-thin" aria-hidden="true"></i> Teacher </a>
    <a href="{{url('/admin/receptionist/list')}}" class="w3-bar-item w3-button"><i class="fa fa-circle-thin" aria-hidden="true"></i> Receptionist </a>
    <a href="{{url('/admin/payment/list')}}" class="w3-bar-item w3-button"> <i class="fa fa-circle-thin" aria-hidden="true"></i> Students </a>
    </div>
  </div>
    <div class="w3-dropdown-hover">
    <button class="w3-button">Term Management
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
    <a href="{{url('/admin/fee/list')}}" class="w3-bar-item w3-button "> <i class="fa fa-circle-thin" aria-hidden="true"></i> Diploma </a>
    <a href="{{url('/admin/cert/list')}}" class="w3-bar-item w3-button "><i class="fa fa-circle-thin" aria-hidden="true"></i> Certificate </a>
    </div>
  </div>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Fees Module
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
    <a href="{{url('/admin/payment/paymentlist')}}" class="w3-bar-item w3-button"><i class="fa fa-circle-thin" aria-hidden="true"></i> Payments List </a>
    <a href="{{url('/admin/payment/pay_aggregate')}}" class="w3-bar-item w3-button"><i class="fa fa-circle-thin" aria-hidden="true"></i> Fee Paid </a>
    </div>
  </div>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Academics
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
    <a href="{{url('/admin/class/list')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-circle-thin" aria-hidden="true"></i> Class </a>
    <a href="{{url('/admin/subject/list')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-circle-thin" aria-hidden="true"></i> Subject </a>
    <a href="{{url('/admin/assign_teacher/list')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-circle-thin" aria-hidden="true"></i> Teacher's Subjects </a>
    <a href="{{url('/admin/assign_subject/list')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-circle-thin" aria-hidden="true"></i> Assign Subject </a>
    </div>
  </div>
    
   
    <a href="{{url('/admin/branch/list')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-tree" aria-hidden="true"></i>
 Branch </a> 
    <a href="{{url('/admin/change_password')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-key" aria-hidden="true"></i> Change Password </a>
    <a href="/logout" class="w3-bar-item w3-button w3-padding w3-left"><i class="fa fa-history fa-fw"></i>  Logout</a>
   
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  
    @yield('content')
    <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Css</a></p>
  </footer>

  <!-- End page content -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@yield('admin_script')

<script>
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}

function myDropFunc() {
  var x = document.getElementById("demoDrop");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
function myAccFunc1() {
  var x = document.getElementById("demoAcc1");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}

function myDropFunc1() {
  var x = document.getElementById("demoDrop1");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
</script>
<script>
   
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
</body>
</html>