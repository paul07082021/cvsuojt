@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">First {{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
      <!------>
                
        <div class="form-group row">
                            <label for="mname" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                            <div class="col-md-6">
                                <input id="mname" type="text" class="form-control" required autofocus>

                                
                            </div>
                        </div>
      
      <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">Last Name}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control"  required autofocus>

                              
                            </div>
                        </div>
      
       <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control"  value="" required autofocus>

                              
                            </div>
                        </div>
      
      
       <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                                <select class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>

                              
                            </div>
                        </div>
         <div class="form-group row">
                            <label for="cstatus" class="col-md-4 col-form-label text-md-right">Civil Status</label>

                            <div class="col-md-6">
                                <select class="form-control">
                                    <option>Single</option>
                                    <option>Merried</option>
                                </select>

                              
                            </div>
                        </div>
      <div class="form-group row">
                            <label for="cstatus" class="col-md-4 col-form-label text-md-right">Senior/PWD</label>

                            <div class="col-md-6">
                                <select class="form-control">
                                    <option>No</option>
                                    <option>Yes</option>
                                    
                                </select>

                              
                            </div>
                        </div>
      
      <div class="form-group row">
                            <label for="cstatus" class="col-md-4 col-form-label text-md-right">Contact No.</label>

                            <div class="col-md-6">
                                <input id="cnumber" type="number" class="form-control"  value="" required autofocus>

                              
                            </div>
                        </div>
         <div class="form-group row">
                            <label for="cstatus" class="col-md-4 col-form-label text-md-right">ID Image</label>

                            <div class="col-md-6">
                                <input id="idimage" type="file" class="form-control"  required autofocus>

                              
                            </div>
                        </div>
             <div class="form-group row">
                            <label for="cstatus" class="col-md-4 col-form-label text-md-right">Witness Residence(Optional)</label>

                            <div class="col-md-6">
                                <input id="witness" type="text" class="form-control"  required autofocus>

                              
                            </div>
                        </div>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <!------>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
