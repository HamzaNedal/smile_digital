@extends('layouts.app')
@section('title', 'تسجيل الدخول')
    
@section('content')

<div class="login-box">
    <div class="login-logo">
      <img src="{{ asset('frontend') }}/img/logo.png" alt="">

    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">  
        <form action="{{ route('login') }}" method="post">
          @csrf
          @error('email')
          <span class="" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني">
            
            <div class="input-group-append">
              
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            
          </div>
         
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="كلمة المرور">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  تذكرني
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">دخول</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection
