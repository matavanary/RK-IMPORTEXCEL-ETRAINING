<?php
include 'db.php';

if(isset($_POST["Import"])){

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
				// $sql = "INSERT INTO DIGITALTENKO_FEEDBACKDRIVER (ROUTE_DATE,ROUTE_CODE,RUN_SEQ,PLAN_ACCESS_SEQ,TRUCK_LICENSE,PROVINCE,DRIVER_NAME,LOGISTIC_POINT_NAME,HOP,LOCATION,
				// PLAN_ARRIVAL,PLAN_DEPARTURE,ACTUAL_ARRIVAL,ACTUAL_DEPARTURE,OPERATION_TIME_PLAN,OPERATION_TIME_ACTUAL,TYPE,
				// PUNC_OF_ARRIVAL,PUNC_OF_DEPARTURE,FILES_NAMES,UPLOAD_TO_DB_DATE) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				// $params = array($resultmark,$split[1],$split[2],$split[3],$split[4],$split[5],$resultspace,$split[7],$split[8],$split[9],
				// 				$split[10],$split[11],$split[12],$split[13],$split[14],$split[15],$split[16],$split[17],$split[18],$fileName,date("Y-m-d H:i:s"));
				// $stmt = sqlsrv_query( $conn, $sql, $params);

				$EMAP1=$emapData[1];
				$PersonCode='0'.$emapData[2];
				$EMAP3=$emapData[3];
				$EMAP4=$emapData[4];
				$EMAP5=$emapData[5];
				$EMAP6=$emapData[6];
				$EMAP7=$emapData[7];
				if($EMAP7 >= 1 && $EMAP7 <= 9){$EMAP07 = '0'.$EMAP7;}else{$EMAP07 = $EMAP7;}
				$EMAP8=$emapData[8];
				if($EMAP8 >= 1 && $EMAP8 <= 9){$EMAP08 = '0'.$EMAP8;}else{$EMAP08 = $EMAP8;}
				$EMAP9=$emapData[9];
				$DATESTART=$EMAP9.'-'.$EMAP08.'-'.$EMAP07;
				$EMAP10=$emapData[10];
				if($EMAP10 >= 1 && $EMAP10 <= 9){$EMAP010 = '0'.$EMAP10;}else{$EMAP010 = $EMAP10;}
				$EMAP11=$emapData[11];
				if($EMAP11 >= 1 && $EMAP11 <= 9){$EMAP011 = '0'.$EMAP11;}else{$EMAP011 = $EMAP11;}
				$EMAP12=$emapData[12];
				$DATEEND=$EMAP12.'-'.$EMAP011.'-'.$EMAP010;
				$TOTALDAYS=$emapData[13];
				$EMAP14=$emapData[14];
				$TIMESTART=$EMAP14.':00';
				$EMAP15=$emapData[15];
				$TIMEEND=$EMAP15.':00';
				$HOURxDAYS=$emapData[16];
				$EMAP17=$emapData[17];
				$COURSE_NAMETH=$emapData[18];
				$EMAP19=$emapData[19];
				$COURSESUB_NAMETH=$emapData[20];
				$COURSE_PRICE_PER_PERSON=$emapData[21];
				$SCORE_EXAM_BEFORE=$emapData[22];
				$SCORE_EXAM_AFTER=$emapData[23];
				$TRAININGPASS=$emapData[24];
				$TRAININGNOPASS=$emapData[25];
				$TEACHER=$emapData[26];
				$REMARK=$emapData[27];
				
				$sql1 = "INSERT into HISTORY_TRAINING (
					PersonCode, 
					COURSE_DATESTART, 
					COURSE_DATEEND, 
					TOTALDAYS,
					TIMESTART, 
					TIMEEND, 
					HOURxDAYS,
					COURSE_NAMETH,
					COURSESUB_NAMETH,
					COURSE_PRICE_PER_PERSON,
					SCORE_EXAM_BEFORE,
					SCORE_EXAM_AFTER,
					TRAININGPASS,
					TRAININGNOPASS,
					TEACHER,
					REMARK) 
					values(
					'$PersonCode',
					'$DATESTART',
					'$DATEEND',
					'$TOTALDAYS',
					'$TIMESTART',
					'$TIMEEND',
					'$HOURxDAYS',
					'$COURSE_NAMETH',
					'$COURSESUB_NAMETH',
					'$COURSE_PRICE_PER_PERSON',
					'$SCORE_EXAM_BEFORE',
					'$SCORE_EXAM_AFTER',
					'$TRAININGPASS',
					'$TRAININGNOPASS',
					'$TEACHER',
					'$REMARK')";					
				$result1 = sqlsrv_query( $conn, $sql1 );
				if(! $result1 )
				{
					echo "<script type=\"text/javascript\">
					alert(\"Invalid File:Please Upload CSV File.\");
					window.location = \"index.php\"
					</script>";
				}
	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
			echo "<script type=\"text/javascript\">
			alert(\"CSV File has been successfully Imported.\");
			window.location = \"index.php\"
			</script>";
	        
			//close of connection
			sqlsrv_close($conn); 
							
		 }
	}	 
?>		 