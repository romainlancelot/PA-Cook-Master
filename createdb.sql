CREATE DATABASE cookmaster;

USE cookmaster;

CREATE TABLE clients (
  client_id INT PRIMARY KEY AUTO_INCREMENT,
  client_email VARCHAR(255) NOT NULL,
  client_firstname VARCHAR(255) NOT NULL,
  client_lastname VARCHAR(255) NOT NULL,
  client_address VARCHAR(255),
  client_phone VARCHAR(20),
  client_password VARCHAR(255) NOT NULL,
  subscription_id INT,
  date_of_birth DATE,
  FOREIGN KEY (subscription_id) REFERENCES subscriptions(subscription_id)
);

CREATE TABLE subscriptions (
  subscription_id INT PRIMARY KEY AUTO_INCREMENT,
  subscription_name VARCHAR(255) NOT NULL,
  subscription_duration INT NOT NULL,
  subscription_price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE quotes_invoices (
  quote_invoice_id INT PRIMARY KEY AUTO_INCREMENT,
  client_id INT NOT NULL,
  quote_invoice_date DATE NOT NULL,
  quote_invoice_amount DECIMAL(10, 2) NOT NULL,
  quote_invoice_status ENUM('pending', 'paid', 'cancelled') NOT NULL,
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

CREATE TABLE events (
  event_id INT PRIMARY KEY AUTO_INCREMENT,
  event_name VARCHAR(255) NOT NULL,
  event_description TEXT NOT NULL,
  event_date DATE NOT NULL,
  event_duration TIME NOT NULL,
  event_price DECIMAL(10, 2) NOT NULL,
  room_id INT NOT NULL,
  service_id INT NOT NULL,
  FOREIGN KEY (room_id) REFERENCES rooms(room_id),
  FOREIGN KEY (service_id) REFERENCES services(service_id)
);

CREATE TABLE reservations (
  reservation_id INT PRIMARY KEY AUTO_INCREMENT,
  client_id INT NOT NULL,
  event_id INT NOT NULL,
  reservation_date DATE NOT NULL,
  number_of_people INT NOT NULL,
  reservation_status ENUM('pending', 'confirmed', 'cancelled') NOT NULL,
  FOREIGN KEY (client_id) REFERENCES clients(client_id),
  FOREIGN KEY (event_id) REFERENCES events(event_id)
);

CREATE TABLE rooms (
  room_id INT PRIMARY KEY AUTO_INCREMENT,
  room_name VARCHAR(255) NOT NULL,
  room_description TEXT NOT NULL,
  room_capacity INT NOT NULL,
  room_price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE equipment (
  equipment_id INT PRIMARY KEY AUTO_INCREMENT,
  equipment_name VARCHAR(255) NOT NULL,
  equipment_description TEXT NOT NULL,
  equipment_price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE services (
  service_id INT PRIMARY KEY AUTO_INCREMENT,
  service_name VARCHAR(255) NOT NULL,
  service_description TEXT NOT NULL,
  service_price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE product_sales (
  product_sale_id INT PRIMARY KEY AUTO_INCREMENT,
  client_id INT NOT NULL,
  product_sale_date DATE NOT NULL,
  product_sale_amount DECIMAL(10, 2) NOT NULL,
  product_sale_status ENUM('pending', 'paid', 'cancelled') NOT NULL,
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);
