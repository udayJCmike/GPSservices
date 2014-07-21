<?php




require("../config.php");

$case = $_REQUEST['service'];

switch($case){



    case 'livetrack':{

       // $org_id="106";
       // $veg_reg_no="Tn76E23";
        $org_id=$_POST['org_id'];
        $veg_reg_no=$_POST['vechicle_reg_no'];
        $date = date('Y-m-d H:i');
                      //  echo($date);
        $error="error";
       // $date="2014-07-18 05:27";

        $sql="SELECT * FROM tbl_vechicle_tracking_history1 WHERE org_id='".$org_id."' and vechicle_reg_no='".$veg_reg_no."' and bus_tracking_timestamp like '".$date."%' order by bus_tracking_timestamp asc";

      //  echo($sql);
        $flag=0;
        if($query11 = mysql_query($sql))
        {
            $flag =1;

            if($flag == '1')
            {

                $json = '{ "serviceresponse" : { "servicename" : "Vehicle History", "success" : "Yes", "VehicleHistory List" : [ ';
                for($i=0;$i<mysql_num_rows($query11);$i++)
                {
                    $row1 =mysql_fetch_object($query11);


                    $json 		.= '{ "serviceresponse" : { "servicename" : "Vehicle History", "success" : "Yes", "message" : "1", "org_id1" : "'.$row1->org_id.'", "vechicle_reg_no" : "'.$row1->vechicle_reg_no.'", "latitude" : "'.$row1->latitude.'", "longitude" : "'.$row1->longitude.'", "speed" : "'.$row1->speed.'", "exceed_speed_limit" : "'.$row1->exceed_speed_limit.'","bus_tracking_timestamp" :"'.$row1->bus_tracking_timestamp.'","address" :"'.$row1->address.'","flag" :"'.$row1->flag.'" } },';

                }
                $json = rtrim($json,',');
                $json .= '], "message" : "1" } }';
            }
        }
        if($flag == '0')
        {
            $json 		= '{ "serviceresponse" : { "servicename" : "Vehicle History", "success" : "No", "message" : "'.$error.'" } }';
        }

        echo $json;

        break;
    }


}

exit;


?>