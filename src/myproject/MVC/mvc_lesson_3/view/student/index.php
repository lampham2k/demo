<h1>STUDENT LIST</h1>

<a href="?action=create&controller=student">
    add student
</a>

<table border="1" width="100%">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>class_id</td>
        <td>update</td>
        <td>remove</td>
    </tr>
    <?php foreach($student as $each): ?>
        <tr>
            <td><?php echo $each['id'] ?></td>
            <td><?php echo $each['name'] ?></td>
            <td><?php echo $each['class_id'] ?></td>
            <td>
                <a href="?action=edit&controller=student&id=<?php echo $each['id'] ?>">
                    update
                </a>
            </td>
            <td>
                <a href="?action=remove&controller=student&id=<?php echo $each['id'] ?>">
                    remove
                </a>
            </td>
        </tr>
    <?php endforeach ?>
</table>