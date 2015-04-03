<!-- courses style -->
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/courses.css" />
<?php
$this->pageTitle = 'INTITA';
$this->breadcrumbs=array(
	Yii::t('breadcrumbs', 'Courses'),
);

	class Course 
	{
	    public $courseLang="Мова курсу:";
		public $courseImage;
		public $courseName;
		public $courseLevel;
		public $courseNumberofModules;
		public $courseReview;
		public $courseMaxNumberofModules=4;
		public $coursesHeader='Наші курси';
		public $courseLevelTitle='Рівень курсу:  ';
		public $coursesTextHeader= '';
		public $coursesTextFooter="Спочатку навчання створюється стійкий фундамент для підготовки програмістів: 
		необхідні знання елементарної математики, будови комп’ютера і основ інформатики.
		<p>Потім вивчаються основні принципи програмування на базі класичних комп'ютерних наук і методологій: алгоритмічна мова; 
		лементи вищої та дискретної математики і комбінаторики; структури даних, розробка і аналіз алгоритмів.
		<p>
		Після чого формується база для переходу до сучасних технологій програмування: об’єктно-орієнтоване програмування; проектування баз даних.
		<p>Завершення процесу підготовки шляхом конкретного застосування отриманих знань на реальних проектах із засвоєнням сучасних методів і технологій, 
		які використовуються в ІТ індустрії компаніями.";
		
		function Course ( $courseImage,$courseName,$courseLevel,$courseNumberofModules,$courseReview)
		{
		$this->courseImage=$courseImage;
		$this->courseName=$courseName;
		$this->courseLevel=$courseLevel;
		$this->courseNumberofModules=$courseNumberofModules;
		$this->courseReview=$courseReview;	
		}
	}
	
	$course1=new Course (Yii::app()->request->baseUrl.'/css/images/course1Image.png','Основи програмування','середній',2,'Интерактивные веб-приложения разработка программного  for a for aобеспечения/ Zombie Outlaws Completion Badge. Build faster and more secure web apps with Rails 4.');
	$course2=new Course (Yii::app()->request->baseUrl.'/css/images/course2Image.png','Основи програмування','середній',2,'Интерактивные веб-приложения разработка программного  for a for aобеспечения/ Zombie Outlaws Completion Badge. Build faster and more secure web apps with Rails 4.');
	$course3=new Course (Yii::app()->request->baseUrl.'/css/images/course3Image.png','Основи програмування','середній',2,'Интерактивные веб-приложения разработка программного  for a for aобеспечения/ Zombie Outlaws Completion Badge. Build faster and more secure web apps with Rails 4.');
	$course4=new Course (Yii::app()->request->baseUrl.'/css/images/course4Image.png','Основи програмування','середній',2,'Интерактивные веб-приложения разработка программного  for a for aобеспечения/ Zombie Outlaws Completion Badge. Build faster and more secure web apps with Rails 4.');
	$course5=new Course (Yii::app()->request->baseUrl.'/css/images/course5Image.png','Основи програмування','середній',2,'Интерактивные веб-приложения разработка программного  for a for aобеспечения/ Zombie Outlaws Completion Badge. Build faster and more secure web apps with Rails 4.');

	$course7=new Course (Yii::app()->request->baseUrl.'/css/images/course7Image.png','Основи нейролінгвістичного програмування ','професійний',4,'Профессиональная разработка программного обеспечения for a for a Zombie Outlaws Completion Badge. Build faster and more secure web apps with Rails 4.');
	$course8=new Course (Yii::app()->request->baseUrl.'/css/images/course8Image.png','Основи нейролінгвістичного програмування','професійний',4,'Профессиональная разработка программного обеспечения for a for a Zombie Outlaws Completion Badge. Build faster and more secure web apps with Rails 4.');
	$course9=new Course (Yii::app()->request->baseUrl.'/css/images/course9Image.png','Основи нейролінгвістичного програмування ','професійний',4,'Профессиональная разработка программного обеспечения for a for a Zombie Outlaws Completion Badge. Build faster and more secure web apps with Rails 4.');
	$course10=new Course (Yii::app()->request->baseUrl.'/css/images/course10Image.png','Основи нейролінгвістичного програмування ','професійний',4,'Профессиональная разработка программного обеспечения for a for a Zombie Outlaws Completion Badge. Build faster and more secure web apps with Rails 4.');
	$course11=new Course (Yii::app()->request->baseUrl.'/css/images/course11Image.png','Основи нейролінгвістичного програмування','професійний',4,'Профессиональная разработка программного обеспечения for a for a Zombie Outlaws Completion Badge. Build faster and more secure web apps with Rails 4.');

    $coursesArray1=array($course1,$course2,$course3,$course4,$course5, $course7);
	$coursesArray2=array($course8,$course9,$course10,$course11,);
	
	$courseDisableImage=Yii::app()->request->baseUrl.'/css/images/ratIco0.png';
	$courseEnableImage= Yii::app()->request->baseUrl.'/css/images/ratIco1.png';
	
	?>

<div id='coursesMainBox'>

