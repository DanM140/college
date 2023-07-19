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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/public/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/public/plugins/summernote/summernote-bs4.min.css">

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
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="width:250px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
   
    <div class=" w3-bar">
      <span>Welcome, <strong>{{Auth::user()->name}}</strong></span><br>
   
      
    </div>
  </div>
  <hr>
  
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    
  <div class=" w3-bar-block  ">
  
  

  <div class="w3-dropdown-click">
    <button class="w3-button" onclick="myDropFunc()">
      Accounts <i class="fa fa-caret-down"></i>
    </button>
    <div id="demoDrop" class="w3-dropdown-content w3-bar-block w3-white w3-card">
   
      <a href="{{url('/branchadmin/payment/list')}}" class="w3-bar-item w3-button"><i class="fa fa-eye fa-fw"></i> Pay </a>
      <a href="{{url('/branchadmin/payment/paymentlist')}}" class="w3-bar-item w3-button"><i class="fa fa-eye fa-fw"></i> Payment List </a>
      <a href="{{url('/branchadmin/payment/pay_aggregate')}}" class="w3-bar-item w3-button"><i class="fa fa-eye fa-fw"></i> Payment Status </a>
    </div>
  </div>
  <a href="{{url('/branchadmin/class/list')}}" class="w3-bar-item w3-button w3-padding">  Class </a>
    <a href="{{url('/branchadmin/subject/list')}}" class="w3-bar-item w3-button w3-padding">  Subject </a>
    <a href="{{url('/branchadmin/teacher/list')}}" class="w3-bar-item w3-button w3-padding">  Teacher </a>
    <a href="{{url('/branchadmin/student/list')}}" class="w3-bar-item w3-button w3-padding">  Student </a>
    <a href="{{url('/branchadmin/department/list')}}" class="w3-bar-item w3-button w3-padding">  Department </a>
    <a href="{{url('/branchadmin/room/list')}}" class="w3-bar-item w3-button w3-padding">  Room </a>
    <a href="{{url('/branchadmin/period/list')}}" class="w3-bar-item w3-button w3-padding">  Period </a>
    <a href="{{url('/branchadmin/assign_teacher/list')}}" class="w3-bar-item w3-button w3-padding"> Teacher's Subjects </a>
    <a href="{{url('/branchadmin/assign_subject/list')}}" class="w3-bar-item w3-button w3-padding"> Assign Subject </a>
    <a href="{{url('/branchadmin/class_timetable/list')}}" class="w3-bar-item w3-button w3-padding"> Create TimeTable </a>
    <a href="{{url('/branchadmin/class_timetable/timetable')}}" class="w3-bar-item w3-button w3-padding">  TimeTable </a>
    <a href="{{url('/branchadmin/exam_timetable/list')}}" class="w3-bar-item w3-button w3-padding"> Create Exam TimeTable </a>
    <a href="{{url('/branchadmin/exam_timetable/timetable')}}" class="w3-bar-item w3-button w3-padding"> Exam TimeTable </a>
    <a href="{{url('/branchadmin/communicate/notice')}}" class="w3-bar-item w3-button w3-padding"> Notice Board </a>
  </div>
    <a href="{{url('/branchadmin/change_password_branch_admin')}}" class="w3-bar-item w3-button w3-padding"> Change Password </a>
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
  @yield('branchstyle')
  
  @yield('branch')
    <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Css</a></p>
  </footer>

  <!-- End page content -->
</div>

@yield('branchscript')

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