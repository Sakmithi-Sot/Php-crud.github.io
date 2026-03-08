<?php
include "config.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper">
            <h1>Edit User</h1>
            <form method="POST" action="action.php?id=<?= $user['id'] ?>">
                <input type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($user['name']) ?>"
                    required maxlength="255" minlength="2">
                <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($user['email']) ?>"
                    required maxlength="255">
                <input type="text" name="phone" placeholder="Phone (optional)"
                    value="<?= htmlspecialchars($user['phone']) ?>" maxlength="20">
                <textarea name="address" placeholder="Address" required maxlength="1000"
                    minlength="10"><?= htmlspecialchars($user['address']) ?></textarea>
                <div class="btn-box">
                    <button type="submit" class="btn" name="update">Update</button>
                    <a href="crud.php" class="btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
</body>

</html>