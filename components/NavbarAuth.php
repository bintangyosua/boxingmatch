<style>
    .nav {
        font-size: large;
        padding: 20px 0;
        height: 3%;
        display: grid;
        place-items: center;
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: auto;
        padding: 0 5px;
        max-width: 1000px;
        width: 95%;
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
            <a href="index.php">
                <img src="./assets/images/galang-boxing.png" class="galang-boxing" alt="">
            </a>
        </div>
    </div>
</nav>