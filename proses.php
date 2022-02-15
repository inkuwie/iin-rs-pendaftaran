<?php
require 'functions.php';

$query = mysqli_query($db, "SELECT * FROM pasien WHERE no_rm='".mysqli_escape_string($db, $_POST['no_rm'])."'");
$data = mysqli_fetch_array($query);

echo json_encode($data);
