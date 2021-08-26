<?php 
//connect and select the database 
$connect = mysql_connect("localhost","root","") or die('Database Not Connected. Please Fix the Issue! ' . mysql_error());
mysql_select_db("jsondb", $connect);
// get the contents of the JSON file $jsonCont = file_get_contents('studJson.json');
//decode JSON data to PHP array $content = json_decode($jsonCont, true);
//Fetch the details of Student $std_id = $content['stdID'];
$std_name = $content['stdData']['stdName'];
$std_age = $content['stdData']['stdAge'];
$std_gender = $content['stdData']['stdGender'];
$std_no = $content['stdData']['stdNo'];
$std_street = $content['stdData']['stdAddress']['stdStreet'];
$std_city = $content['stdData']['stdAddress']['stdCity'];
$std_country = $content['stdData']['stdAddress']['stdCountry'];
$std_postal = $content['stdData']['stdAddress']['stdPostal'];
$std_dept = $content['stdEdu']['stdDept'];
$std_sem = $content['stdEdu']['stdSemester'];
$std_major = $content['stdEdu']['stdMajor'];
//Insert the fetched Data into Database 

$query = "INSERT INTO stdtable
 (std_id, std_name, std_age,
  std_gender, std_num, std_street, std_city, std_country, std_postal, std_dept, std_semstr, std_major)
   VALUES('$std_id', '$std_name', '$std_age', '$std_gender', '$std_no', '$std_street', '$std_city', '$std_country', '$std_postal', '$std_dept', '$std_sem', '$std_major')";
echo $query; die;

if(!mysqli_query($query,$connect)) { 
 die('Error : Query Not Executed. Please Fix the Issue! ' . mysql_error());
} else{ 
 echo "Data Inserted Successully!!!";
} 
?>