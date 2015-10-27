
<?php $f=file_get_contents(dirname($_SERVER['SCRIPT_FILENAME']).'/scripts/config.json'); settype($f, 'string'); $parsed=json_decode($f, true);?>
<?php if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone'])){mail($parsed['mail'], 'Новый заказ!', $_POST['surname'].' '.$_POST['name'].' ('.$_POST['phone'].') заказал(а) портмоне!', "Content-type: text/plain; charset=utf-8;");}?><!DOCTYPE html><!DOCTYPE html>
<html>
  <head>
    <title>Baellerry Italia</title>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/mask.js"></script>
    <script src="styles/bootstrap/js/collapse.js"></script>
    <script src="styles/bootstrap/js/scrollspy.js"></script>
    <script src="styles/bootstrap/js/modals.js"></script>
    <script defer src="scripts/custom.js"></script>
    <script>
      var originalPrice='<?php echo $parsed["original-price"];?>';
      var discount='<?php echo $parsed["discount"];?>';
      var newPrice='<?php echo $parsed["new-price"];?>';
      var discountEndDate='<?php echo $parsed["discount-end"]["date"];?>';
      var discountEndTime='<?php echo $parsed["discount-end"]["time"];?>';
    </script>
    <link rel="stylesheet" href="styles/custom.css">
    <title>Baellerry Italia</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  </head>
  <body data-spy="scroll" data-target="#navbar-collapse-btn" data-offset="50">
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" data-target="#navbar-collapse-btn" data-toggle="collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand">Baellerry Italia</a>
        </div>
        <div id="navbar-collapse-btn" class="collapse navbar-collapse">
          <ul id="nav" class="nav navbar-nav navbar-right">
            <li class="active"><a href="#screen-1">Начало</a></li>
            <li><a href="#screen-2">Описание</a></li>
            <li><a href="#screen-3">Преимущества</a></li>
            <li><a href="#screen-4">Характеристики</a></li>
            <li><a href="#screen-5">Галерея</a></li>
            <li><a href="#screen-6">Магазин</a></li>
            <li><a href="#screen-7">Отзывы</a></li>
            <li><a href="#screen-8">Заказать</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div id="screen-1" class="container-fluid">
      <div class="container">
        <div class="row header">
          <div class="col-md-6 brand">
            <h3 class="brand-secondary">Портмоне-клатч ручной работы</h3>
            <h1 class="brand-primary">Baellerry Italia</h1>
          </div>
          <div class="col-md-3 col-md-offset-3 hidden-sm hidden-xs info">
            <h3>Закажите звонок!</h3>
            <button class="order">Заказать!</button>
          </div>
        </div>
        <div class="row order-box-wrapper">
          <div class="col-md-7 desc-box"><img src="images/purse-5.png" class="sm-hidden">
            <h3>Документы, права, паспорт, деньги, кредитки</h3><span>...и не только - все это спокойно умещается в этом стильном практичном мужском портмоне. Качество и хороший функционал никого не оставит равнодушным!</span>
          </div>
          <div class="col-md-4 col-md-push-1 order-box">
            <h3>Успейте заказать по акции!</h3><span class="original-price"><span class="original-price-value"></span>грн</span><span class="new-price">Новая цена: <span class="new-price-value"></span>грн</span>
            <hr>
            <form id="special-form" method="POST">
              <table>
                <tr>
                  <td class="left"><span>Ваше имя:</span></td>
                  <td class="right">
                    <input id="special-name" name="name" size="18">
                  </td>
                </tr>
                <tr>
                  <td class="left"><span>Ваша фамилия:</span></td>
                  <td class="right">
                    <input id="special-surname" name="surname" size="18">
                  </td>
                </tr>
                <tr>
                  <td class="left"><span>Номер телефона:</span></td>
                  <td class="right">
                    <input id="special-phone" name="phone" size="18">
                  </td>
                </tr>
              </table>
            </form>
            <button id="special-order" class="order">Заказать!</button>
          </div>
        </div>
      </div>
    </div>
    <div id="screen-2" class="container-fluid">
      <div class="container">
        <div class="row header">
          <div class="col-lg-12 brand">
            <h1 class="brand-primary">Baelerry Italia</h1>
            <h3 class="brand-secondary">Прекрасный подарок для ценителя хороших вещей</h3>
          </div>
        </div>
        <div class="row descs">
          <div class="col-md-4 desc-wrapper"><img src="images/purse-1.jpg">
            <h4>Непревзойденное качество</h4><span>100% натуральная кожа и кропотливая ручная работа мастеров, создавших этот шедевр, позволили миру увидеть элегантные и максимально надежные портмоне тончайшей выделки. Все они рассчитаны на длительное ежедневное использование на протяжении многих лет.</span>
          </div>
          <div class="col-md-4 desc-wrapper"><img src="images/purse-2.jpg">
            <h4>Практичность и удобство</h4><span>Портмоне Baellerry Italia отличается надежностью каждого из элементов и приятно на ощупь, что даст вам чувство комфорта на протяжении всего времени его эксплуатации. Комфорт при использовании портмоне возникает благодаря качественному материалу и наличию в нем достаточного количества полезных отделений. Всеми этими качествами обладает портмоне ручной работы Baellerry Italia.</span>
          </div>
          <div class="col-md-4 desc-wrapper"><img src="images/purse-3.jpg">
            <h4>Итальянская изысканность</h4><span>При создании этого портмоне дизайнеры учитывали все современные тренды (цвета и тиснение), а также классические и проверенные временем элементы дизайна высококлассного портмоне (форма, размер, крой).</span>
          </div>
        </div>
        <div class="row order-btn">
          <div class="col lg-12">
            <button class="order">Заказать сейчас!</button>
          </div>
        </div>
      </div>
    </div>
    <div id="screen-3" class="container-fluid">
      <div class="row">
        <div class="col-sm-5 purse-img-wrapper"><img src="images/purse-6.jpg" class="purse-img"></div>
        <div class="col-sm-7 purse-desc-wrapper">
          <h3>У ВАС ПОСТОЯННО НАБИТЫЕ КАРМАНЫ?<br>НИЧЕГО НЕ ПОМЕЩАЕТСЯ?</h3><span>ВЫ ПОСТОЯННО НАБИВАЕТЕ КАРМАНЫ КЛЮЧАМИ ОТ ДОМА, МАШИНЫ, ДЕНЬГАМИ, БАНКОВСКИМИ КАРТОЧКАМИ, ДОКУМЕНТАМИ И ЕЩЕ И МОБИЛЬНЫМ ТЕЛЕФОНОМ?</span><span>НЕ УДОБНО ИСКАТЬ НУЖНЫЕ ВЕЩИ ПО КАРМАНАХ, С КОТОРЫХ ВСЕ ТОРЧИТ И ВЫ ТЕРЯЕТЕСЬ В ОТВЕТСТВЕННЫЕ МИНУТЫ? </span><span>ЭТО ВАС РАЗДРАЖАЕТ И ВЫ ХОТИТЕ ИЗБАВИТЬСЯ ОТ ЭТОЙ ПРОБЛЕМЫ?</span>
          <h4 class="heading">У НАС ЕСТЬ ИДЕАЛЬНОЕ РЕШЕНИЕ ДЛЯ ВАС!</h4><span>СТИЛЬНЫЙ КОЖАНЫЙ КЛАТЧ ПРИДАСТ ВАМ УВЕРЕННОСТИ, ПОДЧЕРКНЕТ ВАШ ДЕЛОВОЙ СТИЛЬ ПРИ ВСТРЕЧАХ ИЛИ НА РАБОТЕ, ПОЗВОЛИТ ВАМ ЧУВСТВОВАТЬ СЕБЯ КОМФОРТНО. ПУСТЬ ВСЕ НЕОБХОДИМЫЕ ВЕЩИ БУДУТ В ПОРЯДКЕ И ВСЕГДА ПОД РУКОЙ.</span>
        </div>
      </div>
      <div class="row divider">
        <div class="col-lg-12">
          <div class="left"></div>
          <div class="inner"></div>
          <div class="right"></div>
        </div>
      </div>
    </div>
    <div id="screen-4" data-spy="scroll" class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <h1>Характеристики портмоне</h1>
          <div class="video-wrapper">
            <video id="video" preload="preload" controls="controls">
              <source src="videos/desc.mp4">
              <source src="videos/desc.ogv">
            </video>
          </div>
        </div>
      </div>
      <div class="row divider">
        <div class="col-lg-12">
          <div class="left"></div>
          <div class="inner"></div>
          <div class="right"></div>
        </div>
      </div>
    </div>
    <div id="screen-5" class="container-fluid">
      <h1>Галерея</h1>
      <div class="container">
        <div class="row">
          <ul class="row">
            <li class="col-xs-3"><img src="images/gallery/1.jpg"></li>
            <li class="col-xs-3"><img src="images/gallery/2.jpg"></li>
            <li class="col-xs-3"><img src="images/gallery/3.jpg"></li>
            <li class="col-xs-3"><img src="images/gallery/4.jpg"></li>
          </ul>
          <ul class="row">
            <li class="col-xs-3"><img src="images/gallery/5.jpg"></li>
            <li class="col-xs-3"><img src="images/gallery/6.jpg"></li>
            <li class="col-xs-3"><img src="images/gallery/7.jpg"></li>
            <li class="col-xs-3"><img src="images/gallery/8.jpg"></li>
          </ul>
        </div>
      </div>
      <div class="row divider">
        <div class="col-lg-12">
          <div class="left"></div>
          <div class="inner"></div>
          <div class="right"></div>
        </div>
      </div>
      <div id="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="container-fluid">
                <h4>Baellerry Italia</h4>
                <button type="button" data-dismiss="modal" class="btn btn-danger close pull-right">&times;</button>
              </div>
            </div>
            <div class="modal-body"></div>
          </div>
        </div>
      </div>
    </div>
    <div id="screen-6" class="container-fluid">
      <h1>Преимущества нашего магазина</h1>
      <div class="container">
        <div class="row">
          <div class="col-xs-6 benefit">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-2"><img src="images/ok.png"></div>
                <div class="col-sm-10">
                  <h4>У НАС ТОЛЬКО КАЧЕСТВЕННЫЙ ТОВАР</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6 benefit">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-2"><img src="images/ok.png"></div>
                <div class="col-sm-10">
                  <h4>МЫ РАБОТАЕМ НАПРЯМУЮ С ПРОИЗВОДИТЕЛЕМ</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row second-row">
          <div class="col-xs-6 benefit">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-2"><img src="images/ok.png"></div>
                <div class="col-sm-10">
                  <h4>НИЗКАЯ ЦЕНА</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6 benefit">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-2"><img src="images/ok.png"></div>
                <div class="col-sm-10">
                  <h4>НАМ ДОВЕРЯЮТ ПОКУПАТЕЛИ</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row divider">
        <div class="col-lg-12">
          <div class="left"></div>
          <div class="inner"></div>
          <div class="right"></div>
        </div>
      </div>
    </div>
    <div id="screen-7" class="container-fluid">
      <h1>Отзывы</h1>
      <div class="container">
        <div class="row feedback">
          <div class="col-md-3"><img src="images/feedbacks/1.png"></div>
          <div class="col-md-9">
            <h4>Николай, г. Харьков</h4><span>"Уже пол года ползуюсь этим клатчем. Очень доволен, что купил. Люблю что-то новенькое:) Качество просто отличное! Постоянно ношу з собой. Он действительно практичен и вместительный."</span>
          </div>
        </div>
        <div class="row feedback">
          <div class="col-md-3"><img src="images/feedbacks/2.png"></div>
          <div class="col-md-9">
            <h4>Артем, г. Киев</h4><span>"Этот клатч мне попосоветовал друг. Он покупал еще до акции и намного дороже. А мне повезло успеть купить по акции. Он мне очень нравится, помещается все что нужно и дизайн классный:) СПАСИБО!"</span>
          </div>
        </div>
        <div class="row feedback">
          <div class="col-md-3"><img src="images/feedbacks/3.png"></div>
          <div class="col-md-9">
            <h4>Евгений, г. Херсон</h4><span>"Очень нравиться этот клатч, подходит к любой одежде, стильный. Покупал его другу в подарок и еще себе один взял. Так мне еще и скидку сделали 100 грн. Обслуживание на высшем уровне. Только заказал, сразу получил звонок для подтверждения заказа и через пол часа посылка была отправленна. Качество просто супер!"</span>
          </div>
        </div>
        <div class="row feedback">
          <div class="col-md-3"><img src="images/feedbacks/4.png"></div>
          <div class="col-md-9">
            <h4>Андрей, г. Днепропетровск</h4><span>"Ранее не пользовался клатчами и носил все в карманах. Но теперь увидел как это удобно все держать в одном клатче. Он очень вместительный, ношу в нем и телефон и документы и ключи, отлично лежит в руке. Взял себе черный. Все спрашивают где покупал, хотят себе такой же. <br>PS: Если кто-то сомневаеться, то скажу от себя, что не стоит - ЭТО СУПЕР ВЕЩЬ!"</span>
          </div>
        </div>
      </div>
      <div class="row divider">
        <div class="col-lg-12">
          <div class="left"></div>
          <div class="inner"></div>
          <div class="right"></div>
        </div>
      </div>
    </div>
    <div id="screen-8" class="container-fluid">
      <h1>КАК МЫ РАБОТАЕМ</h1>
      <div class="container">
        <div class="row work-description">
          <div class="col-md-3"><img src="images/form.png" alt=""><span>Вы заполняете форму заказа</span></div>
          <div class="col-md-3"><img src="images/reply.png" alt=""><span>Мы свяжемся с вами и уточним детали</span></div>
          <div class="col-md-3"><img src="images/deliever.png" alt=""><span>Мы отправим товар наложеным платежом</span></div>
          <div class="col-md-3"><img src="images/like.png" alt=""><span>Вы проверяете, получаете и оплачиваете</span></div>
        </div>
        <div class="row delievery-desc">
          <div class="col-sm-3"><img src="images/np.png"></div>
          <div class="col-sm-9">
            <h3>Оплата при получении - Нова Пошта</h3><span>Мы вам доверяем и не требуем с вас предоплаты. Мы уважаем ваше время, и поэтому все заказы отправляем только экспресс доставкой. Вы можете забрать и оплатить на почте в любое удобное для вас время. Доставка займет 1-2 рабочих дня.</span>
          </div>
        </div>
        <div class="row delievery-desc delievery-desc-2">
          <div class="col-sm-3"><img src="images/100percent.png"></div>
          <div class="col-sm-9">
            <h3>100% Гарантия качества</h3><span>Мы заботимся о своей репутации, довольные клиенты для нас - на первом месте! Мы сгарантируем качество товара и безопасность покупки. Мы проверяем каждый товар перед отправкой, но в случае если Вы обнаружите какой-то дефект, Вам достаточно связаться с нашими менеджерами. Мы с радостью примем Ваш возврат!</span>
          </div>
        </div>
        <div class="row divider">
          <div class="col-lg-12">
            <div class="left"></div>
            <div class="inner"></div>
            <div class="right"></div>
          </div>
        </div>
      </div>
    </div>
    <div id="screen-9" class="container-fluid">
      <h1>Закажите портмоне со скидкой</h1>
      <div class="container">
        <div class="row">
          <div class="col-md-6 desc-box">
            <h3>Успейте заказать! До окончания акции осталось:</h3>
            <div class="container-fluid discount-timer">
              <div class="col-xs-3 days"><span class="left">0</span><span class="right">0</span><span class="title">Дней</span></div>
              <div class="col-xs-3 hours"><span class="left">0</span><span class="right">0</span><span class="title">Часов</span></div>
              <div class="col-xs-3 minutes"><span class="left">0</span><span class="right">0</span><span class="title">Минут</span></div>
              <div class="col-xs-3 seconds"><span class="left">0</span><span class="right">0</span><span class="title">Секунд</span></div>
            </div>
          </div>
          <div class="col-md-5 col-md-offset-1 form-box">
            <form id="form" method="post">
              <table>
                <tr>
                  <td class="left"><span>Ваше имя:</span></td>
                  <td class="right">
                    <input id="name" name="name" size="18">
                  </td>
                </tr>
                <tr>
                  <td class="left"><span>Ваша фамилия:</span></td>
                  <td class="right">
                    <input id="surname" name="surname" size="18">
                  </td>
                </tr>
                <tr>
                  <td class="left"><span>Номер телефона:</span></td>
                  <td class="right">
                    <input id="phone" name="phone" size="18">
                  </td>
                </tr>
              </table>
            </form>
            <button id="order" class="order">Отправить заказ</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>