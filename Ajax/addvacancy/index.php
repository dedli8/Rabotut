<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

    <div class="add-vacancy-wrap">
        <div class="vacancy-row">
            <form class="add-vacancy" id="addvacancy_ajax_form">
                <h4 class="text-center mb-3">Добавление/редактирование вакансий</h4>
                <div class="vacancy-row">
                    <label class='vacancy-form-label' for="name-input" class="vacancy-form-label">Наименование</label>
                    <div class="input-wrap">
                        <input type="text" class="vacancy-form-control" name="name" value="Введите наименование" id="name-input">
                    </div>
                </div>
                <div class="vacancy-row">
                    <label class='vacancy-form-label' for="category-select">Категория</label>
                    <div class="input-wrap">
                        <select class="vacancy-select vacancy-form-control wide wide" id="category-select" name="category">
                            <option>Юриспруденция</option>
                            <option>Бухгалтер</option>
                            <option>Программист</option>
                            <option>Строитель</option>
                        </select>
                    </div>
                </div>
                <div class="vacancy-row">
                    <label class='vacancy-form-label' for="city-select">Город</label>
                    <div class="input-wrap">
                        <select class="vacancy-select vacancy-form-control wide" id="city-select" name="city">
                            <option>Киев</option>
                            <option>Харьков</option>
                            <option>Львов</option>
                            <option>Ивано-Франковск</option>
                        </select>
                    </div>
                </div>
                <div class="vacancy-row">
                    <label class='vacancy-form-label' for="description">Описание</label>
                    <div class="input-wrap">
                        <textarea id="description" class="vacancy-form-control" aria-label="With textarea" name="description"></textarea>
                    </div>
                </div>
                <div class="vacancy-row">
                    <label class='vacancy-form-label' for="employment-type-select">Тип занятости</label>
                    <div class="input-wrap">
                        <select class="vacancy-select vacancy-form-control wide" id="employment-type-select" name="type">
                            <option>Полная</option>
                            <option>Частичная</option>
                            <option>Удаленная работа</option>
                            <option>Почасовая</option>
                        </select>
                    </div>
                </div>
                <div class="vacancy-row">
                    <label class='vacancy-form-label' for="sum-input">Сумма от</label>
                    <div class="input-wrap">
                        <input class="vacancy-form-control" type="text" value="0" id="sum-input" name="sum">
                    </div>
                </div>
                <div class="vacancy-row">
                    <label class='vacancy-form-label' for="interview-site">Место проведения собеседования</label>
                    <div class="input-wrap">
                        <input class="vacancy-form-control" type="text" value="ул. Пушкинская, 40" id="interview-site" name="place">
                    </div>
                </div>
                <button type="button" class="btn-info" id="addvacancy-btn">Сохранить</button>
            </form>
        </div>
    </div>
    <br>

    <div id="addvacancy_result_form"><div>
            <script>
                /* Article FructCode.com */
                $( document ).ready(function() {
                    $("#addvacancy-btn").click(
                        function(){
                            sendAjaxForm('addvacancy_result_form', 'addvacancy_ajax_form', '/ajax/addvacancy_ajax_form.php');
                            return false;
                        }
                    );
                });

                function sendAjaxForm(result_form, ajax_form, url) {
                    $.ajax({
                        url:     url, //url страницы (action_ajax_form.php)
                        type:     "POST", //метод отправки
                        dataType: "html", //формат данных
                        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
                        success: function(response) { //Данные отправлены успешно
                            const result = $.parseJSON(response);
                            $('#'+result_form).html('Имя: '+result.name+'<br>Категория: '+result.category+'<br>Город: '+result.city+'<br>Описание: '+result.description
                                +'<br>Тип занятости: '+result.type+'<br>Сумма: '+result.sum+'<br>Место проведения собеседования: '+result.place);
                        },
                        error: function(response) { // Данные не отправлены
                            $('#'+result_form).html('Ошибка. Данные не отправленны.');
                        }
                    });
                }
            </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>