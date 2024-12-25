<!-- < ?php
// $conn=mysqli_connect("localhost","root","") or die("Could not connect");
// mysqli_select_db($conn,"studentdb") or die("could not connect database");
?> -->


<?php
    error_reporting(0); //E_ALL แสดง error ทั้งหมด | ใส่ 0 ปิดแสดง error ทั้งหมด
    date_default_timezone_set('Asia/Bangkok');

        $serverName = "RK-168N\SQLEXPRESS";
        $userName = "";
        $userPassword = '';
	    $dbName = "studentdb";
   	    $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');
        $conn = sqlsrv_connect($serverName, $connectionInfo);

       if($conn)
       {
        //    echo "Database Connected.";
        }else{
           die( print_r( sqlsrv_errors(), true));
       }
    return $conn;
sqlsrv_close($conn);
?>