/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : highschool

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2016-05-06 17:56:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_choosecourse
-- ----------------------------
DROP TABLE IF EXISTS `tb_choosecourse`;
CREATE TABLE `tb_choosecourse` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `course_id` int(5) DEFAULT NULL,
  `student_id` int(5) DEFAULT NULL,
  `teacher_id` int(5) DEFAULT NULL,
  `choosetime` varchar(15) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_choosecourse
-- ----------------------------
INSERT INTO `tb_choosecourse` VALUES ('8', '5', '1', '3', '1462358715', 'compulsory');
INSERT INTO `tb_choosecourse` VALUES ('9', '6', '1', '1', '1462358715', 'compulsory');
INSERT INTO `tb_choosecourse` VALUES ('10', '7', '1', '4', '1462358715', 'take');
INSERT INTO `tb_choosecourse` VALUES ('11', '5', '2', '3', '1462459512', '必修');
INSERT INTO `tb_choosecourse` VALUES ('12', '7', '2', '4', '1462459512', '选修');
INSERT INTO `tb_choosecourse` VALUES ('13', '18', '2', '3', '1462459512', '必修');

-- ----------------------------
-- Table structure for tb_count
-- ----------------------------
DROP TABLE IF EXISTS `tb_count`;
CREATE TABLE `tb_count` (
  `count_read` int(11) DEFAULT NULL,
  `count_send` int(11) DEFAULT NULL,
  `count_discuss` int(11) DEFAULT NULL,
  `count_id` int(11) DEFAULT NULL,
  `para_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_count
-- ----------------------------
INSERT INTO `tb_count` VALUES (null, null, '9', '1', '14');
INSERT INTO `tb_count` VALUES (null, null, '7', '2', '11');
INSERT INTO `tb_count` VALUES (null, null, '8', '3', '12');

-- ----------------------------
-- Table structure for tb_course
-- ----------------------------
DROP TABLE IF EXISTS `tb_course`;
CREATE TABLE `tb_course` (
  `course_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) DEFAULT NULL,
  `course_type` varchar(20) DEFAULT NULL,
  `credits` varchar(10) DEFAULT NULL,
  `classroom` varchar(100) DEFAULT NULL,
  `week` varchar(20) DEFAULT NULL,
  `ctime` varchar(20) DEFAULT NULL,
  `teacher` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_course
-- ----------------------------
INSERT INTO `tb_course` VALUES ('11', 'jquery程序设计1', '选修', '2', '东A301', '星期一', '1', '3');
INSERT INTO `tb_course` VALUES ('3', '计算机通信原理与系统', '必修', '3', '西A501', '星期四', '1', '1');
INSERT INTO `tb_course` VALUES ('5', '计算机网络技术基础', '必修', '3', '西B305', '星期二', '3', '3');
INSERT INTO `tb_course` VALUES ('4', '移动互联技术', '必修', '2', '西A401', '星期四', '3', '3');
INSERT INTO `tb_course` VALUES ('6', '高等数学', '必修', '5', '二教305', '星期三', '2', '1');
INSERT INTO `tb_course` VALUES ('7', 'HTML5程序设计', '选修', '3', '二教211', '星期五', '1', '4');
INSERT INTO `tb_course` VALUES ('8', 'jquery程序设计', '选修', '3', '二教101', '星期三', '4', '4');
INSERT INTO `tb_course` VALUES ('10', 'jquery程序设计', '选修', '3', '二教301', '星期一', '1', '1');
INSERT INTO `tb_course` VALUES ('13', '装逼设计', '选修', '3', '二教302', '星期一', '1', '1');
INSERT INTO `tb_course` VALUES ('18', 'py交易', '必修', '6', '二教505', '星期五', '5', '3');
INSERT INTO `tb_course` VALUES ('19', 'yd交易', '必修', '4', '二教222', '星期二', '1', '3');
INSERT INTO `tb_course` VALUES ('20', 'cnm', '必修', '4', '43', '星期三', '1', '3');

