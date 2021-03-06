<?php
/**
 * Created by PhpStorm.
 * User: Wizlight
 * Date: 15.03.2015
 * Time: 18:08
 */
?>
<html>
<head>
</head>
<body onload=WindowShow(<?php echo (empty($_GET['id']))?1:$_GET['id']; ?>);centerPage()>
<?php
$this->breadcrumbs=array(
    Yii::t('breadcrumbs', 'About us'),
);

$this->pageTitle=Yii::t('mainpage','INTITA');

$headerText = Yii::t('mainpage','About us');
$subheaderText = Yii::t('mainpage','something that you need to know about our courses');
$subLineImage= $mainpage['subLineImage'];
$dropName = Yii::t('mainpage','read more ...');

$massAbout = array($block1,$block2,$block3);


$block1->drop1Text='<div class="aboutStepBlock"><span class="detailTitle1"> Про що мрієш ти? </span>

<p> Спробуємо вгадати: власна квартира чи навіть будинок? Гарний автомобіль? Закордонні подорожі, можливо, до екзотичних країн? Забезпечене життя для себе та близьких, коли не доводиться думати про гроші?
<p>А, може, це свобода жити своїм життям? Самостійно керувати власним часом з можливістю працювати за зручним графіком без необхідності щодня їздити на роботу, але при цьому мати стабільно високий дохід?
<p>	Можливо ти хочеш заробляти, займаючись улюбленою справою і отримувати задоволення від сучасної професії?
<p>Про що б ти не мріяв, для здійснення більшості мрій потрібні гроші. Сьогодні середня зарплата в Україні є найнижчою в Європі: близько 3,5 тис грн у місяць. Навіть якщо брати сферу бізнесу, зарплати більшості робітників не перевищують 5-8 тис грн. 
<p>Як щодо 40 - 60 тис грн в місяць з можливістю працювати за гнучким графіком та дистанційно? Ти думаєш, що в нашій країні такі умови лише у керівників та власників бізнесу? У нас хороша новина: вже через рік-два-три так зможеш заробляти і ти.
<p></div><div class="aboutStepBlock"><span class="detailTitle2">Професія майбутнього</span>
 <p>Сьогодні у тебе є реальна можливість поєднати хороший заробіток, гнучкий графік роботи та зручність дистанційної роботи. І це не “заработок в интернете”, про який кричить банерна реклама на багатьох сайтах. Ми віримо у те, що високого стабільного доходу можна досягти лише за допомогою власних зусиль.
<p>Ми живемо в епоху, коли головним двигуном розвитку світової економіки є інформаційні технології (ІТ). Вони дозволяють досягти нових проривних результатів у традиційних галузях: виробництві та послугах. Саме інформаційні технології повністю змінили і продовжують трансформувати індустрії звязку, розваг (книги, музика, фільми), банківських послуг, а також такі традиційні бізнеси, як послуги таксі (Uber), готелів (Airbnb), навчання (Coursera). 
<p>Герої інформаційної епохи - це спеціалісти з інформаційних технологій. Вони знаходяться на передовій змін, вони придумали та продовжують розвивати Windows, iOS, Android, а також мільйони додатків до них, вони створюють соціальні мережі, сайти та бази даних. 
<p>Гарна новина для тебе: сьогодні таких спеціалістів не вистачає. Інформаційні технології розвиваються дуже швидко і стають потрібними усюди, тому людей не вистачає, існуючі навчальні заклади просто не встигають готувати потрібну кількість. Нестача спеціалістів означає, що зарплати на ринку стабільно зростають, і сягнули небачених для України значень: в середньому спеціалісти з інформаційних технологій сьогодні отримують 3-5 тис доларів у місяць, і при цьому роботодавці активно полюють на професіоналів. Секрет таких високих зарплат не лише у дефіциті кадрів, а й у тому, що для ІТ-галузі кордони - не проблема. Ти можеш працювати вдома зі своєї квартири в Україні над замовленням клієнта зі США чи Німеччини і отримувати винагороду у доларах чи євро з рівнем оплати, не набагато нижчим від американських чи європейських стандартів.  
<p>Ми запрошуємо тебе приєднатися до світової інформаційної еліти та за короткий час стати професіоналом у сфері інформаційних технологій, щоб отримувати стабільно високий дохід та працювати в зручних умовах за гнучким графіком. 
<p></div><div class="aboutStepBlock"><span class="detailTitle2">Що очікується від тебе</span>
<p>Програмування - це не так складно, як ти можеш уявляти. Безумовно, щоб стати хорошим програмістом, потрібен час та зусилля. Ризикнемо сказати, що крім часу та зусиль (та, зрозуміло, наявності простенького компютера) не потрібно більше ні-чо-го. Не потрібно бути сильним у математиці: навіть якщо у школі ти не любив математику, а твої оцінки не піднимались вище середнього рівня, ти зможеш стати чудовим програмістом. Не потрібно знати, як влаштований компютер чи бути досвіченим користувачем будь-яких програм. Достатньо часу на навчання та бажання займатися. Гарні знання з математики, логіки, комп’ютера можуть пришвидшити темп навчання, але й без них кожен зможе досягти високого рівня професіоналізму у програмуванні завдяки іноваційному підходу до навчання Академії Програмування ІНТІТА. </div>';

