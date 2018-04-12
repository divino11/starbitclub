<!-- login modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-login">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-body">
                    <p class="login-title">Авторизация</p>
                    <form action="/login" method="post">
                        <input type="email" class="field-login" name="email" placeholder="Ваш email">
                        <input type="password" class="field-login" name="pass" placeholder="Ваш пароль">
                        <button class="btn-login" type="submit" name="log_in">Войти</button>
                    </form>
                    <p class="login-no-accaunt">У вас еще нет аккаунта? <a
                            href="/registration">Зарегистрироваться</a></p>
                </div>
            </div>
        </div>
    </div>
</div>