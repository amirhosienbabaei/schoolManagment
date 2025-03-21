<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ساتا اسکول | پنل مدرسه</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
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
  {{-- <link rel="stylesheet" href="{{ asset('../plugins/datepicker/datepicker3.css')}}"> --}}
  <!-- Daterange picker -->
  {{-- <link rel="stylesheet" href="{{ asset('../plugins/daterangepicker/daterangepicker-bs3.css')}}"> --}}
  <!-- bootstrap wysihtml5 - text editor -->
  {{-- <link rel="stylesheet" href="{{ asset('../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}"> --}}
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{  asset('../dist/css/bootstrap-rtl.min.css')}}">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{  asset('../dist/css/custom-style.css')}}">
  <!-- js Chart -->
  <!-- favicon -->
   <link rel="icon" href="{{ asset('../dist/img/favicon.png')}}">
   <link rel="stylesheet" href="{{  asset('../plugins/font-awesome/css/font-awesome.min.css')}}">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="path/to/your/script.js" defer></script>


   <style>
    .datepicker {
        font-family: Tahoma;
        direction: rtl;
        width: 300px;
        background: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        display: none;
        position: absolute;
    }
    
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 2px;
    }
    
    .day, .header button {
        padding: 5px;
        text-align: center;
        cursor: pointer;
    }
    
    .day:hover {
        background: #4CAF50;
        color: white;
    }
    
    .current-day {
        background: #2196F3;
        color: white;
    }
    
    .other-month {
        color: #999;
    }

    .report-card {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .report-card h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .student-info {
            margin-bottom: 20px;
        }

        .student-info p {
            margin: 5px 0;
            font-size: 16px;
        }

        .student-info p span {
            font-weight: bold;
            color: #2980b9;
        }

        .discipline-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .discipline-table th,
        .discipline-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .discipline-table th {
            background-color: #2980b9;
            color: #fff;
            font-weight: bold;
        }

        .discipline-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .discipline-table tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
</style>

  <meta name="csrf-token" content="{{ csrf_token() }}">



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

                      <a href="{{ url('dashboard/disciplines') }}" class="nav-link active">

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
          <div class="col-sm-8" style="display: flex;align-items: center;justify-content: space-between">
            <h1 class="m-0 text-dark">انضباطی</h1>
            <p>
          <i onclick="showMenu(this)"  id="check" class="fa fa-bars text-black" style="font-size:30px;cursor:pointer"></i>
            </p>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active"> انضباطی</li>
            </ol>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="float: right;">اعتبار سنجی</h3>
             
            </div>
            <div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (session('success'))
                  <div class="alert alert-success text-white">{{ session('success') }}</div>
              @endif
              @if (session('error'))
              <div class="alert alert-danger text-white">{{ session('error') }}</div>
              @endif
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div  class="modal-dialog modal-lg" role="document">
                      <div style="margin-top:100px;margin-right:20px" class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">انتخاب کلاس</h5>
                              <button type="button" style="float: right;" class="close" data-dismiss="modal" aria-label="بستن">
                                  <!-- <span aria-hidden="true">&times;</span> -->
                              </button>
                          </div>
                          <div class="modal-body">
                             <p>لطفا یک کلاس   را انتخاب نمایید</p>
                             <select   onclick="hiddenTbody()"  name="" class=" form-control" id="class">
                              <option class="optionValues" value="" selected disabled>چیزی انتخاب نشده است</option>
                              @foreach ($classes as $class)
                              <option value="{{ $class->id }}">{{ $class->name }}</option>
                              @endforeach
                             </select>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                          </div>
                      </div>
                  </div>
                </div>
                
                
                <form action="{{ route('dashboard.disciplines.store') }}" method="POST">
                  @csrf
                  <h6>نکته : غایب بودن دانش آموز به طور خودکار در کارنامه ی انضباطی وی ثبت خواهد شد.</h6>
              <div class="col-12  d-flex align-items-center justify-content-space-around" style="height: 300px;margin-top:20px">
                <div class="col-4" style="height: 250px;">

                  @if (Auth::user()->type == 1)
                  <select name="school_id" id="school" class="form-control col-12 mt-1">

                    <option value="">نام مدرسه : نا مشخص</option>
                    @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                  
                  </select>
                  
                  <select name="class_id" id="class_main" class="form-control col-12 mt-1">
                    <option class="optionValues" value="">نام کلاس : نا مشخص</option>
                  
                  </select>

                  @else
                  <select name="class_id" id="class_main" class="form-control col-12 mt-1">
                    <option class="optionValues" value="">نام کلاس : نا مشخص</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                  </select>
                  @endif
           

                  <select name="student_id" id="student_main" class="form-control select-picker1 col-12 mt-1">
                    <option value="" class="optionValues1">نام دانش آموز : نا مشخص</option>
              
                  </select>
                  
                  <div class="col-12 d-flex align-items-center justify-content-center mt-2">
                  <button class="btn btn-warning mr-2 btn-sm mt-2">استعلام</button>
                  </div>                  

                </div>
              </form>
              <div  class="col-8" style="height: 300px; overflow-y:scroll">
                <table id="tableStudent"  class="table table-bordered table-striped">
              
                  <tr>
                    <td>نام</td>
                    <td>شماره تلفن</td>
                    <td>کد ملی</td>
                    <td>وضعیت</td>
                    <td>کلاس</td>
                    <td>تاریخ</td>                 
                    <td>عملیات</td>
                  </tr>

                  <tbody>
                    @if (session("Alldatas"))
                        @foreach (session("Alldatas") as $data)
                            <tr>
                              <td>{{ $data->student->name }}</td>
                              <td>{{ $data->student->phone }}</td>
                              <td>{{ $data->student->codemelli }}</td>
                              @if ($data->status == 0 || $data->status == "0")
                              <td class="text-danger">غایب</td>
                              @elseif($data->status == 2 || $data->status == "2")
                              <td class="text-warning">غیبت موجه</td>
                                  @else
                              @endif
                              <td>{{ $data->student->class->name }}</td>
                              <td class="{{ $data->persianDate() }}" >{{ $data->persianDate($data->created_at) }}</td>
                              <td>
                                 @if ($data->status == 0 || $data->status == "0")
                                <button data-id="{{ $data->id }}" id="btnMovajah" class="btn btn-outline-success btn-sm">موجه کردن</button>
                                  @else
                                  <button disabled style="cursor: not-allowed" class="btn btn-outline-warning btn-sm">موجه شده</button>
                                 @endif
                              </td>
                            </tr>
                        @endforeach
                        @else
                        
                        <tr>
                          <td colspan="7" style="text-align: center;">
                              <div class="no-data-message" style="height: 200px;line-height:200px">
                                  دیتایی یافت نشد!
                                <strong class="text-danger">فیلد های مربوطه را انتخاب کنید</strong>
                                <img width="100px" height="100px" src="{{ asset('images/Other/data-notFound.webp') }}" alt="">
                              </div>
                          </td>
                      </tr>
                        @endif
                  </tbody>

                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
              
          <div class="col-12 mt-5">
            <div class="report-card text-dark">
              <h1>کارنامه انضباطی</h1>
      
              <!-- اطلاعات دانش‌آموز -->
              <div class="student-info text-dark">
                  <p><span>نام دانش‌آموز:</span> {{ session("Alldatas")[0]->student->name ?? 'نا مشخص' }}</p>
                  <p><span>کلاس:</span> {{ session('Alldatas')[0]->student->class->name ?? 'نا مشخص' }} </p>
                  <p><span>سال تحصیلی:</span> 1403-1404</p>
              </div>
      
              <!-- جدول انضباطی -->
              <table class="discipline-table">
                  <thead>
                      <tr>
                          <th>ردیف</th>
                          <th>تاریخ</th>
                          <th>مورد انضباطی</th>
                          <th>نمره</th>
                      </tr>
                  </thead>
                  <tbody>
                    @if (session("Alldatas"))
                    <?php $i=0; ?>
                    @foreach (session("Alldatas") as $data)
                    <?php $i++; ?>
                    <tr>
                      <td>{{ $i }}</td>
                      <td class="{{ $data->persianDate() }}" >{{ $data->persianDate($data->created_at) }}</td>
                          @if ($data->status == 0 || $data->status == "0")
                          <td class="text-danger">غیبت</td>
                          @elseif($data->status == 2 || $data->status == "2")
                          <td class="text-warning">غیبت موجه</td>
                              @else
                          @endif
                         <td>-0.5</td>
                        </tr>
                    @endforeach
                        @if (session('dis_data'))
                        @foreach (session('dis_data') as $data)
                        <?php $i++; ?>
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $data->persianDate() }}</td>
                          <td>{{ $data->title }}</td>
                          <td>{{ $data->score }}</td>
                        </tr>
                        @endforeach
                        @endif
                    @else
                    
                    <tr>
                      <td colspan="7" style="text-align: center;">
                          <div class="no-data-message" style="height: 200px;line-height:200px">
                              دیتایی یافت نشد!
                            <strong class="text-danger">فیلد های مربوطه را انتخاب کنید</strong>
                            <img width="100px" height="100px" src="{{ asset('images/Other/data-notFound.webp') }}" alt="">
                          </div>
                      </td>
                  </tr>
                    @endif
                  </tbody>
              </table>
      
              <!-- جمع‌بندی -->
              <div class="footer">
                  <p>نمره نهایی : <strong>{{ session('final_score') ?? 'نا مشخص' }}</strong></p>
                  <p>وضعیت: <strong>{{ session('status') ?? 'نا مشخص' }}</strong></p>
              </div>
              <div>
                <button onclick="window.print()" class="btn btn-outline-success">چاپ کارنامه</button>
              </div>
          </div>
          </div>
          <!-- /.card -->

        
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="">
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> --}}
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script src="https://unpkg.com/jalaali-js/dist/jalaali.js"></script>
<script src="https://unpkg.com/jalaali-js/dist/jalaali.min.js"></script>
{{-- <script src="{{ asset('../js/datepicker.js') }}"></script> --}}

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
  function hiddenTbody(){
    let table = document.querySelector("#tableStudent");
    let tbody = document.querySelector("#myTbody");
    table.removeChild(tbody);
    console.log(tbody);
    // console.log(tbody);
  }
