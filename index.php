<?php
    include_once 'header.php';
?>
    <div class="wrapper">
         <?php
            if (isset($_SESSION["userid"])){
                echo '<p>Welcome back '.$_SESSION["useruid"].' </p>';
            }
        ?>
        <h1>This is nothing</h1>
    </div>
<?php
    include_once 'footer.php';
?>
