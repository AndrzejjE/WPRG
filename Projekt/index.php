<?php
session_start();
// if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > 60 * 5)) {
   
//     session_unset();     
//     session_destroy();  
// }
// $_SESSION['login_time'] = time(); 

require_once 'functions.php';


$conn = connectToDatabase();


// Przesłanie formularza rejestracji
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

   
    registerUser($conn, $username, $password, $firstname, $lastname);
}

// Przesłanie formularza logowania
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    loginUser($conn, $username, $password);
}

// wylogowanie
if (isset($_GET['logout'])) {
    logoutUser();
}

// Przesłanie formularza aktualizacji wyników
if (isset($_POST['update'])) {
    $matches_won = $_POST['matches_won'];
    $sets_won = $_POST['sets_won'];
   
    $username = $_SESSION['username'];

    
    updatePlayerStats($conn, $username, $matches_won, $sets_won);
}

if (isset($updateResult)) {
    echo "<p id='error-messages'>$updateResult</p>";
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Liga tenisa ziemnego</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
    <?php
    // komunikaty
    if (isset($_SESSION['message'])) {
    echo "<div class='success_message'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
    }
    if (isset($_SESSION['error_message'])) {
    echo "<div class='error_message'>".$_SESSION['error_message']."</div>";
    unset($_SESSION['error_message']);
    }
    if (isLoggedIn()) : ?>
            <?php include 'welcome.php';?>
            
            <?php
    if(isset($_COOKIE["last_login_attempt"])) {
    echo "<p>Ostatnia próba logowania: " . date('Y-m-d H:i:s', $_COOKIE["last_login_attempt"]) . "</p>";
    }
?>
        <?php displayRanking($conn); ?>
        <?php else : ?>
        <?php include 'login_form.php'; ?>
        <?php include 'register_form.php'; ?>
        <?php endif; ?>
    </div>
</body>
</html>
