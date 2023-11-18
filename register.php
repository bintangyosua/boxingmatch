<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/auth.css">
</head>

<body>
    <?php include "./components/NavbarAuth.php" ?>
    <section class="main">
        <div class="card">
            <h1>REGISTRASI</h1>
            <hr />
            <div class="input-field">
                <div class="input-row">
                    <div class="input-label">
                        <span>
                            <img src="./assets/images/svgs/profile.svg" width="20px" alt="">
                            <span>Your name</span>
                        </span>
                        <span>:</span>
                    </div>
                    <div class="input-data">
                        <input type="text" name="" id="" placeholder="First Name">
                        <input type="text" name="" id="" placeholder="Last Name">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-label">
                        <span>
                            <img src="./assets/images/svgs/username.svg" width="20px" alt="">
                            <span>Username</span>
                        </span>
                        <span>:</span>
                    </div>
                    <div>
                        <input type="text" name="" id="" placeholder="Input username">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-label">
                        <span>
                            <img src="./assets/images/svgs/email.svg" width="20px" alt="">
                            <span>Email</span>
                        </span>
                        <span>:</span>
                    </div>
                    <div>
                        <input type="text" name="" id="" placeholder="Input email">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-label">
                        <span>
                            <img src="./assets/images/svgs/password.svg" width="20px" alt="">
                            <span>Password</span>
                        </span>
                        <span>:</span>
                    </div>
                    <div>
                        <input type="text" name="" id="" placeholder="Input password">
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>