let editor;
var inputs = $("#input");

window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/cobalt");
    editor.session.setMode("ace/mode/python");
}

$("#run").click(function(){
    $.ajax({
        url: "index.php",
        method: "POST",
        data: {
            code: editor.getSession().getValue(),
            input: inputs.val()
        },
        success: function(response){
            $(".code_output").text(response);
        }
    })

})