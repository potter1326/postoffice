<?php  
header('content-type: text/html; charset: utf-8');//ÃÍ§ÃÑºÀÒÉÒä·Â
$year_pc=date('Y')-1;
$datepick_pc="$year_pc-10-01";
if(!empty($_GET["term"])){//¤èÒ·ÕèÊè§ÁÒäÁèÇèÒ§
  $dbhost="10.100.5.32";
$dbuser="dupost";
$dbpass="BorbCrt.722";
$dbname="ddpost";
$connect=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$charset = "SET NAMES'utf8'";
mysqli_query($connect,$charset) or die('Invalid query: ' . mysqli_connect_error());

    $param = $_GET["term"];  //ÃÑºParam·ÕèÊè§ÁÒ ª×èÍ term
    $year_pc=date('Y')+543;
    $sql="select * from `ddpost`.`parcel` WHERE forsearch_pc LIKE '%$param%' AND datepick_pc >= '$datepick_pc' ORDER BY datepick_pc DESC";
    $query = mysqli_query($connect,$sql);  //¤é¹ËÒ¢éÍÁÙÅ¾¹Ñ¡§Ò¹ã¹à·àºÔÅ employee
    for ($x = 0, $numrows = mysqli_num_rows($query); $x < $numrows; $x++) {  
        $row = mysqli_fetch_assoc($query);  
        $employee[$x] = array("datepick_pc"=>$row['datepick_pc'],"label" => $row["forsearch_pc"],"value"=>$row['forsearch_pc'],"barcode_pc" => $row["barcode_pc"],"id_pc" => $row["id_pc"]);          
    }  
    $response = json_encode($employee) ;  //á»Å§¢éÍÁÙÅã¹ $employee «Öè§à»ç¹µÑÇá»Ãáºº Array ãËééà»ç¹ JSON
    echo $response;  //echo ¢éÍÁÙÅÍÍ¡ÁÒ à¾×èÍãËéË¹éÒ request ÊÒÁÒÃ¶´Ö§¢éÍÁÙÅä»ãªéä´é
    mysqli_close($connect);  //»Ô´¡ÒÃàª×èÍÁµèÍ¡Ñº°Ò¹¢éÍÁÙÅ
}
?> 