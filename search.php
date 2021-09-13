<?php
    include("includes/header.php");
?>

<div class="pt-3 mt-5 container mx-auto">
<h1 class="text-dark">Search Results</h1>
<p>Your results are shown below. Otherwise you can make a new search on the search bar.</p>
<!-- <form method="post" name="searchForm">
    <div class="form-group">
        <input type="text" name="search" id="search" placeholder="Search a game here" class="w-100"><br>
        <input type="submit" name="submit" class="btn btn-primary mt-3">
    </div>
</form> -->

<!-- isset($_POST['submit']) ||  -->

<?php
    $query = $_GET['query'];
    if (isset($query))
    {
        if (!isset($query))
        {
            $search = trim($_POST['search']);
            $search = filter_var($search, FILTER_SANITIZE_STRING);
        }
        else 
        {
            $search = $query;
        }

        $result = mysqli_query($con, "SELECT * FROM ama_games WHERE (`ama_title` LIKE '%$search%') OR (`ama_description` LIKE '%$search%') OR (`ama_developer` LIKE '%$search%') OR (`ama_publisher` LIKE '%$search%') OR (`ama_genre` LIKE '%$search%') OR (`ama_platform` LIKE '%$search%')") or die(mysqli_error($con));

        $i = 0;

        while($row = mysqli_fetch_array($result)){
            $gameId = ($row['id']);
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

            echo "
                <div class=\"w-75 mx-auto border rounded bg-light m-3 p-3 text-center\">
                <img class=\"img-fluid mx-auto d-block px-3 pb-3\" src=\"img/thumbs/$cover\" alt=\"$title Steam cover\">
                <h1>$title</h1>
                <div class=\"game-info text-secondary pb-3\">
                    <div>
                        <p class=\"m-0\">Developed by <i>$developer</i></p>
                    </div>
                    <div>
                        <p class=\"m-0\">Published by <i>$publisher</i></p>
                    </div>
                </div>
                <p class=\"px-3 mb-4\">$description</p>
                <a href=\"display.php?id=$gameId\"><button type=\"button\" class=\"btn btn-secondary\">More Information</button></a>
            </div>
            ";
            $i++;
        }

        if ($i == 0)
        {
            echo "<b>No records found matching your search.</b>";
        }
    }

?>

</div>

<?php
    include("includes/footer.php");
?>