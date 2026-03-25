<?php
session_start();
include '../includes/db.php';

$id = $_GET['id'];

$conn->query("DELETE FROM Programmes WHERE ProgrammeID=$id");

header("Location: programmes.php");
exit();