</script>

<script>

  school = document.querySelector('#school');
  select = document.querySelector('.select-picker');

  document.querySelector('#school').addEventListener('change', function(){
    // alert()
    let i=0;
    do{
      i++;
        document.querySelectorAll('.optionValues').forEach(element => {
          element.style.display="none";
        });

      }
      while(i<select.children.length)

    fetch(`/dashboard/teachers/r/${school.value}` , {
    method: 'POST',
    headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN" : document.querySelector("meta[name='csrf-token']").getAttribute("content")
    },
    credentials: 'include', // Include cookies (if necessary)
})
.then(response => response.json())
.then(data => {
  let arr = Object.entries(data);
  let Element = document.createElement('option');
  console.log(data);
  
   Element.value = "";
   Element.className = "optionValues";
   Element.innerHTML = "کلاسی را انتخاب کنید";
   Element.disabled = true;
   Element.selected = true;
   document.querySelector('#class_main').appendChild(Element);

   document.querySelector("#class_main").style.backgroundColor = "red !important";
   

  for (let i=0;i<arr.length;i++){
    console.log(arr[i][1]);
   let Element = document.createElement('option');

   Element.value = arr[i][1]['id'];
      Element.className = "optionValues";
   Element.innerHTML = arr[i][1]['name'];
   document.querySelector('#class_main').appendChild(Element);
  }

})
.catch(error => console.error('Error:', error));
}

);
</script>

