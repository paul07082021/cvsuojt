@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
  
@php
$hidereferal = "hidden";
@endphp

@if($status == 'Not Verify' && $proof == true)
@php
$hide = "hidden";
$text = "Please wait 24 hours to activate your account";
@endphp
@endif


@if($status == 'Not Verify' && $proof == false)
@php
$hide = " ";
$text = "You just choose one account from our mode of payment";
@endphp
@endif


@if($status == 'Verified' && $proof == true)
@php
$hide = "hidden";
$text = "Your account is already verified!";
$hidereferal = " ";
@endphp
@endif



<link rel="stylesheet" href=" {{ asset('assets/css/Contact-Details-icons.css') }}">
<div class="row">
    
        <div class="col">
            <h1 style="text-align: center;">Account Activation</h1>
            <h2 style="text-align: center;" >{{$text}}</h2>
               <h2 style="text-align: center;" {{$hidereferal}}>Referral Code: {{$referal}}</h2>
            
        </div>
        
        
    </div>
    <div class="row yazzea-acc-activation-row" {{$hide}}>
        <div class="col-md-6" >
            <div class="row yazzea-account" style='    margin-bottom: 20px;'>
                <div class="col-md-6" style="text-align: center;">
                    <picture><img src="https://yazzea.com/public/assets/img/Background.png" style="width: 235px;"></picture>
                </div>
                <div class="col-md-6 yazzea-acc-details">
                    <p class="yazzea-text-gcash" style="font-size: 20px;"><strong>Gcash Account:</strong></p>
                    <p class="yazzea-text-gcash"><strong>Account Name:</strong> <br>Argie Tampos</p>
                    <p class="yazzea-text-gcash"><strong>Account No:</strong> <br>0968 206 4958</p>
                </div>
            </div>
            <div class="row yazzea-account" style='    margin-bottom: 20px;'>
                <div class="col-md-6" style="text-align: center;">
                    <picture><img src="https://yazzea.com/public/assets/img/Screenshot_3.jpg" style="width: 235px;"></picture>
                </div>
                <div class="col-md-6 yazzea-acc-details">
                    <p class="yazzea-text-gcash" style="font-size: 20px;"><strong>Maya Account:</strong></p>
                    <p class="yazzea-text-gcash"><strong>Account Name:</strong> <br>Argie Tampos</p>
                    <p class="yazzea-text-gcash"><strong>Account No:</strong> <br>0968 206 4958</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
    <div class="panel-heading">
        <strong><i class="fa fa-user-secret"></i> Upload the Screenshot receipt</strong>
    </div>

    <div class="panel-body" style="padding:20px 0px 0px 0px">
        
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('reference') }}">
            @csrf
            <div class="box-body" id="parent-form-area">

                <div class="form-group header-group-0 " id="form-group-proof" style="">
                    <label class="col-sm-2 control-label">Proof
                    </label>

                    <div class="col-sm-10">
                        <input type="file" title="Proof" class="form-control" name="img" accept="image/*">
                        <p class="help-block"></p>
                        <div class="text-danger"></div>

                    </div>

                </div>
                <input type="hidden" name="users_id" value="{{$id}}" >                                            </div><!-- /.box-body -->

            <div class="box-footer" style="background: #F5F5F5">

                <div class="form-group">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                    </div>
                </div>


            </div><!-- /.box-footer-->

        </form>

    </div>
</div>
        </div>
    </div>
    <script src="https://yazzea.com/dashboard/public/assets/bootstrap/js/bootstrap.min.js"></script>

<!-- ADD A PAGINATION -->

@endsection