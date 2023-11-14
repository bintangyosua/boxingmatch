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
                <table>
                    <tr>
                        <td></td>
                        <td><label for="name">Your Name</label></td>
                        <td>:</td>
                        <td>
                            <div style="display: flex;">
                                <input type="text" name="" id="name">
                                <input type="text" name="">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><label for="username">Username</label></td>
                        <td>:</td>
                        <td><input type="text" name="username" id="username"></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</body>

</html>