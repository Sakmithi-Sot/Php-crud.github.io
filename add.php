<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper">
            <h1>Add User</h1>
            <form method="POST" action="action.php">
                <input type="text" name="name" placeholder="Name" required maxlength="255" minlength="2">
                <input type="email" name="email" placeholder="Email" required maxlength="255">
                <input type="text" name="phone" placeholder="Phone (optional)" maxlength="20">
                <textarea name="address" placeholder="Address" required maxlength="1000" minlength="10"></textarea>
                <div class="btn-box">
                    <button type="submit" class="btn" name="add">Submit</button>
                    <a href="crud.php" class="btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
</body>

</html>