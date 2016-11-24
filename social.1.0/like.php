<?php
include('config.php');
$cokie=$_COOKIE['iunv_sessid'];
$uid=$_COOKIE['iunv_id'];
$rex=1;
$sql = mysql_query("SELECT * FROM active WHERE id='$uid'");
while($auth= mysql_fetch_array($sql)){
$rex=$auth['cookie'];
}
if(!$rex==$cokie){
Header('Location: log-in');
exit();
}
else{
$id = $_POST["id"];
$name=$_COOKIE['iunv_name'];
    $q1 = mysql_query("SELECT * FROM streams WHERE id='$id'");
    $r1 = mysql_fetch_assoc($q1);
    $id = $r1["id"];
    if($id)
    {
     $q2 = mysql_query("SELECT * FROM likes WHERE sid='$id' AND uid='$uid'");
      $r2 = mysql_fetch_assoc($q2); 
     if($r2){
            if(mysql_num_rows($q2)>0){
                mysql_query("DELETE FROM likes WHERE sid='$id' AND uid='$uid'"); 
$juxt=$name.' likes your post!';
$time=time();
 mysql_query("DELETE FROM notifs WHERE sid='$id' AND notif='$juxt'"); 
            }
        } else {
            mysql_query("INSERT INTO likes VALUES('','$id','$uid')"); 
 

$juxt=$name.' likes your post!';
$time=time();
$sql3="INSERT INTO notifs(sid, uid, time, notif)
VALUES
('$id', '$uid','$time', '$juxt')";

if (!mysql_query($sql3,$con))
  {
  echo('Error:!'.mysql_error());
  }


        }
        
        $q3 = mysql_query("SELECT * FROM likes WHERE sid='$id' ");
        $likes = mysql_num_rows($q3);

        $l = 'icon/like.png';

        $q4 = mysql_query("SELECT * FROM likes WHERE sid='$id' AND uid='$uid'");
        $r4 = mysql_fetch_assoc($q4); 
        $count=mysql_num_rows($q4);
        if($count>0){
            $l = 'icon/liked.png';
        }

        $m = '<img id="like" onClick="rate($(this).attr(\'id\'))" src="'.$l.'"> '.$likes.' &nbsp;&nbsp'; 
        echo $m;
    }
    else
    {
    echo "Invalid ID";
    }
}

?>