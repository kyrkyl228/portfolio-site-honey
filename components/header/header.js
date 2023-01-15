$('#head__container').html(`
<div class="menu" id="menu">
    <div class="menu__back" id="menu__back">
        <div class="menu__content" id="menu__content">
            <div class="menu__top">
                <p class="menu__logo">MIEL DE FLEUR</p>
                <div class="menu__close" id="menu__close"></div>
            </div>
            <nav class="menu__navigation">
                <a class="menu__navigation-p" href="pages/honey.php"><p class="menu__navigation-a">О компании</p></a>
                <a class="menu__navigation-p"><p class="menu__navigation-a">Способы оплаты</p></a>
                <a class="menu__navigation-p"><p class="menu__navigation-a">Обратная связь</p></a>
                <a class="menu__navigation-p"><p class="menu__navigation-a">Контакты</p></a>
                <a href="pages/honey.php" class="menu__navigation-p"><p class="menu__navigation-a">Мед</p></a>
                <a href="honey/pages/basket.html" class="menu__navigation-p"><p class="menu__navigation-a">Корзина</p></a>
            </nav>
        </div>
    </div>
</div>
<header class="head">
    <div class="head__center">
        <div class="logo" onclick="location.href='index.html';">
            <!-- Заменить на img -->
            <div class="logo__img"></div>
            <!--  -->
            <div class="logo__text">
                <div class="logo__name">Miel de fleur</div>
                <div class="product">Эко-мёд по европейским стандартам</div>
            </div>
        </div>
        <nav class="navigation">
            <div class="navigation__drop">
                <a href="" class="navigation__about">О компании</a>
                <ul class="navigation__drop-list">
                    <div class="navigation__margin navigation__menu">
                        <a href="">Способы оплаты</a>
                        <a href="">Обратная связь</a>
                    </div>
                </ul>                        
            </div>
            <a href="" class="navigation__hidden">Контакты</a>
            <a href="pages/honey.php" class="navigation__hidden">Мед</a>
            <a href="pages/basket.php" class="navigation__hidden">Корзина</a>
            <div class="navigation__more" style="display: none;">
                <div class="navigation__more_menu" style="display: none;">
                    <div class="navigation__more_menu-margin navigation__menu">
                        <a href="">Контакты</a>
                        <a href="pages/honey.php">Мед</a>
                        <a href="pages/basket.php">Корзина</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="number">
            <p class="number__text">
                8 (982) 500-00-00
                <br>8 (982) 500-00-00
            </p>
            <div class="number__back">
                <div class="number__img"></div>
            </div>
        </div>
        <div class="head__menu" id="head__menu" style="display: none;"></div>    
    </div>
</header>
`);