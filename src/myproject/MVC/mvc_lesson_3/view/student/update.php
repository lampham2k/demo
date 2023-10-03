<form action="?action=update&controller=student" method="post">
    <input type="hidden" name="id" value="<?php echo $each['id']?>">
    name
    <input type="text" name="name" value="<?php echo $each['name']?>"><br>
    class
    <select name="class_id" id="">
        <?php foreach($class as $class_each): ?>
            <option value="<?php echo $class_each['id']?>" <?php if($class_each['id'] === $each['class_id']){?>selected <?php }?>>
                <?php echo $class_each['name']?>
            </option>
        <?php endforeach?>
    </select>
    <button>update</button>
</form>