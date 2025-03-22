@extends('layouts.app')

@section('app.head')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ساتا اسکول | پنل مدرسه</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}} ">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-rtl.min.css')}}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('dist/css/custom-style.css')}}">
    <!-- js Chart -->
    <!-- favicon -->
     <link rel="icon" href="{{ asset('dist/img/favicon.png')}}">

     <style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style>
     <style>
      html{
        overflow: hidden !important;
      }
     </style>
    <!-- end facicon -->
  </head>



  @endsection



@section('app.content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-6" style="display: flex;align-items: center;justify-content: space-between">
            <h1 class="m-0 text-dark">داشبورد</h1>
            <p>
          <i onclick="showMenu(this)"  id="check" class="fa fa-bars text-black" style="font-size:30px;cursor:pointer"></i>
            </p>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">داشبورد ورژن 2</li>
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (Auth::user()->type == 5)

    <div class="col-12 text-center">
      
      <h5 class="text-center">Sata-School</h5>
      <h4>نام : {{ Auth::user()->name }}</h4>
      <h4>شماره تلفن : {{ Auth::user()->phone ?? 'ثبت نشده' }}</h4>
      <h4>ایمیل : {{ Auth::user()->email }}</h4>
      <h4>نام مدرسه : {{ Auth::user()->school->name ?? 'ثبت نشده' }}</h4>
      @if (!Auth::user()->avatar)
      <img src="{{ asset(Auth::user()->avatar) }}" width="150px" style="border-radius: 50%" height="150px" alt="">
          @else
      <img src="{{ asset('images/favicon/favicon.png') }}" width="150px" style="border-radius: 50%" height="150px"  alt="">
      @endif
    </div>

        @else
        
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $StudentsCount }}</h3>

                <p>تعداد دانش آموزان</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('dashboard.students.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $MoaveninCount }}</h3>

                <p>معاونین</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('dashboard.moavein.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $TeachersCount }}</h3>

                <p>تعداد معلمین</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('dashboard.teachers.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $validations }}</h3>

                <p>تعداد غایبین امروز  </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('dashboard.validations.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="col-12 d-flex align-items-center justify-cotent-center ">
      <div class="col-6 text-center">
        <p class="bold">ویدیوی آموزشی کار با سامانه</p>
        <div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/gaf6en7/vt/frame"  allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
      </div>
      <div class="col-2"></div>
      <div class="col-5">
    <canvas id="myChart1" class="col-12" style="width:50%;max-width:400px"></canvas>

      </div>
      
    @endif

    </div>
  </div>
@endsection

@section('app.sidebar')
<aside class="main-sidebar bg-dark elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link" style="background-color: #4f5962 !important;">
    <div class="d-flex align-items-center justify-content-center">
      <span class="brand-text font-weight-light">ساتا اسکول </span>
    <img src="{{ asset('images/favicon/favicon.png') }}"  alt="AdminLTE Logo" class=""
    style="width:60px;height:60px">
    </div>
  </a>
  
  <!-- Sidebar -->
  <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image" width="50px" height="50px">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

                 <li class="nav-item">

                   <a href="{{ url('dashboard/home') }}" class="nav-link active">

                     <p>داشبورد </p>
                   </a>
                 </li>

                 <li class="nav-item">

                  <a href="{{ url('dashboard/profile') }}" class="nav-link">

                    <p>پروفایل</p>
                  </a>
                </li>

                @if (Auth::user()->type == 1)
                    
                <li class="nav-item">

                  <a href="{{ url('dashboard/schools') }}" class="nav-link">

                    <p>مدیریت مدرسه ها</p>
                  </a>
                </li>

                @endif
                @if (Auth::user()->type == 1)
                <li class="nav-item">

                  <a href="{{ url('dashboard/modiran') }}" class="nav-link">

                    <p>مدیریت مدیران </p>
                  </a>
                </li>
                @endif
                @if (Auth::user()->type == 1 || Auth::user()->type == 2 )
                <li class="nav-item">
                  
                  <a href="{{ url('dashboard/moavein') }}" class="nav-link">
                    
                    <p>مدیریت معاونین</p>
                  </a>
                </li>
                @else

                @endif  

                @if (Auth::user()->type == 1 || Auth::user()->type == 2 || Auth::user()->type == 3)
                  <li class="nav-item">

                    <a href="{{ url('dashboard/teachers') }}" class="nav-link">

                      <p>مدیریت معلمان</p>
                    </a>
                  </li>
                  <li class="nav-item">

                    <a href="{{ url('dashboard/students') }}" class="nav-link">

                      <p>مدیریت دانش آموزان</p>
                    </a>
                  </li>

                  <li class="nav-item">

                    <a href="{{ url('dashboard/classes') }}" class="nav-link">

                      <p>مدیریت کلاس ها</p>
                    </a>
                  </li>

                  <li class="nav-item">

                    <a href="{{ url('dashboard/lessons') }}" class="nav-link">

                      <p>مدیریت درس ها</p>
                    </a>
                  </li>
                  @endif
                  @if (Auth::user()->type == 1 || Auth::user()->type == 2 || Auth::user()->type == 3 || Auth::user()->type == 4)

                  <li class="nav-item">

                    <a href="{{ url('dashboard/attendances') }}" class="nav-link">

                      <p>حضور و غیاب</p>
                    </a>
                  </li>
                  @endif
                  @if (Auth::user()->type == 1 || Auth::user()->type == 2 || Auth::user()->type == 3)
                  <li class="nav-item">

                    <a href="{{ url('dashboard/hiddens') }}" class="nav-link">

                      <p>اعتبار سنجی</p>
                    </a>
                  </li>
                  <li class="nav-item">

                    <a href="{{ url('dashboard/disciplines') }}" class="nav-link">

                      <p>انضباطی</p>
                    </a>
                  </li>
                  <li class="nav-item">

                    <a href="{{ url('dashboard/disciplineExamps') }}" class="nav-link">

                      <p>مدیریت موارد انضباطی</p>
                    </a>
                  </li>
                  @endif
                  @if (Auth::user()->type == 1 || Auth::user()->type == 2 || Auth::user()->type == 3 || Auth::user()->type == 4)

                  <li class="nav-item">

                    <a href="{{ url('dashboard/scores') }}" class="nav-link">

                      <p>مدیریت نمرات</p>
                    </a>
                  </li>
                  @endif

                  @if (Auth::user()->type == 4)
                  @else
                  <li class="nav-item">

                    <a href="{{ url('dashboard/reportCart') }}" class="nav-link">

                      <p>کارنامه ی مستمر</p>
                    </a>
                  </li>
                  @endif

                  <li class="nav-item">

                    <a href="{{ url('/logout') }}" class="nav-link">

                      <p>خروج</p>
                    </a>
                  </li>
                
              <ul class="nav nav-treeview">


              </ul>
            </li>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
  <!-- /.sidebar -->
</aside>
@endsection

@section('app.script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
  ali = true;
  function showMenu(i){
    if (ali){
      document.querySelector('.main-sidebar').style.marginRight="0";
      i.className = "fa fa-close";
      ali=false;
    }
    else{
      document.querySelector('.main-sidebar').style.marginRight="-250px";
      i.className = "fa fa-bars";
      ali=true;
    }

  }
</script>
<script>
  var xValues = {!! json_encode($data1) !!};
  
  var yValues = {!! json_encode($data2) !!};


  var barColors = [
    "#b91d47",
    "#00aba9",
    "#2b5797",
    "#e8c3b9",
    "#1e7145"
  ];

  new Chart("myChart1", {
    type: "pie",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true,
        text: "بیشترین غایبین امروز کلاس ها "
      }
    }
  });
  </script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{  asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{  asset('plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{  asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{  asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{  asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{  asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{  asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{  asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{  asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{  asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{  asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{  asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{  asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{  asset('dist/js/demo.js') }}"></script>
<!-- Js chart -->

@endsection
