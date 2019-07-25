<?php
require_once('conn.php');

$id = $_GET['id'];

$sql = "DELETE FROM yorene_comments WHERE id = ? ";
$statement = $conn->prepare($sql);
$statement->bind_param("i", $id);
$statement->execute();