$block1->drop2Text='<div class="aboutStepBlock"><span class="detailTitle1">Навчання майбутнього сьогодні</span>
<p>Коли мова йде про навчальний заклад, можемо побитися об заклад, що до думки тобі приходять велика будівля з десятками навчальних приміщень, лекційна аудиторія, парти, записники, конспекти, викладачі, лекції, семінари. Така система освіти сформувалася ще у Стародавній Греції, і за кілька тисяч років майже не змінилася. Але зараз світ стоїть на порозі великої революції в освіті, яка назавжди змінить те, як ми навчаємося. Сьогодні технології зробили доступним те, що раніше могли дозволити собі лише одиниці, наймаючи персональних вчителів та репетиторів: персоналізоване навчання.  
<p></div><div class="aboutStepBlock"><span class="detailTitle2">“Три кити” Академії ІНТІТА </span>
<p><span class="detailTitle3">Кит перший. Гнучкість та зручність. </span>
<p>Ти можеш самостійно будувати графік навчання, виходячи з власних потреб та цілей. Якщо ти хочеш закінчити навчання та почати працювати вже через рік, обирай інтенсивне навчання та займайся 6-8 годин в день. Якщо ти хочеш освоїти програмування поступово, не жертвуючи іншими важливими для тебе речами, ти можеш займатися ті ж 6-8 годин, але у тиждень. 
<p>Не потрібно відвідувати навчальний заклад, Академія з тобою всюди. Навіть якщо ти у місці, де немає звязку та інтернету, ти можеш переглядати лекції в офлайн-режимі, а практичну частину зробити пізніше, коли зявиться доступ.  
<p></div><div class="aboutStepBlock"><span class="detailTitle3">Кит другий. Орієнтація на ринок. </span>
<p>Ми даємо тобі лише 100% необхідні знання. Ми поважаємо гуманітарні дисципліни та фундаментальні точні науки, які входять до  складу обовязкових для вивчення у вишах, але переконані, що вони не є обовязковими для того, щоб стати професіоналом у сфері інформаційних технологій. Ми вважаємо, що кожен має вирішувати індивідуально, що вивчати та чим цікавитись за межами своєї професії. У той же час у програмах вишів відсутні критичні для професійного успіху дисципліни, або ж вони викладаються недостатньо професійно (англійська мова для ІТ-спеціалістів, проектний менеджмент тощо). Інформаційні технології - це дисципліна, яка змінюється кожного дня, програми вишів просто не встигають адаптуватися до такої швидкості змін. ІНТІТА слідкує за змінами щодня, і адаптує як навчальну програму, так і зміст окремих предметів за необхідностю миттєво. Ми завжди у пошуку нового матеріалу, який можна передати студентам академії.  
<p>Порівнюючи звичайний технічний виш та академію ІНТІТА, ти можеш думати про сімейний універсал та болід Формула-1. Перший підходить для широкого кола завдань, але він значно програє позашляховикам у прохідності, міні-венам у місткості, лімузинам - у комфорті, спротивним автомобілям - у швидкості та керуванні. Другий сконструйовано лише заради максимальної швидкості та маневреності, жертвуючи усім іншим. І в результаті ми не зробимо з тебе універсально освічену людину, яка розбирається потрохи у всьому, ми зробимо тебе професіоналом світового класу в області програмування.  
 <p></div><div class="aboutStepBlock"><span class="detailTitle3">Кит третій. Результативність. </span>
