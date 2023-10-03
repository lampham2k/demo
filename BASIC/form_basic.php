<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="process.php" enctype="multipart/form-data">
  <!--method:get(push up the address bar ,
   The length on the address bar is too long to fill)-->
  name
  <input type="text" name="name">
  <br>
  birthday
  <input type="date" name="birthday">
  <br>
  password
  <input type="password" name="password">
  <br>
  sex
  <input type="radio" name="sex" value="men">MEN
  <input type="radio" name="sex" value="women">WOMAN
  <br>
  favourite
  <select name="favourite" id="">
    <option value="program">program</option>
    <option value="database">database</option>
    <option value="computer security">computer security</option>
  </select>
  <br>
  describe yourself
  <textarea name="describe yourself" id="" cols="30" rows="10"></textarea>
  <br>
  take a picture
  <br>
  <input type="file" name="pic"></input>
  <br>
  <button type="submit"> register </button>
</form>
</body>
</html>
