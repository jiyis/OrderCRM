/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.5.39-MariaDB-log : Database - ordercrm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ordercrm` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ordercrm`;

/*Table structure for table `bixiu_admin` */

DROP TABLE IF EXISTS `bixiu_admin`;

CREATE TABLE `bixiu_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `userpic` varchar(255) NOT NULL,
  `logintime` varchar(11) NOT NULL,
  `loginip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `bixiu_admin` */

insert  into `bixiu_admin`(`id`,`username`,`password`,`salt`,`userpic`,`logintime`,`loginip`) values (1,'admin','fb84f6af3210e5aee54a282770cee0d3','OpHxTA','','','');

/*Table structure for table `bixiu_auth_group` */

DROP TABLE IF EXISTS `bixiu_auth_group`;

CREATE TABLE `bixiu_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `bixiu_auth_group` */

/*Table structure for table `bixiu_auth_group_access` */

DROP TABLE IF EXISTS `bixiu_auth_group_access`;

CREATE TABLE `bixiu_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `bixiu_auth_group_access` */

/*Table structure for table `bixiu_auth_rule` */

DROP TABLE IF EXISTS `bixiu_auth_rule`;

CREATE TABLE `bixiu_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `bixiu_auth_rule` */

/*Table structure for table `bixiu_calendar` */

DROP TABLE IF EXISTS `bixiu_calendar`;

CREATE TABLE `bixiu_calendar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `calid` varchar(255) NOT NULL COMMENT '默认的id',
  `title` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `className` varchar(255) NOT NULL DEFAULT 'label-important',
  `allDay` varchar(10) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`),
  KEY `calid` (`calid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `bixiu_calendar` */

insert  into `bixiu_calendar`(`id`,`calid`,`title`,`start`,`end`,`className`,`allDay`) values (1,'','今天改下单了！！！','1409673600','1409673600','label-important','true'),(2,'','1','1412006400','1412006400','label-important','true'),(3,'','','0','0','label-important',''),(4,'','45','1412092800','1412092800','label-important','true'),(5,'','','0','0','label-important',''),(6,'','','0','0','label-important',''),(7,'','','0','0','label-important',''),(8,'','','0','0','label-important',''),(9,'','','0','0','label-important',''),(10,'','','0','0','label-important',''),(11,'','本末文化交货日','1416009600','1416009600','label-important','true');

/*Table structure for table `bixiu_design` */

DROP TABLE IF EXISTS `bixiu_design`;

CREATE TABLE `bixiu_design` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL COMMENT '订单ID',
  `style` varchar(255) NOT NULL COMMENT '款式',
  `numbers` varchar(255) NOT NULL COMMENT '数量',
  `require` text NOT NULL COMMENT '要求',
  `sendMethond` varchar(255) NOT NULL COMMENT '发货方式',
  `designTime` varchar(11) NOT NULL COMMENT '设计时间',
  `deliveryTime` varchar(11) NOT NULL COMMENT '交货日期',
  `remarks` text NOT NULL COMMENT '备注',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '下单人id',
  `createTime` varchar(11) NOT NULL,
  `recycle` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除（回收站）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `bixiu_design` */

insert  into `bixiu_design`(`id`,`oid`,`style`,`numbers`,`require`,`sendMethond`,`designTime`,`deliveryTime`,`remarks`,`uid`,`createTime`,`recycle`) values (7,1,'BXM-002','5000','印刷要求','顺风','2014-09-17','2014-09-26','打样ssss',2,'1410340049',0),(8,1,'BXM-005','855','印刷要求','顺丰快递','1410883200','1411056000','备注',2,'1410341633',0),(9,2,'qwe','wq','ewq','qw','1410883200','1411056000','asd',2,'1410400639',0),(10,0,'BXM-0011','101','01','倒萨','1413648000','1414252800','10',2,'1414333770',0),(11,0,'BXM-00111','10000','0','0','1412524800','1413216000','0101',2,'1414333800',0),(12,29,'BMX-001','10000','1','0','1413129600','1412524800','00',2,'1414333931',0),(13,29,'BXM-00111','1000','10','01','1413129600','1412524800','01',2,'1414333987',0),(14,30,'BX023','500','一处单色印字','申通快递','1414857600','1416240000','不做打样',5,'1414811448',0),(15,31,'BX-001','5000','笔夹一处单色，笔杆一处单色印字。','申通快递','2014-11-02','2014-11-20','需要打样确认。qq285785125',2,'1414813853',0),(16,32,'BX-01','2000','一处单色印字','申通快递','1414944000','1416240000','急单，需要第一时间设计。',2,'1414994648',0);

