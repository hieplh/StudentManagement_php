<?php

namespace student_management\controller;

require 'features/student_management/Student.php';
require 'features/student_management/StudentDAO.php';

use student_management\StudentDAO;

$dao = new StudentDAO();
$list = $dao->getAll();