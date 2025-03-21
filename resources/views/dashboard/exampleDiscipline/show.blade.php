<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ساتا اسکول | پنل مدرسه</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('../plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('../dist/css/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('../plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('../plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('../plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('../plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('../plugins/daterangepicker/daterangepicker-bs3.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{ asset('../dist/css/bootstrap-rtl.min.css')}}">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{ asset('../dist/css/custom-style.css')}}">
  <!-- js Chart -->
  <!-- favicon -->
   <link rel="icon" href="{{ asset('../dist/img/favicon.png')}}">
  <!-- end facicon -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header bg-success  navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    
    <div class="col-8 d-flex align-items-center">
      <img src="{{ asset('images/school/school.png') }}" width="30px" height="30px" style="border-radius: 100%;" alt="">
      <p style="margin-top: 20px;">{{ Auth::user()->school->name }}</p>
    </div>
    <ul class="navbar-nav d-flex align-items-center justify-content-center col-4 text-center">
      <li class="nav-item ">
        <p style="padding: 5px;margin-top:12px; text-align:center">ساتا اسکول | سامانه جامع مدیریت مدارس</p>
        <!-- <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> -->
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="index3.html" class="nav-link">خانه</a> -->
      </li>
      <li class="nav-item d-sm-inline-block">
        <!-- <a href="#" class="nav-link">تماس</a> -->
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        
      </div>
    </form>

  
  </nav>
  <!-- /.navbar -->
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
          <nav class="mt-2" style="overflow-x: scroll">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                   <li class="nav-item">

                     <a href="{{ url('dashboard/home') }}" class="nav-link">

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

                   <li class="nav-item">

                      <a href="{{ url('dashboard/moavein') }}" class="nav-link">

                        <p>مدیریت معاونین</p>
                      </a>
                    </li>
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

                    <li class="nav-item">

                      <a href="{{ url('dashboard/attendances') }}" class="nav-link">

                        <p>حضور و غیاب</p>
                      </a>
                    </li>
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

                      <a href="{{ url('dashboard/disciplineExamps') }}" class="nav-link active">

                        <p>مدیریت موارد انضباطی</p>
                      </a>
                    </li>
                    <li class="nav-item">

                      <a href="{{ url('dashboard/scores') }}" class="nav-link">

                        <p>مدیریت نمرات</p>
                      </a>
                    </li>
                    <li class="nav-item">

                      <a href="{{ url('dashboard/reportCart') }}" class="nav-link">

                        <p>کارنامه ی مستمر</p>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8" style="display: flex;align-items: center;justify-content: space-between">
            <h1 class="m-0 text-dark">مشاهده مورد انضباطی</h1>
            <p>
          <i onclick="showMenu(this)"  id="check" class="fa fa-bars text-black" style="font-size:30px;cursor:pointer"></i>
            </p>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">مشاهده مورد انضباطی</li>
            </ol>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">مشاهده کلاس</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <select name="school_id" disabled id="school" class="form-control col-12 mt-1">

                    <option value="">{{ $data->student->school->name }}</option>
                  
                  </select>
                  
                  <select name="class_id" disabled id="class_main" class="form-control select-picker col-12 mt-3">
                    <option value="">{{ $data->student->class->name }}</option>

                  
                  </select>

                  <select name="student_id" disabled id="student_main" class="form-control select-picker1 col-12 mt-3">
                    <option value="">{{ $data->student->name }}</option>

                  </select>


                  <select disabled name="dismissal_status" id="student_main" class="form-control select-picker1 col-12 mt-3">
                    {{-- <option selected value="" disabled class="optionValues1">نیاز به اخراج دارد؟</option> --}}
                  @if ($data->dismissal_status == 1)
                  <option value="1" selected>بله</option> 
                  <option value="0">خیر</option>
                  @else
                  <option value="0" selected>خیر</option>
                    <option value="1">بله</option>
                  @endif  
                  </select>

                  <input type="text" class="form-control mt-3" disabled name="dismissal_count" value="{{ $data->dismissal_count }}" placeholder="در صورت نیاز به اخراج تعداد روز اخراج را وارد نمایید">

                  <input type="text" disabled value="{{ $data->title }}" class="form-control mt-3" name="title" placeholder="موضوع را وارد کنید">

                  <input type="number" value="{{ $data->score }}" disabled class="form-control mt-3" name="score" placeholder="نمره ای که قرار است از انضباط کم شود را وارد کنید">
                  <label class="mt-2" for="discription">خلاصه ای در مورد بی نظمی توضیح دهید</label>
                  <textarea disabled class="form-control mt-3" name="discription" id="discription" cols="5" rows="5">
                    {{ $data->discription }}
                  </textarea>

                    </div>
                  </div>
              
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{ route('dashboard.disciplineExamps.index') }}">
                    <button type="button" class="btn btn-primary">بازگشت</button>
                  </a>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
        
            <!-- /.card -->

        
            <!-- /.card -->

            <!-- Input addon -->
        
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
      
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>کپی رایت &copy; 1403 تمامی حقوق برای ساتا اسکول محفوظ است </strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
  var xValues = ["104", "103", "302", "201", "301"];
  var yValues = [55, 49, 44, 24, 15];
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
        text: "بیشترین غایبین موجود در کلاس ها"
      }
    }
  });
  </script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  var xValues = ["104", "103", "302", "201", "202", "505","802", "901", "102"];
  var yValues = [55, 49, 44, 24, 15, 12, 13, 17, 18];
  var barColors = ["red", "green","blue","orange","brown", "maroon", "magenta", "black", "khaki"];
  
  new Chart("myChart", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "بیشترین میزان غایبین"
      }
    }
  });
  </script>
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
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
                <script src="{{ asset('../plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
                <script src="{{ asset('../plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
                <script src="{{ asset('../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
                <script src="{{ asset('../plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
                <script src="{{ asset('../plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
                <script src="{{ asset('../plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
                <script src="{{ asset('../plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
                <script src="{{ asset('../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
                <script src="{{ asset('../plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
                <script src="{{ asset('../plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
                <script src="{{ asset('../dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                <script src="{{ asset('../dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
                <script src="{{ asset('../dist/js/demo.js')}}"></script>
<!-- Js chart -->
</body>
</html>
