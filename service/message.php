<?php
session_start();
require("../config.php");
$case = $_REQUEST['service'];

switch($case)
{


   /* case 'routeno':
    {

        $org_id = $_POST['org_id'];
        $vechicle_reg_no = $_POST['vehicleregno'];


//        $org_id = 101;
//        $vechicle_reg_no = 'KA04MH2391';

//      $user_name="silvi";
        $flag=0;
        $sql3 ="SELECT route_no FROM tbl_vechicle WHERE org_id='".$org_id."' and vechicle_reg_no='".$vechicle_reg_no."'" ;
      // echo $sql3;
        $queryresult=mysql_query($sql3);
        $count2 = mysql_num_rows($queryresult);
        if ($count2>0)
        {
            $rowdetails=mysql_fetch_object($queryresult);
            $json	= '{ "serviceresponse" : { "servicename" : "Route Number Data", "route_no" : "'.$rowdetails->route_no.'", "success" : "Yes", "message" : "1" } }';

        }
        else
        {

            $json	= '{ "serviceresponse" : { "servicename" : "Route Number Data", "success" : "No", "message" : "1" } }';
        }
        echo $json;
        break;
    }*/

    case 'select':
    {

//        $org_id = $_POST['org_id'];
//        $route_no = $_POST['routeno'];
        $route_no = 'R2';
//        echo $org_id;
//        echo $route_no;
      $org_id = 101;


//      $user_name="silvi";
        $flag=0;
        $sql1 ="SELECT parent_mobile1 FROM tbl_student WHERE org_id='$org_id' and pickup_route_no='$route_no'" ;
    // echo $sql1;

        if($query1 = mysql_query($sql1))
        {
            $flag =1;

            if($flag == '1')
            {

                $json = '{ "serviceresponse" : { "servicename" : "Mobile Numbers", "success" : "Yes", "mobilenumber" : [ ';

                for($i=0;$i<mysql_num_rows($query1);$i++)
                {


                    $row		= mysql_fetch_object($query1);

                    $json 		.= '{ "serviceresponse" : { "servicename" : "Mobile Numbers", "success" : "Yes", "parent_mobile1" : "'.$row->parent_mobile1.'", "message" : "1" } },';

//                    $json 		.= '{ "serviceresponse" : { "servicename" : "student data", "success" : "Yes", "org_id" : "'.$row->org_id.'", "student_roll_no" : "'.$student_roll_no.'", "first_name" : "'.$row->first_name.'", "last_name" : "'.$row->last_name.'", "gender" : "'.$row->gender.'", "transport_facility" : "'.$row->transport_facility.'", "pickup_route_no" : "'.$row->pickup_route_no.'", "pickup_point_address" : "'.$row->pickup_point_address.'", "pickup_stop_id" : "'.$row->pickup_stop_id.'", "drop_route_no" : "'.$row->drop_route_no.'", "drop_point_address" : "'.$row->drop_point_address.'", "drop_stop_id" : "'.$row->drop_stop_id.'", "kg_drop" : "'.$row->kg_drop.'", "parent_name1" : "'.$row->parent_name1.'", "parent_name2" : "'.$row->parent_name2.'", "parent_mobile1" : "'.$row->parent_mobile1.'", "parent_mobile2" : "'.$row->parent_mobile2.'", "parent_email1" : "'.$row->parent_email1.'", "parent_email2" : "'.$row->parent_email2.'", "class_standard" : "'.$row->class_standard.'", "section" : "'.$row->section.'", "create_timestamp" : "'.$row->create_timestamp.'", "create_userid" : "'.$row->create_userid.'", "create_user_system_name" : "'.$row->create_user_system_name.'", "message" : "1" } }';

                }
                $json = rtrim($json,',');
                $json .= '], "message" : "1" } }';
            }
        }
        if($flag == '0')
        {
            $json 		= '{ "serviceresponse" : { "servicename" : "Mobile Numbers", "success" : "No", "message" : "'.$error.'" } }';
        }

        echo $json;

        break;
    }

}

  ?>