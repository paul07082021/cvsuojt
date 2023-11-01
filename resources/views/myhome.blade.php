@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
  

<link rel="stylesheet" href=" {{ asset('assets/css/Contact-Details-icons.css') }}">


<div class="row">
    
    
    
    
        <!--<div class="col">
            <h1 style="text-align: center;">Welcome to Yazzea</h1>
            <h2 style="text-align: center;" >Ecomm</h2>
             
        </div>-->
        
        <div class="col-md-12" style="text-align: center; margin-top: -60px;">
                    <picture><img src="https://yazzea.com/public/assets/img/roadmap.png" style="width: 100%;"></picture>
                </div>
        
        
        
        
    
    </div>
    <script src="https://yazzea.com/dashboard/public/assets/bootstrap/js/bootstrap.min.js"></script>

<!-- ADD A PAGINATION -->
<p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p>
@endsection