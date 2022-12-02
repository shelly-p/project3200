<?php
require_once 'header.php';
if (!$loggedin) {
  die("<h2>You must be signed in to view this page.</h2></body></html>");
}

$acode = sanitizeString($_GET['accesscode']);

$result = queryMysql("SELECT accesscode, problem, input, pout FROM problems_table WHERE accesscode='$acode'");
$stack = array();
while( $row = mysqli_fetch_assoc( $result) ) {
    array_push( $stack, $row );
}

$theArray = json_encode( $stack );

?>

<div class="container">
  <div class="card text-center">
    <div class="card-header">
      <span id="prob"></span>
    </div>
    <div class="card-body">
      <h5 class="card-title">Problem</h5>
      <p class="card-text">
        <span id="title"></span>
      </p>
      <p>Problem Input: <span id="pInp"></span>
      </p>
      <p>Expected output: <span id="pOut"></span>
      </p>
      <p id="result"></p>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
      <div class="card-header">
          <h5 class="">Enter code:</h5>
        </div>
        <div class="editor" id="editor"></div>
        
      </div>
    </div>
    <div class="col-2">
      <div class="header">
          <button class="run" id="run">Run</button>
      </div>
      <div class="card">
        <div class="card-header">
          <h5>Input</h5>
        </div>
        <textarea class="card-body" name="input" id="input"></textarea>
      </div>
    </div>
    <div class="col">
      
      <div class="card">
        <div class="card-header">
          <h5 class="">Output</h5>
        </div>
        
            <div class="code_output" id="code_output"></div>
         
      </div>
    </div>
  </div>
</div>
<script src="js/script/library/ace.js"></script>
<script src="js/script/library/theme-xcode.js"></script>
<script src="js/script/jquery-3.6.0.min.js"></script>
<script src="js/script/script.js"></script>
<script>

    //Script have to be under the html, otherwise error.  
    var code=[];
    var problem=[];
    var input=[];
    var exOut=[];
    var dataArray= <?php echo $theArray ?> ;
        console.log(dataArray);

        //Get info from table and transform into array 
        for(var i = 0; i < dataArray.length; i++){
            var row_i=dataArray[i];
            console.log(row_i);
            code.push(row_i["accesscode"]);
            problem.push(row_i["problem"]);
            input.push(row_i["input"]);
            exOut.push(row_i["pout"]);
            }
            
            console.log(code);
            console.log(problem);
            console.log(input);
            console.log(exOut);

            document.getElementById("prob").innerHTML="Access Code: "+code[0];
            document.getElementById("title").innerHTML=problem[0];
            document.getElementById("pInp").innerHTML=input[0];
            document.getElementById("pOut").innerHTML=exOut[0];
           
            if(exOut == document.getElementById("code_output").value)
            {
              document.getElementById("result").innerHTML = "Passed!";
            } 
    </script>
</body>
</html>