<?php
require_once("DBController.php");

class TaskList
{
    private $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
    }

    function addTask($user_fio, $email, $task_text)
    {
        $query = "INSERT INTO task_list (user_fio,email,task_text) VALUES (?, ?, ?)";
        $paramType = "sss";
        $paramValue = array(
            $user_fio,
            $email,
            $task_text
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editTask($user_fio, $email, $task_text, $task_id)
    {
        $query = "UPDATE task_list SET user_fio = ?,email = ?,task_text = ? WHERE id = ?";
        $paramType = "sssi";
        $paramValue = array(
            $user_fio,
            $email,
            $task_text,
            $task_id
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function deleteTask($task_id)
    {
        $query = "DELETE FROM task_list WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $task_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getTaskById($task_id)
    {
        $query = "SELECT * FROM task_list WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $task_id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllTasks()
    {
        $sql = "SELECT * FROM task_list ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}

?>
