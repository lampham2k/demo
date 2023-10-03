<form action="?action=update&controller=class" method="post">
    <input type="text" name="id" value="<?php echo $each->get_id() ?>">
    name
    <input type="text" name="name" value="<?php echo $each->get_name() ?>">
    type
    <input type="text" name="type" value="<?php echo $each->get_type() ?>">
    <button>update</button>
</form>