-- Active: 1667369221976@@127.0.0.1@8111@talkativeu_db
CREATE DATABASE talkativeu_db
    DEFAULT CHARACTER SET = 'utf8mb4';

USE DATABASE talkativeu_db

CREATE TABLE `murid` (
    `id` INT (5) AUTO_INCREMENT,
    `nama` VARCHAR (25),
    `kelas` VARCHAR (1),
    `alamat` VARCHAR (50),
    PRIMARY KEY(id)
);

ALTER TABLE `murid`
ADD `status` VARCHAR (225); 

SELECT * FROM `murid`;


INSERT INTO murid VALUES (1, "Erwina", "A", "Jl. Telkom 5 Blok C2 No. 132", "Aktif");

INSERT INTO murid VALUES (2, "Master Sof", "B", "Sahabat", "Aktif")
