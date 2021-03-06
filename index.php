<?php
//require("includes/mysql_connect.php");
include("includes/header.php");

$random = mysqli_query($con, "SELECT * FROM ama_games ORDER BY RAND() LIMIT 1") or die(mysqli_error($con));
    while($row = mysqli_fetch_array($random)){
        $gameID = ($row['id']);
    }
?>
<style>
    button {
        border: 0 !important;
    }
</style>
<div class="mt-3">
<br>
</div>
<div class="container text-center bg-light border rounded p-3 mx-auto mt-5">
    <h1>Indie Games Database Catalog</h1>
    <p class="w-75 mx-auto">Welcome to Angeline's catalog of indie gems! Indie games are games that aren't made by big budget studios and have likely flown under the radar by the general public. These games encompass five genres: <b>Action, Adventure, Puzzle, Point and Click, and Platformer</b>.</p>
    <p class="w-75 mx-auto">Most of these games are friendly for new gamers, young gamers, and even people that don't play games! I can guarantee that everyone will find a game in this catalog that they'd like, so come in and check it out!</b></p>
    <p class="w-75 mx-auto"><b>To create, update, or delete game entries, please login.</b> Login credentials in the <a href="http://github.com/angeline-m/indies-catalog" target="_blank">Github Repository</a>.</p>
    <p class="w-75 mx-auto">This catalog was made using PHP, MySQL, and Bootstrap 4.</p>
    <div class="mt-3 mx-auto">
        <!-- <a href="display.php?id=<?php echo $gameID; ?>" class="mx-2">
            <button type="button" class="btn btn-secondary bg-warning yellow mb-2">I'm feeling lucky!</button>
        </a> -->
        <a href="main.php" class="mx-2">
            <button type="button" class="btn btn-secondary grey mb-2">See the games</button>
        </a>
        <!-- <a href="main.php?displayby=ama_price&max=10" class="mx-2">
            <button type="button" class="btn btn-secondary bg-info blue mb-2">Show the cheap games first!</button>
        </a> -->
    </div>
</div>

<?php
    include("includes/footer.php");
?>
