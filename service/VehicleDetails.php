<?php




require("../config.php");

$case = $_REQUEST['service'];

switch($case){


    case 'vehicledetails1':
    {
        $org_id=$_POST['org_id'];
       // $org_id="102";
        $sql = "select * from tbl_vechicle where org_id ='".$org_id."'";

        $flag=0;
        if($query11 = mysql_query($sql))
        {
            $flag =1;

            if($flag == '1')
            {

                $json = '{ "serviceresponse" : { "servicename" : "Vehicle Info", "success" : "Yes", "Vehicle List" : [ ';
                for($i=0;$i<mysql_num_rows($query11);$i++)
                {
                    $row1 =mysql_fetch_object($query11);


                    $json 		.= '{ "serviceresponse" : { "servicename" : "Vehicle Details", "success" : "Yes", "message" : "1", "org_id1" : "'.$row1->org_id.'", "vechicle_reg_no" : "'.$row1->vechicle_reg_no.'", "device_imei_number" : "'.$row1->device_imei_number.'", "driver_name" : "'.$row1->driver_name.'", "driver_licence_number" : "'.$row1->driver_licence_number.'", "driver_licence_exp_date" : "'.$row1->driver_licence_exp_date.'","route_no" :"'.$row1->route_no.'","device_status" :"'.$row1->device_status.'" } },';

                }
                $json = rtrim($json,',');
                $json .= '], "message" : "1" } }';
            }
        }
        if($flag == '0')
        {
            $json 		= '{ "serviceresponse" : { "servicename" : "Vehicle Info", "success" : "No", "message" : "'.$error.'" } }';
        }

        echo $json;

        break;
    }




}

exit;


?>