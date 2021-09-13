<?php
//require("includes/mysql_connect.php");
include("includes/header.php");

$and = "&";
$order = '';

if (isset($_GET['displayby']))
{
    $displayby = $_GET['displayby'];
    $value = isset($_GET['value']) ? $_GET['value'] : '';

    //if a "sort by" filter was selected
    if (isset($_GET['orderby']))
    {
        $orderby = $_GET['orderby'];
        $ordervalue = $_GET['ordervalue'];
        $order = 'ORDER BY ' . $orderby . ' ' . $ordervalue;
    }

    //platform selection
    if ($_GET['displayby'] == 'platform')
    {
        $result = mysqli_query($con,"SELECT * FROM ama_games WHERE `ama_platform` LIKE '%$value%' $order") or die (mysql_error());
    }
    //genre selection
    else if ($_GET['displayby'] == 'genre')
    {
        $result = mysqli_query($con,"SELECT * FROM ama_games WHERE `ama_genre` LIKE '%$value%' $order") or die (mysql_error());
    }
    //price range selection
    else if ($_GET['displayby'] == 'ama_price')
    {
        if (isset($_GET['max']))
        {
            $max = $_GET['max'];

            //middle price range
            if (isset($_GET['min']))
            {
                $min = $_GET['min'];
                $result = mysqli_query($con,"SELECT * FROM ama_games WHERE $displayby >= $min AND $displayby < $max $order") or die (mysql_error());
            }
            //lowest price range
            else
            {
                $result = mysqli_query($con,"SELECT * FROM ama_games WHERE $displayby < $max $order") or die (mysql_error());
            }
        }
        //highest price range
        else
        {
            $min = $_GET['min'];
            $result = mysqli_query($con,"SELECT * FROM ama_games WHERE $displayby >= $min $order") or die (mysql_error());
        }
        
    }
    //other filters
    else
    {
        $result = mysqli_query($con,"SELECT * FROM ama_games WHERE $displayby LIKE '$value' $order") or die (mysql_error());
    }

    
    

}
//no filtering
else 
{
    $and = '?';
    //sorted
    if (isset($_GET['orderby']))
    {
        $orderby = $_GET['orderby'];
        $ordervalue = $_GET['ordervalue'];
        $result = mysqli_query($con,"SELECT * FROM ama_games ORDER BY $orderby $ordervalue") or die (mysql_error());
    }
    //not sorted
    else
    {
        $result = mysqli_query($con,"SELECT * FROM ama_games") or die (mysql_error());
    }
}

?>
<style>

.genre {
  font-size: 0.7rem;
}

.fab,
.fas {
  font-size: 1.5rem;
}

.card {
  box-shadow: 1px 6px 15px -6px rgba(0, 0, 0, 0.34) !important;
  -webkit-box-shadow: 1px 6px 15px -6px rgba(0, 0, 0, 0.34) !important;
  -moz-box-shadow: 1px 6px 15px -6px rgba(0, 0, 0, 0.34) !important;
}

.card a {
  color: inherit;
}

.card a:hover {
  text-decoration: none;
}

.card-deck {
  max-width: 100vw;
}

.sorter ul {
    display: inline-flex;
    flex-wrap: wrap;
    align-items: center;
}

/* main ul li {
    list-style: none;
} */

main ul li:first-child,
main ul li:nth-child(2) {
    list-style: none;
}

main ul li span {
    position: relative;
    left: -15px;
}

main ul li:first-child {
    margin-right: 10px;
}

main ul li a {
    color: #333;
}

main ul li a:hover{
    color: #777;
}

@media screen and (max-width: 1260px)
{
    .sorter {
        margin-left: 200px;
    }

    .gamesgrid{
        margin-left: 65px;
    }
}

@media screen and (max-width: 1260px)
{
    main ul li {
    list-style: none;
    }
}

@media screen and (max-width: 990px)
{
    .gamesgrid{
        margin-left: 0;
    }
}

