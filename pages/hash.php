<?php

if (isset($_POST['password'])) {

    $password = $_POST['password'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    echo "<h3>Generated Hash:</h3>";
    echo "<textarea rows='4' cols='80'>$hash</textarea>";
}

?>

<form method="POST">
    <label>Enter Password:</label><br>
    <input type="text" name="password" required>
    <br><br>
    <button type="submit">Generate Hash</button>
</form>