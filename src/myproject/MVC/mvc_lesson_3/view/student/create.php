<form action="?action=store&controller=student" method="post">
    name
    <input type="text" name="name"><br>
    class
    <select name="class_id" id="">
        <?php foreach($class as $each): ?>
            <option value="<?php echo $each['id']?>">
                <?php echo $each['name']?>
            </option>
        <?php endforeach?>
    </select>
    <button>add</button>
</form>