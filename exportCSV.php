<?php
     require_once('library.php');
     $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
     if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
mysqli_connect_error());
           return null;
     }
     session_start();
     if(isset($_SESSION["username"])){
         $username=$_SESSION["username"];
         $sql="SELECT uid FROM user WHERE username='$username'";
         $result = mysqli_query($con,$sql);
         if(mysqli_num_rows($result)>0){
            echo "first table worked";
            $row= $result->fetch_row();
            $uid=$row[0];
            $sql="SELECT gid FROM participates WHERE uid='$uid' ";
            $result = mysqli_query($con,$ql);
            if(mysqli_num_rows($result)>0){
                $row= $result->fetch_row();
                $gid=$row[0];
                $sql="SELECT sid FROM queue WHERE gid='$gid' ORDER BY position ASC ";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0){
                    echo "next table worked";
                    $delimiter = ",";
                    $filename = 'queue.csv';
                    $f = fopen($filename, 'w');
                //$csv_data = '';
                    $fields = array('#', 'Song', 'Artist', 'Mood');
                //for ($i = 0; $i < 4; $i++) {
                //    $csv_data.= $fields[$i].',';
                //}
                //$csv_data.= '
    		//';
                    fputcsv($f, $fields, $delimiter);
                    echo "about to write!";
                    while ($row = $result->fetch_row()) {
                        $songid=$row[0];
                        $sql2 = "SELECT * FROM song WHERE sid ='$songid' ";
                        $result2=mysqli_query($con,$sql2);
                        $row2=$result2->fetch_row();
                        $data = array($row2[0], $row2[1], $row2[2], $row2[3]);
                        fputcsv($f, $data, $delimiter);
                    //for ($i = 0; $i < 4; $i++) {
                    //    $csv_data.= $data[$i].',';
                    //}
		    //$csv_data.= '
                    //';
                    }
                #fseek($f, 0);
                #fclose($f);
                #header('Content-Description: File Transfer');
                #header('Content-Type: application/csv; ');
                #header('Content-Disposition: attachment; filename='.$filename);
                #fpassthru($f);
                #readfile($filename);
                #header('Content-Encoding: UTF-8');
                #header('Content-type: text/csv; charset=UTF-8');
                #header("Content-Disposition: attachment; filename=".$filename."");
                #echo "\xEF\xBB\xBF";
                #echo($csv_data);
                    fclose($f);
                    header("Content-Description: File Transfer");
                    header("Content-Disposition: attachment; filename=".$filename);
                    header("Content-Type: application/csv; "); 
                    readfile($filename);
                    unlink($filename);
                    exit();
                }
            }
        }
     }
     echo "successfully downloaded";
     //header('Location: myList.php');
     mysqli_close($con);
?>
