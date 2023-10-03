<h1>STUDENT LIST</h1>
<a href="?action=create">
    add
</a>

<table border= "1" width = "100%">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>update</td>
        <td>delete</td>
    </tr>
    <?php foreach($result as $each): ?>
        <tr>
            <td><?php echo $each['id']?></td>
            <td><?php echo $each['name']?></td>
            <td>
                <a href="?action=edit&id=<?php echo $each['id'] ?>">
                    update
                </a>
            </td>
            <td>
                <a href="?action=delete&id=<?php echo $each['id'] ?>">
                    delete
                </a>
            </td>
        </tr>
    <?php endforeach ?>
</table>