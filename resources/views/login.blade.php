<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>School Management</title>
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin_asset/assets/css/style.css') }}">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                 <h2>School Management</h2>
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>

              <form class="pt-3" method="post" action="{{ url('login') }}">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                  
                    @error('email')
                    <p class="error_msg">
                      {{$message}}
                    </p>
                    @enderror
                
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">

                  @error('password')
                    <p class="error_msg">
                      {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN">
                </div>
                
              </form>

              <p class="error_msg">{{ session('msg') }}</p>

            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</body>
</html>