-- ----------------------------
-- Table structure for tb_message
-- ----------------------------
DROP TABLE IF EXISTS `tb_message`;
CREATE TABLE `tb_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_content` varchar(255) DEFAULT NULL,
  `message_publish` int(10) DEFAULT NULL,
  `message_good` int(11) DEFAULT NULL,
  `para_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `child` tinyint(1) unsigned zerofill DEFAULT '0',
  `parent_id` int(20) unsigned zerofill DEFAULT '00000000000000000000',
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_message
-- ----------------------------
INSERT INTO `tb_message` VALUES ('15', '这是第一条', '1461942011', null, '22', '1', '0', '00000000000000000000');
INSERT INTO `tb_message` VALUES ('16', '这是第二条', '1461942077', null, '22', '1', '1', '00000000000000000002');
INSERT INTO `tb_message` VALUES ('17', '这是第三条', '1461942249', null, '22', '1', '1', '00000000000000000003');
INSERT INTO `tb_message` VALUES ('18', '这是第四条回复', '1462252885', null, '22', '1', '0', '00000000000000000000');

-- ----------------------------
-- Table structure for tb_onlinestu
-- ----------------------------
DROP TABLE IF EXISTS `tb_onlinestu`;
CREATE TABLE `tb_onlinestu` (
  `online_id` int(11) NOT NULL AUTO_INCREMENT,
  `online_author` int(10) DEFAULT NULL,
  `online_title` varchar(255) DEFAULT NULL,
  `online_kind` varchar(255) DEFAULT NULL,
  `online_publishtime` int(15) DEFAULT NULL,
  `online_endtime` int(15) DEFAULT NULL,
  `course_id` int(10) DEFAULT NULL,
  `state` tinyint(2) DEFAULT '0',
  `yaoqiu` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`online_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_onlinestu
-- ----------------------------
INSERT INTO `tb_onlinestu` VALUES ('27', '3', '毕业课程设计', null, '1462459753', null, '4', '0', 'none');
INSERT INTO `tb_onlinestu` VALUES ('26', '3', '计算机网络', null, '1462451650', null, '5', '0', 'nnone');
INSERT INTO `tb_onlinestu` VALUES ('33', '3', '课程设计', null, '1462460505', null, '5', '0', 'none');

