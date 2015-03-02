<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */
?>
<?php
/*
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);*/
?>
<div class="fon">
	<div class="textFon"><p class="zagolovok">Готові розпочати?</p><p class="zagolovok2">Введіть дані в форму нижче</p></div>
	<div class="formFon">
		<div class="email-password">
			<form method = "POST" action="">
				<input type="email" value="" name="email" class="email1" placeholder="E-mail"/>
				<input type="password" value="" name="password" class="password1" placeholder="password"/>

		</div>
		<div class="extendedRegistration"><a href="#" >розширена реєстрація</a></div>
		<div class="button">

			<input type="submit" value="Розпочати" name="button" class="button1"/>
			</form>
		</div>
		<div class="line"><hr color="#4b75a4" size="1px"></div>
		<div class="social">Ви можете також зареєструватися через соцмережі:</div>
		<div class="image" > <img name="networking" src="/IntITA/css/images/networking.png" width="410" height="50" border="0" id="networking" usemap="#m_networking" alt="" /><map name="m_networking" id="m_networking">
				<area shape="circle" coords="354,26, 20" href="javascript:" title="instagram" />
				<area shape="circle" coords="309,26, 21" href="javascript:" title="Rubka" />
				<area shape="circle" coords="262,27, 20" href="javascript:" title="Вконтакте" />
				<area shape="circle" coords="214,26, 20" href="javascript:" title="Однокласники" />
				<area shape="circle" coords="167,27, 20" href="javascript:" title="YouTube" />
				<area shape="circle" coords="121,26, 21" href="javascript:" title="googl" />
				<area shape="circle" coords="74,26, 20" href="javascript:" title="facebook" />
				<area shape="circle" coords="27,25, 21" href="javascript:" title="twitter" />
			</map></div>
	</div>

</div>


<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
