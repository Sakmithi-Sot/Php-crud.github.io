<?php
include "config.php";
$query = mysqli_query($conn, "SELECT * FROM users");

// Handle success/error messages
$message = '';
$message_type = '';

if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case 'added':
            $message = 'User added successfully!';
            $message_type = 'success';
            break;
        case 'updated':
            $message = 'User updated successfully!';
            $message_type = 'success';
            break;
        case 'deleted':
            $message = 'User deleted successfully!';
            $message_type = 'success';
            break;
    }
}

if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'add_failed':
            $message = 'Failed to add user. Please try again.';
            $message_type = 'error';
            break;
        case 'update_failed':
            $message = 'Failed to update user. Please try again.';
            $message_type = 'error';
            break;
        case 'delete_failed':
            $message = 'Failed to delete user. Please try again.';
            $message_type = 'error';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <h1>User list</h1>

        <?php if ($message): ?>
            <div class="message <?php echo $message_type; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <a href="add.php">Add user</a>
        <table>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            <?php
            $no = 1;
            while ($user = mysqli_fetch_assoc($query)):
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['phone']) ?></td>
                    <td><?= htmlspecialchars($user['address']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $user['id'] ?>">Edit</a>
                        <a href="action.php?id=<?= $user['id'] ?>" class="btn-delete"
                            onclick="return confirm('Are you sure you want to delete user?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile;
            ?>
        </table>
    </div>
</body>

</html>