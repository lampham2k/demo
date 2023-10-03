<form action="?action=update&controller=class" method="post">
    <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
    name
    <input type="text" name="name" value="<?php echo $each['name'] ?>">
    <button>add</button>
</form>