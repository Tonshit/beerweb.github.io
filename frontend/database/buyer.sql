CREATE DATABASE buyers_db;

USE buyers_db;

CREATE TABLE buyers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    number VARCHAR(20) NOT NULL,
    totalPrice DECIMAL(10, 2) NOT NULL
);