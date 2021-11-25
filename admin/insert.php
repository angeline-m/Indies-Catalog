<?php
    session_start();
    if(!isset($_SESSION['05e252a0-8c03-4b70-95fc-5f64a6a2df6c'])) {
        header("Location: http://indiescatalog.000webhostapp.com/admin/login.php");
    }

    include("../includes/header.php");

    $originalsFolder = "../img/originals/";
    $thumbsFolder = "../img/thumbs/";
    $displayFolder = "../img/display/";

    $thisTitle = isset($_POST['gameTitle']) ? trim($_POST['gameTitle']) : '';
    $thisDesc = isset($_POST['description']) ? $_POST['description'] : '';
    $thisDev = isset($_POST['gameDev']) ? trim($_POST['gameDev']) : '';
    $thisPub = isset($_POST['gamePub']) ? trim($_POST['gamePub']) : '';
    $thisDate = isset($_POST['gameDate']) ? trim($_POST['gameDate']) : '';
    $thisPrice = isset($_POST['gamePrice']) ? trim($_POST['gamePrice']) : '';
    $win = isset($_POST['cbWin']) ? $_POST['cbWin'] : '';
    $mac = isset($_POST['cbMac']) ? $_POST['cbMac'] : '';
    $linux = isset($_POST['cbLinux']) ? $_POST['cbLinux'] : '';
    $ps4 = isset($_POST['cbPS4']) ? $_POST['cbPS4'] : '';
    $xbox = isset($_POST['cbXbox']) ? $_POST['cbXbox'] : '';
    $switch = isset($_POST['cbSwitch']) ? $_POST['cbSwitch'] : '';
    $ios = isset($_POST['cbIOS']) ? $_POST['cbIOS'] : '';
    $and = isset($_POST['cbAnd']) ? $_POST['cbAnd'] : '';
    $action = isset($_POST['cbAction']) ? $_POST['cbAction'] : '';
    $adventure = isset($_POST['cbAdventure']) ? $_POST['cbAdventure'] : '';
    $point = isset($_POST['cbPoint']) ? $_POST['cbPoint'] : '';
    $platformer = isset($_POST['cbPlatformer']) ? $_POST['cbPlatformer'] : '';
    $puzzle = isset($_POST['cbPuzzle']) ? $_POST['cbPuzzle'] : '';
    $thisMulti = isset($_POST['cbMulti']) ? $_POST['cbMulti'] : '';
    $thisCode = isset($_POST['trailerCode']) ? $_POST['trailerCode'] : '';
    $genres = "";
    $platforms = "";
    $errors = 0;

    if (isset($_POST['submit']))
    {
        $fileID = uniqid();

        if (($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/png"))
        {
            $filename = $fileID . "." . substr($_FILES["file"]["type"], 6);

            if($_FILES["file"]["size"] > 1000000)
            {
                echo "<style> .file-size { display: block; }</style>";
                $errors = 1;
            }
        }
        else
        {
            echo "<style> .file-type { display: block; }</style>";
            $errors = 1;
        }

        if ($_FILES["file"]["error"] > 0)
        {
            $error = $_FILES["file"]["error"];
            echo "<style> .gen-err { display: block; }</style>";
            $errors = 1;
        }

        $thisTitle = filter_var($thisTitle, FILTER_SANITIZE_STRING);
        if ($thisTitle == "") {
            echo "<style> .title-required { display: block !important; }</style>";
            $errors = 1;
        }
        if ($thisTitle != "" && strlen($thisTitle) > 50) {
            echo "<style> .title-length { display: block !important; }</style>";
            $errors = 1;
        }

        $thisDesc = filter_var($thisDesc, FILTER_SANITIZE_STRING);
        if ($thisDesc == "") {
            echo "<style> .desc-required { display: block !important; }</style>";
            $errors = 1;
        }

        $thisDev = filter_var($thisDev, FILTER_SANITIZE_STRING);
        if ($thisDev == "") {
            echo "<style> .dev-required { display: block !important; }</style>";
            $errors = 1;
        }
        if ($thisDev != "" && strlen($thisDev) > 50) {
            echo "<style> .dev-length { display: block !important; }</style>";
            $errors = 1;
        }

        $thisPub = filter_var($thisPub, FILTER_SANITIZE_STRING);
        if ($thisPub == "") {
            echo "<style> .pub-required { display: block !important; }</style>";
            $errors = 1;
        }
        if ($thisPub != "" && strlen($thisPub) > 50) {
            echo "<style> .pub-length { display: block !important; }</style>";
            $errors = 1;
        }

        if ($thisDate == "") {
            echo "<style> .date-required { display: block !important; }</style>";
            $errors = 1;
        }
        if ($thisDate != "" && !preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$thisDate)) {
            echo "<style> .date-format { display: block !important; }</style>";
            $errors = 1;
        }

        if ($thisPrice == "") {
            echo "<style> .price-required { display: block !important; }</style>";
            $errors = 1;
        }
        if ($thisPrice != "" && !preg_match("/^[0-9]{1,}.[0-9]{2}$/",$thisPrice)) {
            echo "<style> .price-format { display: block !important; }</style>";
            $errors = 1;
        }

        if ($win == 1)
        {
            if ($platforms == "")
            {
                $platforms = $platforms . "Windows";
            }
            else 
            {
                $platforms = $platforms . ", Windows";
            }
        }
        if ($mac == 1)
        {
            if ($platforms == "")
            {
                $platforms = $platforms . "macOS";
            }
            else 
            {
                $platforms = $platforms . ", macOS";
            }
        }
        if ($linux == 1)
        {
            if ($platforms == "")
            {
                $platforms = $platforms . "Linux";
            }
            else 
            {
                $platforms = $platforms . ", Linux";
            }
        }
        if ($ps4 == 1)
        {
            if ($platforms == "")
            {
                $platforms = $platforms . "PS4";
            }
            else 
            {
                $platforms = $platforms . ", PS4";
            }
        }
        if ($xbox == 1)
        {
            if ($platforms == "")
            {
                $platforms = $platforms . "Xbox One";
            }
            else 
            {
                $platforms = $platforms . ", Xbox One";
            }
        }
        if ($switch == 1)
        {
            if ($platforms == "")
            {
                $platforms = $platforms . "Switch";
            }
            else 
            {
                $platforms = $platforms . ", Switch";
            }
        }
        if ($ios == 1)
        {
            if ($platforms == "")
            {
                $platforms = $platforms . "iOS";
            }
            else 
            {
                $platforms = $platforms . ", iOS";
            }
        }
        if ($and == 1)
        {
            if ($platforms == "")
            {
                $platforms = $platforms . "Android";
            }
            else 
            {
                $platforms = $platforms . ", Android";
            }
        }

        if ($action == 1)
        {
            if ($genres == "")
            {
                $genres = $genres . "Action";
            }
            else 
            {
                $genres = $genres . ", Action";
            }
        }
        if ($adventure == 1)
        {
            if ($genres == "")
            {
                $genres = $genres . "Adventure";
            }
            else 
            {
                $genres = $genres . ", Adventure";
            }
        }
        if ($point == 1)
        {
            if ($genres == "")
            {
                $genres = $genres . "Point and Click";
            }
            else 
            {
                $genres = $genres . ", Point and Click";
            }
        }
        if ($platformer == 1)
        {
            if ($genres == "")
            {
                $genres = $genres . "Platformer";
            }
            else 
            {
                $genres = $genres . ", Platformer";
            }
        }
        if ($puzzle == 1)
        {
            if ($genres == "")
            {
                $genres = $genres . "Puzzle";
            }
            else 
            {
                $genres = $genres . ", Puzzle";
            }
        }

        if ($platforms == "")
        {
            echo "<style> .platform-required { display: block !important; }</style>";
            $errors = 1;
        }
        if ($genres == "")
        {
            echo "<style> .genre-required { display: block !important; }</style>";
            $errors = 1;
        }

        if ($errors == 0)
        {
            if ($thisMulti == "1")
            {
                $multi = 1;
            }
            else {
                $multi = 0;
            }

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $originalsFolder . $filename))
            {
                //place uploaded image into originals folder
                $originalFile = $originalsFolder . $filename;

                //create display image
                createThumbnail($filename, $originalFile, $displayFolder, 800);
                //mergePix($unmarkedFolder . $filename, $watermark, $displayFolder . $filename, 0, 50);

                //create thumbnail
                createThumbnail($filename, $originalFile, $thumbsFolder, 400);

                mysqli_query($con, "INSERT INTO ama_games (ama_title, ama_description, ama_developer, ama_publisher, ama_release, ama_price, ama_platform, ama_genre, ama_multi, ama_cover, ama_trailer) VALUES ('$thisTitle', '$thisDesc', '$thisDev', '$thisPub', '$thisDate', '$thisPrice', '$platforms', '$genres', '$multi', '$filename', '$thisCode')") or die(mysqli_error($con));
                echo "<style> .inserted { display: block !important; }</style>";

                $thisTitle = "";
                $thisDesc = "";
                $thisDev = "";
                $thisPub = "";
                $thisDate = "";
                $thisPrice = "";
            }
            else
            {
                $errorMsg = $_FILES["file"]["error"];
                echo "<style> .upload-failed-msg { display: block; }</style>";
            }
            
        }

    }

    function createThumbnail($filename, $file, $folder, $newwidth) {
        //get proper image ratio from uploaded file
        list($width, $height) = getimagesize($file);
        $imgRatio = $width/$height;
        $newheight = $newwidth / $imgRatio;

        //create holder for new image destination variable

        $thumb = imagecreatetruecolor($newwidth, $newheight);

        //create image files

        if ($_FILES["file"]["type"] == "image/png")
        {
            $source = imagecreatefrompng($file);
        }
        else 
        {
            $source = imagecreatefromjpeg($file);
        }
        
        //resize image to destination output
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        
        //output, get original filename for dest filename
        $newFileName = $folder . $filename;
    
        //display image back at 80% quality
        imagejpeg($thumb,$newFileName,80);

        //destroy created images from memory once placed in destination folder
        imagedestroy($thumb); 
        imagedestroy($source); 

        //echo "<p class=\"mt-5 pt-5\">Insert success</p><br><img src=\"$newFileName\" />";
    }

