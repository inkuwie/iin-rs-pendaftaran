<?php
//include database configuration get_included_files
require 'functions.php';

if(isset($_POST["id_poli"]) && !empty($_POST["id_poli"])){
  //get all data
  $query = $db->query("SELECT * FROM dokter where id_poli = ".$_POST['id_poli']." AND status = 1 ORDER BY nama_dokter");

  //count total number of rows;
  $rowCount = $query->num_rows;

  //display jam list
  if($rowCount > 0){
    echo'<option value="">Selec dokter</option>';
    while($row = $query->fetch_assoc()){
      echo '<option value="'.$row['id_dokter'].'">'.$row['nama_dokter'].'</option>';
    }
  }else{
    echo '<option value="">dokter not availabel</option>';
  }
}

if(isset($_POST["id_dokter"]) && !empty($_POST["id_dokter"])){
  //get all dokter data
  $query = $db->query("SELECT * FROM jam WHERE id_dokter = ".$_POST['id_dokter']." AND status = 1 ORDER BY jam");

  //count total number of $rows
  $rowCount = $query->num_rows;

  //display dokter list
  if($rowCount > 0) {
    echo '<option value="">Select jam</option>';
    while($row = $query->fetch_assoc()){
      echo '<option value="'.$row['id_jam'].'">'.$row['jam'].'</option>';
    }
  }else{
    echo '<option value="">jam not availabel</option>';
  }
}

 ?>
