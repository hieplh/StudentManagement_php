<?php

namespace student_management\controller;
require '../Student.php';
require '../StudentDAO.php';

use student_management\StudentDAO;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $dao = new StudentDAO();
    $dao->delete($id);
}

header("Location: ../../../index.php?errMsg=Delete Success&errStatus=2");