
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('backend/images/favicon.ico')}}" type="image/ico" />

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('backend/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('backend/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('backend/build/css/custom.min.css')}}" rel="stylesheet">

    <link href="{{asset('backend/style.css')}}" rel="stylesheet">

    <!-- datapicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Moris Chart -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('backend/images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{session('admin.name')}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('admin.layout.leftMenu')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       @include('admin.layout.topNav')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
   

    <!-- jQuery -->
    <script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('backend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('backend/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('backend/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('backend/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('backend/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('backend/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('backend/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('backend/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('backend/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('backend/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('backend/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('backend/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('backend/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('backend/build/js/custom.min.js')}}"></script>

    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- Moris Chart -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script>
      $('.btn_change_status').click(function(){
        var order_id = $(this).attr('id');
        $.get({
          url: "{{route('order.change_status')}}",
          data: {order_id:order_id},
          success: function(){
            location.reload();
          }
        });
      }
      );

      var chart = Morris.Bar({
          element: 'myfirstchart',
          data: [
            {period: "2022-10-15", order: 5, sales: "63000000", profit: "19000000", quantity: 14},
            {period: "2022-10-16", order: 20, sales: "74000000", profit: "20000000", quantity: 32},
            {period: "2022-10-17", order: 12, sales: "66000000", profit: "18000000", quantity: 23},
            {period: "2022-10-18", order: 5, sales: "63000000", profit: "19000000", quantity: 14},
            {period: "2022-10-19", order: 20, sales: "74000000", profit: "20000000", quantity: 33},
            {period: "2022-10-20", order: 12, sales: "66000000", profit: "18000000", quantity: 22},
            {period: "2022-10-21", order: 5, sales: "63000000", profit: "19000000", quantity: 14},
            {period: "2022-10-22", order: 10, sales: "12000000", profit: "7000000", quantity: 16},
            {period: "2022-10-23", order: 14, sales: "25000000", profit: "16000000", quantity: 94},
            {period: "2022-10-24", order: 20, sales: "34000000", profit: "20000000", quantity: 33},
            {period: "2022-10-25", order: 12, sales: "36000000", profit: "18000000", quantity: 22},
            {period: "2022-10-26", order: 5, sales: "33000000", profit: "19000000", quantity: 14}
                      ],
          xkey: 'period',
          ykeys: ['order', 'sales','profit','quantity'],
          labels: ['Đơn hàng', 'Doanh số','Lợi nhuận','Số lượng']
        });

      $( function() {
        $( "#datepicker1" ).datepicker({
          dateFormat :"yy-mm-dd"
        });
      } );

      $( function() {
        $( "#datepicker2" ).datepicker({
          dateFormat :"yy-mm-dd"
        });
      } );

      $('.btn_thong_ke').click(function(){
        const ngaybatdau = $('#datepicker1').val();
        const ngayketthuc = $('#datepicker2').val();
        $.get({
          url:"{{route('admin.thongke_start_end')}}",
          data:{ngaybatdau:ngaybatdau,ngayketthuc:ngayketthuc},
          success: function(data){
           data = JSON.parse(data);
           chart.setData(data['chart_data']);
           const ngaybatdau = data['ngaybatdau'];
           const ngayketthuc = data['ngayketthuc'];
           $('#title_thong_ke').html("Kết quả thống kê từ ngày "+ngaybatdau+" đến ngày "+ngayketthuc);
          }
        });
      });

      $('.btn_7ngaytruoc').click(function(){
        $.get({
          url:"{{route('admin.thongke_7_date')}}",
          success: function(data){
           data = JSON.parse(data);
           chart.setData(data['chart_data']);
          
           $('#title_thong_ke').html("Kết quả thống kê 7 ngày qua");
          }
        });
      });

      $('.btn_30ngaytruoc').click(function(){
        $.get({
          url:"{{route('admin.thongke_30_date')}}",
          success: function(data){
           data = JSON.parse(data);
           chart.setData(data['chart_data']);
          
           $('#title_thong_ke').html("Kết quả thống kê 1 tháng qua");
          }
        });
      });
    
      $('.btn_90ngaytruoc').click(function(){
        $.get({
          url:"{{route('admin.thongke_90_date')}}",
          success: function(data){
           data = JSON.parse(data);
           chart.setData(data['chart_data']);
          
           $('#title_thong_ke').html("Kết quả thống kê 3 tháng qua");
          }
        });
      });
      

      
    </script>
    

    <script>
      $(document).ready(function(){
        $('.change_status_category').click(function(){
          const category_id = $(this).attr('id');
          $.get({
            url:"{{route('category.change_status')}}",
            data:{category_id:category_id},
            success: function(data){
                data = JSON.parse(data);
                if(data.status_number==1){
                  $('.change_status_category'+data['category_id']).html('Hiển thị');
                  $('.change_status_category'+data['category_id']).removeClass('badge-secondary');
                  $('.change_status_category'+data['category_id']).addClass('badge-danger');
                }else{
                  $('.change_status_category'+data['category_id']).html('Không hiển thị');
                  $('.change_status_category'+data['category_id']).removeClass('badge-danger');
                  $('.change_status_category'+data['category_id']).addClass('badge-secondary');
                }
            }
          });
        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $('.change_status_product').click(function(){
          const product_id = $(this).attr('id');
          $.get({
            url:"{{route('product.change_status')}}",
            data:{product_id:product_id},
            success: function(data){
              data = JSON.parse(data);
              if(data.status_number==1){
                $('.change_status_product'+data['product_id']).html('Hiển thị');
                $('.change_status_product'+data['product_id']).removeClass('badge-secondary');
                $('.change_status_product'+data['product_id']).addClass('badge-danger');
              }else{
                $('.change_status_product'+data['product_id']).html('Không hiển thị');
                $('.change_status_product'+data['product_id']).removeClass('badge-danger');
                $('.change_status_product'+data['product_id']).addClass('badge-secondary');
              }
            }
          });

        });

        $('.change_status_categoryofblog').click(function(){
          const categoryofblog_id = $(this).attr('id');
          $.get({
            url:"{{route('category_of_blog.change_status')}}",
            data:{categoryofblog_id:categoryofblog_id},
            success: function(data){
                data = JSON.parse(data);
                if(data['status_number']==1){
                  $('.change_status_categoryofblog'+data['categoryofblog_id']).html('Hiển thị');
                  $('.change_status_categoryofblog'+data['categoryofblog_id']).removeClass('badge-secondary');
                  $('.change_status_categoryofblog'+data['categoryofblog_id']).addClass('badge-danger');
                }else{
                  $('.change_status_categoryofblog'+data['categoryofblog_id']).html('Không hiển thị');
                  $('.change_status_categoryofblog'+data['categoryofblog_id']).removeCLass('badge-danger');
                  $('.change_status_categoryofblog'+data['categoryofblog_id']).addClass('badge-secondary');
                }
            }
          })
        });

        $('.change_status_tags').click(function(){
          const tags_id = $(this).attr('id');
          $.get({
            url:"{{route('tags.change_status')}}",
            data:{tags_id: tags_id},
            success: function(data){
                data = JSON.parse(data);
                if(data['status_number']==1){
                  $('.change_status_tags'+data['tags_id']).html('Hiển thị');
                  $('.change_status_tags'+data['tags_id']).removeClass('badge-secondary');
                  $('.change_status_tags'+data['tags_id']).addClass('badge-danger');
                }else{
                  $('.change_status_tags'+data['tags_id']).html('Không hiển thị');
                  $('.change_status_tags'+data['tags_id']).removeClass('badge-danger');
                  $('.change_status_tags'+data['tags_id']).addClass('badge-secondary');
                }
            }
          });
        });
      });
    </script>
  

	
  </body>
</html>
