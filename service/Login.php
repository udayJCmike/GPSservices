<?php




require("../config.php");

$case = $_REQUEST['service'];

switch($case){

    case 'login':{

		$username=$_POST['username'];
        $password=$_POST['password'];
		$enabled=1;
       // $username="cpsn";
       // $password="cpsn";
        $error="error";
        $sql = "select * from tbl_user where binary username ='".$username."' AND binary password = '".$password."' AND enabled = '".$enabled."' and role!='ROLE_SUPERADMIN'";

       

       // echo $sql1;
        $record=mysql_query($sql);
        if(mysql_num_rows($record) > 0)
        {
            $row1		= mysql_fetch_object($record);
            $json 		= '{ "serviceresponse" : { "servicename" : "Login Details", "success" : "Yes", "message" : "1", "username" : "'.$row1->username.'", "password" : "'.$row1->password.'", "role" : "'.$row1->role.'", "enabled" : "'.$row1->enabled.'", "firstname" : "'.$row1->firstname.'", "lastname" : "'.$row1->lastname.'","org_id" :"'.$row1->org_id.'" } }';
        }
        else
        {
            $json		= '{ "serviceresponse" : { "servicename" : "Login Details", "success" : "No", "userid" : "NULL",  "message" : "'.$error.'" } }';
        }



        echo $json;
        break;
    }

  



}

exit;


?>