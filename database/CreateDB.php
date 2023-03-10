<?php

namespace database;

class CreateDB extends Database
{
    private $createTableQueries = [
        "CREATE TABLE `users` (
            `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `username` VARCHAR(191) NOT NULL,
            `email` VARCHAR(191) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `permission` ENUM('user','admin') NOT NULL DEFAULT 'user',
            `verify_token` VARCHAR(255) DEFAULT NULL,
            `is_active` TINYINT(4) NOT NULL DEFAULT 0,
            `forgot_token` VARCHAR(255) DEFAULT NULL,
            `forgot_token_expire` VARCHAR(255) DEFAULT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY (`email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",

        "CREATE TABLE `categories` (
            `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(120) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",

        "CREATE TABLE `menus` (
            `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(120) NOT NULL,
            `url` VARCHAR(255) NOT NULL,
            `parent_id` INT(10) UNSIGNED DEFAULT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",

        "CREATE TABLE `banners` (
            `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `image` text NOT NULL,
            `url` VARCHAR(255) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",

        "CREATE TABLE `posts` (
            `id` bigINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(191) NOT NULL,
            `summary` text NOT NULL,
            `body` text NOT NULL,
            `view` INT(11) NOT NULL DEFAULT 0,
            `user_id` INT(11) UNSIGNED NOT NULL,
            `cat_id` INT(11) UNSIGNED NOT NULL,
            `image` text NOT NULL,
            `status` ENUM('enable','disable') NOT NULL DEFAULT 'disable',
            `selected` TINYINT(4) NOT NULL DEFAULT 0,
            `breaking_news` TINYINT(4) NOT NULL DEFAULT 0,
            `published_at` DATETIME NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",

        "CREATE TABLE `comments` (
            `id` bigINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `user_id` INT(10) UNSIGNED NOT NULL,
            `post_id` bigINT(10) UNSIGNED NOT NULL,
            `comment` text NOT NULL,
            `status` ENUM('unseen','seen','approved') NOT NULL DEFAULT 'unseen',
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",

        "CREATE TABLE `setting` (
            `id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) DEFAULT NULL,
            `keywords` text DEFAULT NULL,
            `description` text DEFAULT NULL,
            `icon` text DEFAULT NULL,
            `logo` text DEFAULT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;"
    ];

    private $tableInitializes = [
        [
            'table' => 'users',
            'fields' => ['username', 'email', 'password', 'permission'],
            'values' => ['غزاله علی پور', 'qazalealipour@yahoo.com', '$2y$10$XI721kvg8PVYIIxZJPqA1e0xpjJ2pPEXwXKLT.hWaIa9G1WTXZvqi', 'admin']
        ]
    ];

    public function run()
    {
        foreach ($this->createTableQueries as $createTableQuery) {
            $this->createTable($createTableQuery);
        }
        foreach ($this->tableInitializes as $tableInitialize) {
            $this->insert($tableInitialize['table'], $tableInitialize['fields'], $tableInitialize['values']);
        }
    }
}