<?php
	require_once dirname(__FILE__).'/db/db_mysql.php';
	require_once dirname(__FILE__).'/menu.config';

	function genMenuTableName()
	{
		$date_this_Monday = date("Y_m_d",(time()-((date("w")==0?7:date("w"))-1)*24*3600));
		return $tableName = "t_menu_".$date_this_Monday;
	}

	function createMenu()
	{
		$db = new db_mysql();

		$tableName = genMenuTableName();

		$sql = "CREATE TABLE $tableName (
                  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
                  `name` varchar(100) NOT NULL,
                  `Monday` varchar(100) NOT NULL,
                  `Tuesday` varchar(100) NOT NULL,
                  `Wednesday` varchar(100) NOT NULL,
                  `Thursday` varchar(100) NOT NULL,
                  `Friday` varchar(100) NOT NULL,
                  `Saturday` varchar(100) NOT NULL,
                  `Sunday` varchar(100) NOT NULL,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `name` (`name`) USING BTREE
        ) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;";

		$result = $db->db_query_select($sql);
		var_dump($result);
		$sql = "insert into $tableName (name) select name from t_account";
		$result = $db->db_query_select($sql);
		//var_dump($result);

	}

	function checkDateForm($date)
	{	
		if ("Monday" 	!== $date && 
			"Tuesday"	!== $date && 
			"Wednesday" !== $date && 
			"Thursday" 	!== $date && 
			"Friday" 	!== $date &&
			"Saturday" 	!== $date && 
			"Sunday" 	!== $date ) 
		{
			return -1;
		}

		return 0;
	}

	function order($name, $date, $dish)
	{
		$tableName = genMenuTableName();

		if (-1 === checkDateForm($date)) {
			return -1;
		}

		$sql = "update $tableName set $date = \"$dish\" where name = \"$name\";";
		//echo $sql;
		$db = new db_mysql();

		$result = $db->db_query_select($sql);
		//if (isset($result)) {
		//var_dump($result);
		//}
	}

	function printOrder ($name = "")
	{

		$tableName = genMenuTableName();

		if (empty($name)) {
			$sql = "select * from $tableName;";
		}/*
		else if (empty($name) && !empty($date) ) {
			$sql = "select name,$date from $tableName;";
		}*/
		else if (!empty($name)) {
			$sql = "select * from $tableName where name = \"$name\";";
		}

		//echo $sql;
		$db = new db_mysql();

		$result = $db->db_query_select($sql);

		$msgList = array();
		if (isset($result) && $result->num_rows > 0) {
			while ( $row = $result->fetch_assoc() ) {
				$msgList[] = $row;
			}
		}

        echo "Menu:$tableName";
	//	var_dump($msgList);
        $once = true;
		foreach ($msgList as $key => $value) {
			$arr = $value;
			echo "<table border=\"1\">";

			$title = "<tr>";
			$menu  = "<tr>";

			foreach ($arr as $arrkey => $arrvalue) {
				$title = $title."<th>".$arrkey."</th>";
				$menu  = $menu."<td>".$arrvalue."</td>";
			}
            if(true === $once)
            {
			    echo $title."</tr>";
                $once = false;
            }
			echo $menu."</tr>";
			echo "</table>";
		}
		//var_dump($msgList);
	}
	//var_dump($_SESSION['user']);
//  crontab -e setting:every Monday build a table and load the accounts
//	00 * * * */1 /usr/bin/php /root/diancan/menu.php
	//printOrder();
	//order("champon", "Friday", "麻婆豆腐")
	//createMenu();
?>

