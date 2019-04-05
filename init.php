<?php
include("config.php");
$sql = 'CREATE Database majestic';
$val = 	mysqli_query($conn,$sql);
if( mysqli_errno($conn) == 0 || mysqli_errno($conn) == 1007){
	echo "30";
	mysqli_select_db($conn,'majestic');
	echo mysqli_errno($conn);
	$sql = 'CREATE TABLE ADMIN('.
		   'username VARCHAR(30) NOT NULL, '.
		   'password VARCHAR(30) NOT NULL, '.
		   'primary key (username))';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn);
	$sql = 'CREATE TABLE LAWYER('.
		   'id VARCHAR(30) NOT NULL, '.
		   'name VARCHAR(30) NOT NULL, '.
		   'email_id VARCHAR(30) NOT NULL, '.
		   'password VARCHAR(30) NOT NULL, '.
		   'license_no VARCHAR(30) NOT NULL, '.
		   'employment VARCHAR(30) NOT NULL, '.
		   'date_of_joining DATE NOT NULL, '.
		   'primary key (id))';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn);
	$sql = 'CREATE TABLE CLIENT('.
		   'id VARCHAR(30) NOT NULL, '.
		   'lawyer_id VARCHAR(30) references LAWYER(id), '.
		   'case_id VARCHAR(30) NOT NULL, '.
		   'password VARCHAR(30) NOT NULL, '.
		   'name VARCHAR(30) NOT NULL, '.
		   'address VARCHAR(130) NOT NULL, '.
		   'email_id VARCHAR(30) NOT NULL, '.
		   'contact_no INT NOT NULL, '.
		   'primary key (id))';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn).mysqli_error($conn);
	$sql = 'CREATE TABLE CASES('.
		   'id VARCHAR(30) NOT NULL, '.
		   'lawyer_id VARCHAR(30) references LAWYER(id), '.
		   'client_id VARCHAR(30) references CLIENT(id), '.
		   'type VARCHAR(30) NOT NULL, '.
		   'name VARCHAR(30) NOT NULL, '.
		   'primary key (id))';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn);
	$sql = 'CREATE TABLE VISITOR('.
	       'name VARCHAR(30) NOT NULL, '.
	       'email_id VARCHAR(30) NOT NULL, '.
	       'lawyer VARCHAR(30) NOT NULL, '.
	       'query VARCHAR(130) NOT NULL) UNIQUE';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn);
	$sql = 'CREATE TABLE CASE_HISTORY('.
	       'case_id VARCHAR(30) references CASES(id), '.
	       'case_history VARCHAR(256) NOT NULL)';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn);
	$sql = 'CREATE TABLE PENDING('.
	       'lawyer_id VARCHAR(30) references LAWYER(id), '.
	       'case_id VARCHAR(30) references CASES(id), '.
	       'priority VARCHAR(30) NOT NULL)';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn);
	$sql = 'CREATE TABLE CASE_STATUS('.
	       'case_id VARCHAR(30) references CASES(id), '.
	       'status VARCHAR(30) NOT NULL)';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn);
	$sql = 'CREATE TABLE CASE_TRANSACTIONS('.
	       'lawyer_id VARCHAR(30) references LAWYER(id), '.
	       'case_id VARCHAR(30) references CASES(id), '.
	       'client_id VARCHAR(30) references CLIENT(id), '.
	       'start_date DATE NOT NULL, '.
	       'billable_hours DOUBLE NOT NULL, '.
	       'id VARCHAR(30) NOT NULL, '.
	       'rate INT NOT NULL,'.
	       'primary key (id))';
	$value = mysqli_query($conn,$sql);
	echo  mysqli_errno($conn);
	$sql = 'CREATE TABLE CASE_VERDICT('.
		   'case_id VARCHAR(30) references CASES(id), '.
		   'lawyer_id VARCHAR(30) references LAWYER(id), '.
		   'verdict VARCHAR(30) NOT NULL)';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn);
	$sql = 'CREATE TABLE CASE_FEEDBACK('.
		   'case_id VARCHAR(30) references CASES(id), '.
		   'lawyer_id VARCHAR(30) references LAWYER(id), '.
		   'feedback VARCHAR(256) NOT NULL)';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn);
	$sql = 'CREATE TABLE CALENDAR('.
		   'lawyer_id VARCHAR(30) references LAWYER(id), '.
		   'case_id VARCHAR(30) UNIQUE, '.
		   'date_of_hearing DATE NOT NULL, '.
		   'priority VARCHAR(30) NOT NULL)';
	$value = mysqli_query($conn,$sql);
	echo mysqli_errno($conn);
	$sql = "INSERT INTO ADMIN (username,password) VALUES ('root','')";
	$val = mysqli_query($conn,$sql);
}

?>