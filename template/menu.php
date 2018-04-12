<div class="my-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <a href="/"><img class="logo-menu" src="../img/logo-new.png" alt="logo menu"></a>
            </div>
            <div class="col-md-9 col-menu centered">
                <ul>
                    <li><a href="/" class="menu-point">Главная</a></li>
                    <li><a href="/review">Отзывы</a></li>
                    <li><a href="/posts">Новости</a></li>
                    <li><a href="/registration">Присоединится</a></li>
                    <?php if (isset($_SESSION['id'])) {
                        $id_ses = $_SESSION['id']; ?>
                        <li>
                            <a class="gradient-menu" href="lk"><img
                                        class="menu-people" src="../img/people-menu.png" alt="">Войти
                                в кабинет
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a data-toggle="modal" data-target="#myModal" class="gradient-menu"><img
                                        class="menu-people" src="../img/people-menu.png" alt="">Войти
                                в кабинет
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-2">
                <a href="https://www.instagram.com/bitcoin_stars/"><img class="social-menu" src="../img/insta.png" alt="instagram"></a>
                <a href="https://www.youtube.com/channel/UCPx7Yj8ra7FKTwEmG5SNiRw?view_as=subscriber"><img class="social-menu" src="../img/yt.png" alt="youtube"></a>
                <a href="https://vk.com/bitcoinstars"><img class="social-menu" src="../img/vk.png" alt="vk"></a>
            </div>
        </div>
    </div>
</div>