<script>
  function gregorianToJalali(gy, gm, gd) {
    const g_d_m = [0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334];
    gy = parseInt(gy);
    gm = parseInt(gm);
    gd = parseInt(gd);

    if (gm < 1 || gm > 12) {
        throw new Error("ماه باید بین ۱ تا ۱۲ باشد!");
    }

    const gy2 = (gm > 2) ? (gy + 1) : gy;
    let days = 355666 + (365 * gy) + (Math.floor((gy2 + 3) / 4)) - (Math.floor((gy2 + 99) / 100)) + (Math.floor((gy2 + 399) / 400)) + gd + g_d_m[gm - 1];

    let jy = -1595 + (33 * (Math.floor(days / 12053)));
    days %= 12053;
    jy += 4 * (Math.floor(days / 1461));
    days %= 1461;

    if (days > 365) {
        jy += Math.floor((days - 1) / 365);
        days = (days - 1) % 365;
    }

    let jm, jd;
    if (days < 186) {
        jm = 1 + Math.floor(days / 31);
        jd = 1 + (days % 31);
    } else {
        jm = 7 + Math.floor((days - 186) / 30);
        jd = 1 + ((days - 186) % 30);
    }

    return { year: jy, month: jm, day: jd };
}

function convertToJalali(gregorianDate) {
    // جدا کردن سال، ماه و روز از رشته تاریخ میلادی
    const [year, month, day] = gregorianDate.split('-').map(Number);

    // تبدیل به تاریخ شمسی
    const { year: jy, month: jm, day: jd } = gregorianToJalali(year, month, day);

    // فرمت‌دهی به صورت YYYY-MM-DD
    return `${jy}-${String(jm).padStart(2, '0')}-${String(jd).padStart(2, '0')}`;
}

// مثال استفاده
const gregorianDate = document.querySelector("#date").className; // ورودی به صورت رشته
const jalaliDate = convertToJalali(gregorianDate);

document.querySelector("#date").innerHTML = jalaliDate; 

// alert(jalaliDate); // خروجی: 1404-01-03
// Nzi

</script>

