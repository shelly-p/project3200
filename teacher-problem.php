<?php
require_once 'header.php';
if(isset($_GET['accesscode']))
{
  

$acode = sanitizeString($_GET['accesscode']);

$result = queryMysql("SELECT accesscode, title, problem, input, pout FROM problems_table WHERE accesscode='$acode'");
$stack = array();
while( $row = mysqli_fetch_assoc( $result) ) {
    array_push( $stack, $row );
}

$theArray = json_encode( $stack );
}
?>

<style>
.h1 {
  font-family: Arial, Helvetica, sans-serif;
  text-align: center;
  display: inline-block;
}
.p1 {
  font-family: Arial, Helvetica, sans-serif;
  letter-spacing: 7px;
}
.center {
  position: relative;
  top: 40px;
  border-radius: 10px;
  text-align: left;
  margin: auto;
  width: 70%;
  height: 500px;
  border: 3px solid black;
  padding: 15px;
  box-shadow: 7px 7px;
}
input[type=titletext], select {
  text-align: left;
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 2px solid rgb(172, 172, 172);
  border-radius: 4px;
  box-sizing: border-box;
  letter-spacing: 6px;
  
}
textarea {
  width: 100%;
  height: 365px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
input[type=text], select {
  text-align: top left;
  width: 100%;
  height: 365px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 2px solid rgb(172, 172, 172);
  border-radius: 4px;
  box-sizing: border-box;
  letter-spacing: 1px;
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
<!-- Page content -->
<div class="containter">
  <div class="px-4 py-5 my-5 text-center">
    <input type="titletext" id="tp-title" name="tp-title" style="font-size:170%;" value="" placeholder="Add Problem Name">
    <h1 style="font-size:150%;" class="h1">
      <button onclick="document.getElementById('code').innerHTML = Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000">
      Access Code: </button>
      <div id="code"></div>
    </h1>
    <div class="center">
      <p1 style="font-size:200%;" class="p1">
        <form>
          <textarea id="problem"> </textarea> <!-- text box -->
          <!--<input type="text" id="cproblem" name="codeproblem" style="font-size:50%;" placeholder="Type your problem here...">--> 
          <!-- forum box -->
          <input type="submit" style="font-size:100%;" value="Enter">
        </form>
      </p1>
    </div>
  </div>
</div>

<script>
	function getRndInteger() 
  {
		document.getElementById("code").innerHTML = Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000;
	}

//Script have to be under the html, otherwise error.  
var code = [];
var title = [];
var problem = [];
var input = [];
var exOut = [];
var dataArray = <?php echo $theArray ?> ;
console.log(dataArray);

//Get info from table and transform into array 
for (var i = 0; i < dataArray.length; i++) {
	var row_i = dataArray[i];
	console.log(row_i);
	code.push(row_i["accesscode"]);
	title.push(row_i["title"]);
	problem.push(row_i["problem"]);
	input.push(row_i["input"]);
	exOut.push(row_i["pout"]);
}

console.log(code);
console.log(problem);
console.log(input);
console.log(exOut);

document.getElementById("code").innerHTML = code[0];
document.getElementById("tp-title").value = title[0];
document.getElementById("problem").innerHTML = problem[0];
document.getElementById("pInp").innerHTML = input[0];
document.getElementById("pOut").innerHTML = exOut[0]; 
</script>

    
</body >

</html >