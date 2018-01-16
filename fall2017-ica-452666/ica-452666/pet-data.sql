CREATE DATABASE petdb;
CREATE TABLE `users` ( `username` VARCHAR(50) NOT NULL , `hashed_password` VARCHAR(255) NOT NULL , PRIMARY KEY (`username`)) ENGINE = InnoDB;
CREATE TABLE `pets` ( `id` MEDIUMINT NOT NULL AUTO_INCREMENT , `username` VARCHAR(50) NOT NULL , `species` ENUM('fish','dog','turtle','pet rock','wolf') NOT NULL , `name` VARCHAR(50) NOT NULL , `filename` VARCHAR(150) NOT NULL , `weight` DECIMAL(4,2) NOT NULL , `description` TINYTEXT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
Query OK, 0 rows affected (0.00 sec)
ALTER TABLE `pets` ADD INDEX(`username`);
ALTER TABLE `pets` ADD CONSTRAINT `constraint-1` FOREIGN KEY (`username`) REFERENCES `users`(`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;