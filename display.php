<?php
    include("includes/header.php");

    $thisID = $_GET['id'];
    if (!isset($thisID)){
        $result = mysqli_query($con, "SELECT * FROM ama_games LIMIT 1") or die(mysqli_error($con));
        while($row = mysqli_fetch_array($result)){
            $thisID = $row['id'];
        }
    }

    $result = mysqli_query($con, "SELECT * FROM ama_games WHERE `id` = $thisID") or die(mysqli_error($con));
    while($row = mysqli_fetch_array($result)){
        $title = ($row['ama_title']);
        $description = ($row['ama_description']);
        $developer = ($row['ama_developer']);
        $publisher = ($row['ama_publisher']);
        $date = ($row['ama_release']);
        $price = ($row['ama_price']);
        $platform = ($row['ama_platform']);
        $genre = ($row['ama_genre']);
        $multi = ($row['ama_multi']);
        $cover = ($row['ama_cover']);
        $code = ($row['ama_trailer']);

        $multiplayer = $multi == 1? "Yes" : "No";
    }

    echo "
    <br>
    <div class=\"container mx-auto border rounded bg-light p-3 pb-3 mt-5 mx-3 mb-4 text-center\">
        <img class=\"mx-auto d-block px-3 pb-3 img-fluid\" src=\"img/display/$cover\" alt=\"$title Steam cover\">
        <h1>$title</h1>
        <h4 class=\"m-0\">$$price</h4>
        <div class=\"d-flex justify-content-between text-secondary py-3\">
            <div class=\"text-left pl-5 ml-5\">
                <p class=\"m-0\">Developed by <i>$developer</i></p>
                <p class=\"m-0\">Published by <i>$publisher</i></p>
                <p class=\"m-0\">Multiplayer/Co-op? <i>$multiplayer</i></p>
            </div>
            <div class=\"text-right pr-5 mr-5\">
                <p class=\"m-0\">Released on <i>$date</i></p>
                <p class=\"m-0\">Genre(s): <b>$genre</b></p>
                <p class=\"m-0\">Platform(s): <b>$platform</b></p>
            </div>
        </div>
        <p class=\"px-5 mx-5 mb-4\">$description</p>";

    if ($code != "" || strlen($code) != 0)
    {
        echo "<h2>Trailer</h2>
        <div style=\"position: relative; padding-bottom: 56.25%; padding-top: 30px; height: 0; overflow: hidden;\">
            <iframe style=\"position: absolute; top: 0; left: 0; width: 100%; height: 100%;\" src=\"https://www.youtube.com/embed/$code\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>
        </div>
        <br>";
    }
        
    echo "<a href=\"admin/edit.php?id=$thisID\"><button type=\"button\" class=\"btn btn-secondary\">Edit Information</button></a>
    </div>
    ";




?>

