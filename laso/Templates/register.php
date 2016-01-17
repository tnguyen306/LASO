<?php require_once('Connections/localSql.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO users (Fname, Lname, Email, Password) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['fname'], "text"),
                       GetSQLValueString($_POST['lname'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['pass'], "text"));

  mysql_select_db($database_localSql, $localSql);
  $Result1 = mysql_query($insertSQL, $localSql) or die(mysql_error());
}

mysql_select_db($database_localSql, $localSql);
$query_registerationInfo = "SELECT * FROM users";
$registerationInfo = mysql_query($query_registerationInfo, $localSql) or die(mysql_error());
$row_registerationInfo = mysql_fetch_assoc($registerationInfo);
$totalRows_registerationInfo = mysql_num_rows($registerationInfo);
?>

<html lang="en" class="style-1">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Bootstrap core CSS
    ================================================== -->
    <link href="uikit/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template
    ================================================== -->
    <link href="uikit/css/uikit.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="uikit/js/html5shiv.js"></script>
    <script src="uikit/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="page-bg overlay-dark white">
    <!-- Empty Block (use .abs-filler to fill page)
    ================================================== -->
    <div class="empty-block">
      <!-- Vcenter -->
      <div class="vcenter">
        <div class="vcenter-this">
          <!-- Container -->
          <div class="container">
            <!-- Form Panel -->
            <div class="form-panel width-40pc width-100pc-xs hcenter">
              <header>Sign up</header>
              <fieldset>
              <form method="POST" action="<?php echo $editFormAction; ?>" name="form">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input name = "fname" type="text" class="form-control" placeholder="First Name">
                  </div>
                </div>
                  <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input name = "lname" type="text" class="form-control" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input name = "email" type="email" class="form-control" placeholder="Email Address">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                    <input name = "pass" type="password" class="form-control" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                    <input name = "cpass" type="password" class="form-control" placeholder="Confirm Password">
                  </div>
                </div>
                <div class="form-group" style="color:#000000">
                  <label class="checkbox-inline"><input name = "confirm" type="checkbox" value="">I agree to the<a class="href"> Terms of Use</a></label>
                </div>
                <button class="btn btn-primary btn-lg btn-block">sign up</button>
                <input type="hidden" name="MM_insert" value="form">
              </form>
              </fieldset>
            </div>
            <!-- /Form Panel -->
            <div class="align-center">Already have an Account? <a href="login.html">Sign In</a></div>
          </div>
          <!-- /Container -->
        </div>
        <!-- /Vcenter this -->
      </div>
      <!-- /Vcenter -->
    </div>
    <!-- /Empty Block
    ================================================== -->
    
    <!-- Javascript
    ================================================== -->
    <script src="uikit/js/jquery-latest.min.js"></script>
    <script src="uikit/bootstrap/js/bootstrap.min.js"></script>
    <script src="uikit/js/uikit.min.js"></script>
    <!-- /JavaScript
    ================================================== -->
  </body>
</html>
<?php
mysql_free_result($registerationInfo);
?>
