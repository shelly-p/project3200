<?php
require_once "header.php";

if (!$loggedin) {
    die("<h2>You must be signed in to view this page.</h2></body></html>");
}

$result1 = queryMysql("SELECT role FROM users WHERE email='$email'");
$row = $result1->fetch_assoc();
$currentRole = $row['role'];
if ($currentRole == "Teacher")
{
  header("Location: dashboard-teacher.php?email='$email'");
}
$error = $acode ="";

if (isset($_POST['accesscode']))
{
  $acode = sanitizeString($_POST['accesscode']);
  
  if ($acode == "")
    $error = "Not all fields were entered<br><br>";
  else
  {
    $result = queryMysql("SELECT * FROM problems_table where accesscode='$acode'");

    if ($result->num_rows)
    {
        header("Location: student-input.php?accesscode=$acode");
    }
        
}
} 
?> 
<script>
function checkUser(acode) {
if (acode.value == '') {
O('info').innerHTML = ''
return
}
params = "accesscode=" + acode.value
request = new ajaxRequest()
request.open("POST", "checkuser.php", true)
request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
request.setRequestHeader("Content-length", params.length)
request.setRequestHeader("Connection", "close")
request.onreadystatechange = function() {
if (this.readyState == 4)
  if (this.status == 200)
    if (this.responseText != null) O('info').innerHTML = this.responseText
}
request.send(params)
}

function ajaxRequest() {
try {
var request = new XMLHttpRequest()
} catch (e1) {
try {
  request = new ActiveXObject("Msxml2.XMLHTTP")
} catch (e2) {
  try {
    request = new ActiveXObject("Microsoft.XMLHTTP")
  } catch (e3) {
    request = false
  }
}
}
return request
}
</script>



<!--Student Dashboard-->
    <!--Enter Access Code-->
    <style>
.h1 {
  font-family: Arial, Helvetica, sans-serif;
  text-align: center;
}
.p1 {
  font-family: Arial, Helvetica, sans-serif;
  letter-spacing: 7px;
}
.center {
  position: relative;
  top: 40px;
  border-radius: 10px;
  text-align: center;
  margin: auto;
  width: 30%;
  border: 3px solid black;
  padding: 15px;
  box-shadow: 7px 7px;
}
input[type=text], select {
  text-align: center;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 2px solid rgb(172, 172, 172);
  border-radius: 4px;
  box-sizing: border-box;
  letter-spacing: 6px;
}
input[type=submit] {
  width: 100%;
  background-color: rgb(0, 163, 255);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: rgb(0, 109, 185);
}
</style>
<div class="container">
  
    <div class="px-4 py-5 my-5 text-center">
      <h1>STUDENT DASHBOARD</h1>
      <h4>Enter access code</h4>
      <div class="center">
        <div style="font-size:200%;" class="p1">
          <form method="post" action="dashboard.php">
            <input value="<?php $acode;?>" maxlength="6" type="text" id="acode" name="accesscode" style="font-size:100%;" placeholder="Access Code">
            <input type="submit" style="font-size:100%;" value="Enter">
          </form>
        </div>
      </div>
</div>
</div>
  </body>
</html>