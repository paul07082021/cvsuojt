
<?php
$server = "localhost";
$username = "jmteunbw_wp_lbve2";
$password = "3V3JVe#&J_6w2sTu";
$database = "jmteunbw_wp_satwg";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}



$sql = mysqli_query($conn, "SELECT * FROM cms_users WHERE id = '$myid'");
$row = mysqli_fetch_array($sql);
$referal = $row['my_referal'];


 $sql1 = mysqli_query($conn, "SELECT * FROM cms_users WHERE input_referal = '$referal'");
 $totalRows = mysqli_num_rows($sql1);
 
 

    $sql1 = mysqli_query($conn, "SELECT * FROM cms_users WHERE input_referal = '$referal'");
 while($row2 = mysqli_fetch_array($sql1)){
    $id = $row2['id'];
    
    $sql2 = mysqli_query($conn, "SELECT * FROM yazzea_multilevel WHERE yaz_userid_invitedby = '$id'");
     $totalind = mysqli_num_rows($sql2); // Get the count for $sql2
    $total += $totalind;
  while( $row21 = mysqli_fetch_array($sql2)) {
    $indirectID = $row21['yaz_userid'];
    
    $sql4 = mysqli_query($conn, "SELECT * FROM cms_users WHERE id = '$indirectID'");
    $row22 =  mysqli_fetch_array($sql4);
    
      
  }
 }
 


 
 
 
 
?>

@extends('crudbooster::admin_template')
@section('content')

<section class="content">

<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
<div class="info-box-content">
<span class="info-box-text">Direct User</span>
<span class="info-box-number">{{$totalRows}}</span>
</div>

</div>

</div>

<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
<div class="info-box-content">
<span class="info-box-text">Indirect User</span>
<span class="info-box-number">{{$total}}</span>
</div>

</div>

</div>


<div class="clearfix visible-sm-block"></div>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total Income</span>
<span class="info-box-number">₱ {{$verify * 1000}}</span>
</div>

</div>

</div>

<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total Invite</span>
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