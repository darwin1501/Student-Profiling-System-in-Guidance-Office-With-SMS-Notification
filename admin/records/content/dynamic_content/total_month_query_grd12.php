<?php 
// ########### GRADE 12 ###############

//********** TOTAL VIOLATION OF THE MONTH ******************
$query_total_violation_GRD12 = mysqli_query($con, "SELECT * FROM std_violation WHERE v_grd = 12 AND v_date BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_violation_GRD12 = mysqli_num_rows($query_total_violation_GRD12);

//********** TOTAL COUNT OF MALE IN GRADE COMMITED A VIOLATION IN MONTH ******************
$query_total_male_GRD12 = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE gen = 'male'AND v_grd = 12 AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_count_of_male_GRD12 = mysqli_num_rows($query_total_male_GRD12);

//********** TOTAL COUNT OF FEMALE COMMITED A VIOLATION IN MONTH ******************
$query_total_female_GRD12 = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE gen = 'female'AND v_grd = 12 AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_count_of_female_GRD12 = mysqli_num_rows($query_total_female_GRD12);


//********** TOTAL COUNT OF MINOR VIOLATION IN MONTH ******************

$query_total_minor_GRD12 = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE v_type = 'minor' AND v_grd = 12 AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
// count the result
$total_count_of_minor_GRD12 = mysqli_num_rows($query_total_minor_GRD12);

//********** TOTAL COUNT OF MAJOR VIOLATION IN MONTH ******************
//
$query_total_major_GRD12 = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE v_type = 'major' AND v_grd = 12 AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
// count the result
$total_count_of_major_GRD12 = mysqli_num_rows($query_total_major_GRD12);