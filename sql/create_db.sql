create database advAssets;

use advAssets;

CREATE TABLE `User`(
    `id_user` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `surname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `user_image` BLOB NULL
);

CREATE TABLE `Publication`(
    `id_pub` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `desc` VARCHAR(255) NULL,
    `url` VARCHAR(255) NOT NULL,
    `dimension` INT NOT NULL,
    `format` INT NOT NULL,
    FOREIGN KEY (`user_id`)
        REFERENCES `User` (`id_user`)
        ON DELETE CASCADE
);

CREATE TABLE `Image`(
    `id_img` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `pub_id` INT UNSIGNED NOT NULL,
    `image_file` BLOB NOT NULL,
    FOREIGN KEY (`pub_id`)
        REFERENCES `Publication` (`id_pub`)
        ON DELETE CASCADE
);


