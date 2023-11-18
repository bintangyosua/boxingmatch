<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/auth.css">
</head>

<body>
    <?php include "./components/NavbarAuth.php" ?>
    <section class="main">
        <div class="card">
            <h1>LOGIN</h1>
            <hr />
            <div class="input-field">
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
                            <img src="./assets/images/svgs/password.svg" width="20px" alt="">
                            <span>Password</span>
                        </span>
                    </div>
                    <div class="input-colon">:</div>
                    <div class="input-data input-data-password">
                        <input type="text" name="" id="" placeholder="Input password">
                    </div>
                </div>
                <div class="input-row submit">
                    <hr>
                    <button>Login</button>
                    <hr>
                </div>
            </div>
        </div>
        <div>Belum punya akun? <a href="register.php"><b>Daftar Disini !</b></a></div>
    </section>
</body>

</html>