<?php
    require_once dirname(__FILE__)."/menu.php";

	function registe()
	{
		$db = new db_mysql();

	   	var_dump($_POST);
	   	if (!isset($_POST['registe'])) {
	   		return "echo submit:".json_encode($_POST);
	   	}

	    $username	= $_POST['username'];
	    $info 		= $_POST['info'];

		if (empty($username) || empty($info)) {
	       	return "empty var:".json_encode($_POST); 
	    }

	    $bExistsName = bExistsName($username, $info);
	    if (TRUE == $bExistsName) {
	       	return "sanme name:".json_encode($_POST); 
	    }

	    $info = md5($info);
    	$query = "INSERT INTO t_account (name, pwd) VALUES ('$username', '$info')";
    	$result = $db->db_query_insert($query);	
    	if ($result === FALSE) {
    		return "insert error<br>";
    	}
        $db->db_cleanQuery(); 
        $tableName = genMenuTableName(); 
        
        $sql = "insert into $tableName (name) values (\"$username\")";
        $result = $db->db_query_select($sql);
    	if ($result === FALSE) {
    		return "insert error $result<br>";
        }
    	header("Location: http://192.168.1.42/test2.php?username=$username");
    	exit;
	}

	function bExistsName( $name, $info )
	{
		$db = new db_mysql();
		//echo $name." ".$info."<br>";
		$result = $db->db_query_select("select count(*) from t_account where name = \"".$name."\" and pwd = \"".$info."\";");

		//var_dump($result);
		if (isset($result) && $result->num_rows > 0) {
			$rows = $result->fetch_row();
			//var_dump($rows);
			if (intval($rows[0]) > 0) {
				return TRUE;	
			}
		}
		return FALSE;
	}

	function login()
	{
		$db = new db_mysql();

	   	//var_dump($_POST);
	   	//echo "<br>";
	   	if (!isset($_POST['login'])) {
	   		return "error param submit:".json_encode($_POST);
	   	}

	    $username	= $_POST['username'];
	    $info 		= $_POST['info'];

		if (empty($username) || empty($info)) {
	       	return "empty var:".json_encode($_POST); 
	    }

	    $info = md5($info);
	    $kk = bExistsName($username, $info);
	    //echo "dddd||".$kk."||";

	    if (TRUE == $kk) {
	       	header("Location: http://192.168.1.42/test2.php?username=$username");
	       	return "<br>login:".json_encode($_POST);
	       	exit;
	    }

	    return -1;
	}

?>
