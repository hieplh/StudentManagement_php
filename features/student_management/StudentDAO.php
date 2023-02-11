<?php

namespace student_management;

require dirname(__DIR__)."/db_config/MysqlConfig.php";
include dirname(__DIR__)."/util/Log.php";

use db_config\MysqlConfig;
use PDO;
use PDOException;

class StudentDAO extends MysqlConfig {

    /**
     * @param string $id
     * @return Student
     */
    public function get(string $id) : Student {
        try {
            $sql = "SELECT * FROM student WHERE id = ?";
            $stmt = parent::getCon()->prepare($sql);
            $stmt->execute(array($id));

            if ($stmt->rowCount() > 0) {
                $rs = $stmt->fetch(PDO::FETCH_ASSOC);
                $obj = new Student();
                $obj->setId($rs["id"])
                    ->setName($rs["name"])
                    ->setDob($rs["dob"])
                    ->setGender($rs["gender"])
                    ->setAddress($rs["address"])
                    ->setClass($rs["class"]);
                return $obj;
            }
        } catch (PDOException) {}
        return new Student();
    }

    /**
     * @return array<Student>
     */
    public function getAll() : array {
        $result = array();
        try {
            $sql = "SELECT * FROM student";
            $stmt = parent::getCon()->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($rs as $row) {
                    $obj = new Student();
                    $obj->setId($row["id"])
                        ->setName($row["fullname"])
                        ->setDob($row["dob"])
                        ->setGender($row["gender"])
                        ->setAddress($row["address"])
                        ->setClass($row["class"]);
                    $result[] = [$obj];
                }
                return $result;
            }
        } catch (PDOException) {}
        return $result;
    }

    /**
     * @param Student $input
     * @return void
     */
    public function create(Student $input) : void {
        try {
            self::getCon()->beginTransaction();
            $params = array(
                $input->getName(),
                $input->getDob(),
                $input->getGender(),
                $input->getAddress(),
                $input->getClass()
            );
            $sql = "INSERT INTO student(fullname, dob, gender, address, class) VALUES (?, ?, ?, ?, ?)";
            $stmt = parent::getCon()->prepare($sql);
            $stmt->execute($params);
            self::getCon()->commit();
        } catch (PDOException) {
            self::getCon()->rollBack();
        }
    }

    /**
     * @param Student $input
     * @return void
     */
    public function update(Student $input) : void {
        try {
            self::getCon()->beginTransaction();
            $params = array(
                $input->getId(),
                $input->getName(),
                $input->getDob(),
                $input->getGender(),
                $input->getAddress(),
                $input->getClass()
            );
            $sql = "
            INSERT INTO student(id, fullname, dob, gender, address, class) VALUES (?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE 
            fullname = VALUES(fullname), dob = VALUES(dob), gender = VALUES(gender), 
            address = VALUES(address), class = VALUES(class)
            ";
            $stmt = parent::getCon()->prepare($sql);
            $stmt->execute($params);
            self::getCon()->commit();
        } catch (PDOException) {
            self::getCon()->rollBack();
        }
    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id) : void {
        try {
            self::getCon()->beginTransaction();
            $sql = "DELETE FROM student WHERE id = ?";
            $stmt = parent::getCon()->prepare($sql);
            $stmt->execute(array($id));
            self::getCon()->commit();
        } catch (PDOException) {
            self::getCon()->rollBack();
        }
    }
}