<?php
$hideHeader = true;
include_once './php/header.php';
?>
<body>
    <main id="auth-page" class="auth-page-login">
        <div class="auth_container">
            <div class="auth-textblock">
                <h2>Вход</h2>
                <p>Для продолжения работы на сайте вам необходимо войти в аккаунт.</p>
                <span>Нет аккаунта?<a href="vk.com" class="goToReg"> Регистрация.</a></span>
            </div>
            <form action="./php/scripts/auth.php" method="post" enctype="multipart/form-data">
                <input type="email" name="email" id="email" placeholder="Почта">
                <input type="password" name="password" id="password" placeholder="Пароль">
                <input type="hidden" name="auth" value="login">
                <button type="submit">Продолжить</button>
                <p>Нажимая кнопку "Продолжить", я даю согласие на обработку своих персональных данных в соответствии с Условиями</p>
            </form>
        </div>
    </main>
    <main id="auth-page" class="auth-page-reg" style="display: none; position: absolute;">
        <div class="auth_container">
            <div class="auth-textblock">
                <h2>Регистрация</h2>
                <p>Для продолжения работы на сайте вам необходимо зарегистрировать аккаунт.</p>
                <span>Есть аккаунт?<a href="" class="goToLogin"> Войти.</a></span>
            </div>
            <form action="./php/scripts/auth.php" method="post" enctype="multipart/form-data">
                <input type="text" name="name" id="name" placeholder="Имя">
                <input type="text" name="surname" id="" placeholder="Фамилия">
                <input type="email" name="email" id="" placeholder="Почта">
                <input type="email" name="number" id="" placeholder="Телефон">
                <input type="password" name="password" id="" placeholder="Пароль">
                <input type="password" name="password" id="" placeholder="Подтверждение">
                <input type="hidden" name="auth" value="reg">
                <button type="submit">Продолжить</button>
                <p>Нажимая кнопку "Продолжить", я даю согласие на обработку своих персональных данных в соответствии с Условиями</p>
            </form>
        </div>
    </main>
</body>

<script>
    $('.goToLogin').click(function(e) {
    e.preventDefault();
    $('.auth-page-reg').css('display', 'none'); 
    $('.auth-page-reg').css('position', 'absolute');
    
    $('.auth-page-login').css('display', 'flex'); 
    $('.auth-page-login').css('position', 'static'); 
})

$('.goToReg').click(function(e) {
    e.preventDefault();
    $('.auth-page-login').css('display', 'none'); 
    $('.auth-page-login').css('position', 'absolute');
    
    $('.auth-page-reg').css('display', 'flex'); 
    $('.auth-page-reg').css('position', 'static'); 
})
</script>