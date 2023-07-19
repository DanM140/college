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
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
   
    <div class="w3-col w3-bar">
      <span>Welcome, <strong>{{Auth::user()->name}}</strong></span><br>
      
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>

    <a href="{{url('receptionist/student/list')}}" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>Students</a>
    <a href="{{url('/receptionist/prospective/list')}}" class="w3-bar-item w3-button w3-padding "><i class="fa fa-user"></i>Prospective Students</a>
    <a href="{{url('/receptionist/visitor/list')}}" class="w3-bar-item w3-button w3-padding "><i class="fa fa-id-badge"></i>Visitors</a>
    <a href="{{url('/receptionist/parent/list')}}" class="w3-bar-item w3-button w3-padding "><i class="fa fa-plus"></i>Add Parent</a>
    <a href="{{url('/receptionist/parent/list')}}" class="w3-bar-item w3-button w3-padding "><i class="fa fa-list"></i>Parents List</a>
    <a href="{{url('/receptionist/change_password_receptionist')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i> Change Password </a>
    <a href="/logout" class="w3-bar-item w3-button w3-padding w3-right"><i class=" fa fa-sign-out"></i>  Logout</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

 

  
    @yield('resp')
    <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Css</a></p>
  </footer>

  <!-- End page content -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function () {
  
  /*------------------------------------------
  --------------------------------------------
  Country Dropdown Change Event
  --------------------------------------------
  --------------------------------------------*/
  $('#country-dropdown').on('change', function () {
      var idCountry = this.value;
      $("#state-dropdown").html('');
      $.ajax({
          url: "{{url('/receptionist/student/api/fetch-classes')}}",
          type: "POST",
          data: {
              department_id: idCountry,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
              $('#state-dropdown').html('<option value="">-- Select State --</option>');
              $.each(result.states, function (key, value) {
                  $("#state-dropdown").append('<option value="' + value
                      .id + '">' + value.name + '</option>');
              });
              
          }
      });
  });
  $('#level-dropdown').on('change', function () {
      var idCountry = this.value;
      $("#fee-dropdown").html('');
      $.ajax({
          url: "{{url('/receptionist/student/api/fetch-fees')}}",
          type: "POST",
          data: {
              level_id: idCountry,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
              $('#fee-dropdown').html('<option value="">-- Select State --</option>');
              $.each(result.fees, function (key, value) {
                  $("#fee-dropdown").append('<option value="' + value
                      .id + '">' + value.name + '</option>');
              });
              
          }
      });
  });
  
});
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