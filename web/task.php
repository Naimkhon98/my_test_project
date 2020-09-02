<?php require_once "header.php"; ?>
<div style="text-align: right; margin: 20px 0px 10px;">
    <a id="btnAddAction" href="index.php?action=task-add"><img src="web/image/icon-add.png"/>Добавить новуя задачу</a>
</div>
<div id="toys-grid">
    <table cellpadding="10" cellspacing="1">
        <thead>
        <tr>
            <th><strong>Имя пользователя</strong></th>
            <th><strong>Email</strong></th>
            <th><strong>Текст задачки</strong></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($result)) {
            foreach ($result as $k => $v) {
                ?>
                <tr>
                    <td><?php echo $result[$k]["user_fio"]; ?></td>
                    <td><?php echo $result[$k]["email"]; ?></td>
                    <td><?php echo $result[$k]["task_text"]; ?></td>
                    <td>
                        <a class="btnEditAction" href="index.php?action=task-edit&id=<?php echo $result[$k]["id"]; ?>">
                            <img src="web/image/icon-edit.png"/>
                        </a>
                        <a class="btnDeleteAction" href="index.php?action=task-delete&id=<?php echo $result[$k]["id"]; ?>">
                            <img src="web/image/icon-delete.png"/>
                        </a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        <tbody>
    </table>
</div>
</body>
</html>