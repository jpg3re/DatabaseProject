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
         $result=mysqli_query($con,$sql);
         if(mysqli_num_rows($result)>0){
            $row= $result->fetch_row();
            $uid=$row[0];
            $sql="SELECT gid FROM participates WHERE uid='$uid' ";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
                $row= $result->fetch_row();
                $gid=$row[0];
                $sql="SELECT sid FROM queue WHERE gid='$gid' ORDER BY position ASC ";
                $result=mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0){
                    $filename='queue.csv';
                    $csv_data='';
                    $fields=array('Position in Queue', 'Song', 'Artist', 'Mood');
                    for ($i = 0; $i < 4; $i++) {
                       $csv_data.= $fields[$i].',';
                    }
                    $csv_data.='
    		    ';
                    $position=0;
                    while ($row=$result->fetch_row()) {
                        $position++;
                        $songid=$row[0];
                        $sql2="SELECT * FROM song WHERE sid ='$songid' ";
                        $result2=mysqli_query($con,$sql2);
                        $row2=$result2->fetch_row();
                        $data=array($position, $row2[1], $row2[2], $row2[3]);
                        for ($i = 0; $i < 4; $i++) {
                           $data_remove_end=rtrim($data[$i], ',');
                           $curr_data=str_replace(',',' and',$data_remove_end);
                           $csv_data.=$curr_data.',';
                        }
		        $csv_data.='
                        ';
                    }
                    header('Content-Encoding: UTF-8');
                    header('Content-type: text/csv; charset=UTF-8');
                    header("Content-Disposition: attachment; filename=".$filename."");
                    echo($csv_data);
                }
            }
        }
     }
     mysqli_close($con);
?>