/*Table structure for table `bixiu_order` */

DROP TABLE IF EXISTS `bixiu_order`;

CREATE TABLE `bixiu_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '下单用户user的id',
  `department` varchar(50) NOT NULL COMMENT '用户所在部门',
  `ordername` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT '客户名字',
  `salesname` varchar(50) NOT NULL COMMENT '业务员名字',
  `tel` varchar(11) NOT NULL COMMENT '客户电话',
  `onlinelink` varchar(255) NOT NULL COMMENT '客户在线QQ',
  `address` varchar(255) NOT NULL COMMENT '客户发货地址',
  `status` varchar(255) NOT NULL DEFAULT '0' COMMENT '订单是否结束',
  `agreement` tinyint(1) DEFAULT '0',
  `process` varchar(255) NOT NULL DEFAULT '下单中' COMMENT '订单进度',
  `salsubmit` tinyint(4) NOT NULL DEFAULT '0' COMMENT '已经下单',
  `desid` int(11) NOT NULL DEFAULT '0' COMMENT '接单人的id',
  `dessubmit` tinyint(4) NOT NULL DEFAULT '0' COMMENT '设计提交订单',
  `resultpics` text NOT NULL COMMENT '设计效果图',
  `pursubmit` tinyint(4) NOT NULL DEFAULT '0' COMMENT '采购审核',
  `pursay` text NOT NULL COMMENT '采购评价',
  `suppid` int(11) NOT NULL COMMENT '供应商id',
  `suppsubmit` tinyint(4) NOT NULL DEFAULT '0' COMMENT '供应商审核',
  `createtime` varchar(20) NOT NULL COMMENT '创建时间',
  `altertime` varchar(11) NOT NULL COMMENT '最后修改时间',
  `ip` varchar(20) NOT NULL COMMENT '登录ip',
  `deliverytime` varchar(11) NOT NULL COMMENT '交货时间',
  `recycle` tinyint(4) NOT NULL DEFAULT '0' COMMENT '回收站',
  PRIMARY KEY (`id`),
  KEY `suppid` (`suppid`),
  KEY `uid` (`uid`),
  KEY `desid` (`desid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `bixiu_order` */

