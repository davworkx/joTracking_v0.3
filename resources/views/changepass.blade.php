@extends('layouts.app')

@section('content')
<div class="container">
  @if(session('error'))
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error! </strong> {{session('error')}}
  </div>
  @endif
  @if(session('success'))
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success! </strong>{{session('success')}}
  </div>
  @endif
  <div class="col-sm-12 col-md-12 border-secondary" style="padding: 2px 2px 2px 2px;">
      <div class="card border-secondary">
          <div class="card-header border-secondary">Change Password</div>
          <div class="card-body">
            <form class="" action="{{url('/savechangepass')}}" method="post">
              @csrf
              <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                  <div class="col-md-6">
                      <input id="currentpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="currentpassword" required autocomplete="new-password">

                      @error('currentpassword')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                  <div class="col-md-6">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                  <div class="col-md-6">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Save') }}
                      </button>
                  </div>
              </div>

            </form>

          </div>
      </div>
  </div>

</div>
@endsection
<script type="text/javascript">
   jQuery(document).ready(function() {

   });
</script>
