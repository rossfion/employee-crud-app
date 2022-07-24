<?php
require_once 'includes/DB.php';
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <title>Employee Management CRUD Application | View From Database</title>
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
                /*width: 1000px;*/
                margin: 12px 360px;

            }
        </style>

        <meta name="theme-color" content="#fafafa">
    </head>

    <body>

        <!-- Add your site or application content here -->
        <div class="container">
            <fieldset>
                <form action="view.php" method="get">
                    <input type="text" name="Search" value="" placeholder="Search by name/SSN" />
                    <input type="submit" name="SubmitSearch" value="Search Records" />
                </form>
            </fieldset>
            <?php
            if (isset($_GET["SubmitSearch"])) {
                global $connectDB;
                $search = $_GET["Search"];
                $sql = "SELECT * FROM employee_record WHERE employee_name = :searcH OR social_security_number = :searcH";
                $stmt = $connectDB->prepare($sql);
                $stmt->bindValue(':searcH', $search);
                $stmt->execute();
                while ($rows = $stmt->fetch()) {
                    $ID = $rows['employee_id'];
                    $employee_name = $rows['employee_name'];
                    $SSN = $rows['social_security_number'];
                    $department = $rows['department'];
                    $salary = $rows['salary'];
                    $home_address = $rows['home_address'];
                    ?>
                    <table class="table-bordered table-hover table-responsive">
                        <caption class="text-center">Search Results</caption>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>SSN</th>
                            <th>Department</th>
                            <th>Salary</th>
                            <th>Home Address</th>
                            <th>Search Again</th>
                        </tr>
                        <tr>
                    <td><?php echo $ID; ?></td>
                    <td><?php echo $employee_name; ?></td>
                    <td><?php echo $SSN; ?></td>
                    <td><?php echo $department; ?></td>
                    <td><?php echo $salary; ?></td>
                    <td><?php echo $home_address; ?></td>
                    <td><a href="view.php">Search Again</a></td>
                </tr>
                    </table>

                <?php
                }
            }
            ?>


            <table class="table-bordered table-hover table-responsive">
                <caption class="text-center">View From Database</caption>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>SSN</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>Home Address</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                
                <?php
                global $connectDB;
                $sql = "SELECT * FROM employee_record";
                $stmt = $connectDB->query($sql);
                while ($rows = $stmt->fetch()) {
                    $ID = $rows['employee_id'];
                    $employee_name = $rows['employee_name'];
                    $SSN = $rows['social_security_number'];
                    $department = $rows['department'];
                    $salary = $rows['salary'];
                    $home_address = $rows['home_address'];
                    ?>
                    <tr>
                        <td><?php echo $ID; ?></td>
                        <td><?php echo $employee_name; ?></td>
                        <td><?php echo $SSN; ?></td>
                        <td><?php echo $department; ?></td>
                        <td><?php echo $salary; ?></td>
                        <td><?php echo $home_address; ?></td>
                        <td><a href="update.php?id=<?php echo $ID; ?>">Update</a></td>
                        <td><a href="delete.php?id=<?php echo $ID; ?>">Delete</a></td>
                    </tr>
<?php } ?>
            </table>
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