@media screen and (max-width: 768px)
{
    .sorter ul {
        display: block;
        text-align: left;
    }

    .sorter {
        margin-left: 0;
    }

    .gamesgrid{
        margin-left: 0;
    }

}

</style>
<div class="row">
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 pt-2 mt-0 mb-2 text-muted">
            <span>Navigation</span>
        </h6> -->
        <ul class="nav flex-column pt-2">
            <li class="nav-item">
                <a class="nav-link" href="main.php">All Games</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=ama_multi&value=1">Multiplayer/Co-op Games</a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 pt-1 my-2 text-muted">
            <span>Platform</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=platform&value=windows">Windows</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=platform&value=macos">Mac</a>
            </li><li class="nav-item">
                <a class="nav-link" href="main.php?displayby=platform&value=linux">Linux</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=platform&value=xbox">Xbox One</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=platform&value=ps4">PS4</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=platform&value=switch">Switch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=platform&value=ios">iOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=platform&value=android">Android</a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 pt-1 my-2 text-muted">
            <span>Genre</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=genre&value=action">Action</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=genre&value=adventure">Adventure</a>
            </li><li class="nav-item">
                <a class="nav-link" href="main.php?displayby=genre&value=point">Point and Click</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=genre&value=platformer">Platformer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=genre&value=puzzle">Puzzle</a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 pt-1 my-2 text-muted">
            <span>Price</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=ama_price&max=10">$</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=ama_price&min=10&max=20">$$</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?displayby=ama_price&min=20">$$$</a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 pt-1 my-2 text-muted">
            <span>Random Game</span>
        </h6>
            <?php
                $random = mysqli_query($con, "SELECT * FROM ama_games ORDER BY RAND() LIMIT 1") or die(mysqli_error($con));
                while($row = mysqli_fetch_array($random)){
                    $gameID = ($row['id']);
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
                        <div class=\"px-3\">
                            <img class=\"img-fluid\" src=\"img/thumbs/$cover\" alt=\"$title Steam Cover\">
                            <ul style=\"list-style-type:none;\" class=\"pl-0\">
                            <li style=\"font-size:1.05rem\"><b>$title</b></i></li>
                            <li>Genre(s): <i>$genre</i></li>
                            <li>Price: <i>$$price</i></li>
                            <li class=\"mt-2\"><a href=\"display.php?id=$gameID\"><button type=\"button\" class=\"btn btn-secondary\">Learn More</button></a></li>
                            <ul>
                        </div>
                    ";
                }

            ?>
        
    </div>
