<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_localSql = "localhost";
$database_localSql = "senators";
$username_localSql = "root";
$password_localSql = "1080pFlatscreen";
$localSql = mysql_pconnect($hostname_localSql, $username_localSql, $password_localSql) or trigger_error(mysql_error(),E_USER_ERROR); 
?>