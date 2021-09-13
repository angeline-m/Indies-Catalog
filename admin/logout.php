<?php
    session_start();
    include("../includes/header.php");
    session_destroy();
?>

<h1 class="text-dark pt-5 mt-3">You have been logged out.</h1>
<p>Thank you for visiting the Indie Games Catalog. If you wish to return, <a href="login.php">click here to login</a>.</p>

<?php
    include("../includes/footer.php");
?>