/*
Navicat MySQL Data Transfer

Source Server         : IntITA
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : int_ita_db

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2015-03-05 15:38:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for aa_access
-- ----------------------------
DROP TABLE IF EXISTS `aa_access`;
CREATE TABLE `aa_access` (
  `user_id` smallint(5) unsigned NOT NULL,
  `interface_id` smallint(5) unsigned NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `add` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`interface_id`),
  KEY `interface_id` (`interface_id`),
  CONSTRAINT `aa_access_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `aa_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `aa_access_ibfk_2` FOREIGN KEY (`interface_id`) REFERENCES `aa_interfaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aa_access
-- ----------------------------

-- ----------------------------
-- Table structure for aa_authorizations
-- ----------------------------
DROP TABLE IF EXISTS `aa_authorizations`;
CREATE TABLE `aa_authorizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` smallint(5) unsigned NOT NULL,
  `when_enter` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `when_enter` (`when_enter`),
  CONSTRAINT `aa_authorizations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `aa_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aa_authorizations
-- ----------------------------
INSERT INTO `aa_authorizations` VALUES ('1', '2', '2015-03-02 15:33:25', '::1');
INSERT INTO `aa_authorizations` VALUES ('2', '2', '2015-03-02 15:33:25', '::1');
INSERT INTO `aa_authorizations` VALUES ('3', '2', '2015-03-02 15:41:58', '::1');
INSERT INTO `aa_authorizations` VALUES ('4', '2', '2015-03-02 15:41:59', '::1');
INSERT INTO `aa_authorizations` VALUES ('5', '3', '2015-03-02 15:45:10', '::1');
INSERT INTO `aa_authorizations` VALUES ('6', '3', '2015-03-02 15:45:10', '::1');
INSERT INTO `aa_authorizations` VALUES ('7', '2', '2015-03-03 15:04:10', '::1');
INSERT INTO `aa_authorizations` VALUES ('8', '2', '2015-03-03 15:04:10', '::1');
INSERT INTO `aa_authorizations` VALUES ('9', '2', '2015-03-03 15:41:31', '::1');
INSERT INTO `aa_authorizations` VALUES ('10', '2', '2015-03-03 15:41:32', '::1');
INSERT INTO `aa_authorizations` VALUES ('11', '2', '2015-03-03 17:26:15', '::1');
INSERT INTO `aa_authorizations` VALUES ('12', '2', '2015-03-03 17:26:15', '::1');

-- ----------------------------
-- Table structure for aa_errors
-- ----------------------------
DROP TABLE IF EXISTS `aa_errors`;
CREATE TABLE `aa_errors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `error_type` enum('exception','warning') DEFAULT NULL,
  `info` text,
  `authorization_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authorization_id` (`authorization_id`),
  CONSTRAINT `aa_errors_ibfk_1` FOREIGN KEY (`authorization_id`) REFERENCES `aa_authorizations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aa_errors
-- ----------------------------

-- ----------------------------
-- Table structure for aa_interfaces
-- ----------------------------
DROP TABLE IF EXISTS `aa_interfaces`;
CREATE TABLE `aa_interfaces` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` tinyint(3) unsigned DEFAULT NULL,
  `alias` varchar(60) NOT NULL,
  `level` tinyint(3) unsigned NOT NULL DEFAULT '5',
  `title` varchar(80) NOT NULL,
  `info` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `aa_interfaces_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `aa_sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aa_interfaces
-- ----------------------------

-- ----------------------------
-- Table structure for aa_logs
-- ----------------------------
DROP TABLE IF EXISTS `aa_logs`;
CREATE TABLE `aa_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `interface_id` smallint(5) unsigned DEFAULT NULL,
  `authorization_id` int(10) unsigned DEFAULT NULL,
  `when_event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `interface_id` (`interface_id`),
  KEY `authorization_id` (`authorization_id`),
  CONSTRAINT `aa_logs_ibfk_1` FOREIGN KEY (`interface_id`) REFERENCES `aa_interfaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `aa_logs_ibfk_2` FOREIGN KEY (`authorization_id`) REFERENCES `aa_authorizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aa_logs
-- ----------------------------

-- ----------------------------
-- Table structure for aa_sections
-- ----------------------------
DROP TABLE IF EXISTS `aa_sections`;
CREATE TABLE `aa_sections` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aa_sections
-- ----------------------------

-- ----------------------------
-- Table structure for aa_users
-- ----------------------------
DROP TABLE IF EXISTS `aa_users`;
CREATE TABLE `aa_users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `level` enum('root','admin','user') NOT NULL DEFAULT 'user',
  `login` varchar(21) NOT NULL,
  `password` varchar(32) NOT NULL,
  `interface_level` tinyint(4) NOT NULL DEFAULT '1',
  `email` varchar(40) NOT NULL,
  `surname` varchar(21) NOT NULL,
  `firstname` varchar(21) NOT NULL,
  `middlename` varchar(21) DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `info` tinytext,
  `salt` varchar(8) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aa_users
-- ----------------------------
INSERT INTO `aa_users` VALUES ('2', 'root', 'root', '63a9f0ea7bb98050796b649e85481845', '1', 'root', 'root', 'root', 'root', '2015-03-02 15:33:13', null, null, '0');
INSERT INTO `aa_users` VALUES ('3', 'user', 'User', '5f4dcc3b5aa765d61d8327deb882cf99', '1', 'user', 'Surname', 'Name', 'Middle name', '2015-03-02 15:43:00', null, null, '0');

-- ----------------------------
-- Table structure for aboutus
-- ----------------------------
DROP TABLE IF EXISTS `aboutus`;
CREATE TABLE `aboutus` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `line2Image` varchar(255) NOT NULL,
  `iconImage` varchar(255) NOT NULL,
  `titleText` varchar(50) NOT NULL,
  `textAbout` varchar(255) NOT NULL,
  `linkAddress` varchar(255) NOT NULL,
  `imagesPath` varchar(255) NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aboutus
-- ----------------------------
INSERT INTO `aboutus` VALUES ('1', '/css/images/line2.png', 'image1.png', 'Про що мрієш ти?', '<p>Спробуємо вгадати: власна квартира чи навіть будинок? Гарний автомобіль? Закордонні подорожі, можливо, до екзотичних країн?</p>', 'https://www.google.com/', '/css/images/');
INSERT INTO `aboutus` VALUES ('2', '/css/images/line2.png', 'image2.png', 'Що очікується від тебе', '<p>Програмування – це не так складно, як ти можеш уявляти. Безумовно, щоб стати хорошим програмістом, потрібен час та зусилля.</p>', 'https://www.google.com/', '/css/images/');
INSERT INTO `aboutus` VALUES ('3', '/css/images/line2.png', 'image3.png', 'Три кити Академії Програмування ІНТІТА', '<p>Три кити Академії Програмування ІНТІТА Самостійний графік навчання. Лише 100% необхідні знання. Засвоєння 100% знань!</p>', 'https://www.google.com/', '/css/images/');

-- ----------------------------
-- Table structure for carousel
-- ----------------------------
DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel` (
  `order` int(11) NOT NULL,
  `picture_url` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `images_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carousel
-- ----------------------------
INSERT INTO `carousel` VALUES ('1', '1.jpg', 'train1', '/css/images/slider_img/');
INSERT INTO `carousel` VALUES ('2', '2.jpg', 'train', '/css/images/slider_img/');
INSERT INTO `carousel` VALUES ('3', '3.jpg', 'train3', '/css/images/slider_img/');
INSERT INTO `carousel` VALUES ('4', '6.jpg', 'train2', '/css/images/slider_img/');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_ID` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(45) NOT NULL,
  `course_duration_hours` int(11) NOT NULL,
  PRIMARY KEY (`course_ID`),
  UNIQUE KEY `course_name` (`course_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', 'Course 1. OOP', '40');
INSERT INTO `course` VALUES ('2', 'Course 2. Programming', '120');
INSERT INTO `course` VALUES ('3', 'Course 3. Math', '30');
INSERT INTO `course` VALUES ('4', 'Course 4. Discrete math', '40');
INSERT INTO `course` VALUES ('5', 'Course 5', '36');
INSERT INTO `course` VALUES ('6', 'Course 6', '130');
INSERT INTO `course` VALUES ('7', 'Course 7', '64');
INSERT INTO `course` VALUES ('8', 'Course 8', '54');
INSERT INTO `course` VALUES ('9', 'Course 9', '90');

-- ----------------------------
-- Table structure for footer
-- ----------------------------
DROP TABLE IF EXISTS `footer`;
CREATE TABLE `footer` (
  `footer_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_social` varchar(255) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image_up` varchar(255) NOT NULL,
  PRIMARY KEY (`footer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of footer
-- ----------------------------
INSERT INTO `footer` VALUES ('1', '/css/images/sotial.gif', 'телефон: +38 0432 52', 'тел. моб. +38 067 432 20 10', 'e-mail: intita.hr@gmail.com', '/css/images/go_up.png');

-- ----------------------------
-- Table structure for header
-- ----------------------------
DROP TABLE IF EXISTS `header`;
CREATE TABLE `header` (
  `header_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` enum('EN','UA','RU') NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `menu_item_1` varchar(30) NOT NULL,
  `item_1_link` varchar(255) NOT NULL,
  `menu_item_2` varchar(30) NOT NULL,
  `item_2_link` varchar(255) NOT NULL,
  `menu_item_3` varchar(30) NOT NULL,
  `item_3_link` varchar(255) NOT NULL,
  `menu_item_4` varchar(30) NOT NULL,
  `item_4_link` varchar(255) NOT NULL,
  `enter_button_text` varchar(30) NOT NULL,
  PRIMARY KEY (`header_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of header
-- ----------------------------
INSERT INTO `header` VALUES ('1', 'UA', '/css/images/Logo_big.png', 'Курси', 'http://www.google.com', 'Викладачі', 'http://www.google.com', 'Форум', 'http://www.google.com', 'Про нас', 'http://www.google.com', 'Вхід');

-- ----------------------------
-- Table structure for hometasks
-- ----------------------------
DROP TABLE IF EXISTS `hometasks`;
CREATE TABLE `hometasks` (
  `hometask_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fkmodule_ID` int(11) NOT NULL,
  `fklecture_ID` int(11) NOT NULL,
  `hometask_name` varchar(45) NOT NULL,
  `hometask_description` varchar(45) NOT NULL,
  `hometask_url` varchar(255) NOT NULL,
  PRIMARY KEY (`hometask_ID`),
  UNIQUE KEY `fkmodule_ID` (`fkmodule_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hometasks
-- ----------------------------
INSERT INTO `hometasks` VALUES ('1', '23', '34', 'Hometask 1', 'Description 1', 'URL 1');
INSERT INTO `hometasks` VALUES ('2', '2', '2', 'Hometask 2', 'Descipion 2', 'URL 2');

-- ----------------------------
-- Table structure for language
-- ----------------------------
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` enum('EN','UA','RU') NOT NULL,
  `language` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of language
-- ----------------------------

-- ----------------------------
-- Table structure for lecture
-- ----------------------------
DROP TABLE IF EXISTS `lecture`;
CREATE TABLE `lecture` (
  `lectureID` int(11) NOT NULL AUTO_INCREMENT,
  `lectureImageMain` varchar(255) NOT NULL,
  `lectureModule` varchar(100) NOT NULL,
  `lectureNumber` int(11) NOT NULL,
  `lectureNameText` varchar(100) NOT NULL,
  `lectureTypeText` varchar(255) NOT NULL,
  `lectureTypeImage` varchar(255) NOT NULL,
  `lectureTimeText` varchar(20) NOT NULL,
  `lectureMaxNumber` int(11) NOT NULL,
  `lectureIconImage` varchar(255) NOT NULL,
  `lectureUnwatchedImage` varchar(255) NOT NULL,
  `lectureOverlookedImage` varchar(255) NOT NULL,
  `infoLectures` varchar(50) NOT NULL DEFAULT '0',
  `thisLectureInfo` varchar(255) NOT NULL DEFAULT '0',
  `preLectureInfo` varchar(255) NOT NULL DEFAULT '0',
  `postLessonInfo` varchar(255) NOT NULL DEFAULT '0',
  `teacherTitle` varchar(50) NOT NULL DEFAULT '0',
  `linkName` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lectureID`),
  KEY `FK_lectures_modules` (`lectureModule`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lecture
-- ----------------------------
INSERT INTO `lecture` VALUES ('1', '/css/images/lectureImage.png', '1', '0', 'Goal of classes 1', '10', '100', 'css/images/timeIco.p', '0', '', 'css/images/ratIco0.png', 'css/images/ratIco1.png', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for mainpage
-- ----------------------------
DROP TABLE IF EXISTS `mainpage`;
CREATE TABLE `mainpage` (
  `mainpage_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `carousel_id` int(11) NOT NULL,
  `slider_header` varchar(50) NOT NULL,
  `slider_text` varchar(255) NOT NULL,
  `slider_texture_url` varchar(255) NOT NULL,
  `slider_line_url` varchar(255) NOT NULL,
  `slider_button_text` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `array_blocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `array_steps` varchar(10) NOT NULL,
  `step_size` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `form_header_1` varchar(50) NOT NULL,
  `form_header_2` varchar(50) NOT NULL,
  `reg_text` varchar(50) NOT NULL,
  `button_start` varchar(50) NOT NULL,
  `social_text` varchar(50) NOT NULL,
  `image_network` varchar(255) NOT NULL,
  PRIMARY KEY (`mainpage_id`),
  UNIQUE KEY `carousel_id` (`carousel_id`),
  KEY `FK_mainpage_block` (`array_blocks`),
  KEY `FK_mainpage_step` (`array_steps`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mainpage
-- ----------------------------
INSERT INTO `mainpage` VALUES ('1', 'IntITA', '1', 'ПРОГРАМУЙ  МАЙБУТНЄ', 'Програміст — сама древня сучасна професія на планеті Земля!', '/css/images/slider_img/texture.png', '/css/images/slider_img/line.png', 'ПОЧАТИ />', 'Про нас', '/css/images/line1.png', 'дещо, що Вам потрібно знати про наші курси', '1', 'Як проводиться навчання?', 'далі пояснення як ви будете вчитися крок за кроком', '1', '958px', 'детальніше ...', '/css/images/hexagon.png', 'Готові розпочати?', 'Введіть дані в форму нижче', 'розширена реєстрація', 'Розпочати', 'Ви можете також зареєструватися через соцмережі:', '/css/images/networking.png');

-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `module_ID` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(45) NOT NULL,
  `module_duration_hours` int(11) NOT NULL,
  `module_duration_days` int(11) NOT NULL,
  PRIMARY KEY (`module_ID`),
  UNIQUE KEY `module_ID` (`module_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('1', 'Module 1', '40', '20');
INSERT INTO `modules` VALUES ('2', 'Module 2', '30', '15');
INSERT INTO `modules` VALUES ('3', 'Module 3', '60', '30');

-- ----------------------------
-- Table structure for step
-- ----------------------------
DROP TABLE IF EXISTS `step`;
CREATE TABLE `step` (
  `step_id` int(11) NOT NULL AUTO_INCREMENT,
  `stepName` varchar(30) NOT NULL DEFAULT '0',
  `stepNumber` int(11) NOT NULL,
  `stepTitle` varchar(50) NOT NULL,
  `stepImagePath` varchar(255) NOT NULL DEFAULT '0',
  `stepImage` varchar(50) NOT NULL,
  `stepText` text NOT NULL,
  PRIMARY KEY (`step_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of step
-- ----------------------------
INSERT INTO `step` VALUES ('1', 'крок', '1', 'Реєстрація на сайті', '/css/images/', 'step1.jpg', 'Щоб Ви отримали доступ до переліку курсів та пройти пробні безкоштовні модулі і заняття зареєструйтесь на сайті.');
INSERT INTO `step` VALUES ('2', 'крок', '2', 'Вибір курсу чи модуля', '/css/images/', 'step2.jpg', 'Щоб стати спеціалістом певного напрямку та рівня вибери для проходження відповідний курс. Якщо Тебе цікавить виключно поглиблення знань в певному напрямку ІТ, то вибери відповідний модуль.');
INSERT INTO `step` VALUES ('3', 'крок', '3', 'Проплата', '/css/images/', 'step3.jpg', 'Щоб розпочати проходження курсу чи модуля виберіть зручну схему оплати та здійсни оплату зручним Тобі способом (схему оплати курсу чи модуля можна змінювати, також можлива помісячна оплата в кредит).');
INSERT INTO `step` VALUES ('4', 'крок', '4', 'Освоєння матеріалу', '/css/images/', 'step4.jpg', 'Вивчення матеріалу можливе шляхом читання тексту чи/і перегляду відео для кожного заняття. Протягом освоєння матеріалу заняття виконуй Проміжні тестові завдання. По завершенню кожного заняття виконуй Підсумкове тестове завдання. Кожен модуль завершується Індивідуальним проектом чи Екзаменом, який приймають викладачі. Можна замовити індивідуальну консультацію викладача по темам та завданням чи обговорювати питання на тематичному форумі чи форумі групи.');
INSERT INTO `step` VALUES ('5', 'крок', '5', 'Завершення курсу', '/css/images/', 'step5.jpg', 'Підсумком курсу є Командний дипломний проект, який виконується разом із іншими студентами (склад команди формуєте самостійно чи рекомендує керівник, який затверджує тему і технічне завдання проекту). Здача проекту передбачає передзахист та захист в он-лайн режимі із представленням технічної документації. Після захисту видається диплом та рекомендація для працевлаштування.');

-- ----------------------------
-- Table structure for studentprofile
-- ----------------------------
DROP TABLE IF EXISTS `studentprofile`;
CREATE TABLE `studentprofile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `secondName` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `birthday` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text,
  `education` varchar(255) DEFAULT NULL,
  `educform` decimal(60,0) DEFAULT NULL,
  `interests` text,
  `aboutUs` text,
  `aboutMy` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studentprofile
-- ----------------------------
INSERT INTO `studentprofile` VALUES ('1', 'Hello', 'Джа', 'Марля', 'Wizlight', '21.03.1988', 'Wizlightdragon@gmail.com', '123', '911', 'Ямайка', 'ВДПУ', '1', 'Реггі, ковбаска, колобки', 'Растафарай', 'Володію албанською. Люблю м\'ясо та до м\'яса. Розвожу королів. ', '/css/images/1id.jpg');
INSERT INTO `studentprofile` VALUES ('2', 'Ihor', null, 'Baraniuk', null, '', 'Wizligddddhtdragon@gmail.com', 'ddd', '+380979699448', null, '', null, null, null, null, 'css/images/1id.jpg');
INSERT INTO `studentprofile` VALUES ('3', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `studentprofile` VALUES ('4', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) NOT NULL,
  `middle_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `login` varchar(50) NOT NULL,
  `phone` int(13) NOT NULL,
  `education` varchar(255) NOT NULL,
  `about_myself` varchar(255) NOT NULL,
  `interests` varchar(255) NOT NULL,
  `certificates` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_repeat` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` varchar(150) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_joined` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `timezome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `FK_students_users` FOREIGN KEY (`email`) REFERENCES `users` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------

-- ----------------------------
-- Table structure for studentsaccess
-- ----------------------------
DROP TABLE IF EXISTS `studentsaccess`;
CREATE TABLE `studentsaccess` (
  `id_access` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `date_of_change` date NOT NULL,
  PRIMARY KEY (`id_access`),
  KEY `FK_courseaccess_students` (`student_id`),
  KEY `FK_studentsaccess_course` (`course_id`),
  KEY `FK_studentsaccess_lectures` (`lecture_id`),
  KEY `FK_studentsaccess_modules` (`module_id`),
  CONSTRAINT `FK_courseaccess_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  CONSTRAINT `FK_studentsaccess_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_ID`),
  CONSTRAINT `FK_studentsaccess_lectures` FOREIGN KEY (`lecture_id`) REFERENCES `lecture` (`lectureID`),
  CONSTRAINT `FK_studentsaccess_modules` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studentsaccess
-- ----------------------------

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) DEFAULT NULL,
  `middle_name` varchar(35) DEFAULT NULL,
  `last_name` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `foto_url` varchar(100) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `gender` int(11) DEFAULT '0',
  `date_of_birth` int(11) DEFAULT '0',
  `subjects` varchar(50) DEFAULT '0',
  `job_title` varchar(50) DEFAULT '0',
  `education` varchar(100) DEFAULT '0',
  `degree` varchar(50) DEFAULT '0',
  `articles` text,
  `other_teacher_detailes` text,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `FK_teachers_users` FOREIGN KEY (`email`) REFERENCES `users` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES ('1', 'Олександра', 'Василівна', 'Сіра', 'mail1@mail.com', '/css/images/teacher/teacher1.jpg', null, '0', '0', 'кройка и шитье сроков, програмування самоубийств ', '0', '0', '0', null, null);

-- ----------------------------
-- Table structure for teacher_temp
-- ----------------------------
DROP TABLE IF EXISTS `teacher_temp`;
CREATE TABLE `teacher_temp` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) NOT NULL,
  `middle_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `foto_url` varchar(100) NOT NULL,
  `subjects` varchar(100) NOT NULL DEFAULT '0',
  `profile_text` text NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher_temp
-- ----------------------------
INSERT INTO `teacher_temp` VALUES ('1', 'Олександра', 'Василівна', 'Сіра', '/css/images/teacher1.jpg', 'кройка и шитье сроков; програмування самоубийств', '<p>Профессиональный преподаватель бухгалтерского и налогового учета Национальноготранспортного университета кафедры финансов, учета и аудита со стажем преподавательской работы более 25 лет. Закончила аспирантуру, автор 36 научных работ в области учета и аудита, в т.ч. уникальной обучающей методики написания бухгалтерских проводок: <span>\"Как украсть и не сесть\" </span> и <span>\"Как украсть и посадить другого\" </span>.</p><p>Главный бухгалтер акционерного предприятия, специализирующегося на:<ul><li>оказании полезных услуг горизонтального характера;</li><li>торговле, внешнеэкономической и внутреннеэкономической;</li><li>позитивное обучение швейного мастерства;</li></ul></p>');
INSERT INTO `teacher_temp` VALUES ('2', 'Константин', 'Константинович', 'Константинопольский', '/css/images/teacher2.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы.  <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>');
INSERT INTO `teacher_temp` VALUES ('3', 'Любовь', 'Анатольевна', 'Ктоятакая-Замухриншская', '/css/images/teacher3.jpg', 'Бухгалтер с «О» и до первой отсидки; Программирование своего позитивного прошлого', '<p>Практикующий главный бухгалтер. Учредитель ПП <span>«Логика тут безсильна»</span>;</p>\r\n<p>Образование высшее - ДонГУ (1987г.)</p>\r\n<p>Опыт работы 27 лет, в т. ч. преподавания - 9 лет.</p>\r\n<ul><li>специалист по позитивной энергетике;</li><li>эксперт по эффективному ремонту баянов;</li><li>мастер психотерапии для сложных бабушек и дедушек;</li></ul>');
INSERT INTO `teacher_temp` VALUES ('4', 'Василий', 'Васильевич', 'Меняетпроффесию', '/css/images/teacher4.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы.  <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>');
INSERT INTO `teacher_temp` VALUES ('5', 'Ия', 'Тожевна', 'Воваяготова', '/css/images/teacher5.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы.  <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>');
INSERT INTO `teacher_temp` VALUES ('6', 'Петросян', 'Петросянович', 'Забугорный', '/css/images/teacher6.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы.  <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>');

-- ----------------------------
-- Table structure for team
-- ----------------------------
DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `post` varchar(64) DEFAULT NULL,
  `pic` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of team
-- ----------------------------
INSERT INTO `team` VALUES ('1', 'Кузнецов  Андрей  Сергеевич', 'слесарь', '541dff9af18fe.jpg');
INSERT INTO `team` VALUES ('2', 'Квентин', 'сантехник', '541dffd7e4f9f.jpg');
INSERT INTO `team` VALUES ('3', 'Арни', 'электрик', '541e015b628be.jpg');
INSERT INTO `team` VALUES ('4', 'Аврил', 'пост', '541e01d395797.jpg');
INSERT INTO `team` VALUES ('5', 'Бриттани Мерфи', 'пост', '541e01ecd43b2.jpg');

-- ----------------------------
-- Table structure for tests
-- ----------------------------
DROP TABLE IF EXISTS `tests`;
CREATE TABLE `tests` (
  `test_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fkmodule_ID` int(11) NOT NULL,
  `fklecture_ID` int(11) NOT NULL,
  `test_title` varchar(45) NOT NULL,
  `test_description` varchar(45) NOT NULL,
  `test_url` varchar(45) NOT NULL,
  PRIMARY KEY (`test_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tests
-- ----------------------------
INSERT INTO `tests` VALUES ('1', '2', '2', 'Test 2', 'Description 2', 'URL 2');
INSERT INTO `tests` VALUES ('2', '3', '3', 'Test 3', 'Description 3', 'URL 3');

-- ----------------------------
-- Table structure for theoreticalsmaterials
-- ----------------------------
DROP TABLE IF EXISTS `theoreticalsmaterials`;
CREATE TABLE `theoreticalsmaterials` (
  `tm_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fkmodule_ID` int(11) NOT NULL,
  `fklecture_ID` int(11) NOT NULL,
  `TM_name` varchar(45) NOT NULL,
  `TM_description` varchar(45) NOT NULL,
  `TM_url` varchar(255) NOT NULL,
  PRIMARY KEY (`tm_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of theoreticalsmaterials
-- ----------------------------
INSERT INTO `theoreticalsmaterials` VALUES ('1', '1', '1', 'TM 1', 'Description 1', 'URL 1');
INSERT INTO `theoreticalsmaterials` VALUES ('2', '2', '2', 'TM 2', 'Description 2', 'URL 2');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(35) NOT NULL,
  `user_passwd` varchar(40) NOT NULL,
  `user_hash` varchar(20) NOT NULL,
  `user_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'mail1@mail.com', 'qwerty', '67896', '0');

-- ----------------------------
-- Table structure for videos
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `video_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fkmodule_ID` int(11) NOT NULL,
  `fklecture_ID` int(11) NOT NULL,
  `video_name` varchar(45) NOT NULL,
  `video_description` varchar(45) NOT NULL,
  `video_url` varchar(45) NOT NULL,
  `video_durationin_seconds` int(11) NOT NULL,
  PRIMARY KEY (`video_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of videos
-- ----------------------------
INSERT INTO `videos` VALUES ('1', '1', '1', 'Video 1', 'Description 1', 'URL 1', '344');
