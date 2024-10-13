-- Owners Table
CREATE TABLE Owners (
owner_id INT PRIMARY KEY AUTO_INCREMENT,
first_name VARCHAR(50) NOT NULL,
last_name VARCHAR(50) NOT NULL,
email VARCHAR(100) UNIQUE NOT NULL,
phone_number VARCHAR(15),
address VARCHAR(255)
) ENGINE=InnoDB;

-- Vehicles Table
CREATE TABLE Vehicles (
vehicle_id INT PRIMARY KEY AUTO_INCREMENT,
owner_id INT,
make VARCHAR(50) NOT NULL,
model VARCHAR(50) NOT NULL,
year INT NOT NULL,
vin_number VARCHAR(20) UNIQUE NOT NULL,
current_mileage INT,
last_service_date DATE,
FOREIGN KEY (owner_id) REFERENCES Owners(owner_id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Service Centers Table
CREATE TABLE Service_Centers (
center_id INT PRIMARY KEY AUTO_INCREMENT,
center_name VARCHAR(100) NOT NULL,
location VARCHAR(255) NOT NULL,
contact_number VARCHAR(15),
email VARCHAR(100) UNIQUE,
services_offered TEXT
) ENGINE=InnoDB;


-- Service Records Table
CREATE TABLE Service_Records (
service_id INT PRIMARY KEY AUTO_INCREMENT,
vehicle_id INT,
center_id INT,
service_date DATE NOT NULL,
service_type VARCHAR(50) NOT NULL,
cost DECIMAL(10, 2),
service_details TEXT,
FOREIGN KEY (vehicle_id) REFERENCES Vehicles(vehicle_id) ON DELETE CASCADE,
FOREIGN KEY (center_id) REFERENCES Service_Centers(center_id) ON DELETE CASCADE
) ENGINE=InnoDB;


-- Maintenance Alerts Table
CREATE TABLE Maintenance_Alerts (
alert_id INT PRIMARY KEY AUTO_INCREMENT,
vehicle_id INT,
alert_date DATE NOT NULL,
alert_type VARCHAR(50) NOT NULL,
description TEXT,
status VARCHAR(10) NOT NULL,
FOREIGN KEY (vehicle_id) REFERENCES Vehicles(vehicle_id) ON DELETE CASCADE
);