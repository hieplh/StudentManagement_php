<?php

namespace student_management\controller;
require '../Student.php';
require '../StudentDAO.php';

use student_management\Student;
use student_management\StudentDAO;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $class = $_POST['class'];

    $student = new Student();
    $student->setId($id)
        ->setName($fullname)
        ->setDob($dob)
        ->setGender($gender)
        ->setAddress($address)
        ->setClass($class);

    $dao = new StudentDAO();
    $dao->update($student);
}

header("Location: ../../../index.php?errMsg=Update Success&errStatus=1");