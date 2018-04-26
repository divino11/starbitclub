<ul style="display: none;">
    <li><a href="/" class="menu-point">Главная</a></li>
    <li><a href="/review">Отзывы</a></li>
    <li><a href="/posts">Новости</a></li>
    <li><a href="/registration">Присоединится</a></li>
    <?php if (isset($_SESSION['id'])) {
        $id_ses = $_SESSION['id']; ?>
        <li><a class="gradient-menu" href="lk">Войти в кабинет</a></li>
    <?php } else { ?>
        <li><a data-toggle="modal" data-target="#myModal" class="gradient-menu">Войти в кабинет</a></li>
    <?php } ?>
</ul>