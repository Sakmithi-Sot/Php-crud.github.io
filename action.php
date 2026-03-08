<?php
include "config.php";
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, phone, address) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $address);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: crud.php?success=added");
        exit;
    } else {
        header("Location: crud.php?error=add_failed");
        exit;
    }
    mysqli_stmt_close($stmt);
}

if (isset($_POST['update'])) {
    $id = (int) $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];


    $stmt = mysqli_prepare($conn, "UPDATE users SET name=?, email=?, phone=?, address=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $phone, $address, $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: crud.php?success=updated");
        exit;
    } else {
        header("Location: crud.php?error=update_failed");
        exit;
    }
    mysqli_stmt_close($stmt);
}
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "DELETE FROM users WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: crud.php?success=deleted");
        exit;
    } else {
        header("Location: crud.php?error=delete_failed");
        exit;
    }
    mysqli_stmt_close($stmt);
}
?>