<p>На відміну від традиційних закладів, ми не навчаємо задля оцінок. Ми працюємо індивідуально з кожним студентом, щоб досягти 100% засвоєння необхідних знань (а ми даємо лише необхідні знання). Ми не обмежуємо тебе у часі, теоретично ти можеш навчатися як завгодно довго. Ми беремо на себе зобовязання навчити тебе програмуванню, незважаючи на те, які знання у тебе вже є. Єдиними передумовами для початку занять є бажання, час на навчання, наявність хоча б простенького компютера та вміння читати та писати. 
<p>Знання, які ти отримаєш, максимально практичні та сучасні. Починаючи з першого заняття, ти робитимеш завдання з реального світу програмування. Ближче до закінчення навчання ти будеш приймати участь у створенні реальних програмних продуктів для ринку.
<p>Ми гарантуємо тобі 100% отримання пропозиції про працевлаштування протягом 4-6-ти місяців після успішного закінчення навчання.
 <p></div><div class="aboutStepBlock"><span class="detailTitle2">ІНТІТА: переваги наочно</span>
 <p>
 <table id="detailTable">
<tr><td><span class="detailTitle2">Традиційне навчання</span></td><td><span class="detailTitle2">ІНТІТА</span></td><td><span class="detailTitle2">Переваги</span></td></tr>
 <tr><td>Необхідність відвідувати заняття у класі</td><td>Навчання у себе вдома</td><td>Комфортна домашня атмосфера, економія часу та коштів на поїздки</td></tr>
 <tr><td>Заняття за фіксованим графіком</td><td>Заняття за індивідуальним графіком</td><td>Можливість підлаштувати графік навчання під власні потреби</td></tr>
<tr><td>Жорстко визначена навчальна програма, привязана до часових рамок (академічний рік)</td><td>Можливість обирати предмети та термін навчання </td><td>Навчання в комфортному темпі за власним графіком, не обмежене часом</td></tr>
<tr><td>Лекції та семінари, як основа навчального процесу (вивчення теорії)</td><td>Практичні заняття з першого дня навчання, створення реальних працюючих проектів</td><td>Отримання реального робочого досвіду вже протягом навчання, портфоліо готових робіт на момент закінчення навчання</td></tr>
<tr><td>Оцінки за якість засвоєних знань за певний час </td><td>Оцінок немає, лише “знання засвоєні” чи “потрібно навчатися далі”</td><td>Навчання до позитивного результату: до повного засвоєння необхідних знань</td></tr>
<tr><td>Диплом про вищу освіту видається через 5-6 років за умови засвоєння великої кількості непрофільних знань (мова, історія, філософія тощо)</td><td>Лише практичні знання, які будуть потрібні тобі у роботі та житті: програмування, англійська мова, побудова карєри на ринку інформаційних технологій, основи життєвого успіху.</td><td>Весь час навчання витрачається на отримання корисних практичних знань, тому термін навчання скорочуються, а кількість практичних засвоєних знань більша, ніж у традиційних закладах.</td></tr>
 </table></div> ';
 
 $block1->drop3Text='
<div class="aboutStepBlock"><span class="detailTitle1"> Питання, які нам часто ставлять</span>

<p><span class="detailTitle3">Скільки триває навчання, як швидко я зможу почати заробляти?
</span><p><ul><li class="listAbout">навчання не має фіксованого терміну і залежить виключно від темпу, який обереш ти.
</li></ul>
<p></div><div class="aboutStepBlock"><span class="detailTitle3">Чи отримаю я державний диплом про освіту?
</span><p><ul><li class="listAbout">ми не видаємо дипломів державного зразка, наша ціль - забезпечити передумови для гарантованого працевлаштування слухачів.
</li></ul>
<p></div><div class="aboutStepBlock"><span class="detailTitle3">Чому навчання коштує так дешево (дорого) у порівнянні з вишем (курсами) Х?
</span><p><ul><li class="listAbout">вартість навчання економічно обгрунтована і буде відроблена менше, ніж за рік роботи на позиції програміста-початківця.
</li></ul>
<p></div><div class="aboutStepBlock"><span class="detailTitle3">У мене зараз немає необхідних коштів, чи можу я навчатися у кредит?
</span><p><ul><li class="listAbout">так, ми пропонуємо гнучкий підхід в оплаті за навчання, детальніше можна вияснити написавши нам листа на електронну пошту. Контакти.
</li></ul>
<p></div><div class="aboutStepBlock"><span class="detailTitle3">Я чув від знайомого, що він освоїв програмування самотужки, це можливо?
</span><p><ul><li class="listAbout">так, на ринку багато “програмістів-самоучок”, але вони, як правило, пройшли довгий шлях для того, щоб навчитись програмуванню, ми - один із ефективних варіантів стати кваліфікованим програмістом за короткий час.
</li></ul>
<p></div><div class="aboutStepBlock"><span class="detailTitle3">У мене у школі було погано з математикою / я давно не займався математикою. Це може завадити мені навчитися програмуванню?
</span><p><ul><li class="listAbout">математика допомагає краще розвинути логічне мислення і знання елементарної математики необхідні обов’язково, проте, не математичне, а логічне мислення визначає наскільки гарний програміст і тільки невеликий відсоток гарних математиків стають професійними програмістами.
</li></ul>
<p></div><div class="aboutStepBlock"><span class="detailTitle3">Мені 34 роки, чи можу я зараз розпочати навчання?
</span><p><ul><li class="listAbout">верхньої вікової межі для того, щоб вивчати програмування - немає, люди і старшого віку розпочинали і досягали гарних результатів. Життєвий досвід людям старшого віку дозволяє ефективніше побудувати навчальний процес і швидше кар’єрно зростати.
</li></ul>
<p></div><div class="aboutStepBlock"><span class="detailTitle3">Я чув думку, що професія програміста технічна, а я - людина творча. Чи підійде програмування мені?
</span><p><ul><li class="listAbout">програмування - це і є творчість, варто спробувати, щоб зрозуміти чи це твоє покликання.
</li></ul>';

