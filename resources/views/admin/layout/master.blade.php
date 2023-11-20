<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        {{-- <link rel="icon" href="{{asset('backend/images/favicon.ico')}}" type="image/ico" /> --}}
        <link rel="icon" type="image/x-icon"href="{{asset('backend/images/images.png')}}">
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
        {{-- bootstrap icon --}}
        <!-- Option 1: Include in HTML -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="{{route('admin.index')}}" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
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
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('admin.logout')}}">
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
                        {{-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> --}}
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
        
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
        <script>
            $(document).ready(function(){
              // $('.custom-message-time').html()

              Pusher.logToConsole = true;
              var pusher = new Pusher('9b486b695b2b9d9f825b', {
                cluster: 'ap1'
              });
              
              var channel = pusher.subscribe('chat-with-admin');

              function scrollChat(){
                    const chatMessageBox = document.querySelector(".chat-history")
            
                    if(chatMessageBox) {
                        chatMessageBox.scrollTop =  chatMessageBox.scrollHeight
                    }
            
                }
                scrollChat()

              channel.bind('chat-with-admin-event', function(data) {
                console.log(data)    
                const user_id = $('#contentMessage').attr('user_id')
                console.log(user_id)
                if(user_id == data['user_id']){
                  //receive message
                  $('#contentMessage').append(`
                      <li class="clearfix">
                          <div class="message-data">
                              <img style="width: 40px; height: 40px;" src="http://${data['domain']}/Uploads/${data['user_detail']['user__info']['avatar']}" alt="avatar">
                              <span class="message-data-time">${data['time']}</span>
                          </div>
                          <div class="message my-message mb-2">${data['message']}</div>
                      </li>
                              
                  `)    
                  scrollChat()
                }
              });

              $('.button-send-admin').click(function(){
                const message = $('#message_admin').val();
                $('#message_admin').val('')
                const user_id = $('#contentMessage').attr('user_id')
                var formComment = new FormData();
                formComment.append('message', message);
                formComment.append('user_id', user_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    contentType: false,
                    processData: false,
                    url:"{{route('admin.chat.post')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: formComment,
                    success: function (response) {
                      console.log(response)
                      $('#contentMessage').append(`
                      <li class="clearfix">
                          <div class="message-data text-right">
                              <span class="message-data-time">${response['time']}</span>
                          </div>
                          <div class="message other-message float-right">${response['message']}</div>
                      </li>
                              
                  `)   
                  scrollChat()
                             
                    }, error: function () {
                        alert("Có lỗi xảy ra");
                    },
                });
              })

            
            
              $( function() {
                $( "#datepicker3" ).datepicker({
                  dateFormat :"yy-mm-dd"
                });
              } );
              $( function() {
                $( "#datepicker4" ).datepicker({
                  dateFormat :"yy-mm-dd"
                });
              } );

              //upload image
              let isSize = false
              let isType = false
              let arr_type_allow = ['gif','png','jpg','jpeg','webp']
              let isUpdateImage = false;
              $('input[type="file"]').change(function(){
                isUpdateImage = true
                if($(this)[0].files[0].size < 5242880){
                  isSize = true
                }
                const ext = $(this).val().split('.').pop().toLowerCase();
        
                if(arr_type_allow.includes(ext)){
                    isType = true
                }
              })
              //validate form product
              $('.btn-submit-store-form').click(function(e){
                if(isUpdateImage){
                  if(!isType){
                    e.preventDefault()
                    displayError('Please choose type image')
                  }else if(!isType){
                    e.preventDefault()
                    displayError('Limit size image 5kb')
                  }
                }
              })

              function displayError(message){
                    Toastify({
                        text: message,
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "#C70039",
                        },
                    }).showToast();
                }
            })
        </script>
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
            
            function validate_datepicker(){
              let statusSubmit = true;
              if(!$('#datepicker1').val()){
                  statusSubmit = false
                  $('#datepicker1_error').html('Ngày bắt đầu không được để trống')
              }else{
                $('#datepicker1_error').html('')
            
              }
              if(!$('#datepicker2').val()){
                statusSubmit = false
                $('#datepicker2_error').html('Ngày kết thúc không được để trống')
              }else{
                $('#datepicker2_error').html('')
            
              }
              return statusSubmit
            }
            
            $('.btn_thong_ke').click(function(){
              const statusSubmit = validate_datepicker();
              if(statusSubmit){
                const ngaybatdau = $('#datepicker1').val();
                const ngayketthuc = $('#datepicker2').val();
                $.get({
                  url:"{{route('admin.thongke_start_end')}}",
                  data:{ngaybatdau:ngaybatdau,ngayketthuc:ngayketthuc},
                  success: function(data){
                  data = JSON.parse(data);
                  const ngaybatdau = data['ngaybatdau'];
                  const ngayketthuc = data['ngayketthuc'];
                  if(data['chart_data'].length>0){
                    chart.setData(data['chart_data']);
                    $('#title_thong_ke').html("Kết quả thống kê doanh thu từ ngày "+ngaybatdau+" đến ngày "+ngayketthuc);
                  }else{
                    chart.setData([{}])
                    $('#title_thong_ke').html("Từ ngày "+ngaybatdau+" đến ngày "+ngayketthuc+" không có đơn hàng nào");
                  }
                  }
                });
              }
              
            });
            
            $('.btn_7ngaytruoc').click(function(){
              //remove active
              const arr_btn_sort = $('.custom-primary-btn-sort')
              for(let i=0;i<arr_btn_sort.length;i++){
                $(arr_btn_sort[i]).removeClass('custom-primary-btn-sort-active')
              }
              $(this).addClass('custom-primary-btn-sort-active')
              $.get({
                url:"{{route('admin.thongke_7_date')}}",
                success: function(data){
                  data = JSON.parse(data);
                  if(data['chart_data'].length==0){
                    chart.setData([{}]);
                    $('#title_thong_ke').html("7 ngày qua không có đơn hàng");
                  }else{
                    chart.setData(data['chart_data']);
                    $('#title_thong_ke').html("Kết quả thống kê doanh thu 7 ngày qua");
                  }
                }
              });
            });
            
            $('.btn_30ngaytruoc').click(function(){
              const arr_btn_sort = $('.custom-primary-btn-sort')
              for(let i=0;i<arr_btn_sort.length;i++){
                $(arr_btn_sort[i]).removeClass('custom-primary-btn-sort-active')
              }
              $(this).addClass('custom-primary-btn-sort-active')
              $.get({
                url:"{{route('admin.thongke_30_date')}}",
                success: function(data){
                 data = JSON.parse(data);
                //  console.log(data)
                 if(data['chart_data'].length>0){
                   chart.setData(data['chart_data']);
                   $('#title_thong_ke').html("Kết quả thống kê doanh thu doanh thu 1 tháng qua");
                 }else{
                    chart.setData([{}]);
                    $('#title_thong_ke').html("1 tháng qua không có đơn hàng nào");
                 }
                }
              });
            });
            
            $('.btn_90ngaytruoc').click(function(){
              const arr_btn_sort = $('.custom-primary-btn-sort')
              for(let i=0;i<arr_btn_sort.length;i++){
                $(arr_btn_sort[i]).removeClass('custom-primary-btn-sort-active')
              }
              $(this).addClass('custom-primary-btn-sort-active')
              $.get({
                url:"{{route('admin.thongke_90_date')}}",
                success: function(data){
                 data = JSON.parse(data);
                 if(data['chart_data'].length>0){
                   chart.setData(data['chart_data']);
                   $('#title_thong_ke').html("Kết quả thống kê doanh thu doanh thu 3 tháng qua");
                 }else{
                  chart.setData([{}])
                  $('#title_thong_ke').html('3 tháng qua không có đơn hàng nào')
                 }
                }
              });
            });
            
            
            
        </script>
        <script>
            $(document).ready(function(){
              // var socket = io('http://127.0.0.1:3000', { transports: ['websocket'] });
              // socket.on('sendMail-to-client',(data)=>{
              //   let quantity =  $('#total_news').text()*1 + 1;

              //   $('#total_news').text(quantity)
              //   console.log(quantity)
              //   console.log($('#total_news').text())
              //   if(data.topic == "gmail"){
              //     $('#allAlert').before(`
              //     <li style="background-color: #CACFD2 !important;" else="" class="nav-item row_news22">
              //         <a id="22" class="change_status_news" href=${data.link}>
              //             <span class="image">
              //             <img src="http://laravel_vegetable_office.local/Uploads/${data.avatar}" alt="">
              //             </span>
              //             <span>
              //                 <span class="font-weight-bold">${data.name}</span>
              //                 <span class="time">
              //                     <p>${data.date} ${data.time}</p>
              //                 </span>
              //                 <!-- <button class="ml-auto btn btn-sm btn-primary"><i class="fa fa-share" aria-hidden="true"></i></button> -->
              //             </span>
              //             <span class="message mt-2">
              //             </span>
              //         </a>
              //         <p><a id="22" class="change_status_news" href=${data.link}>
              //             ${data.name} đã gửi Email cho bạn. Vui lòng kiểm tra lại Email.
              //             </a><a href=${data.link}><i class="fa fa-share" aria-hidden="true"></i></a>
              //         </p>
              //     </li>
              //     `)
              //   }else if(data.topic == "order"){
              //     $('#allAlert').before(`
              //     <li style="background-color: #CACFD2 !important;" else="" class="nav-item row_news22">
              //         <a id="22" class="change_status_news" href=${data.link}>
              //             <span class="image">
              //             <img src="http://laravel_vegetable_office.local/Uploads/${data.avatar}" alt="">
              //             </span>
              //             <span>
              //                 <span class="font-weight-bold">${data.name}</span>
              //                 <span class="time">
              //                     <p>${data.date} ${data.time}</p>
              //                 </span>
              //                 <!-- <button class="ml-auto btn btn-sm btn-primary"><i class="fa fa-share" aria-hidden="true"></i></button> -->
              //             </span>
              //             <span class="message mt-2">
              //             </span>
              //         </a>
              //         <p><a id="22" class="change_status_news" href=${data.link}>
              //             ${data.name} đã đặt một đơn hàng.
              //             </a><a href=${data.link}><i class="fa fa-share" aria-hidden="true"></i></a>
              //         </p>
              //     </li>
              //     `)
              //   }
              // })


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
            
              //Change status comment
              $(document).ready(function(){
                $('.btn_change_comment').click(function(){
                  const comment_id = $(this).attr('id');
                 
                  $.get({
                    url: "{{route('comment.change_status')}}",
                    data: {comment_id: comment_id},
                    success: function(data){
                      data = JSON.parse(data);
                      if(data.status == 0){//css chua duyet
                        $('.btn_change_status'+data['id']).html('Duyệt');
                        $('.btn_change_status'+data['id']).removeClass('btn-danger');
                        $('.btn_change_status'+data['id']).addClass('btn-primary');
                        $('.row_change_status'+data['id']).css({"background-color":"#E8E9EB"});
                      }else{ //css da duyet
                        $('.btn_change_status'+data['id']).html('Bỏ duyệt');
                        $('.btn_change_status'+data['id']).removeClass('btn-primary');
                        $('.btn_change_status'+data['id']).addClass('btn-danger');
                        $('.row_change_status'+data['id']).css({"background-color":""});
                      }
                    }
                  });
                });
            
                //change status news
                $('.change_status_news').click(function(event){
                  event.preventDefault();
                  const news_id = $(this).attr('id');
                  const href = $(this).attr('href');
                  $.get({
                    url:"{{route('news.change_status')}}",
                    data: {news_id:news_id},
                    success: function(data){
                      data = JSON.parse(data);
                      $('.row_news'+data['id']).css({"background-color": "#F7F7F7"});
                      $('#total_news').html(data['total_news']);
                    }
                  });
                });
            
                //reply comment
                $('.btn_reply_comment').click(function(){
                  const comment_id = $(this).attr('id');
                  const reply = $('.text_reply_comment'+comment_id).val();
            
                  $.get({
                    url: "{{route('comment.reply_comment')}}",
                    data: {comment_id:comment_id, reply: reply},
                    success: function(data){
                      data = JSON.parse(data);
                      if(data.status == 0){//css chua duyet
                        $('.btn_change_status'+data['id']).html('Duyệt');
                        $('.btn_change_status'+data['id']).removeClass('btn-danger');
                        $('.btn_change_status'+data['id']).addClass('btn-primary');
                        $('.row_change_status'+data['id']).css({"background-color":"#E8E9EB"});
                      }else{ //css da duyet
                        $('.btn_change_status'+data['id']).html('Bỏ duyệt');
                        $('.btn_change_status'+data['id']).removeClass('btn-primary');
                        $('.btn_change_status'+data['id']).addClass('btn-danger');
                        $('.row_change_status'+data['id']).css({"background-color":""});
                      }
                    }
                  });
                });
            
                $('.btn_delete_comment').click(function(){
                  const comment_id = $(this).attr('id');
                  $.get({
                    url:"{{route('comment.delete_comment')}}",
                    data: {comment_id:comment_id},
                    success: function(data){
                      data = JSON.parse(data);
                      console.log(data);
                      $('.row_change_status'+data['id']).remove();
                    } 
                  })
                })
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
                        $('.change_status_categoryofblog'+data['categoryofblog_id']).removeClass('badge-danger');
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
              //delete user manager human
              $('.btn_delete_manager_human').click(function(){
                  const id = $(this).attr('id');
            
                  $.get({
                    url:"{{route('manager_human.delete_role')}}",
                    data: {id: id},
                    success: function(data){
                      
                      $('.row_manger_human'+data).remove();
                    }
                  });
                });
            
              
            
              $('.delete').click(function(){
                $("#table_input_create tbody tr").each(function(){
                    var isChecked = $(this).find('input[type="checkbox"]').is(":checked");
                    var tableSize = $(".table tbody tr").length;
                    if(tableSize == 1){
                        alert('All rows cannot be deleted.');
                    }else if(isChecked){
                        $(this).remove();
                    }
                });
              });
            
              $('.btn_authorize_manager_human').click(function(){
                const id = $(this).attr('id');
            
                let role = ''
            
                let role_admin = 0;
            
                if($('.input_role_admin'+id).attr('checked')){ //admin
                  role_admin = 1;
                  role = 'Admin'
                }else{
                  if($('.input_role_staff'+id).attr('checked')){ //staff
                    role_staff = 1;
                    role = 'Staff';
                  }
                }
            
                $.get({
                  url:"{{route('manager_human.change_role')}}",
                  data: {id: id, role: role},
                  success: function(data){
                    data = JSON.parse(data);
                    $('.td_role_manager_human'+data['id']).html(data['role']);
                  //   $('#message_change_role_manager_human_success').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                  // <strong>Chúc mừng bạn đã cập nhật phân quyền thành công!</strong>
                  // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  //     <span aria-hidden="true">&times;</span>
                  // </button>
                  // </div>`)
                  Toastify({
                    text: "Chúc mừng bạn đã cập nhật phân quyền thành công!",
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "#A7D397",
                    },
                }).showToast();
                  }
                })
            
            
               
               
              });
            
              $('.input_role_admin').change(function(){
                if($(this).attr('checked')){
                  $(this).removeAttr('checked');
                }else{
                  $( this ).attr( 'checked', true )
                }
              });
              $('.input_role_staff').change(function(){
                if($(this).attr('checked')){
                  $(this).removeAttr('checked');
                }else{
                  $( this ).attr( 'checked', true )
                }
              }); 
            
              
            
              $('.quantity_keypress').keyup(function() {
                alert($(this).val());
              });
            
            
            });
            
            
            
            
            $(document).ready(function(){
                  // Add new row
                  $("#add-row").click(function(){
                      var firstname = $("#firstname").val();
                      var lastname = $("#lastname").val();
                      var email = $("#email").val();
                      $(".table tbody tr").last().after(
                          '<tr class="fadetext">'+
                              '<td><input type="checkbox" id="select-row"></td>'+
                              '<td>'+firstname+'</td>'+
                              '<td>'+lastname+'</td>'+
                              '<td>'+email+'</td>'+
                          '</tr>'
                      );
                  })
            
                  // Select all checkbox
                  $("#select-all").click(function(){
                      var isSelected = $(this).is(":checked");
                      if(isSelected){
                          $(".table tbody tr").each(function(){
                              $(this).find('input[type="checkbox"]').prop('checked', true);
                          })
                      }else{
                          $(".table tbody tr").each(function(){
                              $(this).find('input[type="checkbox"]').prop('checked', false);
                          })
                      }
                  });
                  
                  // Remove selected rows
                  $("#remove-row").click(function(){
                      $(".table tbody tr").each(function(){
                          var isChecked = $(this).find('input[type="checkbox"]').is(":checked");
                          var tableSize = $(".table tbody tr").length;
                          if(tableSize == 1){
                              alert('All rows cannot be deleted.');
                          }else if(isChecked){
                              $(this).remove();
                          }
                      });
                  });
            
                  $('#search_key').keyup(function(){
                      const key = $(this).val();
                      if(key!=''){
                          $.get({
                          url:"{{route('admin.search_ajax_admin')}}",
                          data:{key:key},
                          success: function(data){
                              $('.autocomplete').show();
                              $('.autocomplete').html(data);
                              // alert(data);
                          }
                      });
                      }else{
                          $('.autocomplete').hide();
                      }
                      // alert("helloc ca nha yeu");
                  });
                  
              })
            
            
        </script>
    </body>
</html>