insert  into `bixiu_order`(`id`,`uid`,`department`,`ordername`,`username`,`salesname`,`tel`,`onlinelink`,`address`,`status`,`agreement`,`process`,`salsubmit`,`desid`,`dessubmit`,`resultpics`,`pursubmit`,`pursay`,`suppid`,`suppsubmit`,`createtime`,`altertime`,`ip`,`deliverytime`,`recycle`) values (1,2,'销售部','订单001','王先生','小张','15636857550','12365857550','江苏省苏州市撒','0',0,'供应商已确认，<br>订单完成！',1,1,1,'/Public/uploads/upload/bixiu/orderId-1/thumbpics/thumb-0923153110EgUYQV.jpg||||||/Public/uploads/upload/bixiu/orderId-1/bigpics/0923153110EgUYQV.jpg::::::/Public/uploads/upload/bixiu/orderId-1/thumbpics/thumb-0923153110mbPtJA.jpg||||||/Public/uploads/upload/bixiu/orderId-1/bigpics/0923153110mbPtJA.jpg',1,'效果还不错',3,0,'1409822550','1410341945','0.0.0.0','1410341945',0),(2,2,'销售部','订单002','张先生','小张','15606135880','4259985741','江苏省苏州市吴中区','0',0,'已设计完成，<br>正在等待采购部审核',1,1,0,'/Public/uploads/upload/bixiu/orderId-2/thumbpics/thumb-1102200916aKfMR4.jpg||||||/Public/uploads/upload/bixiu/orderId-2/bigpics/1102200916aKfMR4.jpg::::::/Public/uploads/upload/bixiu/orderId-2/thumbpics/thumb-1102200916edSwXs.jpg||||||/Public/uploads/upload/bixiu/orderId-2/bigpics/1102200916edSwXs.jpg',0,'图片错误',3,0,'1409822550','1409822550','0.0.0.0','1410341945',0),(3,2,'销售部','订单003','纪先生','小张','16589675660','123658575501','江苏省苏州市','0',0,'下单中',0,0,0,'',0,'',3,0,'1409822550','1411118241','0.0.0.0','1410341945',0),(4,2,'销售部','订单005','顾先生','小张','15696532322','425566565','上海市浦东新区','0',0,'下单中',0,0,0,'',0,'',3,0,'1411371379','1411371379','0.0.0.0','',0),(5,2,'销售部','11','11','小张','11','11','11','0',0,'下单中',0,0,0,'',0,'',3,0,'1413903021','1413903021','127.0.0.1','',0),(6,2,'销售部','22','22','小张','22','22','22','0',0,'下单中',0,0,0,'',0,'',3,0,'1413903029','1413903029','127.0.0.1','',0),(7,2,'销售部','33','33','小张','33','33','33','0',0,'下单中',0,0,0,'',0,'',3,0,'1413903037','1413903037','127.0.0.1','',0),(8,2,'销售部','记忆44454','44','小张','44','44','44','0',0,'下单中',0,0,0,'',0,'',3,0,'1413903044','1413903044','127.0.0.1','',0),(9,2,'销售部','55','55','小张','55','55','55','0',0,'下单中',0,0,0,'',0,'',3,0,'1413903052','1413903052','127.0.0.1','',0),(10,2,'销售部','66','66','小张','66','66','66','0',0,'下单中',0,0,0,'',0,'',3,0,'1413903067','1413903067','127.0.0.1','',0),(11,2,'销售部','77','77','小张','77','77','77','0',0,'下单中',0,0,0,'',0,'',3,0,'1413903076','1413903076','127.0.0.1','',0),(12,2,'销售部','21','12','小张','12','12','12','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332183','1414332183','127.0.0.1','',0),(13,2,'销售部','打算','阿萨德','小张','打算','阿萨德','打算','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332379','1414332379','127.0.0.1','',0),(14,2,'销售部','记忆44','打算','小张','倒萨','倒萨','倒萨','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332537','1414332537','127.0.0.1','',0),(15,2,'销售部','撒旦','阿萨德撒旦','小张','打算','撒旦','安德森','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332587','1414332587','127.0.0.1','',0),(16,2,'销售部','qqq','213','小张','321','123','213','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332763','1414332763','127.0.0.1','',0),(17,2,'销售部','阿萨德4','14','小张','14','14','14','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332833','1414332833','127.0.0.1','',0),(18,2,'销售部','阿萨德47','14','小张','14','14','14','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332866','1414332866','127.0.0.1','',0),(19,2,'销售部','阿萨德471','14','小张','14','14','14','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332895','1414332895','127.0.0.1','',0),(20,2,'销售部','阿萨德4啊','admin','小张','14','1','141','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332907','1414332907','127.0.0.1','',0),(21,2,'销售部','阿萨德4啊1','admin','小张','14','1','141','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332922','1414332922','127.0.0.1','',0),(22,2,'销售部','阿萨德4啊11','admin','小张','14','1','141','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332934','1414332934','127.0.0.1','',0),(23,2,'销售部','213123123','123','小张','213','3213','123','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332959','1414332959','127.0.0.1','',0),(24,2,'销售部','141414撒旦','11','小张','1','1','1','0',0,'下单中',0,0,0,'',0,'',3,0,'1414332994','1414332994','127.0.0.1','',0),(25,2,'销售部','141414撒旦1','11','小张','1','1','1','0',0,'下单中',0,0,0,'',0,'',3,0,'1414333024','1414333024','127.0.0.1','',0),(26,2,'销售部','6666666','6','小张','6','6','6','0',0,'下单中',0,0,0,'',0,'',3,0,'1414333102','1414333102','127.0.0.1','',0),(27,2,'销售部','7','7','小张','7','7','7','0',0,'下单中',0,0,0,'',0,'',3,0,'1414333177','1414333177','127.0.0.1','',0),(28,2,'销售部','记忆121','14','小张','12','1','1','0',0,'下单中',0,0,0,'',0,'',3,0,'1414333340','1414333340','127.0.0.1','',0),(29,2,'销售部','记忆1211','14','小张','12','1','1','0',0,'下单中',0,0,0,'',0,'',3,0,'1414333364','1414333364','127.0.0.1','',0),(30,5,'销售部','苏州本末文化 BX023','本末文化','路育春','13915406846','苏州东海','苏州东海','0',0,'供应商已确认，<br>订单完成！',1,1,1,'/Public/uploads/upload/bixiu/orderId-1/thumbpics/thumb-0923153110EgUYQV.jpg||||||/Public/uploads/upload/bixiu/orderId-1/bigpics/0923153110EgUYQV.jpg::::::/Public/uploads/upload/bixiu/orderId-1/thumbpics/thumb-0923153110mbPtJA.jpg||||||/Public/uploads/upload/bixiu/orderId-1/bigpics/0923153110mbPtJA.jpg',1,'可以安排生产。',3,1,'1414811315','1414811571','222.93.114.250','',0),(31,2,'销售部','jljsfljlasf','苏州笔秀','小张','67503421','13771816564','苏州东环路','0',0,'下单中',0,0,0,'',0,'',3,0,'1414813439','1414813439','222.93.114.250','',0),(32,2,'销售部','苏州本末文化广告笔','苏州本末文化','小张','12548455845','2358789qq','苏州','0',0,'已下单，<br>正在等待接单',1,0,0,'',0,'',3,0,'1414994524','1414994524','121.239.39.148','',0);

