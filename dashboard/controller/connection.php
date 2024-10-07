<?php

$con = new mysqli('localhost', 'root', '', 'viktolex_schl');

if (!$con) {
    die("Connection Error to database".mysqli_connect_error($con));
}