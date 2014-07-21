<?php

session_start();
require("../config.php");
$case = $_REQUEST['service'];
switch($case)
{



    case 'insert':
    {
      //  $contact_id=$_POST['contactid'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
        $organisation=$_POST['organisation'];
        $mobile=$_POST['mobile'];
        $address1=$_POST['address1'];
       // $address2=$_POST['address2'];
        $city=$_POST['city'];
        $state=$_POST['state'];

        //$address=str_replace(array("\r\n","\n","\t","\r"),'',$_POST['address']);

        /*  $id='';
          $name='immu';
          $age='12';
          $sex='M';
          $address='street';*/

//        $username='silvi';
//        $nameofins="silvi";
//        $nameofattorney="12/12/2014";
//        $address1="1";
//        $address2="2";
//        $regarding="2";
//        $patientname="3";
//        $dateofaccident="4";
//        $todaysdate="5";
//        $letter="1";
//        $letter1="40";



        $sql3="INSERT INTO tbl_contact_us(contact_id,firstname,lastname,email,organisation,mobile,address1,city,state)VALUES ('','".$firstname."','".$lastname."','".$email."','".$organisation."','".$mobile."','".$address1."','".$city."','".$state."')";

        if(mysql_query($sql3))
        {

            $json	= '{ "serviceresponse" : { "servicename" : "new Data", "success" : "Yes", "message" : "1" } }';

        }
        else
        {

            $json	= '{ "serviceresponse" : { "servicename" : "new Data", "success" : "No", "message" : "'.$error.'" } }';

        }

        echo $json;

        break;
    }





}
?>