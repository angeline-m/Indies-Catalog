<?PHP
    session_start();
    
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == "catalogadmin" && $password == "securepw") {
            $_SESSION['05e252a0-8c03-4b70-95fc-5f64a6a2df6c'] = session_id();
            header("Location:../main.php");
            include("../includes/header.php");
            echo "<h2 class=\"text-dark pt-5 mt-3\">Login</h2>";
        }
        else {
            include("../includes/header.php");
            echo "<h2 class=\"text-dark pt-5 mt-3\">Login</h2>";
            echo "<p class=\"text-danger\">Incorrect login credentials</p>";
        }
    }
    else {
        include("../includes/header.php");
        echo "<h2 class=\"text-dark pt-5 mt-3\">Login</h2>";
    }

    $formAction = htmlspecialchars($_SERVER['PHP_SELF']);

echo
"<form class=\"login-form\" action=\"$formAction\" method=\"post\" name=\"login\">
    <div class=\"form-group p-3\">
        <label for=\"login\" class=\"mt-3\">Username</label>
        <input type=\"text\" id=\"username\" name=\"username\" class=\"form-control\">
    </div>
    <div class=\"form-group p-3\">
        <label for=\"password\" class=\"mt-3\">Password</label>
        <input type=\"password\" id=\"password\" name=\"password\" class=\"form-control\">
    </div>
    <input type=\"submit\" value=\"Log In\" name=\"submit\" class=\"btn btn-primary mt-3\">
</form>";


include("../includes/footer.php");
