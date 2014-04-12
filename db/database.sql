/* scripts para criação do banco de dados */
DROP DATABASE IF EXISTS mvc;

CREATE DATABASE mvc;

\c mvc;

CREATE TABLE contacts (
  id SERIAL PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP
);

CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(50) NOT NULL,
  created_at TIMESTAMP
);

CREATE TABLE admins (
  id SERIAL PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(50) NOT NULL,
  created_at TIMESTAMP
);

CREATE TABLE roomCategories (
  id SERIAL PRIMARY KEY,
  name VARCHAR(50) NOT NULL UNIQUE,
  created_at TIMESTAMP
);

CREATE TABLE rooms (
  id SERIAL PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  price NUMERIC NOT NULL,
  category_id INTEGER REFERENCES roomCategories(id) ON DELETE RESTRICT,
  created_at TIMESTAMP
);

CREATE TABLE roomPhotos (
  id SERIAL PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  type VARCHAR(50) NOT NULL,
  size VARCHAR(50) NOT NULL,

  room_id INTEGER REFERENCES rooms(id) ON DELETE RESTRICT,
  created_at TIMESTAMP
);

insert into admins (name, email, password, created_at) values ('Admin', 'admin@admin.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', CURRENT_TIMESTAMP); /* Password: 123*/

