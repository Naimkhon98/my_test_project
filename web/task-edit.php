<?php require_once "header.php"; ?>
<form name="frmAdd" method="post" action="" id="frmAdd" onSubmit="return validate();">
    <div>
        <label style="padding-top: 20px;">Имя пользователья</label>
        <span id="user_fio_info" class="info"></span><br/>
        <input type="text" name="user_fio" id="user_fio" class="demoInputBox" value="<?php echo $result[0]["user_fio"]; ?>">
    </div>
    <div>
        <label>Email</label> <span id="email_info" class="info"></span><br/>
        <input type="email" name="email" id="email" class="demoInputBox" value="<?php echo $result[0]["email"]; ?>">
    </div>
    <div>
        <label>Текст задачки</label> <span id="task_text_info" class="info"></span><br/>
        <input type="text" name="task_text" id="task_text" class="demoInputBox" value="<?php echo $result[0]["task_text"]; ?>">
    </div>
    <div>
        <input type="submit" name="add" class="btn btn-outline-success" id="btnSubmit" value="Save"/>
    </div>
</form>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
    $('input').addClass('form-control');
    function validate() {
        var valid = true;
        $(".demoInputBox").css('background-color', '');
        $(".info").html('');

        if (!$("#user_fio").val()) {
            $("#user_fio_info").html("(required)");
            $("#user_fio").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#email").val()) {
            $("#email_info").html("(required)");
            $("#email").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#task_text").val()) {
            $("#task_text_info").html("(required)");
            $("#task_text").css('background-color', '#FFFFDF');
            valid = false;
        }
        return valid;
    }
</script>
<?php
require_once "footer.php";
?>