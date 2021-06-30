<nav class="top-nav">
    <ul>
        <li>
            <a href="/index">Home</a>
        </li>
        <li>
            <a href="/about">About</a>
        </li>
        <li>
            <a href="/projects">Projects</a>
        </li>
        <li>
            <a href="/posts">Blog</a>
        </li>
        <li>
            <a href="/contact">Contact</a>
        </li>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="/logout">Log out</a>
            <?php else : ?>
                <a href="/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>