/*Table structure for table `bixiu_user` */

DROP TABLE IF EXISTS `bixiu_user`;

CREATE TABLE `bixiu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL COMMENT '真实姓名',
  `password` varchar(255) NOT NULL,
  `salt` varchar(11) NOT NULL COMMENT '加密盐',
  `department` varchar(50) NOT NULL COMMENT '所属部门',
  `userpic` varchar(255) NOT NULL DEFAULT '/Public/acestyle/avatars/user.jpg' COMMENT '头像',
  `tel` varchar(11) NOT NULL COMMENT '电话',
  `logintime` varchar(11) NOT NULL COMMENT '最后登陆时间',
  `loginip` varchar(20) NOT NULL COMMENT '最后登录ip',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `bixiu_user` */

insert  into `bixiu_user`(`id`,`username`,`nickname`,`password`,`salt`,`department`,`userpic`,`tel`,`logintime`,`loginip`,`status`) values (1,'bixiu','记忆','23e67f0b1743d455cd768278cb22230f','BYNBKD','设计部','/Public/acestyle/avatars/user.jpg	','12565398552','1408091561','0.0.0.0',1),(2,'jiyi','小张','23e67f0b1743d455cd768278cb22230f','BYNBKD','销售部','/Public/acestyle/avatars/user.jpg	','15698574885','1408093207','0.0.0.0',1),(3,'test','顺风供应商','0b80c8c5a472ed986a8bbceef4bc7c1a','Mgdg9s','供应商','/Public/acestyle/avatars/user.jpg	','16895741550','1408351351','0.0.0.0',1),(4,'jiyi1','小董','8d8d6d08f0736d8b68e5210cc3358f03','TRpvXE','采购部','/Public/acestyle/avatars/user.jpg	','18578964882','1409813938','0.0.0.0',1),(5,'lyc','路育春','6e09f1f173820e2d8e4ec3d8101a5bb2','Sv3WAx','销售部','','','1414811122','222.93.114.250',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
