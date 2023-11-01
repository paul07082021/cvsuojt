@extends('crudbooster::admin_template')
@section('content')

<section class="content">

<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Yazzea Direct User{{$name}}</h3>

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
<td>{{$users->name}} {{$users->lastname}}</td>
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