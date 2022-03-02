<?php
$email='mikko.mieleva@gmail.com';
function email_validation($str) { 
	return (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
		? FALSE : TRUE; 
} 

// Function call 
if(!email_validation($email)) { 
	echo "Invalid email address."; 
} 
else { 
	echo "Valid email address."; 
} 

?> 
