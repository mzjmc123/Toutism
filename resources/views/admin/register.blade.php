<title>AdminLTE 2 | Registration Page</title>
@extends('layouts.template')
@section('content')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    <script>
        function validateForm(){
            if($('#user_name').val() == ""){
                alert('User name cannot be empty');
                $('#user_name').focus();
                return false;
            }else if($('#user_email').val() == ""){
                alert('email name cannot be empty');
                $('#user_email').focus();
                return false;
            }else if ($('#user_password').val() == ""){
                alert('password name cannot be empty');
                $('#user_password').focus();
                return false;
            }else if($('#user_pwd').val() == ""){
                alert('Verify that the password is not empty');
                $('#user_pwd').focus();
                return false;
            }else if($('#user_pwd').val() != $('#user_password').val()){
                alert('The two password input is inconsistent');
                $('#user_password').focus();
                $('#user_pwd').focus();
                return false;
            }
              return true;
        }

    </script>
    @if(session('msg'))
      <p style="color:red">{{session('msg')}}</p>
    @endif
    <form action="{{url('admin/register')}}" method="post" onsubmit="return validateForm()">
      {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="user_pwd" name="user_pwd" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary ">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="{{url('/admin')}}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endsection