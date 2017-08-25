<!DOCTYPE html>
<html>
<head>
<title>Cancer Curation Viewer</title>
<link href="<?php echo CSS_PATH; ?>/login.css" rel="stylesheet" type="text/css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
<div id="main">
<h1>Cancer Curation Viewer</h1>
<div id="login">
<h2>Login Form</h2>
<form action="home/gethome" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" value="marc.fink@mssm.edu" type="text">
<label>Password :</label>

<input id="password" name="password" placeholder="**********" type="password">
<label>Role :</label>
<select>
<option>director</option>
<option>admin
</select>
<br clear="both">
<input name="submit" type="submit" onclick="login();return false;" value=" Login ">
<script>
function login(){
window.location.href="CancerVarViewer.php";

}

</script>




</form>
</div>
</div>
</body>
</html>