<?php
/* @var $this SiteController */
?>
<div id="slider" class="owl-carousel owl-theme">

    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/1.jpg"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/2.jpg"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/3.jpg"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/4.jpg"></div>
<!--
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/5.jpg"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/6.jpg"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/7.jpg"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/8.jpg"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/9.jpg"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/10.jpg"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/11.jpg"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/slider_img/12.jpg"></div> -->


</div>
<?php
$this->pageTitle=Yii::app()->name;

$headerText = 'Про нас';
$subheaderText = 'важлива інформація про навчання разом з нами';
$subLineImage= Yii::app()->request->baseUrl.'/css/images/line1.png';
$linkName="детальніше »";


$objAbout1=new AboutUs(Yii::app()->request->baseUrl.'/css/images/line2.png',Yii::app()->request->baseUrl.'/css/images/image1.png','Про що мрієш ти?','Спробуємо вгадати: власна квартира чи навіть будинок? Гарний автомобіль?
                        Закордонні подорожі, можливо, до екзотичних країн?','https://www.google.com.ua/');
$objAbout2=new AboutUs (Yii::app()->request->baseUrl.'/css/images/line2.png',Yii::app()->request->baseUrl.'/css/images/image2.png','Навчання майбутнього сьогодні','Програмування – Програмування – це не так складно, як ти можеш уявляти.
                        Безумовно, щоб стати хорошим програмістом, потрібен час та зусилля.','https://www.google.com.ua/');
$objAbout3=new AboutUs(Yii::app()->request->baseUrl.'/css/images/line2.png',Yii::app()->request->baseUrl.'/css/images/image3.png','Питання, які нам часто ставлять','Самостійний графік навчання.
                        Лише 100% необхідні знання. Засвоєння 100% знаннь!','https://www.google.com.ua/');
$massAbout=array($objAbout1,$objAbout2,$objAbout3);
?>

<div class="mainAbout">
    <div class="header">

        <?php echo $headerText; ?>

        <p>
            <?php echo $subheaderText; ?>
        </p>
    </div>

    <div class="line1">
        <img src="<?php echo $subLineImage;?>">
    </div>

    <?php
    foreach ($massAbout as $val)

    {?>
        <div class="block">
            <ul>
                <li>
                    <div class="line2">
                        <img src="<?php echo $val->line2Image;?>">
                    </div>
                    <div class="icon">
                        <img src="<?php echo $val->iconImage;?>">
                    </div>
                    <div class="title">
                        <?php echo $val->titleText; ?>
                        <p>
                            <?php echo $val->textAbout; ?>
                        </p>
                    </div>
                        <a href="<?php echo $val->linkAdress ?>">
                        <?php echo $linkName; ?>
                        </a>
                </li>
            </ul>
        </div>

    <?php

    }
    ?>

</div>
<! Ініціалізація екземплярів класу>
<?php

$stepHeader = 'Як розпочати навчання?';
$stepSubheader = 'п’ять кроків до здійснення твоїх мрій';
$stepSize='958px';

$step1=new Step(Yii::app()->request->baseUrl.'/css/images/step1.jpg','Реєстрація','Щоб отримати доступ до переліку курсів та пройти безкоштовні модулі і заняття зареєструйся на сайті.','1','крок');
$step2=new Step(Yii::app()->request->baseUrl.'/css/images/step2.jpg','Вибір курсу чи модуля','Щоб стати спеціалістом певного напрямку та рівня вибери для проходження відповідний курс. Якщо Тебе цікавить виключно поглиблення знань в певному напрямку ІТ, то вибери відповідний модуль.','2','крок');
$step3=new Step(Yii::app()->request->baseUrl.'/css/images/step3.jpg','Проплата','Щоб розпочати проходження курсу чи модуля виберіть зручну схему оплати та здійсни оплату зручним Тобі способом (схему оплати курсу чи модуля можна змінювати, також можлива помісячна оплата в кредит).','3','крок');
$step4=new Step(Yii::app()->request->baseUrl.'/css/images/step4.jpg','Освоєння матеріалу','Вивчення матеріалу можливе шляхом читання тексту чи/і перегляду відео для кожного заняття. Протягом освоєння матеріалу заняття виконуй Проміжні тестові завдання. По завершенню кожного заняття виконуй Підсумкове тестове завдання. Кожен модуль завершується Індивідуальним проектом чи Екзаменом, який приймають викладачі. Можна замовити індивідуальну консультацію викладача по темам та завданням чи обговорювати питання на тематичному форумі чи форумі групи.','4','крок');
$step5=new Step(Yii::app()->request->baseUrl.'/css/images/step5.jpg','Завершення курсу','Підсумком курсу є Командний дипломний проект, який виконується разом із іншими студентами (склад команди формуєте самостійно чи рекомендує керівник, який затверджує тему і технічне завдання проекту). Здача проекту передбачає передзахист та захист в он-лайн режимі із представленням технічної документації. Після захисту видається диплом та рекомендація для працевлаштування.','5','крок');

$stepsArray=array($step1,$step2,$step3,$step4,$step5);
?>



<! Верстка за допомогою масиву з екземплярами класу>

<div class="steps" >
		<div class="stepHeaderCont" style="width:<?php echo $stepSize; ?>">
			<div class="stepHeader">
						<h1><?php echo $stepHeader; ?></h1>
						<h3><?php echo $stepSubheader; ?></h3>
			</div>
		</div>
<?php
    foreach ($stepsArray as $stepValue)
    {
		if ($stepValue->stepNumber % 2 <> 0)
		 {
?>
         <div class="stepLeft" 	style="width:<?php echo $stepSize; ?>" >
					<div class="stepUrl">
        		   		 <img src="<?php echo $stepValue->stepImage; ?>">
        		    </div>
					<div class="line">
                    </div>

                    <img class="hexagon" src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/hexagon.png">
					<div class="stepArticle">
						<p class="stepNumber"><?php echo $stepValue->stepNumber; ?></p>
						<p class="stepName"><?php echo $stepValue->stepName; ?></p>
					</div>
        			<div class="stepInfo" style="min-height:<?php echo $stepSize*0.23 . 'px';?> ">
          				  <h2><?php echo $stepValue->stepTitle; ?></h2>
              			  <p><?php echo $stepValue->stepText; ?></p>
          			</div>
         </div>
		 <?php
		 }
		 else
		 {
		 ?>
		 <div class="stepRight" style="width:<?php echo $stepSize; ?>" >
					<div class="stepUrl">
        		   		 <img src="<?php echo $stepValue->stepImage; ?>">
        		    </div>
					<div class="line">
                    </div>
                     <img class="hexagon" src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/hexagon.png">
					<div class="stepArticle">
						<p class="stepNumber"><?php echo $stepValue->stepNumber; ?></p>
						<p class="stepName"><?php echo $stepValue->stepName; ?></p>
					</div>
        			<div class="stepInfo" style="min-height:<?php echo $stepSize*0.229 . 'px';?> ">
          				  <h2><?php echo $stepValue->stepTitle; ?></h2>
              			  <p><?php echo $stepValue->stepText; ?></p>
          			</div>
         </div>
<?php
	    }
	}
?>
</div>

    <div>

        <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/fon.jpg">
        <?php //echo Yii::app()->request->baseUrl; ?>

    </div>


