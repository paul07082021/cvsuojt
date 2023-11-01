@extends('crudbooster::admin_template')
@section('content')

<section class="content">

<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
<div class="info-box-content">
<span class="info-box-text">Pending User</span>
<span class="info-box-number">{{$pending}}</span>
</div>

</div>

</div>

<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
<div class="info-box-content">
<span class="info-box-text">Verified User</span>
<span class="info-box-number">{{$verify}}</span>
</div>

</div>

</div>


<div class="clearfix visible-sm-block"></div>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total Income</span>
<span class="info-box-number">₱ {{$verify * 0}}</span>
</div>

</div>

</div>

<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total User</span>
<span class="info-box-number">{{$totalu}}</span>
</div>

</div>

</div>

</div>





<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">New Members</h3>

</div>

<div class="box-body">
<div class="table-responsive">
<table class="table no-margin">
<thead>
<tr>

<th>Full Name</th>
<th>Email</th>
<th>Contact</th>
<th>Address</th>

</tr>
</thead>
<tbody>
@foreach($result as $users)
<tr>
<td>{{$users->name}}</td>
<td>{{$users->email}}</td>
<td>{{$users->contact}}</td>
<td>{{$users->address}}</td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>


</div>






</section>

@endsection