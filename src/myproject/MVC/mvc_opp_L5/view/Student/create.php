<form action="?action=store&controller=student" method="post">
    name
    <input type="text" name="name">
    class
    <select name="class_id" id="">
        <?php foreach($arr as $each):?>
            <option value="<?php echo $each->get_id() ?>">
                <?php echo $each->get_name() ?>
            </option>
        <?php endforeach?>
    </select>
    <button>add</button>
</form>