</nav>
    <main class="pt-5 mt-3 pr-5">
        <div class="text-right sorter">
            <ul>
                <li class="text-muted">
                    <b>Sort by:</b>
                </li>
                <li class="px-0 mx-0"><span>
                    <a class="nav-link <?php
                        if (strpos($_SERVER['REQUEST_URI'], "orderby=ama_title&ordervalue=asc") !== false)
                        {
                            echo "font-weight-bold";
                        }
                    ?>" href="<?php
                        //if page is sorted
                        if (strpos($_SERVER['REQUEST_URI'], "orderby") !== false)
                        {
                            $sortStart = strpos($_SERVER['REQUEST_URI'], "orderby");
                            $baseUrl = substr($_SERVER['REQUEST_URI'], 0, $sortStart);
                            echo $baseUrl;
                        }
                        //if page not sorted
                        else 
                        {
                            echo $_SERVER['REQUEST_URI'] . $and;
                        }
                     ?>orderby=ama_title&ordervalue=asc">Alphabetical (A-Z)</a>
                </span></li>
                <li class="px-0 mx-0"><span>
                    <a class="nav-link <?php
                        if (strpos($_SERVER['REQUEST_URI'], "orderby=ama_title&ordervalue=desc") !== false)
                        {
                            echo "font-weight-bold";
                        }
                    ?>" href="<?php
                        //if page is sorted
                        if (strpos($_SERVER['REQUEST_URI'], "orderby") !== false)
                        {
                            $sortStart = strpos($_SERVER['REQUEST_URI'], "orderby");
                            $baseUrl = substr($_SERVER['REQUEST_URI'], 0, $sortStart);
                            echo $baseUrl;
                        }
                        //if page not sorted
                        else 
                        {
                            echo $_SERVER['REQUEST_URI'] . $and;
                        }
                     ?>orderby=ama_title&ordervalue=desc">Alphabetical (Z-A)</a>
                </span></li>
                <li class="px-0 mx-0"><span>
                    <a class="nav-link <?php
                        if (strpos($_SERVER['REQUEST_URI'], "orderby=ama_price&ordervalue=asc") !== false)
                        {
                            echo "font-weight-bold";
                        }
                    ?>" href="<?php
                        //if page is sorted
                        if (strpos($_SERVER['REQUEST_URI'], "orderby") !== false)
                        {
                            $sortStart = strpos($_SERVER['REQUEST_URI'], "orderby");
                            $baseUrl = substr($_SERVER['REQUEST_URI'], 0, $sortStart);
                            echo $baseUrl;
                        }
                        //if page not sorted
                        else 
                        {
                            echo $_SERVER['REQUEST_URI'] . $and;
                        }
                     ?>orderby=ama_price&ordervalue=asc">Price (low-high)</a>
                </span></li>
                <li class="px-0 mx-0"><span>
                    <a class="nav-link <?php
                        if (strpos($_SERVER['REQUEST_URI'], "orderby=ama_price&ordervalue=desc") !== false)
                        {
                            echo "font-weight-bold";
                        }
                    ?>" href="<?php
                        //if page is sorted
                        if (strpos($_SERVER['REQUEST_URI'], "orderby") !== false)
                        {
                            $sortStart = strpos($_SERVER['REQUEST_URI'], "orderby");
                            $baseUrl = substr($_SERVER['REQUEST_URI'], 0, $sortStart);
                            echo $baseUrl;
                        }
                        //if page not sorted
                        else 
                        {
                            echo $_SERVER['REQUEST_URI'] . $and;
                        }
                     ?>orderby=ama_price&ordervalue=desc">Price (high-low)</a>
                </span></li>
                <li class="px-0 mx-0"><span>
                    <a class="nav-link <?php
                        if (strpos($_SERVER['REQUEST_URI'], "orderby=ama_release&ordervalue=desc") !== false)
                        {
                            echo "font-weight-bold";
                        }
                    ?>" href="<?php
                        //if page is sorted
                        if (strpos($_SERVER['REQUEST_URI'], "orderby") !== false)
                        {
                            $sortStart = strpos($_SERVER['REQUEST_URI'], "orderby");
                            $baseUrl = substr($_SERVER['REQUEST_URI'], 0, $sortStart);
                            echo $baseUrl;
                        }
                        //if page not sorted
                        else 
                        {
                            echo $_SERVER['REQUEST_URI'] . $and;
                        }
                     ?>orderby=ama_release&ordervalue=desc">Release Date (newest first)</a>
                </span></li>
                <li class="px-0 mx-0"><span>
                    <a class="nav-link <?php
                        if (strpos($_SERVER['REQUEST_URI'], "orderby=ama_release&ordervalue=asc") !== false)
                        {
                            echo "font-weight-bold";
                        }
                    ?>" href="<?php
                        //if page is sorted
                        if (strpos($_SERVER['REQUEST_URI'], "orderby") !== false)
                        {
                            $sortStart = strpos($_SERVER['REQUEST_URI'], "orderby");
                            $baseUrl = substr($_SERVER['REQUEST_URI'], 0, $sortStart);
                            echo $baseUrl;
                        }
                        //if page not sorted
                        else 
                        {
                            echo $_SERVER['REQUEST_URI'] . $and;
                        }
                     ?>orderby=ama_release&ordervalue=asc">Release Date (oldest first)</a>
                </span></li>
            </ul>
        </div>
        <div class="d-inline-flex flex-wrap justify-content-end align-items-start gamesgrid">
            <?php
                while ($row = mysqli_fetch_array($result)) {
                    $id = ($row['id']);
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

                    $multiplayer = $multi == 1? "Yes" : "No";

                    echo "
                        <div class=\"card col-lg-3 col-md-4 bg-white border border-light rounded p-0 mx-3 my-3\">
                            <img class=\"img-fluid mx-auto d-block w-100 rounded-top\" src=\"img/thumbs/$cover\" alt=\"$title Steam cover\">
                            <div class=\"px-3 pt-2\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <h3>$title</h3>
                                    <h5 class=\"price text-muted mb-2\">$$price</h5>
                                </div>
                                <p class=\"mb-2\">$description</p>
                                <div class=\"d-flex align-items-center\">";
                    
                    if (strpos($genre, 'Puzzle') !== false)
                    {
                        echo "<p class=\"genre bg-warning text-white text-uppercase font-weight-bold py-1 px-2 mr-1 my-0 border rounded\">Puzzle</p>";
                    }
                    if (strpos($genre, 'Point') !== false)
                    {
                        echo "<p class=\"genre bg-info text-white text-uppercase font-weight-bold py-1 px-2 mr-1 my-0 border rounded\">Point & Click</p>";
                    }
                    if (strpos($genre, 'Action') !== false)
                    {
                        echo "<p class=\"genre bg-danger text-white text-uppercase font-weight-bold py-1 px-2 mr-1 my-0 border rounded\">Action</p>";
                    }
                    if (strpos($genre, 'Adventure') !== false)
                    {
                        echo "<p class=\"genre bg-success text-white text-uppercase font-weight-bold py-1 px-2 mr-1 my-0 border rounded\">Adventure</p>";
                    }
                    if (strpos($genre, 'Platformer') !== false)
                    {
                        echo "<p class=\"genre bg-primary text-white text-uppercase font-weight-bold py-1 px-2 mr-1 my-0 border rounded\">Platformer</p>";
                    }
                    
                    echo "
                                </div>
                            </div>
                            <hr>
                            <div class=\"d-flex justify-content-between align-items-center px-3 pb-3\">
                                <div class=\"d-flex text-secondary\">
                                    <i class=\"fab fa-windows mr-2\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Windows\"></i>";

                    if (strpos($platform, 'macOS') != false)
                    {
                        echo "<i class=\"fab fa-apple mr-2\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"macOS\"></i>";
                    }
                    if (strpos($platform, 'Linux') != false)
                    {
                        echo "<i class=\"fab fa-linux mr-2\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Linux\"></i>";
                    }
                    if (strpos($platform, 'PS4') != false)
                    {
                        echo "<i class=\"fab fa-playstation mr-2\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"PS4\"></i>";
                    }
                    if (strpos($platform, 'Xbox') != false)
                    {
                        echo "<i class=\"fab fa-xbox mr-2\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Xbox One\"></i>";
                    }
                    if (strpos($platform, 'Switch') != false)
                    {
                        echo "<i class=\"fab fa-nintendo-switch mr-2\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Switch\"></i>";
                    }

                    if (strpos($platform, 'iOS') != false)
                    {
                        echo "<i class=\"fab fa-app-store-ios mr-2\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"iOS\"></i>";
                    }

                    if (strpos($platform, 'Android') != false)
                    {
                        echo "<i class=\"fab fa-android mr-2\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Android\"></i>";
                    }


                    echo "    
                                </div>
                                <a href=\"display.php?id=$id\"><i class=\"fas fa-angle-double-right text-secondary\" title=\"Learn more\"></i></a>
                            </div>
                        </div>
                    </span>";
                }
            ?>
        </div>
    </main>
</div>

<?php
    include("includes/footer.php");
?>