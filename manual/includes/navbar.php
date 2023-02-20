<nav class="navbar navbar-expand-lg" style="background-color: #55198B !important;">
    <a class=" navbar-brand" href="index.php">SARVAGNYA 2K22</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <hr style="background-color:#fff !important;">
        <ul class="navbar-nav ml-auto pr-4">
            <li class="nav-item px-2 mt-1">
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF'])=="index.php")?"active":""; ?>"
                    href="index.php"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
                    Dashboard</a>
            </li>

            <li class="nav-item px-2 mt-1">
                <a class="nav-link <?= (basename($_SERVER['PHP_SELF'])=="transactions.php")?"active":""; ?>"
                    href="transactions.php"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;
                    Transactions</a>
            </li>
            <li class="nav-item px-2  mt-1">
                <form action="code.php" method="POST">
                    <button type="submit" name="logout" class="btn btn-outline-white" href="#">Logout</button>
                </form>

            </li>
        </ul>
    </div>
</nav>