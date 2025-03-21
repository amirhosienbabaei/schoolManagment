<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ساتا اسکول | پنل مدرسه</title>
  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{  asset('../plugins/font-awesome/css/font-awesome.min.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{  asset('path/to/your/script.js')}}" defer></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('../dist/css/adminlte.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{  asset('../plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{  asset('../plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('../plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{  asset('../plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{  asset('../plugins/daterangepicker/daterangepicker-bs3.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{  asset('../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{  asset('../dist/css/bootstrap-rtl.min.css')}}">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{ asset('../dist/css/custom-style.css')}}">
  <!-- js Chart -->
  <!-- favicon -->
   <link rel="icon" href="{{  asset('../dist/img/favicon.png')}}">
  <!-- end facicon -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

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

  <!-- Main Sidebar Container -->
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

                      <a href="{{ url('dashboard/students') }}" class="nav-link active">

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

                      <a href="{{ url('dashboard/disciplineExamps') }}" class="nav-link">

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
          <div class="col-sm-6" style="display: flex;align-items: center;justify-content: space-between">
            <h1 class="m-0 text-dark">دانش آموزان</h1>
            <p>
          <i onclick="showMenu(this)"  id="check" class="fa fa-bars text-black" style="font-size:30px;cursor:pointer"></i>
            </p>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">مدیریت دانش آموز</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-12">
          <div class="form-group">
            <label for="exampleInputEmail1">جستجوی دانش آموز</label>
             <input type="text" class="form-control" id="searchInput" placeholder="جستجو ی دانش آموز">
          </div>
        </div>
          </div>
          <div class="card">
            
            @if (session("success"))
                <div class="alert alert-success text-center mt-1">{{ session('success') }}</div>
              @endif
              @if (session("error1"))
                <div class="alert alert-danger text-center mt-1">{{ session('error') }}</div>
              @endif
            <div class="card-header">
              
              <h3 class="card-title" style="float: right;">داده دانش آموز</h3>
              <a href="{{ route('dashboard.students.create') }}">
              <button style="float: left;" class="btn btn-outline-success">ایجاد</button>
              </a>
              
            </div>
            <div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="tableStudent"  class="table table-bordered table-hover col-2 col-sm-12">
                <thead>
                <tr>
                  <th>شماره</th>
                  <th>نام </th>
                  <th>تصویر</th>
                  <th>مدرسه</th>
                  <th>کلاس</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                  {{-- @php $data = [] @endphp --}}
@php $i=0; @endphp
@foreach($data as $data)
  @php $i++; @endphp
<tr>
  <td>{{ $i }}</td>
  <td>{{ $data->name }}</td>
  @if ($data->avatar)
    <td><img src="{{ asset($data->avatar) }}" width="70px" height="70px" alt=""></td>
      @else
      <td><img src="{{ asset('images/login/logo.svg') }}" width="70px" height="70px" alt=""></td>
  @endif
  <td>{{ $data->school->name ??  'نا مشخص'  }}</td>
  <td>{{ $data->student->class->name ?? 'نا مشخص' }}</td>
  <td>
   <div class="d-flex align-items-center justify-space-around">


     
     <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $data->id }}">حذف</button>

    
    <a class="mr-1"  href="{{ route('dashboard.students.edit', ['student'=>$data->id]) }}">
      <button class="btn btn-outline-primary btn-sm">ویرایش</button>
      
    </a>
    
    <a class="mr-1"  href="{{ route('dashboard.students.show', ['student'=>$data->id]) }}">
      <button class="btn btn-outline-success btn-sm">مشاهده</button>
      
    </a>
  </div>
  </td>
</tr>
@endforeach


                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            
        
            </div>
            <!-- /.card-header -->
          
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
  // اطمینان حاصل کنید که این کد بعد از بارگیری کامل صفحه اجرا شود.
document.addEventListener('DOMContentLoaded', function() {
    // انتخاب همه دکمه‌های حذف
    document.querySelectorAll('.delete-btn').forEach((button) => {
        button.addEventListener('click', function() {
            const idToSend = this.getAttribute('data-id');
            
            if (!idToSend) {
                console.error("Attribute 'data-id' not found.");
                return;
            }
            
            Swal.fire({
                title: 'آیا مطمئن هستید؟',
                text: "این عمل غیرقابل بازگشت است.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله، ادامه بده',
                cancelButtonText: 'خیر، لغو کن'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`students/${idToSend}`, {
                        method: 'DELETE', 
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute("content")
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) { 
                            Swal.fire({
                                title: 'موفق!',
                                text: data.message || "حذف با موفقیت انجام شد",
                                icon: 'success'
                            });
                            
                            // برای نمایش آخرین تغییرات، صفحه را مجدداً بارگذاری کنید:
                            window.location.reload(true);
                            
                        } else { 
                            Swal.fire({
                                title: 'خطا!',
                                text: data.message || "عملیات ناموفق بود",
                                icon: 'error'
                            });
                        }
                        
                    })
                    .catch((error) => console.error(error));
                    
                } else { 
                  return;
              }
          }); // پرانتز اضافه شده
            
        }); // پرانتز اضافه شده
        
    }); // پرانتز اضافه شده
    
}); // این هم برای اطمینان از اجرای پس از بارگیری کامل صفحه

</script>

  <script>
document.getElementById("searchInput").addEventListener("input", function() {
  // دریافت مقدار جستجو
  const filter = this.value.toLowerCase();
  const table = document.getElementById("tableStudent");
  const trs = table.getElementsByTagName("tr");

  // حلقه بر روی تمام سطرهای جدول (به جز هدر)
  for (let i = 1; i < trs.length; i++) {
    const tds = trs[i].getElementsByTagName("td");
    let found = false;
    
    // بررسی هر سلول
    for (let j = 0; j < tds.length; j++) {
      const td = tds[j];
      if (td) {
        const txtValue = td.textContent || td.innerText;
        if (txtValue.toLowerCase().indexOf(filter) > -1) {
          found = true;
          break;
        }
      }
    }
    
    // نمایش/مخفی کردن سطر
    trs[i].style.display = found ? "" : "none";
  }
});
</script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{  asset('../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')}}"></script>
<script src="{{  asset('../plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{  asset('../plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{  asset('../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{  asset('../plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{  asset('../plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{  asset('../plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{  asset('../plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{  asset('../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{  asset('../plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{  asset('../plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{  asset('../dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{  asset('../dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{  asset('../dist/js/demo.js')}}"></script>
<!-- Js chart -->
</body>
</html>
