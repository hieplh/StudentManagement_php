<?php
include "features/student_management/controller/StudentGet.php";
?>

<html lang="vi">
<head>
    <title>Student Management</title>
    <link rel="stylesheet" href="asset/homepage.css"/>
</head>
<body>
<h1 style="text-align: center">Student Management</h1>

<table id="tb-student">
    <thead>
    <tr>
        <th class="tb-header-cell">No.</th>
        <th class="tb-header-cell">Name</th>
        <th class="tb-header-cell">Dob</th>
        <th class="tb-header-cell">Gender</th>
        <th class="tb-header-cell">Address</th>
        <th class="tb-header-cell">Class</th>
        <th class="tb-header-cell" colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($_GET["errMsg"])) {
        if (!empty($_GET["errStatus"]) && $_GET["errStatus"] == 1) {
            echo "<h3 style='color: forestgreen'>{$_GET["errMsg"]}</h3>";
        } else {
            echo "<h3 style='color: red'>{$_GET["errMsg"]}</h3>";
        }
    }

    if (!empty($list)) {
        foreach ($list as $item) {
            foreach ($item as $student) {
                ?>
                <tr>
                    <form method="post" action="features/student_management/controller/StudentUpdate.php">
                        <td>
                            <label><?php echo $student->getId() ?></label>
                            <input type="hidden" name="id" value="<?php echo $student->getId() ?>"/>
                        </td>
                        <td>
                            <input type="text" name="fullname" value="<?php echo $student->getName() ?>"/>
                        </td>
                        <td>
                            <input type="date" name="dob" value="<?php echo $student->getDob() ?>"/>
                        </td>
                        <td>
                            <input type="text" name="address" value="<?php echo $student->getGender() ?>"/>
                        </td>
                        <td>
                            <input type="text" name="gender" value="<?php echo $student->getAddress() ?>"/>
                        </td>
                        <td>
                            <input type="text" name="class" value="<?php echo $student->getClass() ?>"/>
                        </td>
                        <td>
                            <input type="submit" value="Update"/>
                        </td>
                    </form>
                    <form method="get" action="features/student_management/controller/StudentDelete.php">
                        <td>
                            <input type="hidden" name="id" value="<?php echo $student->getId() ?>"/>
                            <input id="tb-body-delete-btn" type="submit" value="Delete"
                                   onclick="return confirm('Are you want to delete this student?')"/>
                        </td>
                    </form>
                </tr>
                <?php
            }
        }
    }
    ?>
    <tr>
        <form method="post" action="features/student_management/controller/StudentCreate.php">
            <td></td>
            <td>
                <input type="text" name="fullname" placeholder="student's name"/>
            </td>
            <td>
                <input type="date" name="dob" placeholder="student's day of birth"/>
            </td>
            <td>
                <input type="text" name="gender" placeholder="student's gender"/>
            </td>
            <td>
                <input type="text" name="address" placeholder="student's address"/>
            </td>
            <td>
                <input type="text" name="class" placeholder="student's class"/>
            </td>
            <td>
                <input type="submit" value="Create"/>
            </td>
        </form>
    </tr>
    </tbody>
</table>
</body>
</html>
