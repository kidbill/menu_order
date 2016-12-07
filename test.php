<?php
	require_once dirname(__FILE__).'/db/db_mysql.php';
	require_once dirname(__FILE__).'/account.php';

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="username">你的名字:</label>
	<input type="text" id="username" name="username" /><br/>
    <label for="info">密码:</label>
    <input type="text" id="info" name="info" /><br/>
    <input type="submit" value="registe" name="registe"/><br/>
    <input type="submit" value="login" name="login"/>
</form>

<?php

	if (isset($_POST['registe'])) {
		echo registe();
	}
	else if (isset($_POST['login'])) {
		echo login();
	}

?>
