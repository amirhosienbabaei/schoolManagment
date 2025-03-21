<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> ساتا اسکول | سامانه هوشمند مدیریت مدرسه</title>
    <link rel="icon" href="{{ asset('images/favicon/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        @font-face{
            src: url('{{ asset('fonts/Iranian Sans.ttf') }}') ;
            font-family: sans;
        }
        body{
            font-family: sans;
        }
        .rounded-t-5 {
          border-top-left-radius: 0.5rem;
          border-top-right-radius: 0.5rem;
        }

        @media (min-width: 992px) {
          .rounded-tr-lg-0 {
            border-top-right-radius: 0;
          }

          .rounded-bl-lg-5 {
            border-bottom-left-radius: 0.5rem;
          }
        }
      </style>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="{{ asset('images/login/logo.svg') }}"
                class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                @if($errors->any())
                @foreach ($errors->all() as $error)
                    @if ($error === "These credentials do not match our records.")
                        <div class="alert alert-danger text-center text-black">چنین کاربری وجود  ندارد </div>
                    @else
                        <div class="alert alert-danger text-center text-black">{{ $error }}</div>
                    @endif
                @endforeach
            @endif

                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input name="email" type="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="ایمیل خود را وارد نمایید" />
                  <label class="form-label" for="form3Example3">ایمیل</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-3">
                  <input name="password" type="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="رمز عبور خود را وارد نمایید" />
                  <label class="form-label" for="form3Example4">رمز عبور</label>
                </div>



                <div class="text-center text-lg-start mt-4 pt-2">
                  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">ورود</button>


                </div>

              </form>
            </div>
          </div>
        </div>

      </section>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
