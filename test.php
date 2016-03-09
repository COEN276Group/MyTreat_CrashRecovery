<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php


        echo "<h2>this page is working</h2>";
        echo <<<end
        <form action="myprofile_page.php" method="post">
            <input name="user_id" value="10001" />
            <button type="submit">Go to My Profile</button>
        </form>




end;



        ?>
    </body>
</html>
