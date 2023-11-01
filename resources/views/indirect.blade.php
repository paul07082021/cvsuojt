
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
?>


@extends('crudbooster::admin_template')
@section('content')







<section class="content">

<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Yazzea Indirect User</h3>

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
<th>Referred By:</th>
</tr>
</thead>
<tbody>
    

    <?php  
    $sql1 = mysqli_query($conn, "SELECT * FROM cms_users WHERE input_referal = '$referal'");
 while($row2 = mysqli_fetch_array($sql1)){
    $id = $row2['id'];
    
    $sql2 = mysqli_query($conn, "SELECT * FROM yazzea_multilevel WHERE yaz_userid_invitedby = '$id'");
   
  while($row21 = mysqli_fetch_array($sql2)) {
    $indirectID = $row21['yaz_userid'];
    
    $sql4 = mysqli_query($conn, "SELECT * FROM cms_users WHERE id = '$indirectID'");
    $row22 =  mysqli_fetch_array($sql4);
    $ref = $row22['my_referal'];
  
    
?> 
<tr>
<td><?php echo $row22['name'].' '.$row22['lastname'] ?></td>
<td><?php echo $row22['email'] ?></td>
<td><?php echo $row22['contact'] ?></td>
<td><?php echo $row22['address'] ?></td>
<td><?php echo $row2['name'].' '. $row2['lastname'] ?></td>
</tr>
<?php 
  }

}
?>
  



</tbody>
</table>
</div>

</div>


</div>






</section>

@endsection