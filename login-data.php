<?php

function selectUser($conn, $username, $password)
{
    $query = "SELECT * FROM user WHERE username = :username"; 
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':username', $username);
	  // $stmt->bindValue(':user_ID', $user_id);
    $stmt->execute();
	
	/*
	   if ($stmt->num_rows == 1){

            echo "That username already exists.";
            exit;

            }
*/
    if ($row = $stmt->fetch(PDO::FETCH_OBJ))
    {

        if (md5($password) == $row->password) {  
            $_SESSION['username'] = $username;
			//$_SESSION["user_ID"] = $user_id;
			$_SESSION['user_ID'] = $row->user_ID;
			$_SESSION['surname'] = $row->surname;
			$_SESSION['firstname'] = $row->firstname;
			$_SESSION['occupation'] = $row->occupation;
			$_SESSION['company'] = $row->company;
            echo "Welcome, you are now logged in as " . $username; 
            return true;
        }
       
        return false; 
    }
    else
    {
	
        //echo "Your details were not found";
        return false;
    }
}


function selectNew($conn, $name, $surname, $username, $password, $occupation,$company)
{
    
    
    $query = "INSERT INTO user VALUES (NULL, :firstname, :surname, :username, :password, :occupation, :company)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':firstname', $name);
	$stmt->bindValue(':surname', $surname);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':occupation', $occupation);
	$stmt->bindValue(':company', $company);

    $affected_rows = $stmt->execute();
    
    if ($affected_rows == 1) {
        
        return true;
    } else {
        return false;
    }
}



?>