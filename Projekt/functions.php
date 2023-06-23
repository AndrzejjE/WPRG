<?php

// Funkcja do nawiązywania połączenia z bazą danych
function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Błąd połączenia: " . mysqli_connect_error());
    }

    return $conn;
}



// Funkcja do hashowania hasła
function hashPassword($password) {
    $options = [
        'cost' => 12,
    ];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT, $options);

    return $hashedPassword;
}

// Funkcja do rejestracji użytkownika
function registerUser($conn, $username, $password, $firstname, $lastname) {
    $hashedPassword = hashPassword($password);

    $checkUserQuery = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $checkUserQuery);
    $userExists = mysqli_num_rows($result) > 0;

    if (!$userExists) {
        $insertUserQuery = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
        mysqli_query($conn, $insertUserQuery);
        
        
        $userId = mysqli_insert_id($conn);
        
        $insertPlayerQuery = "INSERT INTO Players (firstname, lastname, matches_won, sets_won, user_id) VALUES ('$firstname', '$lastname', 0, 0, '$userId')";
        mysqli_query($conn, $insertPlayerQuery);
        
        $_SESSION['message'] = "Rejestracja zakończona sukcesem!";
    } else {
        $_SESSION['error_message'] = "Użytkownik o podanej nazwie już istnieje!";
    }
   
}

// Funkcja do weryfikowania hasła
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

// Funkcja do logowania użytkownika
function loginUser($conn, $username, $password) {
    $getUserQuery = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $getUserQuery);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $hashedPassword = $user['password'];
        if (verifyPassword($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['login_time'] = time();
            $_SESSION['message'] = "Zalogowano pomyślnie!";
        } else {
            $_SESSION['error_message'] =  "Błędne dane logowania!";
            setcookie("last_login_attempt", time(), time() + (86400 * 30), "/");
        }
    } else {
        $_SESSION['error_message'] =  "Błędne dane logowania!";
        setcookie("last_login_attempt", time(), time() + (86400 * 30), "/"); 
    }
}


// Funkcja do wylogowania użytkownika
function logoutUser() {
    session_unset();
    session_destroy();
    session_regenerate_id(true);
    header("Location: index.php");
    exit();
}

// Funkcja sprawdzająca, czy użytkownik jest zalogowany
function isLoggedIn() {
    return isset($_SESSION['username']);
}

function updatePlayerStats($conn, $username, $matches_won, $sets_won) {
    $getUserQuery = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $getUserQuery);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $userId = $user['id'];
        $updateStatsQuery = "UPDATE Players SET matches_won='$matches_won', sets_won='$sets_won' WHERE user_id='$userId'";
        mysqli_query($conn, $updateStatsQuery);
        $_SESSION['message'] = "Wyniki zostały zaktualizowane!";
    } else {
        $_SESSION['error_message'] =  "Błąd podczas aktualizacji wyników!";
    }
}


// Funkcja do usuwania użytkownika
function deleteUser($conn, $username) {
    mysqli_begin_transaction($conn);

    try {

        $getUserQuery = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $getUserQuery);
        $user = mysqli_fetch_assoc($result);
        $userId = $user['id'];

        
        $deletePlayerQuery = "DELETE FROM Players WHERE user_id='$userId'";
        mysqli_query($conn, $deletePlayerQuery);

        
        $deleteUserQuery = "DELETE FROM users WHERE id='$userId'";
        mysqli_query($conn, $deleteUserQuery);

        
        mysqli_commit($conn);
        $_SESSION['message'] = "Użytkownik usunięty pomyślnie!";
    } catch (mysqli_sql_exception $exception) {
        
        mysqli_rollback($conn);
        $_SESSION['error_message'] =  "Błąd przy usuwaniu użytkownika: " . $exception->getMessage();
    }
}

// Funkcja do wyświetlania rankingu graczy
function displayRanking($conn) {
    $sql = "SELECT id, firstname, lastname, matches_won, sets_won, user_id FROM Players ORDER BY matches_won DESC, sets_won DESC";
    $result = $conn->query($sql);
    
    $getUserQuery = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
    $userResult = mysqli_query($conn, $getUserQuery);
    $user = mysqli_fetch_assoc($userResult);
    $loggedUserId = $user['id'];

    if ($result->num_rows > 0) {
        $place = 1;
        echo "<table><tr><th>Miejsce</th><th>Imię</th><th>Nazwisko</th><th>Wygrane mecze</th><th>Wygrane sety</th></tr>";
        while($row = $result->fetch_assoc()) {
            $rowClass = $row["user_id"] == $loggedUserId ? "class='favorite'" : "";
            echo "<tr $rowClass><td>".$place."</td><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["matches_won"]."</td><td>".$row["sets_won"]."</td></tr>";
            $place++;
        }
        echo "</table>";
    } else {
        echo "Brak";
    }
}


?>

