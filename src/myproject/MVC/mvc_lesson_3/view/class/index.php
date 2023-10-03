<h1>CLASS LIST</h1>

<a href="?action=create&controller=class">
    add class
</a>

<table border="1" width="100%">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>update</td>
        <td>remove</td>
    </tr>
    <?php foreach($result as $each): ?>
        <tr>
            <td><?php echo $each['id'] ?></td>
            <td><?php echo $each['name'] ?></td>
            <td>
                <a href="?action=edit&controller=class&id=<?php echo $each['id'] ?>">
                    update
                </a>
            </td>
            <td>
                <a href="?action=remove&controller=class&id=<?php echo $each['id'] ?>">
                    remove
                </a>
            </td>
        </tr>
    <?php endforeach ?>
</table>