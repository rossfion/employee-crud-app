<?php
require_once 'includes/DB.php';
$search_query_parameter = $_GET["id"];
if (isset($_POST['Submit'])) {
    $employee_name = $_POST['employee_name'];
    $social_security_number = $_POST['social_security_number'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $home_address = $_POST['home_address'];
    global $connectDB;
    $sql = "DELETE FROM employee_record WHERE employee_id='$search_query_parameter' LIMIT 1";
    $stmt = $connectDB->query($sql);
    $execute = $stmt->execute();
    if ($execute) {
        echo '<script>window.open("view.php?id=Record Deleted Successfully", "_self")</script>';
    } else {
        echo '<div class="alert alert-danger text-center">Something went wrong. Please try again.</div>';
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <title>Employee Management CRUD Application | Delete Record</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:title" content="">
        <meta property="og:type" content="">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            .container{
                width: 500px;
                margin: 12px 360px;

            }
        </style>

        <meta name="theme-color" content="#fafafa">
    </head>

    <body>
        <?php
        global $connectDB;
        $sql = "SELECT * FROM employee_record WHERE employee_id = '$search_query_parameter'";
        $stmt = $connectDB->query($sql);
        while ($rows = $stmt->fetch()) {
            $ID = $rows['employee_id'];
            $employee_name = $rows['employee_name'];
            $social_security_number = $rows['social_security_number'];
            $department = $rows['department'];
            $salary = $rows['salary'];
            $home_address = $rows['home_address'];
        }
        ?>
        <div class="container">
            <form action="delete.php?id=<?php echo $search_query_parameter; ?>" method="post">
                <div class="form-group">
                    <label for="employee_name">Employee Name</label>
                    <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Employee Name" value="<?php echo $employee_name; ?>">
                </div>
                <div class="form-group">
                    <label for="social_security_number">Social Security Number</label>
                    <input type="text" class="form-control" name="social_security_number" id="social_security_number" placeholder="Social Security Number" value="<?php echo $social_security_number; ?>">
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" name="department" id="department" placeholder="Department" value="<?php echo $department; ?>">
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" class="form-control" name="salary" id="salary" placeholder="Salary" value="<?php echo $salary; ?>">
                </div>
                <div class="form-group">
                    <label for="home_address">Home Address</label>
                    <textarea class="form-control" rows=8 cols=80 name="home_address" id="home_address" placeholder="Home Address"><?php echo $home_address; ?></textarea>
                </div>                
                <button type="submit" name="Submit" class="btn btn-primary">Delete Record</button>
            </form>

        </div>
        <script src="js/vendor/modernizr-3.11.2.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.min..js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga = function () {
                ga.q.push(arguments)
            };
            ga.q = [];
            ga.l = +new Date;
            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('set', 'anonymizeIp', true);
            ga('set', 'transport', 'beacon');
            ga('send', 'pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async></script>
    </body>

</html>