?>

<div class="container pt-5 mt-5 mb-5">
    <div class="success-msg inserted mt-3 p-2 rounded border text-white bg-success">Insert succeeded.</div>
    <div class="error-msg upload-failed-msg mt-3 p-2 rounded border text-white bg-danger">Error occured of type: <?php echo $errorMsg ?></div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" name="edit">
        <div class="form-group">
            <label for="file">Game Cover</label>
            <input type="file" name="file" id="file">
            <div class="error-msg file-type mb-1 p-2 rounded border bg-danger text-white">File must be a valid file type (JPEG, PJPEG, PNG)</div>
            <div class="error-msg file-size mb-1 p-2 rounded border bg-danger text-white">File must be equal to or less than 1 MB</div>
            <div class="error-msg gen-err mb-1 p-2 rounded border bg-danger text-white">Error type <?php echo $error ?> has occured</div>
        </div>
        <div class="form-group">
            <label for="gameTitle">Title</label>
            <input type="text" class="form-control" id="gameTitle" name="gameTitle" value="<?php echo $thisTitle; ?>">
            <div class="error-msg title-required mb-1 p-2 rounded border bg-danger text-white">Proper title is required</div>
            <div class="error-msg title-length mb-1 p-2 rounded border bg-danger text-white">Title is limited to 50 charaters</div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo $thisDesc; ?></textarea>
            <div class="error-msg desc-required mb-1 p-2 rounded border bg-danger text-white">Description is required</div>
        </div>
        <div class="form-group">
            <label for="gameDev">Developer</label>
            <input type="text" class="form-control" id="gameDev" name="gameDev" value="<?php echo $thisDev; ?>">
            <div class="error-msg dev-required mb-1 p-2 rounded border bg-danger text-white">Proper developer is required</div>
            <div class="error-msg dev-length mb-1 p-2 rounded border bg-danger text-white">Developer is limited to 50 charaters</div>
        </div>
        <div class="form-group">
            <label for="gamePub">Publisher</label>
            <input type="text" class="form-control" id="gamePub" name="gamePub" value="<?php echo $thisPub; ?>">
            <div class="error-msg pub-required mb-1 p-2 rounded border bg-danger text-white">Proper publisher is required</div>
            <div class="error-msg pub-length mb-1 p-2 rounded border bg-danger text-white">Publisher is limited to 50 charaters</div>
        </div>
        <div class="form-group">
            <label for="gameDate">Release Date</label>
            <input type="text" class="form-control" id="gameDate" name="gameDate" value="<?php echo $thisDate; ?>" placeholder="YYYY-MM-DD (ex. 2020-05-23)">
            <div class="error-msg date-required mb-1 p-2 rounded border bg-danger text-white">Date is required</div>
            <div class="error-msg date-format mb-1 p-2 rounded border bg-danger text-white">Please enter a valid date</div>
        </div>
        <div class="form-group">
            <label for="gamePrice">Price</label>
            <input type="text" class="form-control" id="gamePrice" name="gamePrice" value="<?php echo $thisPrice; ?>" placeholder="ex. 10.99">
            <div class="error-msg price-required mb-1 p-2 rounded border bg-danger text-white">Price is required</div>
            <div class="error-msg price-format mb-1 p-2 rounded border bg-danger text-white">Please enter a valid price</div>
        </div>
        <div class="form-group">
            <label for="trailerCode">Youtube Trailer Video Code (Optional)</label>
            <input type="text" class="form-control" id="trailerCode" name="trailerCode" value="<?php echo $thisCode; ?>" placeholder="The code after the '=' in youtube.com/watch?v=B_ULE7TezoE">
        </div>
        <div class="d-flex">
            <div class="pl-2 mb-2 mr-5">
                <fieldset>
                    <legend>Platform(s)</legend>
                    <input type="checkbox" value="1" class="form-check-input" id="cbWin" name="cbWin" <?php if($win !== '') { echo "checked"; }?>>
                    <label class="form-check-label" for="cbWin">Windows</label><br>
                    <input type="checkbox" value="1" class="form-check-input" id="cbMac" name="cbMac" <?php if($mac !== '') { echo "checked"; }?>>
                    <label class="form-check-label" for="cbMac">Mac</label><br>
                    <input type="checkbox" value="1" class="form-check-input" id="cbLinux" name="cbLinux" <?php if($linux !== '') { echo "checked"; }?>>
                    <label class="form-check-label" for="cbLinux">Linux</label><br>
                    <input type="checkbox" value="1" class="form-check-input" id="cbPS4" name="cbPS4" <?php if($ps4 !== '') { echo "checked"; }?>>
                    <label class="form-check-label" for="cbPS4">PS4</label><br>
                    <input type="checkbox" value="1" class="form-check-input" id="cbXbox" name="cbXbox" <?php if($xbox !== '') { echo "checked"; }?>>
                    <label class="form-check-label" for="cbXbox">Xbox</label><br>
                    <input type="checkbox" value="1" class="form-check-input" id="cbSwitch" name="cbSwitch" <?php if($switch !== '') { echo "checked"; }?>>
                    <label class="form-check-label" for="cbSwitch">Switch</label><br>
                    <input type="checkbox" value="1" class="form-check-input" id="cbIOS" name="cbIOS" <?php if($ios !== '') { echo "checked"; }?>>
                    <label class="form-check-label" for="cbIOS">iOS</label><br>
                    <input type="checkbox" value="1" class="form-check-input" id="cbAnd" name="cbAnd" <?php if($and !== '') { echo "checked"; }?>>
                    <label class="form-check-label" for="cbAnd">Android</label>
                </fieldset>
                <div class="error-msg platform-required mb-1 p-2 rounded border bg-danger text-white">At least one platform must be selected</div>
            </div>
            <div class="ml-5 pl-5">
                <div class="pl-2 mb-3">
                    <fieldset>
                        <legend>Genre(s)</legend>
                        <input type="checkbox" value="1" class="form-check-input" id="cbAction" name="cbAction <?php if($action !== '') { echo "checked"; } ?>>
                        <label class="form-check-label" for="cbAction">Action</label><br>
                        <input type="checkbox" value="1" class="form-check-input" id="cbAdventure" name="cbAdventure" <?php if($adventure !== '') { echo "checked"; } ?>>
                        <label class="form-check-label" for="cbAdventure">Adventure</label><br>
                        <input type="checkbox" value="1" class="form-check-input" id="cbPoint" name="cbPoint" <?php if($point !== '') { echo "checked"; } ?>>
                        <label class="form-check-label" for="cbPoint">Point and Click</label><br>
                        <input type="checkbox" value="1" class="form-check-input" id="cbPlatformer" name="cbPlatformer" <?php if($platformer !== '') { echo "checked"; } ?>>
                        <label class="form-check-label" for="cbPlatformer">Platformer</label><br>
                        <input type="checkbox" value="1" class="form-check-input" id="cbPuzzle" name="cbPuzzle" <?php if($puzzle !== '') { echo "checked"; } ?>>
                        <label class="form-check-label" for="cbPuzzle">Puzzle</label>
                    </fieldset>
                    <div class="error-msg genre-required mb-1 p-2 rounded border bg-danger text-white">At least one genre must be selected</div>
                </div>
                <div class="pl-2 mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="cbMulti" name="cbMulti" <?php if($thisMulti !== '') { echo "checked"; } ?>>
                    <label class="form-check-label" for="cbMulti">Multiplayer/Co-op</label>
                </div>
            </div>
        </div>
        <input type="submit" value="Insert" name="submit" class="btn btn-primary mt-3">
    </form>
</div>

<?php
    include("../includes/footer.php");
?>