<?php
	require_once dirname(__FILE__)."/menu.php";
	//require_once dirname(__FILE__).'/menu.config';

	$username = "";
	if (isset($_REQUEST['username'])) {
		$username = $_REQUEST['username'];
	}
	echo "user:".$username."<br>";
?>

<?php
	//handle html post request
	//var_dump($_REQUEST);
	echo "<br>";
	if (!isset($_REQUEST['username']) &&
		!isset($_REQUEST['order']) &&
		!isset($_REQUEST['date']) &&
		!isset($_REQUEST['print']) &&
		!isset($_REQUEST['mine']) &&
		!isset($_REQUEST['all']) &&
		!isset($_REQUEST['dish'])) {
		//echo -1;
	}

	if (isset($_REQUEST['username'])) {
		$username 	= $_REQUEST['username'];

		if (isset($_REQUEST['order'])) {

			$order 	= $_REQUEST['order'];

			if (isset($_REQUEST['dish'])) {
				$dish 	= $_REQUEST['dish'];
			}
			if (isset($_REQUEST['date'])) {
				$date 	= $_REQUEST['date'];
			}
			
			if ($order == 1) {
				order($username, $date, $dish);
			}
		}

		if (isset($_REQUEST['print'])) {

			$print 	= $_REQUEST['print'];

			if ($print == 1) {

				if (isset($_REQUEST['all'])) {
					$all 	= $_REQUEST['all'];
					if ($all == "all")
					{
						printOrder();
					}
				}
			}
		}

	    if(!empty($username))
        {
            printOrder($username);
        }
	}
?>

<br>
<br>
<form name="input" action="test2.php?print=1" method="post">
Print Order:
<input type="text" value="<?php echo $username?>" name="username"/>
<!--input type="submit" value="mine" name="mine"/-->
<input type="submit" value="all" name="all"/>
</form>

<object height="50" width="300" data="光良 - 双子星.mp3"></object>
<br>
<br>
<!--embed src="光良 - 双子星.mp3" autostart="true" loop="true" hidden="true"-->

<form name="input" action="test2.php?order=1" method="post">
Monday:
<br>
	<?php
		$dishes = $menu["Monday"];
		foreach ($dishes as $key => $value) {
		echo '<input type="radio" name="dish" value="'.$value.'">'.$value.'<br>';
		}
	?>
<input type="text" value="Monday" name="date"/><br/>
<input type="text" value="<?php echo $username?>" name="username"/><br/>
<input type="submit" value="Submit">
</form>
<!--HR style="border:3 double #987cb9" width="80%" color=#987cb9 SIZE=3-->
<HR style="FILTER: alpha(opacity=100,finishopacity=0,style=2)" width="98%" color=#987cb9 SIZE=10>


<form name="input" action="test2.php?order=1" method="post">
Tuesday: <!--input type="text" name="user"--><br>
	<?php
		$dishes = $menu["Tuesday"];
		foreach ($dishes as $key => $value) {
		echo '<input type="radio" name="dish" value="'.$value.'">'.$value.'<br>';
		}
	?>
<input type="text" value="Tuesday" name="date"/><br/>
<input type="text" value="<?php echo $username?>" name="username"/><br/>
<input type="submit" value="Submit">
</form>
<!--HR style="border:3 double #987cb9" width="80%" color=#987cb9 SIZE=3-->
<HR style="FILTER: alpha(opacity=100,finishopacity=0,style=2)" width="98%" color=#987cb9 SIZE=10>

<form name="input" action="test2.php?order=1" method="post">
Wednesday: <!--input type="text" name="user"--><br>
	<?php
		$dishes = $menu["Wednesday"];
		foreach ($dishes as $key => $value) {
		echo '<input type="radio" name="dish" value="'.$value.'">'.$value.'<br>';
		}
	?>
<input type="text" value="Wednesday" name="date"/><br/>
<input type="text" value="<?php echo $username?>" name="username"/><br/>
<input type="submit" value="Submit">
</form>
<!--HR style="border:3 double #987cb9" width="80%" color=#987cb9 SIZE=3-->
<HR style="FILTER: alpha(opacity=100,finishopacity=0,style=2)" width="98%" color=#987cb9 SIZE=10>

<form name="input" action="test2.php?order=1" method="post">
Thursday: <!--input type="text" name="user"--><br>
	<?php
		$dishes = $menu["Thursday"];
		foreach ($dishes as $key => $value) {
		echo '<input type="radio" name="dish" value="'.$value.'">'.$value.'<br>';
		}
	?>
<input type="text" value="Thursday" name="date"/><br/>
<input type="text" value="<?php echo $username?>" name="username"/><br/>
<input type="submit" value="Submit">
</form>
<!--HR style="border:3 double #987cb9" width="80%" color=#987cb9 SIZE=3-->
<HR style="FILTER: alpha(opacity=100,finishopacity=0,style=2)" width="98%" color=#987cb9 SIZE=10>

<form name="input" action="test2.php?order=1" method="post">
Friday: <!--input type="text" name="user"--><br>
	<?php
		$dishes = $menu["Friday"];
		foreach ($dishes as $key => $value) {
		echo '<input type="radio" name="dish" value="'.$value.'">'.$value.'<br>';
		}
	?>
<input type="text" value="Friday" name="date"/><br/>
<input type="text" value="<?php echo $username?>" name="username"/><br/>
<input type="submit" value="Submit">
</form>
<!--HR style="border:3 double #987cb9" width="80%" color=#987cb9 SIZE=3-->
<HR style="FILTER: alpha(opacity=100,finishopacity=0,style=2)" width="98%" color=#987cb9 SIZE=10>

<form name="input" action="test2.php?order=1" method="post">
Saturday: <!--input type="text" name="user"--><br>
	<?php
		$dishes = $menu["Saturday"];
		foreach ($dishes as $key => $value) {
		echo '<input type="radio" name="dish" value="'.$value.'">'.$value.'<br>';
		}
	?>
<input type="text" value="Saturday" name="date"/><br/>
<input type="text" value="<?php echo $username?>" name="username"/><br/>
<input type="submit" value="Submit">
</form>
<!--HR style="border:3 double #987cb9" width="80%" color=#987cb9 SIZE=3-->
<HR style="FILTER: alpha(opacity=100,finishopacity=0,style=2)" width="98%" color=#987cb9 SIZE=10>

<form name="input" action="test2.php?order=1" method="post">
Sunday: <!--input type="text" name="user"--><br>
	<?php
		$dishes = $menu["Sunday"];
		foreach ($dishes as $key => $value) {
		echo '<input type="radio" name="dish" value="'.$value.'">'.$value.'<br>';
		}
	?>
<input type="text" value="Sunday" name="date"/><br/>
<input type="text" value="<?php echo $username?>" name="username"/><br/>
<input type="submit" value="Submit">
</form>
<!--HR style="border:3 double #987cb9" width="80%" color=#987cb9 SIZE=3-->
<HR style="FILTER: alpha(opacity=100,finishopacity=0,style=2)" width="98%" color=#987cb9 SIZE=10>