<table>
<tr><td  valign="top">
<div id='coursesPart1'>
    <div id='coursesHeader'>
        <?php echo Yii::t('courses', 'Our courses'); ?>
    </div>
	<?php
	foreach ($coursesArray1 as $val)   
	{
		?>
		<div class='courseBox'>
		<img src='<?php echo $val->courseImage; ?>'>
		<div class='courseName'> <a href="<?php echo Yii::app()->request->baseUrl; ?>/course"><?php
				echo $val->courseName; ?></a>
		</div>
		<div class="courseLevelBox">
			<?php echo Yii::t('courses', 'Level:'); ?>
		
			<span class="courseLevel">
			<?php echo $val->courseLevel; ?>
			</span>
			<div class='courseLevelIndex'>
			<?php
			for ($i=0; $i<$val->courseNumberofModules; $i++)
			{ 
				?><span class="courseLevelImage">
				<img src="<?php echo $courseEnableImage;?>">
				</span><?php
			}
			for ($i=0; $i<($val->courseMaxNumberofModules-$val->courseNumberofModules); $i++)
			{ 
				?><span class="courseLevelImage">
				<img src="<?php echo $courseDisableImage;?>">
				</span><?php
			}
			?>
			</div>
		</div>
        <div class="courseLang">
        <?php echo Yii::t('courses', 'Language:'); ?>
            <div id="coursesLang" class="down">
                <form action="" method="post" onsubmit="" name="fff">
                    <button formaction="<?php echo Yii::app()->createUrl('site/changeLang', array('lang'=>'UA'));?>" id="ua" name="ua" onclick="changeLang(this)" class="selectedLang" disabled>ua</button>
        
                    <button formaction="<?php echo Yii::app()->createUrl('site/changeLang', array('lang'=>'EN'));?>" id="en" name="en" onclick="changeLang(this)">en</button>
        
                    <button formaction="<?php echo Yii::app()->createUrl('site/changeLang', array('lang'=>'RU'));?>" id="ru" name="ru" onclick="changeLang(this)">ru</button>
        
                </form>
            </div>
        </div>
		<span class='courseText'><?php
		echo $val->courseReview;
		?>
		</span>
		</div> <?php
	}
	?>
</div></td>

<td >
<div id='coursesPart2'>
    <div class='courseBox'>
        <div class='conceptName'>
            <?php echo Yii::t('courses', 'КОНЦЕПЦІЯ ПІДГОТОВКИ'); ?><!-- Concept of learning-->
        </div>
        <span class='concepText'>
        	<?php echo $course1->coursesTextFooter; ?>
    	</span>
    </div>

	<?php
	foreach ($coursesArray2 as $val)   
	{
		?>
		<div class='courseBox'>
		<img src='<?php echo $val->courseImage; ?>'>
		<div class='courseName'><a href="<?php echo Yii::app()->request->baseUrl; ?>/course"><?php
				echo $val->courseName; ?></a>
		</div>
		<div class="courseLevelBox">
			<?php echo  Yii::t('courses', 'Level:'); ?>
		
			<span class="courseLevel">
			<?php echo $val->courseLevel; ?>
			</span>
			<div class='courseLevelIndex'>
			<?php
			for ($i=0; $i<$val->courseNumberofModules; $i++)
			{ 
				?><span class="courseLevelImage">
				<img src="<?php echo $courseEnableImage;?>">
				</span><?php
			}
			for ($i=0; $i<($val->courseMaxNumberofModules-$val->courseNumberofModules); $i++)
			{ 
				?><span class="courseLevelImage">
				<img src="<?php echo $courseDisableImage;?>">
				</span><?php
			}
			?>
			</div>
		</div>
        <div class="courseLang">
        <?php echo Yii::t('courses', 'Language:'); ?>
            <div id="coursesLang" class="down">
                <form action="" method="post" onsubmit="" name="fff">
                    <button formaction="<?php echo Yii::app()->createUrl('site/changeLang', array('lang'=>'UA'));?>" id="ua" name="ua" onclick="changeLang(this)" class="selectedLang" disabled>ua</button>
        
                    <button formaction="<?php echo Yii::app()->createUrl('site/changeLang', array('lang'=>'EN'));?>" id="en" name="en" onclick="changeLang(this)">en</button>
        
                    <button formaction="<?php echo Yii::app()->createUrl('site/changeLang', array('lang'=>'RU'));?>" id="ru" name="ru" onclick="changeLang(this)">ru</button>
        
                </form>
            </div>
        </div>
		<span class='courseText'><?php
		echo $val->courseReview;
		?>
		</span>
		</div> <?php
	}
	
	?>
</div>
</td>
</tr>
</table>

</div><! main box>

<script>
    function changeLang(n){
        for (var i=0; i< n.form.length; i++){
            if(n.form.elements[i].id !== n.id){
                console.log(n.form.elements[i].id);
                document.getElementById(n.form.elements[i].id).disabled = false;
                document.getElementById(n.form.elements[i].id).className = "";
            }



		}
	}
 </script>

</body>
</html>