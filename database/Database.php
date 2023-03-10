<?php

namespace database;

use PDO;
use PDOException;

class Database
{
    private $connection;
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ];

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD, $this->options);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function createTable($sql)
    {
        try {
            $this->connection->exec($sql);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insert($tableName, $fields, $values)
    {
        try {
            $sql = "INSERT INTO " . $tableName . " (" . implode(', ', $fields) . ", created_at) VALUES (:" . implode(', :', $fields) . ", NOW())";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_combine($fields, $values));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function select($sql, $values = null)
    {
        try {
            $stmt = $this->connection->prepare($sql);
            if ($values === null) {
                $stmt->execute();
            } else {
                $stmt->execute($values);
            }
            $result = $stmt;
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($tableName, $fields, $values, $id)
    {
        $sql = "UPDATE " . $tableName . " SET ";
        foreach (array_combine($fields, $values) as $field => $value) {
            if ($value) {
                $sql .= $field . " = ?, ";
            } else {
                $sql .= $field . " = NULL, ";
            }
        }
        $sql .= "updated_at = NOW() WHERE id = ?";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_merge(array_filter(array_values($values)), [$id]));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($tableName, $id)
    {
        try {
            $sql = "DELETE FROM " . $tableName . " WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}