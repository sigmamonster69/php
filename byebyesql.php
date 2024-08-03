<?php
function sanitizeInput($data) {
  
    $data = trim($data);
    
    $data = stripslashes($data);
  
    $data = htmlspecialchars($data);
    return $data;
}

function validateUsername($username) {
    // Check if a username is empty
    if (empty($username)) {
        return "Username is required.";
    }
  
    if (!preg_match("/^[a-zA-Z0-9]{3,20}$/", $username)) {
        return "Username must be 3-20 characters long and can only contain letters and numbers.";
    }
    return true;
}

function validatePassword($password) {
    // Check if the password is empty
    if (empty($password)) {
        return "Password is required.";
    }
    // Check if the password is at least 8 characters long
    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long.";
    }
    return true;
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);

    // Validate inputs
    $usernameValidation = validateUsername($username);
    $passwordValidation = validatePassword($password);

    if ($usernameValidation !== true) {
        echo $usernameValidation; // Output validation error for username
    } elseif ($passwordValidation !== true) {
        echo $passwordValidation; // Output validation error for password
    } else {
       //if it works it will pass!! we hope.......
        include 'userconnections.php'; 

      // I kept it simple and just made it to prepare for basics sql nonsense to avoid the rest!!
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
}
?>
