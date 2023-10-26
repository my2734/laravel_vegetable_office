<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('ship/assets/img/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('ship/assets/img/apple-touch-icon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{asset('ship/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('ship/assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('ship/assets/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    @include('ship.layout.sidebar')
    <div class="main-panel">
      <!-- Navbar -->
     @include('ship.layout.topnav')
      @yield('content')
     @include('ship.layout.footer')
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('ship/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('ship/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('ship/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('ship/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <!--  Notifications Plugin    -->
  <script src="{{asset('ship/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('ship/assets/demo/demo.js')}}"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      $('#btnShipReceive').click(function(){
        const id_order = $(this).attr('id-order');
        if(!$(this).hasClass('btn_disable')){
          $.ajax({
            'url' : "{{route('ship.change_status_order',4)}}",
            'type' : 'POST',
            'data': {
              'id_order': id_order,
              '_token': '{{csrf_token()}}'
            },
            'success' : function(data) {  
                if(data == "success"){
                  $('#image_progress_bar').attr('src','{{asset("Uploads/progress_bar2.jpg")}}')
                  $('#btnShipReceive').addClass('btn_disable')
                }
            },
          })
        }
      })

      $('.choose_shipper_button').click(function(){
        const order_id = $(this).attr('id')
        const shipper_id_choose = $('.choose_shipper'+order_id).val()
        if(shipper_id_choose != "null"){
          $.ajax({
            'url' : "{{route('ship.change_shipper')}}",
            'type' : 'POST',
            'data': {
              'id_order': order_id,
              'shipper_id_choose': shipper_id_choose,
              '_token': '{{csrf_token()}}'
            },
            'success' : function(data) { 
                 location.reload();
                console.log(data)

            },
          })
        }
      })
    });
  </script>
</body>

</html>
