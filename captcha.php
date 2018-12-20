<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            img{
                border:1px black solid;
            }
            body{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <form action="#" method="post">
            <img src="imagen.php" alt="captcha" ><br>
            <input type="text" name="captcha" id="captcha">
            <button type="submit">Enviar</button>
            <?php
            if($_POST){

                if(isset($_SESSION['Letra'])){
                    if($_SESSION['Letra']!=$_POST['captcha']){
                        echo  'no pasa';
                    }else{
                        echo 'pasa';
                    }
                }
            }
            ?>
        </form>

    </body>
</html>
