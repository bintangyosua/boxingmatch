<style>
    .nav {
        background-color: #ea3a3a;
        font-size: large;
        padding: 10px 0 25px 0;
        /* display: flex; */
        /* justify-content: center; */
        height: 3%;
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: auto;
        max-width: 1000px;
    }

    .galang-boxing {
        height: 40px;
        filter: brightness(0) invert(1);
    }

    .nav-items {
        text-decoration: inherit;
        display: flex;
        align-items: center;

        & .nav-item {
            display: flex;
            justify-content: center;
            align-items: center;

            & * {
                margin: 0 3px;
            }

            & .logo {
                width: 24px;
                height: 24px;
            }
        }

    }

    .nav-items>*+* {
        margin-left: 10px;
    }

    .nav-items .login {
        background-color: #800000;
    }

    .nav-items .logout {
        background-color: #112e41;
        color: white;
    }
</style>

<nav class="nav">
    <div class="nav-container">
        <div>
            <img src="./assets/images/galang-boxing.png" class="galang-boxing" alt="">
        </div>
        <div class="nav-items">
            <a href="index.php" class="nav-item">
                <img src="./assets/images/svgs/home.svg" width="24px" class="logo" alt="">
                <span>Home</span>
            </a>
            <a href="jadwal-pertandingan.php" class="nav-item">
                <img src="./assets/images/svgs/calendar.svg" width="24px" class="logo" alt="">
                <span>Jadwal Pertandingan</span>
            </a>
            <a href="profile.php" class="nav-item">
                <img src="./assets/images/svgs/username.svg" width="24px" class="logo" alt="">
                <span>User</span>
            </a>
            <a href="#"><button class="login">Login</button></a>
            <a href="#"><button class="logout">Logout</button></a>
        </div>

    </div>
</nav>