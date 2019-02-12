<?php

//database connection parameters
$host = '127.0.0.1';
$db   = 'databaseConnectivityDB';
$user = 'admin';
$pass = 'admin';
$charset = 'utf8mb4';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {

   //set a new DB connection with mysqli
   $db = new mysqli($host, $user, $pass, $db);
   $db->set_charset($charset);

   //query the exads table in order to get all results > display them
   $stmt = $db->query('SELECT name, age, job_title FROM exads_test');
   if (!$stmt) {
      die('Database Error: ' . $db->error);
   }
   while ($row = $stmt->fetch_assoc()) {
      echo print_r($row, true);
   }
   $stmt->free();

   //insert a new row into the exads table
   // prepare and bind the new vals
   $stmt = $db->prepare("INSERT INTO exads_test (name, age, job_title) VALUES (?, ?, ?)");
   $stmt->bind_param("sis", $name, $age, $job_title);
   // set parameters and execute
   $name = "Armando Santiago";
   $age = 36;
   $email = "Web Developer";
   $stmt->execute();
   $stmt->free();

   $db->close();
} catch (\mysqli_sql_exception $e) {
   throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
}

//after comments:
/**
 * I've placed in this one file the DB connection and the query's that the exercise requested but
 * I know that the DB connection and the parameters would never be place accessible from a normal php page
 * Usually I use Laravel 5.7 and the eloquent DB model in my work
 * 
 */