?>
<div class="mainAboutBlock">
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
	$index=0;
	$anchor=0;
    foreach ($massAbout as $val)

    {
		$index++;
		?>
        <div class="block">
            <ul>
                <li>
                    <div class="line2">
                        <img src="<?php echo $val->line2Image;?>">
                    </div>
                    <div class="icon">
                      <img src="<?php echo $val->iconImage;?>">
                    </div>
                    <div class="title" >
					<div class="aboutTitleLink" onclick="WindowShow(<?php echo $index;?>,1)">
                        <?php echo $val->titleText; ?>
					</div>
                        <p>
                            <?php echo $val->textAbout; ?>
                    </div>
                </li>
            </ul>
        </div>

    <?php
    }
    ?>

	

<! Script for Drop Down text>
<script type="text/javascript">
var width=0;
if (self.screen)
{
	width = screen.width
}
function centerPage()   
{
    $('.contentCenterBox').css('width', width); 
    $('.contentCenterBox').css('left', "50%");
    $('.contentCenterBox').css('margin-left', -width/2);  
}

function Window()
{
		$('#dropTextLayer1').css('display', 'inline-block'); 
}

function WindowShow(buttonNumber,anchor) 
{
	if (anchor==1)
	{
		$("body").animate({"scrollTop":440},"fast");
	}
	if (buttonNumber ==1)
		{
			$('#dropTextLayer1').css('display', 'inline-block'); 
			$('#dropTextLayer2').css('display', 'none');   
			$('#dropTextLayer3').css('display', 'none');   
			$('#dropButton1').css('text-decoration','none');
			$('#dropButton2').css('text-decoration','underline');
			$('#dropButton3').css('text-decoration','underline');
		}
	if (buttonNumber ==2)
		{
			$('#dropTextLayer2').css('display', 'inline-block');   
			$('#dropTextLayer1').css('display', 'none');   
			$('#dropTextLayer3').css('display', 'none');   
			$('#dropButton1').css('text-decoration','underline');
			$('#dropButton2').css('text-decoration','none');
			$('#dropButton3').css('text-decoration','underline');
		}	
	if (buttonNumber ==3)
		{
			$('#dropTextLayer3').css('display', 'inline-block');
			$('#dropTextLayer2').css('display', 'none');   
			$('#dropTextLayer1').css('display', 'none');   		
			$('#dropButton1').css('text-decoration','underline');
			$('#dropButton2').css('text-decoration','underline');
			$('#dropButton3').css('text-decoration','none');			
		}	
}
	
</script>

<! buttons for dropdown  About Us>
<div id="dropButton1" onclick="WindowShow(1)" >
	<?php  echo  $dropName;   ?>
</div>
<div id="dropButton2" onclick="WindowShow(2)">
	<?php  echo  $dropName;   ?>
</div>
<div id="dropButton3" onclick="WindowShow(3)">
	<?php  echo  $dropName;   ?>
</div>
	

</div>
</div>

<div id='aboutDetailMain'>


<div id="dropTextLayer1" >
    <div  class="textBox">
	<?php 	echo $block1->drop1Text;	 ?>
    </div>
</div>	
<div id="dropTextLayer2" >
    <div  class="textBox">
	<?php 	echo $block1->drop2Text;	 ?>
    </div>
</div>	
<div id="dropTextLayer3">
    <div  class="textBox">
	<?php 	echo $block1->drop3Text;	 ?>
    </div>
</div>	
</div>


</body>
</html>
