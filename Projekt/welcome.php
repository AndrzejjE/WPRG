<h2>Witaj, <?php echo $_SESSION['username']; ?>!</h2>
<a class="logout-link" href="?logout=true">Wyloguj</a>
<a href="export.php">Pobierz tabelę jako CSV</a>
<h2>Zmień wyniki</h2>
<form method="POST" action="">
    <div class="form-group">
        <label>Ilość wygranych meczów:</label>
        <input type="number" name="matches_won" required>
    </div>
    <div class="form-group">
        <label>Ilość wygranych setów:</label>
        <input type="number" name="sets_won" required>
    </div>
    <button type="submit" name="update">Aktualizuj wyniki</button>
</form>
<form method="post" action="delete_user.php">
    <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
    <button type="submit" name="delete">Usuń konto</button>
</form>
