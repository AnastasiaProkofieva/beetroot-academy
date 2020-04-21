<?php
$login = 'petya';
$password = 'qwerty2015';
$mail = 'petyaP@mail.com';
$language = ['English','Russian', 'Ukrainian'];
var_dump($_POST);
var_dump($_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    .container {
        margin: 0 auto;
        width: 400px;
        padding: 1em;
        border: 1px solid #CCC;
        border-radius: 1em;
        background-color: hotpink;
    }
    .info{
        font: 1.2em sans-serif ;
        color: blue;
    }
</style>
<body>
<br>
<div class="info"> <br>Your login information <br> Login: <?=$_POST['login']?> <br>Password: <?=$_POST['password']?>  <br>E-Mail: <?=$_POST['mail']?> <br>Selected language: <?=$_POST['language'][0] ?> <br></div>
<div class="container">
    <form method="post" action="registration.php">
        <div class="form-group">
            <label for="formGroupExampleInput">Login</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="login" placeholder="Enter your login" value="<?=$_POST['login'] ??'petya'?>" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Password</label>
            <input type="password" maxlength="10" class="form-control" id="formGroupExampleInput" name="password" placeholder="Enter password" value="<?=$_POST['password'] ?? 'qwerty2015' ?>" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">E-Mail</label>
            <input type="email" class="form-control" id="formGroupExampleInput" name="mail" placeholder="Enter e-mail" value="<?=$_POST['mail'] ?? 'petyaP@mail.com' ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Language</label>
            <select  class="form-control" id="exampleFormControlSelect1" name="language[]" >
                <option <?=$_POST['language']=='English' ? 'selected' :" "?> >English</option>
                <option <?=$_POST['language']=='Russian' ? 'selected' :" "?> selected>Russian</option>
                <option <?=$_POST['language']=='Ukrainian' ? 'selected' :" "?>>Ukrainian</option>
            </select>
        </div>
        <button type="submit" class="btn btn-outline-dark">Submit</button>
    </form>
</div>
</body>
</html>

