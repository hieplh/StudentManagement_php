<?php
namespace db_config;

use PDO;
use PDOException;

class MysqlConfig {

    private string $url;
    private string $username;
    private string $password;
    private PDO $con;

    function __construct(string $url = "mysql:host=host.docker.internal;port=3306;dbname=STUDENT_MANAGEMENT",
                                string $username = "root",
                                string $password = "root") {
        $this->url = $url;
        $this->username = $username;
        $this->password = $password;
        $this->con = self::openConnection();
        self::initTable();
    }

    private function openConnection() : PDO {
        $con = new PDO($this->url, $this->username, $this->password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    }

    protected function closeConnection() : void {
        if (!empty($this->con)) {
            $this->con = null;
        }
    }

    private function initTable() : void {
        $sql = "CREATE TABLE IF NOT EXISTS student (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              fullname VARCHAR(30) NOT NULL,
              dob VARCHAR(30) NOT NULL,
              gender VARCHAR(10) NOT NULL,
              address VARCHAR(500),
              class VARCHAR(30) NOT NULL
              )";

        try {
            $this->con->exec($sql);
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return PDO
     */
    public function getCon(): PDO
    {
        return $this->con;
    }
}