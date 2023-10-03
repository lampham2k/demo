<a href="?action=create&controller=class">
    add
</a>
<table border="1" width="100%"> 
    <tr>
        <td>id</td>
        <td>name</td>
        <td>type</td>
        <td>edit</td>
        <td>remove</td>
    </tr>
    <tr>
        <?php foreach($arr as $each): ?>
            <tr>
                <td>
                    <?php echo $each->get_id()?>
                </td>
                <td>
                    <?php echo $each->get_name()?>
                </td>
                <td>
                    <?php echo $each->get_type()?>
                </td>
                <td>
                    <a href="?action=edit&controller=class&id=<?php echo $each->get_id()?>">
                        update
                    </a>
                </td>
                <td>
                    <a href="?action=delete&controller=class&id=<?php echo $each->get_id()?>">
                        update
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tr>
</table>