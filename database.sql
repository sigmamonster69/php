CREATE DATABASE my_database;

USE my_database;

-- Creates a  user
CREATE USER 'username'@'host' IDENTIFIED BY 'password';

-- Creates a  users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- grant privileges to the user
GRANT ALL PRIVILEGES ON my_database.* TO 'username'@'host';


FLUSH PRIVILEGES;
