<form action="?action=update&controller=student" method="post">
    <input type="hidden" name="id" value="<?php echo $each->get_id() ?>">
    name
    <input type="text" name="name" value="<?php echo $each->get_name() ?>">
    class
    <select name="class_id" id="">
        <?php foreach($arr as $row): ?>
            <option value="<?php echo $row->get_id() ?>" 
            <?php if($row->get_id() === $each->get_class_id()){?> selected 
            <?php }?>
            >
                <?php echo $row->get_name() ?>
            </option>
        <?php endforeach ?>
    </select>
    
    <button>update</button>
</form>