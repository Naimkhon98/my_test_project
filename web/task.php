<?php require_once "header.php"; ?>
<div style="text-align: right; margin: 20px 0px 10px;">
    <a id="btnAddAction" class="btn btn-success text-white" href="index.php?action=task-add"><img
                src="web/image/icon-add.png"/>Добавить новуя задачу</a>
</div>
<div id="toys-grid">
    <table cellpadding="10" cellspacing="1" class="dataTable table table-striped" id="test_table">
        <thead>
        <tr>
            <th><strong>Номер</strong></th>
            <th><strong>Имя пользователя</strong></th>
            <th><strong>Email</strong></th>
            <th><strong>Текст задачки</strong></th>
            <th><strong>Действие</strong></th>
        </tr>
        </thead>
        <tbody>
        <?php
        /*if (!empty($result)) {
            foreach ($result as $k => $v) {
                */ ?>
        <!--
                <tr>
                    <td><?php /*echo $result[$k]["user_fio"]; */ ?></td>
                    <td><?php /*echo $result[$k]["email"]; */ ?></td>
                    <td><?php /*echo $result[$k]["task_text"]; */ ?></td>
                    <td>
                        <a class="btnEditAction" href="index.php?action=task-edit&id=<?php /*echo $result[$k]["id"]; */ ?>">
                            <img src="web/image/icon-edit.png"/>
                        </a>
                        <a class="btnDeleteAction" href="index.php?action=task-delete&id=<?php /*echo $result[$k]["id"]; */ ?>">
                            <img src="web/image/icon-delete.png"/>
                        </a>
                    </td>
                </tr>
                -->
        <?php
        /*            }
                }*/
        ?>
        <tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#test_table').DataTable({
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "sLengthMenu": " _MENU_ ",
                "sSearch": "",
                "sProcessing": "В процессе",
                "sInfoFiltered": "(Выбрано из _MAX_ записей)",
                "sInfo": "Показано (_START_ по _END_) записей",
                "oPaginate": {
                    "sPrevious": "Предидущий",
                    "sNext": "Следующий",
                    "sFirst": "Первая",
                    "sLast": "Последная"
                }
            },
            'aLengthMenu': [[3, 10, 20, 30, 40, 50], [3, 10, 20, 30, 40, 50]],
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': 'web/ajaxfile.php'
            },
            'columns': [
                {data: 'id'},
                {data: 'user_fio'},
                {data: 'email'},
                {data: 'task_text'},
                {data: 'action'}
            ]
        });
        $('select').addClass('form-control');
        $('input').addClass('form-control');
        $("input[type=search]").attr("placeholder", "Поиск");
    });

    function confirmDelete() {
        if (!confirm("Вы действительно хотите удалить")) {
            return false;
        }
    }
</script>
<?php
require_once "footer.php";
?>