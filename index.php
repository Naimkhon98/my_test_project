<?php
require_once("class/DBController.php");
require_once("class/TaskList.php");

$db_handle = new DBController();

if (!empty($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "task-add":
        if (isset($_POST['add'])) {
            $user_fio = $_POST['user_fio'];
            $email = $_POST['email'];
            $task_text = $_POST['task_text'];
            $task = new TaskList();
            $insertId = $task->addTask($user_fio, $email, $task_text);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Не удалось добавить новую запись в базу",
                    "type" => "Ошибка"
                );
            } else {
                header("Location: index.php");
            }
        }
        require_once "web/task-add.php";
        break;

    case "task-edit":
        $task_id = $_GET["id"];
        $task = new TaskList();
        if (isset($_POST['add'])) {
            $user_fio = $_POST['user_fio'];
            $email = $_POST['email'];
            $task_text = $_POST['task_text'];
            $task->editTask($user_fio, $email, $task_text, $task_id);
            header("Location: index.php");
        }
        $result = $task->getTaskById($task_id);
        require_once "web/task-edit.php";
        break;

    case "task-delete":
        $task_id = $_GET["id"];
        $task = new TaskList();
        $task->deleteTask($task_id);
        $result = $task->getAllTasks();
        require_once "web/task.php";
        break;

}
?>
