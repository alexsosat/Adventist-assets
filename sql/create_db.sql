drop database advassets;

create database advAssets;

use advAssets;

CREATE TABLE `Users`(
    `id` INT(100) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(20) NOT NULL,
    `surname` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(180) NOT NULL,
    `user_image` varchar(80) NULL
);

CREATE TABLE `Dimension`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(10) NOT NULL
);

CREATE TABLE `Format`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(10) NOT NULL
);


CREATE TABLE `Publication`(
    `id` INT(100) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT(100) UNSIGNED NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `desc` VARCHAR(500) NULL,
    `url` VARCHAR(100) NOT NULL,
    `dimension` INT unsigned NOT NULL,
    `format` INT unsigned NOT NULL,
    FOREIGN KEY (`user_id`)
        REFERENCES `Users` (`id`)
        ON DELETE CASCADE,
	 FOREIGN KEY (`dimension`)
        REFERENCES `Dimension` (`id`)
        ON DELETE CASCADE,
	FOREIGN KEY (`format`)
        REFERENCES `Format` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `Image`(
    `id` INT(100) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `pub_id` INT(100) UNSIGNED NOT NULL,
    `image_file`  varchar(80) NOT NULL,
    FOREIGN KEY (`pub_id`)
        REFERENCES `Publication` (`id`)
        ON DELETE CASCADE
);


ALTER TABLE `users` ADD `created_at` TIMESTAMP NULL AFTER `user_image`, ADD `updated_at` TIMESTAMP NULL AFTER `created_at`, ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;

ALTER TABLE `publication` ADD `created_at` TIMESTAMP NULL AFTER `format`, ADD `updated_at` TIMESTAMP NULL AFTER `created_at`, ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;

ALTER TABLE `image` ADD `created_at` TIMESTAMP NULL AFTER `image_file`, ADD `updated_at` TIMESTAMP NULL AFTER `created_at`, ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;

ALTER TABLE `publication` ADD `visual_archive` VARCHAR(80) NULL AFTER `format`;