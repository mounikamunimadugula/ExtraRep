create database Extrarep;
use Extrarep;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  age INT,
  weight DECIMAL(5,2),
  email VARCHAR(255) ,
  health_report VARCHAR(255)
);
