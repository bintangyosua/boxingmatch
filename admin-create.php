<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Create</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
</head>

<body>
    <?php include "./components/Navbar.php" ?>
    <div class="container">
        <div class="card">
            <h1>New Schedule</h1>
            <a href="admin-jadwal.php">
                <button class="back-schedules">Back to Schedules</button>
            </a>
            <form action="" class="form">
                <div class="row">
                    <label for="">Player 1</label>
                    <span>:</span>
                    <input type="text" name="" id="">
                </div>
                <div class="row">
                    <label for="">Player 2</label>
                    <span>:</span>
                    <input type="text" name="" id="">
                </div>
                <div class="row">
                    <label for="">Datetime</label>
                    <span>:</span>
                    <input type="datetime-local" name="" id="">
                </div>
                <div class="row">
                    <input type="submit" value="Insert">
                </div>
            </form>
        </div>
    </div>
</body>

</html>