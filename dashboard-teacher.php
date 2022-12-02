<?php
require_once "header.php";

if (!$loggedin) {
    die("<h2>You must be signed in to view this page.</h2></body></html>");
}
?>
<div class="containter">
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">TEACHER DASHBOARD</h1>
        </div>

        <div>
            <div class="text-center">
                <p><a class="btn pink-button" href="teacher-problem.php?accesscode=146358">Factorial</a></p>
                <p><a class="btn pink-button" href="teacher-problem.php?accesscode=157932">Power</a></p>
                <p><a class="btn blue-button" href="teacher-problem.php">New Problem</a></p>
            </div>
        </div>
        <script src="main.js"></script>
    </div>

</body>
</html>