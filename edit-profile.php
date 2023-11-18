<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/auth.css">
</head>

<body>
    <?php include "./components/Navbar.php" ?>
    <section class="main">
        <div class="card">
            <h1>Edit Profile</h1>
            <hr />
            <div class="input-field">
                <div class="input-row">
                    <div class="input-label">
                        <span>
                            <img src="./assets/images/svgs/profile.svg" width="20px" alt="">
                            <span>Your name</span>
                        </span>
                    </div>
                    <div class="input-colon">:</div>
                    <div class="input-data input-data-name">
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
                    </div>
                    <div class="input-colon">:</div>
                    <div class="input-data">
                        <input type="text" name="" id="" placeholder="Input username">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-label">
                        <span>
                            <img src="./assets/images/svgs/email.svg" width="20px" alt="">
                            <span>Email</span>
                        </span>
                    </div>
                    <div class="input-colon">:</div>
                    <div class="input-data">
                        <input type="text" name="" id="" placeholder="Input email">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-label">
                        <span>
                            <img src="./assets/images/svgs/password.svg" width="20px" alt="">
                            <span>Password</span>
                        </span>
                    </div>
                    <div class="input-colon">:</div>
                    <div class="input-data input-data-password">
                        <input type="text" name="" id="" placeholder="Input password">
                        <input type="text" name="" id="" placeholder="Confirm your password">
                    </div>
                </div>
                <div class="input-row submit">
                    <button>Simpan</button>
                </div>
            </div>
        </div>
    </section>
</body>

</html>