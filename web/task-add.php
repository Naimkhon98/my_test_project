<?php require_once "header.php"; ?>
<form name="frmAdd" method="post" action="" id="frmAdd" onSubmit="return validate();">
    <div>
        <label style="padding-top: 20px;">Имя пользователья</label>
        <span id="user_fio_info" class="info"></span><br>
        <input type="text" name="user_fio" id="user_fio" class="demoInputBox">
    </div>
    <div>
        <label>Email</label> <span id="email_info" class="info"></span><br>
        <input type="email" name="email" id="email" class="demoInputBox">
    </div>
    <div>
        <label>Текст задачки</label> <span id="task_text_info" class="info"></span><br>
        <input type="text" name="task_text" id="task_text" class="demoInputBox">
    </div>
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Add">
    </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function validate() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#user_fio").val()) {
        $("#user_fio_info").html("(required)");
        $("#user_fio").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#email").val()) {
        $("#email_info").html("(required)");
        $("#email").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#task_text").val()) {
        $("#task_text_info").html("(required)");
        $("#task").css('background-color','#FFFFDF');
        valid = false;
    }   
    return valid;
}
</script>
</body>
</html>