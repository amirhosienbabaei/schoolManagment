<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ساتا اسکول | پنل مدرسه</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
   <link rel="icon" href="{{ asset('../dist/img/favicon.png')}}">
   <link rel="stylesheet" href="{{  asset('../plugins/font-awesome/css/font-awesome.min.css')}}">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="path/to/your/script.js" defer></script>
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
          <nav class="mt-2">
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
                    <li class="nav-item">

                      <a href="{{ url('dashboard/attendances') }}" class="nav-link active">

                        <p>حضور و غیاب</p>
                      </a>
                    </li>
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

                    <li class="nav-item">

                      <a href="{{ url('dashboard/scores') }}" class="nav-link">

                        <p>مدیریت نمرات</p>
                      </a>
                    </li>
                   
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8" style="display: flex;align-items: center;justify-content: space-between">
            <h1 class="m-0 text-dark">حضور و غیاب</h1>
            <p>
          <i onclick="showMenu(this)"  id="check" class="fa fa-bars text-black" style="font-size:30px;cursor:pointer"></i>
            </p>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">حضور و غیاب</li>
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
              <h3 class="card-title" style="float: right;">حضور و غیاب</h3>
             
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
                <button  class="btn btn-outline-success" data-toggle="modal" data-target="#myModal">برای انتخاب کلاس کلیک کنید </button>
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
                             <p>لطفا یک کلاس    انتخاب نمایید</p>
                             <select   onclick="hiddenTbody()"  name="" class=" form-control" id="class">
                              <option  value="" selected disabled>چیزی انتخاب نشده است</option>
                          
                              @if (Auth::user()->type == 4)
                              @foreach ($classes as $class)
                              <option value="{{ $class->name->id }}">{{ $class->name->name }}</option>
                              @endforeach
                              @else
                              
                              @foreach ($classes as $class)
                              <option value="{{ $class->id }}">{{ $class->name }}</option>
                              @endforeach
                              @endif
                                  
                        
                             </select>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                          </div>
                      </div>
                  </div>
              </div>
              <form action="{{ route('dashboard.validations.store') }}" method="POST">
                @csrf
              <div class="col-12  d-flex align-items-center justify-content-space-around" style="height: 300px;margin-top:20px">
                <div class="col-4" style="height: 250px;">
                  <select name="lesson_id" id="" class="form-control col-12 mt-1">
                    <option value="">نام درس : نامشخص  </option>
                    @foreach ($lessons as $lesson)
                    <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                    @endforeach
                  
                  </select>
                  <select name="zang" id="" class="form-control col-12 mt-1">
                    <option value="" disabled>زنگ</option>
                    <option value="1">اول</option>
                    <option value="2">دوم</option>
                    <option value="3">سوم</option>
                    <option value="4">چهارم</option>
                  </select>
                  <select name="class_id" id="" disabled class="form-control col-12 mt-1">
                    <option id="classValue" value="">کلاس : نامشخص</option>
                  </select>
                  <select name="time" id="" disabled class="form-control col-12 mt-1">
                    <option id="timeOption" value=""></option>
                    <option value="">103</option>
                    <option value="">201</option>
                    <option value="">102</option>
                  </select>
                  
                  <div class="col-12 d-flex align-items-center justify-content-center mt-2">
                  <button class="btn btn-warning mr-2 btn-sm mt-2">ثبت </button>
                  </div>                  

                </div>
              </form>
                
                <div  class="col-8" style="height: 300px; overflow-y:scroll">
                  <table id="tableStudent"  class="table table-bordered table-striped">
                
                    <tr>
                      <td>نام</td>
                      <td>شماره تلفن</td>
                      <td>کد ملی</td>
                      <td>اعتبار سنجی</td>
        
                 
                    </tr>

                 

                  </table>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jalaali-js/dist/jalaali.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jalaali-js/dist/jalaali.min.js"></script>

<script src="https://unpkg.com/jalaali-js/dist/jalaali.js"></script>
<script src="https://unpkg.com/jalaali-js/dist/jalaali.min.js"></script>

<script>
  function showPersianDateTime() {
    const now = new Date();
    const jalaliDate = jalaali.toJalaali(now);
    const persianDigits = '۰۱۲۳۴۵۶۷۸۹';

    // تابع تبدیل زمان به فارسی
    const toPersianTime = (time) => 
        time.toString().padStart(2, '0').split('')
            .map(d => persianDigits[d])
            .join('');

    const timeParts = {
        year: jalaliDate.jy.toString().replace(/\d/g, d => persianDigits[d]),
        month: (jalaliDate.jm + '').padStart(2, '0').replace(/\d/g, d => persianDigits[d]),
        day: (jalaliDate.jd + '').padStart(2, '0').replace(/\d/g, d => persianDigits[d]),
        hours: toPersianTime(now.getHours()),
        minutes: toPersianTime(now.getMinutes()),
        seconds: toPersianTime(now.getSeconds())
    };

    document.querySelector("#timeOption").textContent = `
        ${timeParts.year}/${timeParts.month}/${timeParts.day} 
        ${timeParts.hours}:${timeParts.minutes}:${timeParts.seconds}`;
    
}
setInterval(() => {
  showPersianDateTime();
}, 1000);
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
        text: "بیشترین غایبین موجود در نمرات"
      }
    }
  });
  </script>
  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.getElementById('local').addEventListener('click', function() {
        // دریافت ID از data-id دکمه
        const idToSend = this.getAttribute('data-id');
    
        Swal.fire({
            title: 'آیا مطمئن هستید؟',
            text: "این عمل غیرقابل بازگشت است.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'بله، ادامه بده',
            cancelButtonText: 'خیر، لغو کن'
        }).then((result) => {
            if (result.isConfirmed) {
                // ارسال شناسه به سرور
                fetch(`moavenin/delete/${idToSend}`, {
                    method: 'DELETE', // یا 'POST' بسته به نیاز شما
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: idToSend }) // اگر نیاز به ارسال بدنه دارید
                })
                .then(response => response.json())
                .then(data => {
                    console.log('موفقیت:', data);
                    Swal.fire('موفق!', 'شناسه با موفقیت حذف شد.', 'success');
                })
                .catch((error) => {
                    console.error('خطا:', error);
                    Swal.fire('خطا!', 'مشکلی در حذف شناسه پیش آمد.', 'error');
                });
            }
        });
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
  
console.log(data);


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
