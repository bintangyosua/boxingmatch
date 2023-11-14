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
    }

    .nav-items>*+* {
        margin-left: 50px;
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
            <a href="#">Home</a>
            <a href="#">Jadwal Pertandingan</a>
            <a href="#">User</a>
            <a href="#"><button class="logout">Logout</button></a>
        </div>

    </div>
</nav>