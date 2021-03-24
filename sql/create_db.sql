create database advAssets;

use advAssets;

CREATE TABLE `Users`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(20) NOT NULL,
    `surname` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(180) NOT NULL,
    `user_image` LONGBLOB NULL
);

CREATE TABLE `Publication`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `desc` VARCHAR(500) NULL,
    `url` VARCHAR(100) NOT NULL,
    `dimension` INT NOT NULL,
    `format` INT NOT NULL,
    FOREIGN KEY (`user_id`)
        REFERENCES `Users` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `Image`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `pub_id` INT UNSIGNED NOT NULL,
    `image_file` LONGBLOB NOT NULL,
    FOREIGN KEY (`pub_id`)
        REFERENCES `Publication` (`id`)
        ON DELETE CASCADE
);


ALTER TABLE `users` ADD `created_at` TIMESTAMP NULL AFTER `user_image`, ADD `updated_at` TIMESTAMP NULL AFTER `created_at`, ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;

ALTER TABLE `publication` ADD `created_at` TIMESTAMP NULL AFTER `format`, ADD `updated_at` TIMESTAMP NULL AFTER `created_at`, ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;

ALTER TABLE `image` ADD `created_at` TIMESTAMP NULL AFTER `image_file`, ADD `updated_at` TIMESTAMP NULL AFTER `created_at`, ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;