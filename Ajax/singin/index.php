<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
?>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div class="box">
                <div class="shape1"></div>
                <div class="shape2"></div>
                <div class="shape3"></div>
                <div class="shape4"></div>
                <div class="shape5"></div>
                <div class="shape6"></div>
                <div class="shape7"></div>
                <div class="float">
                    <form class="form" action="" id="singin_ajax_form">
                        <div class="form-group">
                            <label for="username" class="text-white">Логин:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white">Пароль:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="button" name="submit" class="btn btn-info btn-md" value="Авторизация"
                                   id="btn-singin">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="singin-result"></div>
        <script>
            /* Article FructCode.com */
            $(document).ready(function () {
                $("#btn-singin").click(
                    function () {
                        sendAjaxForm('singin-result', 'singin_ajax_form', '/ajax/singin_ajax_form.php');
                        return false;
                    }
                );
            });

            function sendAjaxForm(result_form, ajax_form, url) {
                $.ajax({
                    url: url, //url страницы (action_ajax_form.php)
                    type: "POST", //метод отправки
                    dataType: "html", //формат данных
                    data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
                    success: function (response) { //Данные отправлены успешно
                        result = $.parseJSON(response);
                        $('#'+result_form).html('Имя пользователя: ' + result.username + '<br>Пароль: ' + result.password);
                    },
                    error: function (response) { // Данные не отправлены
                        $('#'+result_form).html('Ошибка. Данные не отправленны.');
                    }
                });
            }
        </script>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>