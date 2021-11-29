-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: book_store
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'khoapham123','202cb962ac59075b964b07152d234b70','khoakmp97@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_category`
--

DROP TABLE IF EXISTS `book_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_category`
--

LOCK TABLES `book_category` WRITE;
/*!40000 ALTER TABLE `book_category` DISABLE KEYS */;
INSERT INTO `book_category` VALUES (1,'Truyện tranh-Manga'),(2,'Sách tham khảo THPT'),(3,'Tủ Sách Olympic'),(4,'Kiến thức bách khoa'),(5,'Sách Tư Duy-Kĩ năng sống '),(6,'Sách y học-sức khỏe'),(7,'Sách Luyện thi đại học');
/*!40000 ALTER TABLE `book_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment_state` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userid` (`user_id`),
  KEY `fk_product_id` (`product_id`),
  CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `tb_book` (`id`),
  CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1637851490,1,1,'Sách đa dạng các chủ đề thích hợp để ôn thi hsg quốc gia và khu vực',0,'Yuta Takaya',1),(1637904787,1,1,'Good book. Very useful to learn basic about function equations.',0,'Yuta Takaya',1),(1637915190,1,1,'Very good',0,'Yuta Takaya',1),(1637920369,1,1,'Great book!!!',0,'Yuta Takaya',1),(1637920572,1,1,'Cuốn sách khá hay cho định hướng đam mê và phân biệt giữa đam mê và sở thích. Giúp bản thân mình có cái nhìn khách quan hơn về tài chính. Giao hàng nhanh, gói cẩn thận. 10 điểm',0,'Yuta Takaya',2),(1637980183,1,1,'So amazing, service is good',0,'Yuta Takaya',1),(1637980805,1,1,'Good book, suitable for high school student',0,'Yuta Takaya',1),(1638116052,1,59,'Super detective manga',0,'Yuta Takaya',1),(1638116080,1,59,'Super detective manga',0,'Yuta Takaya',1),(1638170550,1,73,'Very Good detective conan',0,'Yuta Takaya',1),(1638171502,1,54,'I want to comment',0,'Yuta Takaya',2),(1638171658,1,54,'super amazing goodjob',0,'Yuta Takaya',2),(1638171706,1,54,'coding something',0,'Yuta Takaya',2),(1638172623,1,54,'I want to comment',0,'Yuta Takaya',2),(1638180471,1,52,'vi du binh luan lai',0,'Yuta Takaya',1);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment_state`
--

DROP TABLE IF EXISTS `comment_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment_state` (
  `id` int(11) NOT NULL,
  `state_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment_state`
--

LOCK TABLES `comment_state` WRITE;
/*!40000 ALTER TABLE `comment_state` DISABLE KEYS */;
INSERT INTO `comment_state` VALUES (0,'wait'),(1,'accepted'),(2,'removed');
/*!40000 ALTER TABLE `comment_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `example`
--

DROP TABLE IF EXISTS `example`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `example` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `example`
--

LOCK TABLES `example` WRITE;
/*!40000 ALTER TABLE `example` DISABLE KEYS */;
INSERT INTO `example` VALUES (1,'Phương trình hàm','Lê Hoành Phò',80000),(2,'Chuyên khảo đa thức','Nguyễn Tài Chung',180000),(3,'Chuyên để tổ hợp','Lê Anh Vinh',20000),(4,'Phương trình hàm','Lê Hoành Phò',80000),(5,'Chuyên khảo đa thức','Nguyễn Tài Chung',180000),(6,'Chuyên để tổ hợp','Lê Anh Vinh',20000);
/*!40000 ALTER TABLE `example` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_book`
--

DROP TABLE IF EXISTS `tb_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `path_img` varchar(255) NOT NULL,
  `author_name` varchar(100) DEFAULT NULL,
  `short_description` varchar(210) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `pages_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category_id`),
  FULLTEXT KEY `name` (`name`,`author_name`,`short_description`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `book_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_book`
--

LOCK TABLES `tb_book` WRITE;
/*!40000 ALTER TABLE `tb_book` DISABLE KEYS */;
INSERT INTO `tb_book` VALUES (1,'Chuyên khảo phương trình hàm',130000,'../uploads/ckdathuc.jpg','Lê Hoành Phò-Nguyễn Tài Chung','Cuốn sách tổng hợp các kiến thức cơ bản cùng phương pháp giải các bài toán về phương trình, hàm số nhằm giúp các em học sinh tham khảo, ôn luyện.Nội dung bám sát chương trình THPT, nhất là lớp 12....',1,'NXB Đại học Quốc gia Hà Nội',140,420),(50,'Combo 3 Cuốn Truyện Thám Tử Lừng Danh Conan Vs. Tổ Chức Áo Đen: Tập 1 + Tập 2 + Tuyển Tập Đặc Biệt - FBI Selection',126000,'https://salt.tikicdn.com/cache/280x280/ts/product/e7/b6/0d/58f54e8ab64eb06b16e0b89c1089fa61.jpg','Gosho Aoyama','Conan và Haibara đã dần tìm hiểu sâu hơn về tổ chức áo đen tội ác. Đặc biệt, trong phần này, vụ dài nhất về cuộc đối đầu giữa tổ chức áo đen và FBI, rất gay cấn và hấp dẫn. Shuichi Akai, cùng với...',1,'NXB Kim Đồng',135,300),(51,'Combo Thám Tử Lừng Danh Conan Tập 31 - 40 (Bộ 10 cuốn)',199500,'https://salt.tikicdn.com/cache/280x280/ts/product/0c/5c/23/e3296b59536c43d093ed11691b4ecb87.jpg',' Gosho Aoyama','Mở đầu câu truyện, cậu học sinh trung học 17 tuổi Shinichi Kudo bị biến thành cậu bé Conan Edogawa. Shinichi trong phần đầu của Thám tử lừng danh Conan được miêu tả là một thám tử học đường xuất sắc....',1,'NXB Kim Đồng',100,0),(52,'Thám Tử Lừng Danh Conan Tập 97',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/1c/38/86/9b6a579e095939a7c9365752ecac72b4.jpg','Gosho Aoyama','Conan, Mori Kogoro, Amuro Toru, và Wakita Kanenori.\nBộ tứ kì lạ ấy cùng nhau đi tới một nhà thờ bỏ hoang ẩn mình trong núi sâu ở Nagano.\nPhải chăng chờ đợi họ ở đó là những án mạng và những mật mã bí...',1,'NXB Kim Đồng',100,100),(53,'Thám Tử Lừng Danh Conan - Tập 98',18000,'https://salt.tikicdn.com/cache/280x280/ts/product/6d/61/45/4d4166c4fee360442889f320c84a12c5.jpg','Gosho Aoyama','Sera Masumi tiếp tục thăm dò Haibara Ai và ở thế đối đầu với Okiya Subaru!\nTrong khi đó, Conan đã tiến đến gần chân tướng của “em gái ngoài lãnh địa” - Mary…!?\nHaneda Shukichi bất ngờ gặp án mạng tại...',1,'NXB Kim Đồng',100,100),(54,'Thám Tử Lừng Danh Conan - Tập 96',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/2f/19/1f/2244bb8951e3de9ddb1dc36d8cbf100d.jpg','Gosho Aoyama','Kaito Kid muốn giành lấy “Đôi Môi Tiên Nữ” và lần đầu đối mặt với Heiji Hattori!\nMakoto Kyogoku bị cuốn vào những vụ án xảy ra tại một địa điểm quay phim truyền hình…!?\nNhững thông tin mới nhất liên...',1,'NXB Kim Đồng',100,100),(55,'Combo Thám Tử Lừng Danh Conan Tập 01 - 10 (Bộ 10 cuốn)',200000,'https://salt.tikicdn.com/cache/280x280/ts/product/13/0c/9e/91c210fcc81178c03f3b33872634e00b.jpg','Aoyama Gosho','Mở đầu câu truyện, cậu học sinh trung học 17 tuổi Shinichi Kudo bị biến thành cậu bé Conan Edogawa. Shinichi trong phần đầu của Thám tử lừng danh Conan được miêu tả là một thám tử học đường xuất sắc....',1,'NXB Kim Đồng',100,0),(56,'Truyện tranh - Thám tử lừng danh Conan - 5 tập/ bộ - Nxb Kim Đồng',103000,'https://salt.tikicdn.com/cache/280x280/ts/product/9a/0e/f3/0bd417fa2852948639e5b63f3605652e.jpg','Aoyama Gosho','\n \nTrọn bộ từ tập 1 đến tập 90\nTác giả: Gosho Aoyama Khuôn Khổ: 11.3x17.6 cm\n   Định dạng: bìa mềm\n   Bộ sách: Thám tử lừng danh Conan\n   Ngày phát hành: 31/12/2019',1,'NXB Kim Đồng',100,0),(57,'Thám Tử Lừng Danh Conan - Tập 95',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/59/31/e5/5a6c39c0b9229088a765de43cfd79838.jpg','Gosho Aoyama','Thám Tử Lừng Danh Conan là một bộ truyện tranh trinh thám Nhật Bản của tác giả Aoyama Gõshõ. Nhân vật chính của truyện là một thám tử học sinh trung học có tên là Kudo Shinichi - thám tử học đường...',1,'NXB Kim Đồng',100,100),(58,'Thám Tử Lừng Danh Conan Tập 65 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/ff/e9/0e/28f6a7eb2caac69d7d2fc8b5d452cda1.jpg','Gosho Aoyama','Đáp lại lời thỉnh cầu của thanh tra Yamato Kansuke, Conan và mọi người bắt tay vào giải đố về vụ giết người với bức tường đỏ nhuốm máu. Cả kì phùng địch thủ của Kansuke là thanh tra Morofushi Komei...',1,'NXB Kim Đồng',100,100),(59,'Thám Tử Lừng Danh Conan Hoạt Hình Màu: Nhà Ảo Thuật Với Đôi Cánh Bạc - Tập 1',53500,'https://salt.tikicdn.com/cache/280x280/ts/product/15/7d/a0/2fb4c736533c6da4ff3e32a3ade0087c.jpg','Gosho Aoyama','Siêu trộm Kid gửi thư cảnh báo đến nữ diễn viên đại diện của Nhật Bản – Juri Maki! Mục tiêu của hắn là chiếc nhẫn gắn Star Sapphire – “Viên đá định mệnh”! Nhận được yêu cầu bảo vệ viên đá, đám ông...',1,'NXB Kim Đồng',120,0),(60,'Thám Tử Lừng Danh Conan - Tập 4 (Tái Bản)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/ff/81/8e/aa679f58e8732c7df495a3672bae983c.jpg','Aoyama Gosho','Thám Tử Lừng Danh Conan - Tập 4 (Tái Bản)\nThám Tử Lừng Danh Conan là một bộ truyện tranh trinh thám Nhật Bản của tác giả Aoyama Gosho.\nNhân vật chính của truyện là một thám tử học sinh trung học có...',1,'NXB Kim Đồng',100,100),(61,'Combo Thám Tử Lừng Danh Conan Tập 41 - 50 (Bộ 10 cuốn)',200000,'https://salt.tikicdn.com/cache/280x280/ts/product/0d/26/eb/badeafc8cd8ff2d35918fcfc490de125.jpg','Aoyama Gosho','Mở đầu câu truyện, cậu học sinh trung học 17 tuổi Shinichi Kudo bị biến thành cậu bé Conan Edogawa. Shinichi trong phần đầu của Thám tử lừng danh Conan được miêu tả là một thám tử học đường xuất sắc....',1,'NXB Kim Đồng',100,0),(62,'Thám Tử Lừng Danh Conan - Tập 5 (Tái Bản)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/91/54/29/affd1287ac61d9204a6afb5a8083aac4.jpg','Aoyama Gosho','Thám Tử Lừng Danh Conan - Tập 5 (Tái Bản)\nThám Tử Lừng Danh Conan là một bộ truyện tranh trinh thám Nhật Bản của tác giả Aoyama Gosho.\nNhân vật chính của truyện là một thám tử học sinh trung học có...',1,'NXB Kim Đồng',100,100),(63,'Thám Tử Lừng Danh Conan - Tập 86 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/9f/68/b9/c81eefee6fcb2c87d0e81ebc4a363997.jpg','Gosho Aoyama','Nữ thám tữ học sinh trung học Masumi SERA là người luôn có những hành động đầy ẩn ý. Mục đích thật sự của cô sẽ phần nào được hé lộ trong vụ án người phụ nữ màu đỏ, với một cái kết đầy bất ngờ. Trong...',1,'NXB Kim Đồng',100,100),(64,'Thám Tử Lừng Danh Conan - Tập 87 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/e5/b5/1c/45e3ba33d0e1014a540761f02595dbcb.jpg','Gosho Aoyama','Nữ thám tữ học sinh trung học Masumi SERA là người luôn có những hành động đầy ẩn ý. Mục đích thật sự của cô sẽ phần nào được hé lộ trong vụ án người phụ nữ màu đỏ, với một cái kết đầy bất ngờ. Trong...',1,'NXB Kim Đồng',100,100),(65,'Thám Tử Lừng Danh Conan - Tập 91 (Tái Bản 2019 )',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/08/09/43/b6c43feb185df0462f74c018704dba0e.jpg','Gosho Aoyama','Sự thật nào sẽ được làm sáng tỏ đằng sau mối bất hòa giữa hai con người phục vụ công lí ở hai vị thế khác nhau - mật vụ FBI Akai và cảnh sát Amuro!?\nCuộc phiêu lưu mới sẽ đưa độc giả đến gần hơn với...',1,'NXB Kim Đồng',100,100),(66,'Thám Tử Lừng Danh Conan - Tập 9 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/44/80/a7/1e43d859659fed7b42a8d000e0773911.jpg','Gosho Aoyama','Nữ thám tữ học sinh trung học Masumi SERA là người luôn có những hành động đầy ẩn ý. Mục đích thật sự của cô sẽ phần nào được hé lộ trong vụ án người phụ nữ màu đỏ, với một cái kết đầy bất ngờ. Trong...',1,'NXB Kim Đồng',100,100),(67,'Thám Tử Lừng Danh Conan - Tập 2 ( Tái Bản )',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/e3/bc/3a/f5411a154e4caa39d5e5608a06030ebe.jpg','Gosho Aoyama','Thám Tử Lừng Danh Conan - Tập 2 ( Tái Bản )\nConan đã quyết định ở nhờ tại văn phòng của thám tử Kogoro, bố của Mori Ran - bạn gái cậu, để lần theo tung tích bí ẩn kia. Nhằm tránh con mắt người đời,...',1,'NXB Kim Đồng',100,100),(68,'Thám Tử Lừng Danh Conan - Tập 94',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/a6/04/83/92095fd0686f9aa167cff2fa19cc3c6b.jpg','Aoyama Gosho','Thám Tử Lừng Danh Conan - Tập 94\nThám Tử Lừng Danh Conan là một bộ truyện tranh trinh thám Nhật Bản của tác giả Aoyama Gõshõ. Nhân vật chính của truyện là một thám tử học sinh trung học có tên là...',1,'NXB Kim Đồng',100,100),(69,'Thám Tử Lừng Danh Conan - Tập 1 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/36/cc/aa/b7232b49f02582eb09ce168bc05b9432.jpg','Gosho Aoyama','Nữ thám tữ học sinh trung học Masumi SERA là người luôn có những hành động đầy ẩn ý. Mục đích thật sự của cô sẽ phần nào được hé lộ trong vụ án người phụ nữ màu đỏ, với một cái kết đầy bất ngờ. Trong...',1,'NXB Kim Đồng',100,100),(70,'Thám Tử Lừng Danh Conan Hoạt Hình Màu: Nhà Ảo Thuật Với Đôi Cánh Bạc – Tập 2',53500,'https://salt.tikicdn.com/cache/280x280/ts/product/97/b2/35/e02c4ac8613ae08ff153b40ec46ca044.jpg','Gosho Aoyama','Nữ diễn viên Juri Maki sở hữu “Viên đá định mệnh”, mục tiêu của siêu trộm Kid, bị sát hại trên chuyến bay đến Hakodate! Vụ án được giải quyết bằng suy luận của Conan nhưng hậu quả là phát sinh tình...',1,'NXB Kim Đồng',100,0),(71,'Combo Thám Tử Lừng Danh Conan Tập 81 - 90 (Bộ 10 cuốn)',200000,'https://salt.tikicdn.com/cache/280x280/ts/product/9c/db/85/27a7fcaf8472f976f5a3a62a302262cf.jpg',' Gosho Aoyama','Mở đầu câu truyện, cậu học sinh trung học 17 tuổi Shinichi Kudo bị biến thành cậu bé Conan Edogawa. Shinichi trong phần đầu của Thám tử lừng danh Conan được miêu tả là một thám tử học đường xuất sắc....',1,'NXB Kim Đồng',100,0),(72,'Combo Thám Tử Lừng Danh Conan Tập 91 - 97 (Combo 7 Cuốn)',140000,'https://salt.tikicdn.com/cache/280x280/ts/product/8a/ff/4f/7ecafb2aceca975967bdc4d17e0edd36.jpg','Gosho Aoyama','Thám tử lừng danh Conan (tựa tiếng Anh: \"Detective Conan\", tại Mỹ có tên là \"Case Closed\") là một bộ manga Nhật Bản thuộc loại Shonen trinh thám được vẽ và minh họa bởi Aoyama Gosho. Bộ truyện này...',1,'NXB Kim Đồng',100,0),(73,'Thám Tử Lừng Danh Conan - Tập 3 (Tái Bản)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/1f/86/b7/d38bcf96f7eb032e02d2da9b92f2bafd.jpg','Aoyama Gosho','Thám Tử Lừng Danh Conan Tập 3 (Tái Bản)\nThám Tử Lừng Danh Conan là một bộ truyện tranh trinh thám Nhật Bản của tác giả Aoyama Gosho.\nNhân vật chính của truyện là một thám tử học sinh trung học có tên...',1,'NXB Kim Đồng',100,100),(74,'Thám Tử Lừng Danh Conan Bộ Đặc Biệt - Tập 44',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/f3/71/54/827c74d43272b7c0a91f7e2c9643232f.jpg','Gosho Aoyama','“Kaito Kid” bất ngờ xuất hiện trước mắt nhóm thám tử nhí! Chắc chắn hắn đang nhắm vào viên đá quý “God S”. Dựa vào lá thư thông báo hắn để lại, nhóm đã quyết định lên “tàu Peacock”, một con tàu du...',1,'NXB Kim Đồng',100,100),(75,'Combo bộ 5 Cuốn Thám Tử Lừng Danh Conan ( từ tập 1 đến tập 98)',100000,'https://salt.tikicdn.com/cache/280x280/ts/product/13/b9/99/dbb7070035a5020cfce0c9ecc276c4a1.jpg','','Mở đầu câu truyện, cậu học sinh trung học 17 tuổi Shinichi Kudo bị biến thành cậu bé Conan Edogawa. Shinichi trong phần đầu của Thám tử lừng danh Conan được miêu tả là một thám tử học đường xuất sắc....',1,'NXB Kim Đồng',100,500),(76,'Thám Tử Lừng Danh Conan - Tập 90 (Tái Bản 2019 )',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/a5/4f/a1/9dfbadba581ec008bcb04bddf1781092.jpg','Gosho Aoyama','Sự thật nào sẽ được làm sáng tỏ đằng sau mối bất hòa giữa hai con người phục vụ công lí ở hai vị thế khác nhau - mật vụ FBI Akai và cảnh sát Amuro!?\nCuộc phiêu lưu mới sẽ đưa độc giả đến gần hơn với...',1,'NXB Kim Đồng',100,100),(77,'Thám Tử Lừng Danh Conan Tập 10 (Tái Bản)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/f5/80/1e/6820f2e70b9018f552678845a8615a03.jpg','Aoyama Gosho','Những vụ án nối tiếp nhau, không mời mà đến. Cứ như vậy thì sao tớ có thể một lúc gánh hết đây? Ơ, sao tự dưng người tớ cứ nóng dần, nóng dầ sắp không chịu nổi nữa rồi! Đúng lúc ấy, một anh chàng...',1,'NXB Kim Đồng',100,100),(78,'Thám Tử Lừng Danh Conan - Tập 24 (2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/30/ac/5d/f0f922b2120f37176f73fbd6b7debf20.jpg','Gosho Aoyama','Bọn người áo đen lại xuất hiện!? Tại khách sạn nơi chúng tớ tìm được bọn chúng, một vụ án mạng đã xảy ra!! Trong lúc sự việc vẫn còn hỗn loạn thì Haibara lại đang gặp nguy hiểm! Dù đã cố gắng hết sức...',1,'NXB Kim Đồng',100,100),(79,'Thám Tử Lừng Danh Conan Tập 35 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/95/12/7b/41a3a046efb0c18257cb6da244267a01.jpg','Gosho Aoyama','Thám Tử Lừng Danh Conan Tập 35 (Tái Bản 2019)\nSau khi vụ án ở khu phố Tàu tại Yokohama được phá, Ran bỗng bị ngất. Trong lúc được đưa đến bệnh viện, Ran bỗng nhớ ra 1 vụ án không nên nhớ lại trong...',1,'NXB Kim Đồng',100,100),(80,'Conan Hoạt Hình Màu - Kẻ Hành Pháp Zero Tập 1',50000,'https://salt.tikicdn.com/cache/280x280/ts/product/3b/84/c1/2bff69f3707898b3ee7bbeeeac95e3c4.jpg',' Gosho Aoyama','Ngay trước thềm Hội nghị Thượng đỉnh Tokyo, một vụ nổ lớn đã xảy ra tại công trình khổng lồ, nơi sẽ trở thành địa điểm tổ chức hội nghị!! Hiện trường vụ nổ ấy thấp thoáng bóng dáng Toru AMURO, thành...',1,'NXB Kim Đồng',100,0),(81,'Thám Tử Lừng Danh Conan Hoạt Hình Màu: Những Giây Cuối Cùng Tới Thiên Đường Tập 2',60000,'https://salt.tikicdn.com/cache/280x280/ts/product/66/35/b3/4348b8a113abe2cb803f561ab89961c5.jpg','Gosho Aoyama','Tuy nhiên, tên sát nhân lại là một kẻ rất đáng gờm!? Gin và Vodka của Tổ chức Áo đen giăng bẫy tóm Conan! Liệu có con đường nào thoát khỏi tòa nhà cao 300m!?\nÁn mạng xảy ra xoay quanh bạn đại học của...',1,'NXB Kim Đồng',100,0),(82,'Thám Tử Lừng Danh Conan Hoạt Hình Màu: Thủ Phạm Trong Đôi Mắt - Tập 1',60000,'https://salt.tikicdn.com/cache/280x280/ts/product/7e/26/fd/96da2b9e90204a4d1219f3988e9e510d.jpg','Gosho Aoyama','Hàng loạt cảnh sát bị sát hại! Dường như có ẩn tình trong nội bộ cảnh sá Sau đó, thiếu úy Sato trở thành mục tiêu!?\nKhông những thế, Ran có mặt tại hiện trường khi ấy cũng bị liên lụ Ran không bị...',1,'NXB Kim Đồng',100,0),(83,'Thám Tử Lừng Danh Conan Hoạt Hình Màu: Mê Cung Trong Thành Phố Cổ - Tập 1',60000,'https://salt.tikicdn.com/cache/280x280/ts/product/43/0c/04/d30fcde0ed1a1f6b00df9ed4e81a3755.jpg','Gosho Aoyama','Một bức tượng Phật đã bị đánh cắp khỏi chùa Sanno nổi tiếng ở Kyoto! Phải giải mã một bức tranh mới biết bức tượng ở đâu… Sau đó, ở 3 thành phố Tokyo, Osaka và Kyoto xảy ra vụ án giết người hàng...',1,'NXB Kim Đồng',100,0),(84,'Thám Tử Lừng Danh Conan - Tập 93 (Tái Bản)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/04/36/c1/89cfc2e35498d85a859fc241150fe404.jpg','Aoyama Gosho','Thám Tử Lừng Danh Conan - Tập 93 (Tái Bản)\nThi thể đã biến đi đâu!? “Vụ án xác chết biến mất trong bể bơi” sẽ được làm sáng tỏ! Bên cạnh đó, bóng dáng “Rum”, nhân vật quyền lực thứ 2 của tổ chức Áo...',1,'NXB Kim Đồng',100,100),(85,'Thám Tử Lừng Danh Conan - Tập 64 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/5e/50/d8/560925069f871e4c5014e748df26b561.jpg','Gosho Aoyama','Nữ thám tữ học sinh trung học Masumi SERA là người luôn có những hành động đầy ẩn ý. Mục đích thật sự của cô sẽ phần nào được hé lộ trong vụ án người phụ nữ màu đỏ, với một cái kết đầy bất ngờ. Trong...',1,'NXB Kim Đồng',100,100),(86,'Thám Tử Lừng Danh Conan - Tập 42 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/78/13/32/90f6058a57edfe5655dc8643e381d7b5.jpg','Gosho Aoyama','Thám tử Kogoro và Sonoko chứng kiến cái chết của thuyền trưởng, chủ trì bữa hóa trang trên con thuyền ma. Và Kudo Shinichi cùng xuất hiện ở đó?! Một mặt, Haibara bị cô giáo Jodie đáng ngờ đưa đi mất....',1,'NXB Kim Đồng',100,100),(87,'Thám Tử Lừng Danh Conan - Hanzawa - Chàng Hung Thủ Số Nhọ - Tập 2 (Tặng Kèm Postcard)',25000,'https://salt.tikicdn.com/cache/280x280/ts/product/46/87/0d/9bbee78f918da72018445dfdb1b35fc8.jpg','Gosho Aoyama','Vừa được khu phố Beika thanh tẩy thì lại bị một ả lừa đảo vét sạch tiền đến mức không còn một xu dính túi. Giờ thì sinh tồn quan trọng hơn hạ sát mục tiêu nhiều, trước tiên phải đi làm cái đã! Đây là...',1,'NXB Kim Đồng',100,100),(88,'Thám Tử Lừng Danh Conan - Hanzawa - Chàng Hung Thủ Số Nhọ Tập 4 [Tặng Kèm Postcard]',25000,'https://salt.tikicdn.com/cache/280x280/ts/product/fb/32/9a/d6585d2486d4f4a1719cc3b48814887f.jpg','Gosho Aoyama','Sau khi thoát khỏi phố Beika và bị cuốn vào vô số vụ án cùng Conan, cuối cùng Hanzawa đã về đến quê nhà Izumo! Tại đó, quá khứ mà hắn chôn dấu sẽ được làm sáng tỏ! Ngoài buổi họp mặt gia đình Hanzawa...',1,'NXB Kim Đồng',100,100),(89,'Thám Tử Lừng Danh Conan Hoạt Hình Màu: Những Giây Cuối Cùng Tới Thiên Đường Tập 1',60000,'https://salt.tikicdn.com/cache/280x280/ts/product/f8/ab/83/8c367313b1ca5c23bf01460243d3758e.jpg','Gosho Aoyama','Án mạng xảy ra xoay quanh người bạn thời đại học của ông Mori - Mio Tokiwa!? Ông Mori được mời tới bữa tiệc do cô chủ trì. Tại đây, đám Conan bị cuốn vào một tấn thảm kịch…\nCuối cùng Gin và Vodka...',1,'NXB Kim Đồng',100,0),(90,'Thám Tử Lừng Danh Conan - Hanzawa - Chàng Hung Thủ Số Nhọ - Tập 1',25000,'https://salt.tikicdn.com/cache/280x280/ts/product/d7/56/48/2ce95a487c0388a55010c491e33086fa.jpg','Gosho Aoyama','Một bóng đen đã đến Beika - Thị trấn tội phạm với số lượng vụ án cao nhất nhì thế giớ Vì muốn tiếp cận mục tiêu nên y mới đến thủ đô Tokyo, nhưng đời không như là mơ, những rắc rối cứ liên tục tìm...',1,'NXB Kim Đồng',100,100),(91,'Thám Tử Lừng Danh Conan - Tập 92 (Tái Bản)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/ce/2f/98/6a2931921865f3afb28ed11a085cffe8.jpg','Aoyama Gosho','Kí ức của Conan dội về cùng tiếng sóng vỗ bờ…Đó là bãi biển nơi Shinichi và Ran tình cờ gặp Sera ngày bé… Đó còn là hình ảnh không thể nhầm lẫn của chàng trai trẻ Akai Shuichi…!?',1,'NXB Kim Đồng',100,100),(92,'Thám Tử Lừng Danh Conan - Tập 88 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/44/a4/58/62dc799ca48b2e7f355b0e35b2e221de.jpg','Gosho Aoyama','Nữ thám tữ học sinh trung học Masumi SERA là người luôn có những hành động đầy ẩn ý. Mục đích thật sự của cô sẽ phần nào được hé lộ trong vụ án người phụ nữ màu đỏ, với một cái kết đầy bất ngờ. Trong...',1,'NXB Kim Đồng',100,100),(93,'Thám Tử Lừng Danh Conan - Tập 89 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/48/f5/ea/f475cd2018df97b48ef5835307bf01d4.jpg','Gosho Aoyama','Nữ thám tữ học sinh trung học Masumi SERA là người luôn có những hành động đầy ẩn ý. Mục đích thật sự của cô sẽ phần nào được hé lộ trong vụ án người phụ nữ màu đỏ, với một cái kết đầy bất ngờ. Trong...',1,'NXB Kim Đồng',100,100),(94,'Combo Trọn Bộ CONAN ĐẶC SẮC: Conan và Tổ chức Áo Đen (Tập 1, 2) + Conan Tuyển Tập Đặc Biệt - FBI Selection + Conan Tuyển Tập Fan Bình Chọn (Tập 1, 2) + Conan Những Câu Chuyện Lãng Mạn (Tập 1,2,3) - Bộ 8 Cuốn/ Tặng Kèm Postcard Green Life',350000,'https://salt.tikicdn.com/cache/280x280/ts/product/93/2e/f9/10d0c4b3ff8954c418706aa26eb76ee7.jpg',' Gosho Aoyama','Combo Trọn Bộ CONAN ĐẶC SẮC: Conan và Tổ chức Áo Đen (Tập 1, 2) + Conan Tuyển Tập Đặc Biệt - FBI Selection + Conan Tuyển Tập Fan Bình Chọn (Tập 1, 2) + Conan Những Câu Chuyện Lãng Mạn (Tập 1,2,3) -...',1,'NXB Kim Đồng',100,0),(95,'Thám Tử Lừng Danh Conan Tập 30 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/e9/79/72/e44a732c1f77b5ad5fa202610de3556a.jpg','Gosho Aoyama','Nữ thám tữ học sinh trung học Masumi SERA là người luôn có những hành động đầy ẩn ý. Mục đích thật sự của cô sẽ phần nào được hé lộ trong vụ án người phụ nữ màu đỏ, với một cái kết đầy bất ngờ. Trong...',1,'NXB Kim Đồng',100,100),(96,'Thám Tử Lừng Danh Conan - Tập 81 (Tái Bản 2019)',20000,'https://salt.tikicdn.com/cache/280x280/ts/product/4d/2b/80/0aaa715ab210953ba1536f7f4a56d548.jpg','Gosho Aoyama','Giữa lúc cuộc điều tra vụ án kẻ móc túi thuộc băng Kurobee đang diễn ra, những hồi ức về Akai chợt hiện lên sống động trong tâm trí Jodie. Ẩn sau vụ án, hoạt động bí mật gì đang được thực hiện!? Cũng...',1,'NXB Kim Đồng',100,100),(97,'Thám Tử Lừng Danh Conan Tuyển Tập Đặc Biệt - Vs. Kaito Kid Perfect Edition Tập 1 [Tặng Kèm Postcard]',63000,'https://salt.tikicdn.com/cache/280x280/ts/product/3a/bf/0b/f22304468dc9f2497d5d2bd311d48013.jpg','Gosho Aoyama','Các câu chuyện được tuyển chọn và biên soạn từ 6 phần: “Conan VS. Kaito Kid”, “Án mạng ở câu lạc bộ yêu ảo thuật”,“Cuộc hội ngộ của các thám tử!”,“Kaito Kid và màn trình diễn đi trên không...',1,'NXB Kim Đồng',100,0),(98,'Lý thuyết đồ thị',105000,'../uploads/lythuyetdothi.jpg','Lê Anh Vinh','Sach ly thuyet do thi Lê Anh Vinh',2,'NXB Đại học quốc gia Hà Nội',100,350);
/*!40000 ALTER TABLE `tb_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `path_img` varchar(255) DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Yuta Takaya','e10adc3949ba59abbe56e057f20f883e','yutaka@gmail.com','0123434233','Toyko,Japan','../uploads/freeza.png',2),(2,'Reid Barton','202cb962ac59075b964b07152d234b70','reidbartion@gmail.com','0123654789','Boston, USA','../uploads/tieuphong.jpg',1),(3,'Tieu Phong','202cb962ac59075b964b07152d234b70','tieuphong@gmail.com','0123456987','Beijng,China','../uploads/tieuphong.jpg',1),(4,'Tsubasa Ozozra','202cb962ac59075b964b07152d234b70','tsubasa@gmail.com','0987123321','Tokyo, Japan','../uploads/freeza.png',1),(5,'Songoku','202cb962ac59075b964b07152d234b70','goku@gmail.com','0123546879','Tokyo,Jaopan',NULL,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_state`
--

DROP TABLE IF EXISTS `user_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_state` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_state`
--

LOCK TABLES `user_state` WRITE;
/*!40000 ALTER TABLE `user_state` DISABLE KEYS */;
INSERT INTO `user_state` VALUES (1,'free'),(2,'block_comment'),(3,'block_all');
/*!40000 ALTER TABLE `user_state` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-29 17:36:30
