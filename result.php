<?php
$con=new mysqli("[HOST]","[USERNAME]","[PASSWORD]","[DB_NAME]");
$stmt=$con->prepare("SELECT * FROM `votes`");
$stmt->execute();
$result=$stmt->get_result();
$win=array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>vote system2</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>TEAM&nbsp;</th>
                    <th>NO.OF VOTES</th>
                </tr>
            </thead>
            <tbody>
            <?php
        while($row=$result->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row['team'];?></td>
                    <td><?php echo $row['vote'];?></td>
                </tr>
                <?php array_push($win,$row['vote']);} $stmt->close(); ?>
                <tr>
                    <td>winner of vote</td>
                    <td><?php echo max($win);?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>