<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>GUS Education - Course Enquiry</title>
</head>
<body class="body">
<?php
$dbhost = "localhost:3308";
$dbuser = "root";
$dbpass = "1234";
$db = "gus";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

if($conn->connect_error)
{
    die('Connection Failed');
}

$sql = "SELECT first_name, last_name, email, comments FROM enquiries ORDER BY created_on DESC ";
$result = mysqli_query($conn,$sql);
?>

<div style="border-bottom: 2px solid #13131f;"><img src='./arden%20university.PNG' class='img-thumbnail' style="border : 0; padding: unset; border-bottom: #11588b"/></div><br>
<div class='container' style="background-color: #e4d2e4; border-bottom: 3px #e4d2e4;">
    <h3 style='color : #11588b'>Enquiries</h3>
    <div class="accordion" id="accordionExample">
        <?php
        $i=1;
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card">
                <div class="card-header" id="heading<?php echo $i; ?>">
                    <h2 class="mb-0">
                        <button class="btn btn-link <?php if($i>1) echo "collapsed"; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i==1) ? 'true': 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
                            <?php echo $row['first_name']." ".$row['last_name']; ?>
                        </button>
                    </h2>
                </div>
                <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i==1) echo 'show'; ?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php echo $row['comments']; ?>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
</div>
<br>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

