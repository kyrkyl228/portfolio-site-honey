<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="../css/basket.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/null.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <script src="../js/footer-js/footer-pos.js"></script>
    <script src="../js/AJAX/basket-create.js"></script>
    <script src="../js/AJAX/basket-change-product.js"></script>
    <title>Document</title>
</head>
<body>
    <script>
        // Отправка данных на сервер
        function send(event, php){
            console.log("Отправка запроса");
            event.preventDefault ? event.preventDefault() : event.returnValue = false;
            var req = new XMLHttpRequest();
            req.open('POST', php, true);
            req.onload = function() {
                if (req.status >= 200 && req.status < 400) {
                json = JSON.parse(this.response); // Ебанный internet explorer 11
                    console.log(json);
                    
                    // ЗДЕСЬ УКАЗЫВАЕМ ДЕЙСТВИЯ В СЛУЧАЕ УСПЕХА ИЛИ НЕУДАЧИ
                    if (json.result == "success") {
                        // Если сообщение отправлено
                        alert("Сообщение отправлено");
                        setTimeout(location.href="index.html", 2000)
                    } else {
                        // Если произошла ошибка
                        alert("Ошибка. Сообщение не отправлено");
                    }
                // Если не удалось связаться с php файлом
                } else {alert("Ошибка сервера. Номер: "+req.status);}}; 
            
            // Если не удалось отправить запрос. Стоит блок на хостинге
            req.onerror = function() {alert("Ошибка отправки запроса");};
            req.send(new FormData(event.target));
        }
    </script>
    <div class="blackout__wrapper">
        <div class="blackout" id="blackout">
            <div class="blockout__center" id="blockout__center">
                <form class="modal-buy" method="post" onsubmit="send(event, '../send.php')">
                    <div class="modal-buy__back" id="modal-buy__back-id">
                        <img src="../assets/img/close.png" alt="">
                    </div>
                    <div class="modal-buy__name">
                        <div class="modal-buy__block">
                            <label for="" class="modal-buy__label">Фамилия</label>
                            <input type="text" placeholder="Иванов" class="modal-buy__input" name="lastName">
                        </div>
                        <div class="modal-buy__block">
                            <label for="" class="modal-buy__label">Имя</label>
                            <input type="text" placeholder="Иван" class="modal-buy__input" name="name">
                        </div>
                    </div>
                    <div class="modal-buy__email">
                        <label for="" class="modal-buy__label">Ваша электронная почта</label>
                        <input type="text" placeholder="IvanovIvan1999@mail.ru" class="modal-buy__input modal-buy__input-width" name="email">
                    </div>
                    <div class="modal-buy__address">
                        <label for="" class="modal-buy__label">Ваша домашний адрес</label>
                        <input type="text" placeholder="г. Москва, ул. Солянка, д. 24, кв. 13" class="modal-buy__input modal-buy__input-width" name="add">
                    </div>
                    <div class="modal-buy__message">
                        <label for="" class="modal-buy__label">Ваши пожелания</label>
                        <textarea name="" placeholder="Позвоните нам, когда отправите заказ. Мой номер 8 (982) 500-00-00" id="" class="modal-buy__input modal-buy__input-width modal-buy__input-textarea" name="mes"></textarea>
                    </div>
                    <p class="modal-buy__info">*Заказ будет отправлен после оплаты. Способы оплаты вы можете посмотреть <a href="" class="modal-buy__info-a">в этом разделе</a>. Также эта информация будет на вашей почте. Простите за временные неудобства!</p>
                    <div class="modal-buy__pay">
                        <p class="modal-buy__total-text">Итого к оплате</p>
                        <p class="modal-buy__total" id="modal-buy__total">XXXXX</p>
                    </div>
                    <div class="modal-buy__pay-button-wrapper">
                        <button class="modal-buy__pay-button" id="modal-buy__pay-button" type="submit">Получить данные для оплаты</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>


    <div id="head__container"></div>

    <script src="../components/header/header.js"></script>
    <link rel="stylesheet" href="../components/header/header.css">
    <script src="../js/header-js/header-menu.js"></script>

    <div class="basket">
        <div class="basket__head pos">
            <p>Фото</p>
            <p>Название</p>
            <p>Цена</p>
            <p>Количество</p>
            <p>Стоимость</p>
        </div>
        <?php
            include "../php/basket-list-get.php";
        ?>
    </div>

    <div class="foot__container" id="foot__container"></div>

    <script src="../components/footer/footer.js"></script>
    <link rel="stylesheet" href="../components/footer/footer.css">

    <script src="../js/basket-js/basket-buy.js"></script>

</body>
</html>