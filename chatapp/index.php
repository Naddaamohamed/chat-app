<?php
include('db.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <div id="chatbox">
            <?php
            $query="select * from chat ORDER BY ID DESC";
            $run=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($run)){
                $name=$row['name'];
                $msg=$row['msg'];
                $date=$row['date'];


            ?>
            <div id="chatdata">
                <span style="color:gold;"><?php echo $name;?></span>
                <span>: </span>
                <span><?php echo $msg;?> </span>
                <span style="color:tomato; float:right;"><?php echo $date;?></span>
            </div>
            <?php } ?>
        </div>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Enter your name">
            <textarea name="msg" placeholder="Enter your Message"></textarea>
            <input type="submit" name="submit" value="Send">

        </form>
        <?php
        if(isset($_POST['submit']))
        {
            $n=$_POST['name'];
            $m=$_POST['msg'];
            $insert="insert into chat (name , msg) values ('$n','$m')";
            $run_insert=mysqli_query($con,$insert);
            header('location: index.php');
        }
        ?>
    </div>
</body>
</html>