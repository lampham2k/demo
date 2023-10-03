<h1>
    CLASS LIST
</h1>
<a href="?action=create">
    add
</a>
<table border="1" width="100%">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>update</td>
        <td>delete</td>
    </tr>
    <?php foreach($arr as $each): ?>
        <tr>
            <td><?php echo $each->get_id() ?></td>
            <td><?php echo $each->get_type_name() ?></td>
            <td>
                <a href="?action=edit&id=<?php echo $each->get_id() ?>">
                    edit
                </a>
            </td>
            <td>
                <a href="?action=delete&id=<?php echo $each->get_id() ?>">
                    delete
                </a>
            </td>
        </tr>
    <?php endforeach ?> 
</table>