-- ----------------------------
-- Table structure for tb_paragraph
-- ----------------------------
DROP TABLE IF EXISTS `tb_paragraph`;
CREATE TABLE `tb_paragraph` (
  `para_id` int(11) NOT NULL AUTO_INCREMENT,
  `para_content` varchar(10000) NOT NULL,
  `para_publish` int(20) DEFAULT NULL COMMENT '发布时间',
  `para_title` varchar(255) NOT NULL,
  `para_kind` varchar(255) DEFAULT NULL,
  `para_video` varchar(255) DEFAULT NULL,
  `para_picture` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `count_read` int(10) DEFAULT '0',
  `count_send` int(10) DEFAULT '0',
  `count_discuss` int(10) DEFAULT '0',
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`para_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_paragraph
-- ----------------------------
INSERT INTO `tb_paragraph` VALUES ('3', '', null, '这是3', null, null, null, '1', null, null, null, 'student');
INSERT INTO `tb_paragraph` VALUES ('4', '', null, '这是4', null, null, null, '1', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('5', 'waowaowao', null, '啦啦啦 德玛西亚', null, null, null, '3', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('6', 'waowaowao', null, '啦啦啦 德玛西亚', null, null, null, '3', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('7', 'waowaowao', null, '啦啦啦 德玛西亚', null, null, null, '3', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('8', '12341234111222333', null, 'test', null, null, null, '2', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('9', '12341234111222333', null, 'test', null, null, null, '2', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('10', '爱威锋网', null, '1212121', null, null, null, '2', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('11', '爱威锋网阿瑟发威风威风', null, '原来是这样', null, null, null, '2', '13', '5', '13', 'student');
INSERT INTO `tb_paragraph` VALUES ('12', '爱威锋网阿瑟发威风威风wfqwef', null, '1212121', null, null, null, '1', '12', '4', '12', 'student');
INSERT INTO `tb_paragraph` VALUES ('14', '他们说这里有一盏灯，比星星更亮。\r\n关于变老，我作为一个二十岁开头的年轻人，第一次有很深的感触是一个学期没回家爸妈的皱纹和白发，第二次是妈妈体检报告上成片的红色，第三次是一个老人，家里的灯泡坏了，他没法换，就摸黑去上厕所，然后，就没有然后了。', '1460123825', '十万个为什么', null, null, null, '1', '16', '6', '16', 'student');
INSERT INTO `tb_paragraph` VALUES ('15', '这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试这就是测试and测试', '1460182682', '这就是测试and测试', 'wenxue', null, null, '1', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('16', '这就是测试and测试，哈哈哈哈哈', '1460182747', '这还是测试', 'shuxue', null, null, '1', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('19', '1212121212121212211212', '1460363129', '`121212121212', 'wenxue', null, null, '1', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('20', 'caonima', '1460363229', '这是傻逼', 'shuxue', null, null, '1', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('21', '傻逼傻逼\n傻逼\n傻逼不吧\nshssfwejfwojfwoifhwoifjowfjowifjwoifjowifjqowfjowfjowiefjwfijwpogjowijfowifjowifjwoefijweifwpofijwpoifjwoifjowefjowiefjio', '1460378901', '测试', 'wenxue', null, null, '1', '0', null, '0', 'student');
INSERT INTO `tb_paragraph` VALUES ('22', '发违法(O_O)?管他3条而过死的人高收入管委会和\n跟一爱空间斯蒂芬妮儿娃和覅恩贵而不管妞儿吧诶orgIE人工湖IE如果坏IEUR个hi䦹 ', '1460698170', '温范围范围', 'wenxue', null, null, '1', '6', null, '18', 'student');
INSERT INTO `tb_paragraph` VALUES ('23', '       泪洒五月，梅林清晨，独自键盘，我思念如风，只想在这个妩媚的五月轻轻地向故乡倾诉细碎语软，从容地浅释青春的落寞与锦繁。体味生命的浓和淡，安与暖，清或欢。风若鸦鹊无声的宁静，只轻轻呼吸，格陵兰的落花暗香犹在。\n\n       很冷， 五月凌晨细碎的阳光从枝繁叶茂的树枝缝间漏下来，洒在岑寂的凌晨里，变成冰廊转角处一道赏心悦目的晶莹剔透。岁月匆匆，流年似水，却不忍北冰洋的斑驳和琉璃，原来冰冷宁静致远竟是这般的美好！在悠然消逝的时光里难得有一份云静风清的闲逸。原来浮躁心情也可穿过喧闹的尘世变得这般的婉约，在一米阳光划过的手掌中去寻求海阔天高的恬然和清淡。\n\n       是思念的五月，是故乡五月你的离去让青春缠绵妩媚，是怀念的五月，是故乡五月你的离去让生命简约美丽。只有故乡五月让梅林如此心动得情不自己。缘和分的最深处，从最深的红尘，脱去华服锦衣而云淡风轻，只为缘分五月匆匆地，赶赴这一段奈何桥外的相识相聚。在五月里，只为在，终南秦岭的木楼上，看一场你乡村消逝的雁南飞。纵算片刻的相寄，终却依然是忠实先生一世的别离。或许流经它年后，我依然可以，凭借清风的气息，回味昨天的你。清浅的岁月，婉约贾老撰文你依然在人间的祭文，关于你的记忆，一如那白鹿原的初夏里，七十三岁的你，顽皮地躲到老白杨背后去。即便想用十指捂紧五月的阳光，却指缝也如沙漏下秦川有关你金灿灿的光芒。\n\n       思念故乡，轻轻诉说我心底的那一份柔意。或许故乡五月，清晨时，风又轻又柔。我在异域他乡，只想为你捧一份静谧的时光，依一抹灵魂的暗香，沉默无语，浅吟低诉。锦素人生，笔画山水，盈一束青春的雅韵，剪一段岁月的宁静，为你流年轻吟，淡看风清。白驹过隙，虽然你已远离，但灵魂依在，兀自如花开成一朵嫣然，染心；虽你已离去，但笔韵依在，恍若绣一段人生之锦，润眸。生命的尽头里，七十三岁的你，捻一朵微笑，淡泊在心；红尘中，你为文学绘一幅山水，叠加锦绣；文字里，诉一笺人间心语，素年从容，文采依旧温暖留香.....\n\n       剪裁五月的晨冰，透过干净的玻璃窗，我看到故乡五月秦川飞舞的落花，或许你在天堂静怡聊天，喝茶，看书，用一种对比的温暖以及不经意的触动，去释怀一些生命的伤感，这是一种温暖，岁月的温暖。这个夏天，依旧阳光明媚，融融的意暖，无与纤尘不染。\n\n       拟一段人间四月天，听一笺心语流淌轻缓。你那七十三岁的尘心，安守文学的年华，如一枚秦川的玫红，奔赴一场红尘素宛。夏日流芳的世界里，半笺柔婉，意浓情深，蕴一生一世的依依情长。你说，告别白鸽，你在初夏情深了无言，爱深了无语，如今先生和你文中的白灵聚望，凭栏一曲，明月传情，心中有爱，不藏有遗怨，只为惊鸿一瞥的一场遇见，那么美，那么暖。\n\n       所有五月的守望，都是生命沾染了拈花的默契，岁月的故事里，总有一些深深的渴望触及念想。烟雨五月红，风动云更轻。请容许我打开积落的花径，为你把酒天堂，轻歌月下。为你斟一坛珍藏的秦岭香，用文字的对白，来豪取一角酒令，去勾兑依稀的流年、空白的过往；调和成一盏思念色的多愁善感，轻轻融入成你喜欢的金箔银碗里的一湄水湾，去焐热你文学的风，五月的雨……\n\n       静冷五月的格陵兰，我填写一纸素淡安闲，和时光煮语温柔对白，所有的过往相对无言，怀念在心涯如风般流浪，婉盈绕上眉间。岁月的长廊，掠过万千风景，生命的藤蔓，爬上心墙，疯狂成斑驳的温暖。\n\n       梅林惟愿，五月清简，无恙流年，待时光从容走过这季夏，然后，你我凝眸岁月，喜迎一米阳光……\n\n       五月的思念 为纪念陈忠实先生仙逝而作', '1462526884', '五月的思念', 'wenxue', null, null, '1', '0', '0', '1', 'student');

-- ----------------------------
-- Table structure for tb_student
-- ----------------------------
DROP TABLE IF EXISTS `tb_student`;
CREATE TABLE `tb_student` (
  `student_id` int(10) NOT NULL AUTO_INCREMENT,
  `account` char(20) DEFAULT NULL,
  `password` char(255) DEFAULT NULL,
  `chinese_name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `count` int(5) DEFAULT '0',
  `head_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_student
-- ----------------------------
INSERT INTO `tb_student` VALUES ('1', null, 'bae5e3208a3c700e3db642b6631e95b9', '张三', 'unknown', '15680328888', '379044496@qq.com', '这是一个测试', '14', './photo_head/379044496@qq.com/head.png');
INSERT INTO `tb_student` VALUES ('2', null, 'bae5e3208a3c700e3db642b6631e95b9', '王麻子', 'male', '13912341234', '32297989@qq.com', null, '8', './photo_head/32297989@qq.com/head.png');
INSERT INTO `tb_student` VALUES ('3', null, '84a2c1c75cdfd10a1f5fc5ee27f1d069', '李四', 'male', '12341234123', '123456@qq.com', null, '0', null);
INSERT INTO `tb_student` VALUES ('4', null, '5ff71a9f91dd001f05188c4bd46a1d01', '王五', 'male', '1235454565', '12345688@qq.com', null, '0', null);
INSERT INTO `tb_student` VALUES ('5', null, '5ff71a9f91dd001f05188c4bd46a1d01', null, 'male', '124124343', 'root@qq.com', null, '0', null);
INSERT INTO `tb_student` VALUES ('6', null, '84a2c1c75cdfd10a1f5fc5ee27f1d069', null, 'male', '1234342341', '3456789@qq.com', null, '0', null);
INSERT INTO `tb_student` VALUES ('7', null, '84a2c1c75cdfd10a1f5fc5ee27f1d069', null, 'male', '12344444321', '323333333@qq.com', null, '0', null);
INSERT INTO `tb_student` VALUES ('8', null, '25d55ad283aa400af464c76d713c07ad', null, 'male', '123456789098', '3233333@qq.com', null, '0', null);
INSERT INTO `tb_student` VALUES ('9', null, '84a2c1c75cdfd10a1f5fc5ee27f1d069', null, 'male', '12345678765', '888888@qq.com', null, '0', null);

-- ----------------------------
-- Table structure for tb_teacher
-- ----------------------------
DROP TABLE IF EXISTS `tb_teacher`;
CREATE TABLE `tb_teacher` (
  `account` char(255) NOT NULL,
  `password` char(255) DEFAULT NULL,
  `teacher_id` int(255) NOT NULL AUTO_INCREMENT,
  `chinese_name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `count` int(5) DEFAULT '0',
  `head_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_teacher
-- ----------------------------
INSERT INTO `tb_teacher` VALUES ('zztest', 'bae5e3208a3c700e3db642b6631e95b9', '1', '杨铸', '', '', '', '', '0', null);
INSERT INTO `tb_teacher` VALUES ('yangjian', 'bae5e3208a3c700e3db642b6631e95b9', '3', 'dannis', 'male', '', '13999999999', '我是一个老师', '17', './photo_head/379044496@qq.com/head.png');
INSERT INTO `tb_teacher` VALUES ('yangjuhua', 'bae5e3208a3c700e3db642b6631e95b9', '4', '杨菊英', '', '', '', '', '0', null);

-- ----------------------------
-- Table structure for tb_test
-- ----------------------------
DROP TABLE IF EXISTS `tb_test`;
CREATE TABLE `tb_test` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_content` varchar(255) DEFAULT NULL,
  `message_publish` int(10) DEFAULT NULL,
  `message_good` int(11) DEFAULT NULL,
  `para_id` int(10) DEFAULT NULL,
  `mp_id` int(5) DEFAULT '0',
  `cu_id` tinyint(5) unsigned DEFAULT '0',
  `pu_id` int(5) unsigned DEFAULT '0',
  `state` int(2) DEFAULT '0',
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_test
-- ----------------------------
INSERT INTO `tb_test` VALUES ('18', '这是第一条', '1461942011', null, '22', '0', '2', '0', '0', 'student');
INSERT INTO `tb_test` VALUES ('19', '这是第二条', '1461942077', null, '22', '0', '3', '0', '0', 'teacher');
INSERT INTO `tb_test` VALUES ('20', '这是第三条', '1461942249', null, '22', '0', '2', '0', '0', 'student');
INSERT INTO `tb_test` VALUES ('21', '这是第一条的1回复', '1461942021', null, '22', '18', '1', '2', '1', 'teacher');
INSERT INTO `tb_test` VALUES ('22', '这是第三条的1回复', '1461942111', null, '22', '20', '1', '2', '1', 'teacher');
INSERT INTO `tb_test` VALUES ('23', '这是第三条的2回复', '1461943011', null, '22', '20', '3', '2', '1', 'student');
INSERT INTO `tb_test` VALUES ('24', '这是第四条回复', '1462262122', null, '22', '0', '1', '0', '0', 'student');
INSERT INTO `tb_test` VALUES ('28', '这是第一条的2回复', '1462269008', null, '22', '18', '1', '2', '1', 'student');
INSERT INTO `tb_test` VALUES ('29', '哈哈哈', '1462269030', null, '22', '18', '1', '1', '1', 'student');
INSERT INTO `tb_test` VALUES ('30', '这是第二条的1回复', '1462269080', null, '22', '19', '1', '3', '1', 'student');
INSERT INTO `tb_test` VALUES ('31', '哈哈哈', '1462269107', null, '22', '23', '1', '3', '1', 'student');
INSERT INTO `tb_test` VALUES ('32', '哈哈哈哈', '1462269150', null, '22', '22', '1', '1', '1', 'student');
INSERT INTO `tb_test` VALUES ('33', '这是第三条的3回复', '1462269340', null, '22', '20', '1', '2', '1', 'student');
INSERT INTO `tb_test` VALUES ('34', '这是第四条的1回复', '1462279344', null, '22', '24', '1', '1', '1', 'student');
INSERT INTO `tb_test` VALUES ('35', '这是第五条', '1462279491', null, '22', '0', '1', '0', '0', 'student');
INSERT INTO `tb_test` VALUES ('36', '这是第五条的1回复', '1462376256', null, '22', '35', '3', '1', '1', 'teacher');
INSERT INTO `tb_test` VALUES ('37', 'hahaha', '1462415574', null, '22', '35', '1', '1', '1', 'student');
INSERT INTO `tb_test` VALUES ('38', '这是第四条的2回复', '1462423551', null, '22', '24', '1', '1', '1', 'student');
INSERT INTO `tb_test` VALUES ('39', '写的好好哦', '1462423615', null, '14', '0', '1', '0', '0', 'student');
INSERT INTO `tb_test` VALUES ('40', '我也觉得写的很好', '1462423678', null, '14', '39', '1', '1', '1', 'student');
INSERT INTO `tb_test` VALUES ('41', '', '1462508506', null, '22', '0', '1', '0', '0', 'student');
INSERT INTO `tb_test` VALUES ('42', '哈哈哈', '1462518533', null, '22', '0', '1', '0', '0', 'student');
INSERT INTO `tb_test` VALUES ('43', '写的真好', '1462527002', null, '23', '0', '1', '0', '0', 'student');

-- ----------------------------
-- Table structure for tb_worksub
-- ----------------------------
DROP TABLE IF EXISTS `tb_worksub`;
CREATE TABLE `tb_worksub` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) DEFAULT NULL,
  `online_id` int(10) DEFAULT NULL,
  `submittime` int(15) DEFAULT NULL,
  `state` int(2) DEFAULT '0',
  `filename` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_worksub
-- ----------------------------
INSERT INTO `tb_worksub` VALUES ('1', '1', '26', null, '0', '0');
INSERT INTO `tb_worksub` VALUES ('2', '1', '33', null, '1', 'zhangsan.zip');
INSERT INTO `tb_worksub` VALUES ('3', '2', '33', null, '0', '0');

-- ----------------------------
-- Table structure for tb_zan
-- ----------------------------
DROP TABLE IF EXISTS `tb_zan`;
CREATE TABLE `tb_zan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `para_id` int(5) DEFAULT NULL,
  `uid` int(5) DEFAULT NULL,
  `state` tinyint(2) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_zan
-- ----------------------------
INSERT INTO `tb_zan` VALUES ('1', '23', '1', '1', 'student');
