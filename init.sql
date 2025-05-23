-- init.sql

CREATE TABLE people (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20)
);

INSERT INTO people (name, email, phone) VALUES
('Alice', 'alice@example.com', '123-456-7890'),
('Bob', 'bob@example.com', '987-654-3210'),
('Eve', 'eve@example.com', '555-555-5555');

-- Tabela de login
CREATE TABLE login (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(100)
);

INSERT INTO login (username, password) VALUES
('admin', 'admin123'),
('bob', 'bobpass'),
('alice', 'alicepass');
