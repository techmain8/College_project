<?php include "connection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <a href="index.php">HOME</a>
    <?php
         $sql = "SELECT * FROM fileup ORDER BY id DESC";
         $res = mysqli_query($con, $sql);

         if(mysqli_num_rows($res) > 0) {
            while ($fileup = mysqli_fetch_assoc($res)) { ?>

            <div class="alb">
                <img src="<?php echo $image?>">
            </div>

        <?php } } ?>
</body>
</html>