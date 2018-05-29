<?php 

//********** TOTAL VIOLATION OF THE MONTH ******************
$query_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_violation = mysqli_num_rows($query_total_violation);

//********** TOTAL COUNT OF MALE COMMITED A VIOLATION IN MONTH ******************
$query_total_male = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE gen = 'male' AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_count_of_male = mysqli_num_rows($query_total_male);

//********** TOTAL COUNT OF FEMALE COMMITED A VIOLATION IN MONTH ******************
$query_total_female = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE gen = 'female' AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_count_of_female = mysqli_num_rows($query_total_female);

//********** TOTAL COUNT OF MINOR VIOLATION IN MONTH ******************

$query_total_minor = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE v_type = 'minor' AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_count_of_minor = mysqli_num_rows($query_total_minor);

//********** TOTAL COUNT OF MAJOR VIOLATION IN MONTH ******************
$query_total_major = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE v_type = 'major' AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_count_of_major = mysqli_num_rows($query_total_major);