<script>
    classRoom = document.querySelector('#class_main');
    selectBar = document.querySelector('.select-picker1');

  document.querySelector('#class_main').addEventListener('change', function(){
    // alert()
    let i=0;
    do{
      i++;
        document.querySelectorAll('.optionValues1').forEach(element => {
          element.style.display="none";
        });

      }
      while(i<selectBar.children.length)
      
    fetch(`/dashboard/students/d/${classRoom.value}` , {
    method: 'POST',
    headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN" : document.querySelector("meta[name='csrf-token']").getAttribute("content")
    },
    credentials: 'include', // Include cookies (if necessary)
})
.then(response => response.json())
.then(data => {
  let arr = Object.entries(data);
  let Element = document.createElement('option');
  console.log(data);
  
   Element.value = "";
   Element.className = "optionValues";
   Element.innerHTML = "دانش آموزی را انتخاب کنید";
   Element.disabled = true;
   Element.selected = true;
   document.querySelector('#student_main').appendChild(Element);

   document.querySelector("#student_main").style.backgroundColor = "red !important";
   

  for (let i=0;i<arr.length;i++){
    console.log(arr[i][1]);
   let Element = document.createElement('option');

   Element.value = arr[i][1]['id'];
      Element.className = "optionValues1";
   Element.innerHTML = arr[i][1]['name'];
   document.querySelector('#student_main').appendChild(Element);
  }

})
.catch(error => console.error('Error:', error));
}

);
</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  // اطمینان حاصل کنید که این کد بعد از بارگیری کامل صفحه اجرا شود.
document.addEventListener('DOMContentLoaded', function() {
    // انتخاب همه دکمه‌های حذف
    document.querySelectorAll('#btnMovajah').forEach((button) => {
      button.addEventListener('click', function(event) {
          event.preventDefault();
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
                    fetch(`disciplines/${idToSend}`, {
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



<script type="text/javascript">
  $(document).ready(function() {
    $(".datePersian").pDatepicker();
  });
</script>

<script>
let select = document.querySelector('#class');
let table = document.querySelector("#tableStudent");
let tbody = document.querySelectorAll("#myTbody");
select.addEventListener('change', function(){


  fetch(`/dashboard/students/d/${select.value}` , {
    method: 'POST',
    headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN" : document.querySelector("meta[name='csrf-token']").getAttribute("content")
    },
    credentials: 'include', // Include cookies (if necessary)
  })
  .then(response => response.json())
.then(data => {
  


  const parent = document.createElement('tbody');
  parent.id = "myTbody";
  table.appendChild(parent);
  let i=0;
  data.forEach(item => {
    i++;

  const row = parent.insertRow();
  const cell1 = row.insertCell();
  const cell2 = row.insertCell();
  const cell3 = row.insertCell();
  const cell4 = row.insertCell();


  const selectBar = document.createElement('select');
  const inputUser = document.createElement("input");
  const inputClass = document.createElement("input");
  
  const option1 = document.createElement('option');
  const option2 = document.createElement('option');
  const option3 = document.createElement('option');

  inputUser.name = "user_id="+item.id;  
  inputUser.type = "hidden";

  inputClass.name = "class_id";
  inputClass.type = "hidden";

  selectBar.name = "status"+i;
  selectBar.className = "form-control";
  
  option1.value = "1";
  option1.innerHTML = "حاضر";
  option1.selected = true;
  
  
  option2.value = "0";
  option2.innerHTML = "غایب";
  
  option3.value = "2";
  option3.innerHTML = "غیبت موجه";
  
  
  console.log(selectBar.value);
  
  
  selectBar.appendChild(option1);
  selectBar.appendChild(option2);
  selectBar.appendChild(option3);
  selectBar.appendChild(inputUser);
  selectBar.appendChild(inputClass);

  cell1.textContent = item.name;
  cell2.textContent = item.phone;
  cell3.textContent = item.codemelli;

  // console.log {(...)};
  
  
  
  const selectElementText = select.options[select.selectedIndex].textContent;
  document.querySelector('#classValue').innerHTML = `کلاس  : ${selectElementText}`;
  document.querySelector('#classValue').value = select.value;
  cell4.appendChild(selectBar);

  inputUser.value = selectBar.value;
  inputClass.value = select.value;
  // console.log("show");
  
});
  

});
});

</script>
<script>
  let oneInputs = document.querySelectorAll('#one');
  let twoInputs = document.querySelectorAll('#two');
  let threeInputs = document.querySelectorAll('#three');
  let fourInputs = document.querySelectorAll('#four');

  flag = true;
 function showInputsOne(a){
  oneInputs.forEach((input)=>{

      input.disabled = false;
      a.classList.add('btn-outline-danger');
      
  });
 }
 function showInputsTwo(a){
  twoInputs.forEach((input)=>{

      input.disabled = false;
      a.classList.add('btn-outline-danger');
      
  });
 }
 function showInputsThree(a){
  threeInputs.forEach((input)=>{

      input.disabled = false;
      a.classList.add('btn-outline-danger');
      
  });
 }
 function showInputsFour(a){
  fourInputs.forEach((input)=>{

      input.disabled = false;
      a.classList.add('btn-outline-danger');
      
  });
 }

</script>
<script>

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
{{-- <script src="{{ asset('../plugins/datepicker/bootstrap-datepicker.js')}}"></script> --}}
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
