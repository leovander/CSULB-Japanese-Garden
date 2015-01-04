# Context:      Database model creation
# Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
# Author #1:    Israel Torres
# Date/Time:    5/15/14 6:15am

DROP TABLE categories;
DROP TABLE ci_sessions;
DROP TABLE contact_us;
DROP TABLE daily_hours;
DROP TABLE events;
DROP TABLE pages;
DROP TABLE photos;
DROP TABLE rate_our_website;
DROP TABLE related_links;
DROP TABLE trees;
DROP TABLE users;
DROP TABLE volunteers;

CREATE TABLE categories (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE pages (
  id int(11) NOT NULL AUTO_INCREMENT,
  parent_id int(11) DEFAULT NULL,
  page_title varchar(255) DEFAULT NULL,
  p_order tinyint(1) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (parent_id) REFERENCES categories(id)
);

CREATE TABLE related_links (
  id int(11) NOT NULL AUTO_INCREMENT,
  page_id int(11) DEFAULT NULL,
  link_title varchar(255) DEFAULT NULL,
  link_id int(11) DEFAULT NULL,
  p_order tinyint(1) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (page_id) REFERENCES pages(id),
  FOREIGN KEY (link_id) REFERENCES pages(id)
);

CREATE TABLE ci_sessions (
  session_id varchar(40) NOT NULL DEFAULT '0',
  ip_address varchar(45) NOT NULL DEFAULT '0',
  user_agent varchar(120) NOT NULL,
  last_activity int(10) NOT NULL DEFAULT '0',
  user_data text NOT NULL,
  PRIMARY KEY (session_id),
  KEY last_activity_idx (last_activity)
);

CREATE TABLE contact_us (
  id int(11) NOT NULL AUTO_INCREMENT,
  full_name varchar(60) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  subject varchar(45) DEFAULT NULL,
  comment text,
  PRIMARY KEY (id)
);

CREATE TABLE daily_hours (
  id int(11) NOT NULL AUTO_INCREMENT,
  day_of_week varchar(10) NOT NULL,
  open_time time NOT NULL,
  close_time time NOT NULL,
  closed tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
);

CREATE TABLE events (
  id int(11) NOT NULL AUTO_INCREMENT,
  start datetime NOT NULL,
  end datetime NOT NULL,
  title varchar(128) NOT NULL,
  description text NOT NULL,
  closure tinyint(4) DEFAULT NULL,
  photo text,
  slug varchar(128) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY slug (slug)
);

CREATE TABLE photos (
  id int(11) NOT NULL AUTO_INCREMENT,
  name text NOT NULL,
  url text NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE rate_our_website (
  id int(11) NOT NULL AUTO_INCREMENT,
  full_name varchar(60) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  site_rating varchar(20) DEFAULT NULL,
  comment text,
  PRIMARY KEY (id)
);

CREATE TABLE trees (
  map_num int(11) NOT NULL AUTO_INCREMENT,
  botanical_name varchar(255) DEFAULT NULL,
  common_name varchar(255) DEFAULT NULL,
  status varchar(20) DEFAULT NULL,
  notes text,
  PRIMARY KEY (map_num)
);

CREATE TABLE users (
  id tinyint(4) NOT NULL AUTO_INCREMENT,
  username varchar(30) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE volunteers (
  id int(11) NOT NULL AUTO_INCREMENT,
  firstname varchar(30) DEFAULT NULL,
  lastname varchar(30) DEFAULT NULL,
  address varchar(50) DEFAULT NULL,
  city varchar(50) DEFAULT NULL,
  state char(13) DEFAULT NULL,
  zip varchar(10) DEFAULT NULL,
  homephone varchar(14) DEFAULT NULL,
  cellphone varchar(14) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  comment text,
  volunteertype varchar(35) DEFAULT NULL,
  PRIMARY KEY (id)
);

INSERT INTO categories (id, name)
VALUES
	(1,'home'),
	(2,'garden'),
	(3,'membership'),
	(4,'events'),
	(5,'weddings'),
	(6,'education'),
	(7,'about');
	
INSERT INTO ci_sessions (session_id, ip_address, user_agent, last_activity, user_data)
VALUES
	('0f0fb356d5449b270efaacd7c9d88737','10.39.77.90','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36',1400148888,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";a:2:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:7:\"jpAdmin\";}}'),
	('23904c83472a1fd61d2742c1bb1220ad','10.39.42.254','Mozilla/5.0 (Linux; Android 4.4.2; Nexus 5 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.114 Mob',1400141405,''),
	('2cfa94a41da70faa4a0f9375f751cdc6','10.39.54.21','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36',1400150083,'a:1:{s:9:\"logged_in\";a:2:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:7:\"jpAdmin\";}}'),
	('6c762a83f764c79b0cc318a3b82c6403','10.39.39.84','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36',1400150387,''),
	('8dc6b317dafbce656843372f215d6d1a','10.39.39.84','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36',1400147436,''),
	('bd60ac48a3233e0438faf5fa675fc3aa','10.39.54.21','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36',1400143631,''),
	('c1820313fbb3db01b0b795b75f7f8f46','10.39.54.21','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36',1400143629,'a:1:{s:9:\"logged_in\";a:2:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:7:\"jpAdmin\";}}'),
	('c53d2b92848793d96981aafa1dfd202e','10.39.77.90','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36',1400141350,'a:1:{s:9:\"logged_in\";a:2:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:7:\"jpAdmin\";}}'),
	('f1c9697245dfeeb8819787e82b3d66b8','128.30.52.73','W3C_Validator/1.3 http://validator.w3.org/services',1400143034,'');

INSERT INTO contact_us (id, full_name, email, subject, comment)
VALUES
	(1,'Israel Torres','itorres1490@gmail.com','Hiring?','I like the work you guys have done, are you guys taking any open bids? I have a large project that would benefit from your guys\' touch. Thanks!');
	
INSERT INTO daily_hours (id, day_of_week, open_time, close_time, closed)
VALUES
	(1,'monday','08:00:00','15:30:00',1),
	(2,'tuesday','08:00:00','15:30:00',0),
	(3,'wednesday','08:00:00','15:30:00',0),
	(4,'thursday','08:00:00','15:30:00',0),
	(5,'friday','08:00:00','15:30:00',0),
	(6,'saturday','11:00:00','11:00:00',1),
	(7,'sunday','12:00:00','16:00:00',0);
	
INSERT INTO events (id, start, end, title, description, closure, photo, slug)
VALUES
	(88,'2014-07-04 00:00:00','2014-07-04 00:00:00','Independence Day','Closed for Independence Day',1,'',NULL),
	(89,'2014-07-13 00:00:00','2014-07-13 00:00:00','Origami Festival -  Admission fee required all day','Closed for Origami Festival - \nAdmission fee required all day',1,'',NULL),
	(90,'2014-11-11 00:00:00','2014-11-11 00:00:00','Veteran\'s Day','Closed for Veteran\'s Day',1,'',NULL),
	(91,'2014-11-26 00:00:00','2014-11-30 01:00:00','Fall break and Thanksgiving','Closed for Fall break and Thanksgiving',1,'',NULL),
	(92,'2014-04-17 17:00:00','2014-04-17 20:00:00','Green Generation: Long beach Sustainability Mixer','This event is free for CSULB faculty, staff and students, Alumni and community participants attend free with an RSVP to Megan at 562.985.2169 or email to megan.ono-sa@csulb.edu\nPark in available spaces in lots adjacent to the Japanese Garden (lots 16, 14b or 14c and 20). If you do not have a valid campus parking pass, purchase a day pass ($5) for parking at the yellow machines in the lots or along Earl Warren Drive by the Hillside Dorm complex. See http://daf.csulb.edu/maps/parking/index.html for Garden and Parking locations.',NULL,'http://csulb.edu/~bsquires/cecs470_team_project/assets/images/uploaded_images/Green-Gen-2014-Save-the-Date1.jpg',NULL),
	(93,'2014-04-27 13:00:00','2014-04-27 15:00:00','Spring Member Tea and Tour','Japanese Garden Members are invited to spend a lovely afternoon in the Japanese Garden. Learn about the history and significance of the Garden on a guided tour by senior staff. Relax in our Friends Garden. Enjoy delectable sweets and Japanese green tea while you meet new people who share a love of gardens and culture. Join us this spring to see what&#8217;s; blooming at the most beautiful social destination in town. Members Only Event. RSVP to 562.985.2169',NULL,'http://csulb.edu/~bsquires/cecs470_team_project/assets/images/uploaded_images/tea1.jpg',NULL),
	(94,'2014-05-04 00:00:00','2014-05-04 00:00:00','Momo no sekku (peach blossom festival) & tango no sekku (iris blossom festival)','Garden members may view two traditional Japanese displays of dolls and objects to celebrate the Peach and Iris Blossom Festivals. The exhibit will feature a classic collection of items used to honor girls and boys that symbolize strength and prosperity. Members are also invited to participate in art and game activities. Art projects include making your own kami kazari hair ornament crown, creating a paper koi nobori carp flag using oil pastel and color wash, and adding your handprint &quot;scale&quot; to a large-scale fabric koi flag to be exhibited at the Garden. The hands-on workshops are suitable for all skill levels. Supplies provided. Classic Japanese games, beverages and treats will be available to play and enjoy in front of the displays. Children and adults are sure to enjoy this artistically uplifting and creative program!',NULL,'http://csulb.edu/~bsquires/cecs470_team_project/assets/images/uploaded_images/DSC_00091.jpg',NULL),
	(99,'2014-05-14 00:00:00','2014-05-14 00:00:00','Test','jklj lkasdjf lkajfl kajsdflk ajsldf',NULL,'',NULL);
	
INSERT INTO pages (id, parent_id, page_title, p_order)
VALUES
	(1,1,'index',NULL),
	(2,2,'index',NULL),
	(3,2,'photo_tour',1),
	(4,2,'the_living_collection',3),
	(5,3,'index',NULL),
	(6,3,'become_a_member',1),
	(7,3,'volunteer',2),
	(8,4,'index',NULL),
	(9,4,'events_calendar',1),
	(10,4,'memorial_services',2),
	(11,4,'other_special_events',3),
	(12,5,'index',NULL),
	(13,5,'ceremony',1),
	(14,5,'reception',2),
	(15,5,'photo_session',3),
	(16,5,'rehearsal_dinners',4),
	(17,6,'index',NULL),
	(18,6,'teacher_resources',1),
	(19,6,'field_trips',2),
	(20,7,'index',NULL),
	(21,7,'contact_us',1),
	(22,7,'directions',2),
	(24,4,'details',NULL),
	(25,7,'rules',3),
	(27,6,'students',3),
	(28,7,'rate_our_website',4),
	(29,2,'video_tour',2),
	(30,5,'ambrosia_event_services',NULL),
	(31,5,'caught_in_the_moment',NULL),
	(32,5,'harvard_photography',NULL),
	(33,5,'nathan_nowack',NULL);
	
INSERT INTO photos (id, name, url)
VALUES
	(30,'DSC_00091.jpg','http://csulb.edu/~bsquires/cecs470_team_project/assets/images/uploaded_images/DSC_00091.jpg'),
	(31,'Green-Gen-2014-Save-the-Date1.jpg','http://csulb.edu/~bsquires/cecs470_team_project/assets/images/uploaded_images/Green-Gen-2014-Save-the-Date1.jpg'),
	(32,'tea1.jpg','http://csulb.edu/~bsquires/cecs470_team_project/assets/images/uploaded_images/tea1.jpg');

INSERT INTO rate_our_website (id, full_name, email, site_rating, comment)
VALUES
	(1,'Israel Torres','itorres1490@gmail.com','excellent','The site looks clean and condensed. I like the use of implied lines. Keep up the good work guys!');

INSERT INTO related_links (id, page_id, link_title, link_id, p_order)
VALUES
	(1,2,'who we are',20,1),
	(2,2,'book a tour or field trip',19,2),
	(3,2,'learn with us',17,3),
	(4,2,'host your own event',11,4),
	(5,3,'book a tour or field trip',19,1),
	(6,3,'who we are',20,2),
	(8,12,'take a photo tour',3,1),
	(9,13,'host your own event',11,1),
	(10,13,'take a photo tour',3,2),
	(11,14,'take a photo tour',3,1),
	(12,15,'who we are',20,1),
	(13,15,'get in touch',21,2),
	(14,15,'how to get to the garden',22,3),
	(15,11,'take a photo tour',3,1),
	(16,17,'take a photo tour',3,1),
	(17,17,'check out what we have',4,2),
	(18,18,'take a photo tour',3,1),
	(19,18,'check out what we have',4,2),
	(20,18,'who we are',20,3),
	(21,18,'volunteer at the garden',22,4),
	(22,5,'check out what we have',4,1),
	(23,5,'take a photo tour',3,2),
	(24,5,'who we are',20,3),
	(25,6,'check out what we have',4,1),
	(26,6,'take a photo tour',3,2),
	(27,6,'who we are',20,3),
	(28,7,'who we are',20,1),
	(30,24,'host your own event',11,1),
	(32,10,'get in touch',21,1),
	(33,10,'how to get to the garden',22,2),
	(34,16,'take a photo tour',3,1),
	(35,16,'get in touch',21,2),
	(36,16,'how to get to the garden',22,3),
	(37,19,'a few rules you should know',25,1),
	(38,19,'how to get to the garden',22,2),
	(39,20,'book a tour or field trip',19,1),
	(40,20,'find out our history',2,2),
	(41,21,'book a tour or field trip',19,1),
	(42,21,'learn with us',17,2),
	(43,21,'take a photo tour',3,3),
	(44,21,'become a member',6,4),
	(45,22,'hours of operation',20,1),
	(46,27,'who we are',20,1),
	(47,27,'special events',8,2),
	(48,5,'rent the garden',11,4),
	(49,6,'rent the garden',11,4),
	(50,12,'host your own event',8,2),
	(51,1,'photo tour',3,1),
	(52,1,'the living collection',4,2),
	(53,1,'volunteer',7,3),
	(54,1,'students',27,4),
	(55,1,'directions',22,5),
	(56,2,'students engagement',27,5),
	(57,2,'volunteer at the garden',7,6),
	(58,13,'become a member',6,3),
	(59,14,'become a member',6,2),
	(60,20,'a few rules you should know',25,3),
	(61,30,'caught in the moment',31,1),
	(62,30,'harvard photography',32,2),
	(63,30,'nathan nowack',33,3),
	(64,31,'ambrosia event services',30,1),
	(65,31,'harvard photography',32,2),
	(66,31,'nathan nowack',33,3),
	(67,32,'ambrosia event services',30,1),
	(68,32,'caught in the moment',31,2),
	(69,32,'nathan nowack',33,3),
	(70,33,'ambrosia event services',30,1),
	(71,33,'caught in the services',31,2),
	(72,33,'harvard photography',32,3);

INSERT INTO trees (map_num, botanical_name, common_name, status, notes)
VALUES
	(1,'Pinus Thunbergii','Japanese Black Pine','Tagged','Not Ueki. Natural'),
	(2,'Podocarpus gracilior','Fern Pine','Tagged','N/A'),
	(3,'Pinus Thunbergii','Japanese Black Pine','Tagged','Not Ueki. Natural'),
	(4,'Prunus Serrulata','Pink Cloud Cherry','Not Tagged','Formerly Peach'),
	(5,'Prunus Serrulata','Pink Cloud Cherry','Not Tagged','Formerly Peach'),
	(6,'Eucalyptus Citriodora','Lemon Scented Gum','Not Tagged','N/A'),
	(7,'Prunus Serrulata','Pink Cloud Cherry','Not Tagged','Formerly Peach'),
	(8,'Prunus Serrulata','Pink Cloud Cherry','Not Tagged','Formerly Peach'),
	(9,'Eucalyptus Citriodora','Lemon Scented Gum','Not Tagged','N/A'),
	(10,'Vacant','N/A','N/A','Formerly Peach'),
	(11,'Vacant','N/A','N/A','Formerly Peach'),
	(12,'Eucalyptus Citriodora','Lemon Scented Gurn','Not Tagged','N/A'),
	(13,'Prunus Serrulata','Pink Cloud Cherry','Not Tagged','Formerly Peach'),
	(14,'Hymenosporum Flavum','Sweet Shade','Tagged','N/A'),
	(15,'Hymenosporum Flavum','Sweet Shade','Not Tagged','N/A'),
	(16,'Hymenosporum Flavum','Sweet Shade','Tagged','N/A'),
	(17,'Vacant','N/A','N/A','Formerly Purple Orch'),
	(18,'Vacant','N/A','N/A','Formerly Purple Leaf'),
	(19,'Pinus Halepensis','Aleppo Pine','Tagged','N/A'),
	(20,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(21,'Pinus Thunbergii','Japanese Black Pine','Tagged','Not Ueki. Natural'),
	(22,'Ginkgo Biloba','Ginkgo','Tagged','N/A'),
	(23,'Ginkgo Biloba','Ginkgo','Tagged','N/A'),
	(24,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Not Ueki. Natural'),
	(25,'Ginko Biloba','Ginko','Not Tagged','N/A'),
	(26,'Podocarpus Maki','Shrubby Yew Pine','Not Tagged','N/A'),
	(27,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Not Ueki. Natural'),
	(28,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Not Ueki. Natural'),
	(29,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Not Ueki. Natural'),
	(30,'Vacant','N/A','N/A','Formerly Japanese Black Pine'),
	(31,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(32,'Acer palmatum \'Bloodgoo','Japanese Maple','Not Tagged','N/A'),
	(33,'Podocarpus Maki','Shrubby Yew Pine','Not Tagged','N/A'),
	(34,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(35,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(36,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(37,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(38,'Magnoiia x soulangeana','Saucer Magnolia','Not Tagged','N/A'),
	(39,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(40,'Acer paimatum \'Bioodgoo','Japanese Black Pine','Not Tagged','N/A'),
	(41,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(42,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(43,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(44,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(45,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(46,'Pinus Halepensis','Aieppo Pine','Tagged','N/A'),
	(47,'Pinus Halepensis','Aleppo Pine','Tagged','N/A'),
	(48,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki (Moon Viewing)'),
	(49,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki (Moon Viewing)'),
	(50,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki (Moon Viewing)'),
	(51,'Pinus Halepensis','Aleppo Pine','Tagged','N/A'),
	(52,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(53,'Podocarpus gracilior','Fern Pine','Tagged','N/A'),
	(54,'Podo\'carpus gracilior','Fern Pine','Not Tagged','N/A'),
	(55,'Podocarpus gracilior','Fern Pine','Not Tagged','N/A'),
	(56,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(57,'Podocarpus graccillor','Fern Pine','Tagged','N/A'),
	(58,'Liquidambar','Sweet Gum','Tagged','N/A'),
	(59,'Liquidambar','Sweet Gum','Tagged','N/A'),
	(60,'Salix babylonical','Weeping Willow','Not Tagged','N/A'),
	(61,'Liquidambar','Sweet Gum','Not Tagged','N/A'),
	(62,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(63,'Podocarpus gracilior','Fern Pine','Tagged','N/A'),
	(64,'Liquidambar','Sweet Gum','Tagged','N/A'),
	(65,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(66,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(67,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(68,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(69,'Vacant','N/A','N/A','Formerly Sweet Gum'),
	(70,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(71,'Ginkgo Biloba','Ginkgo','Tagged','N/A'),
	(72,'Pyrus Kawakamii','Evergreen Pear','Tagged','N/A'),
	(73,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(74,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(75,'Pinus Thunbergi','Japanese Black Pine','Not Tagged','Ueki'),
	(76,'Pyrus Kawakamii','Evergreen Pear','Tagged','N/A'),
	(77,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(78,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(79,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(80,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(81,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(82,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(83,'Acer palmatum \'Bloodgoo','Japanese Maple','Not Tagged','N/A'),
	(84,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(85,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(86,'Pyrus Kawakamia','Evergreen Pear','Tagged','N/A'),
	(87,'Podocarpus gracilior','Fern Pine','Tagged','N/A'),
	(88,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(89,'Pyrus Kawakamii','Evergreen Pear','Tagged','N/A'),
	(90,'Pyrus Kawakamii','Evergreen Pear','Tagged','N/A'),
	(91,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(92,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(93,'Salix babylonica','Weeping Willow','Not Tagged','N/A'),
	(94,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(95,'Acer Dissecturn','Laceleaf Japanese Maple','Not Tagged','N/A'),
	(96,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(97,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(98,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(99,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(100,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(101,'Vacant','N/A','N/A','Formerly Japanese Black Pine'),
	(102,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(103,'Vacant','N/A','N/A','Formerly Japanese BI'),
	(104,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(105,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(106,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(107,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(108,'Pinus Canariensis','Canary Island Pine','Tagged','N/A'),
	(109,'Vacant','N/A','Not Tagged','Formerly Ginkgo'),
	(110,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(111,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(112,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(113,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(114,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(115,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(116,'Betula Pendula','European White Bird','Not Tagged','Ueki'),
	(117,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(118,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(119,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(120,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(121,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(122,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(123,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(124,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(125,'Betula Pendula','European White Bird','Not Tagged','N/A'),
	(126,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(127,'MaIus floribunda','Crabappie','Not Tagged','N/A'),
	(128,'Podocarpus gracilior','Fern Pine','Not Tagged','N/A'),
	(129,'Podocarpus gracilior','Fern Pine','Not Tagged','N/A'),
	(130,'Podocarpus graccillor','Fern Pine','Not Tagged','N/A'),
	(131,'Podocar\'pus gracilior','Fern Pine','Not Tagged','N/A'),
	(132,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki (Dry Garden)'),
	(133,'Vacant','N/A','N/A','Formerly Ginko'),
	(134,'Pinus Halepensis','Aleppo Pine','Tagged','N/A'),
	(135,'Ginkgo Biloba','Ginkgo','Not Tagged','N/A'),
	(136,'Pyrus Kawakamii','Evergreen Pear','Not Tagged','N/A'),
	(137,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Not Ueki. Natural'),
	(138,'Pyrus Kawakamii','Evergreen Pear','Not Tagged','N/A'),
	(139,'Pyrus Kawakamii','Evergreen Pear','Not Tagged','N/A'),
	(140,'Pyrus Kawakamii','Evergreen Pear','Not Tagged','N/A'),
	(141,'Pyrus Kawakamii','Evergreen Pear','Not Tagged','N/A'),
	(142,'MaIus floribunda','Japanese Maple','Not Tagged','N/A'),
	(143,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(144,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(145,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(146,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(147,'Vacant','N/A','N/A','Formerly Japanese Maple'),
	(148,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(149,'Magnoiia x soulangeana','Saucer Magnolia','Not Tagged','N/A'),
	(150,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(151,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(152,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(153,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(154,'Acer paimatum','Japanese Maple','Not Tagged','N/A'),
	(155,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(156,'Podocarpus gracilior','Fern Pine','Not Tagged','N/A'),
	(157,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(158,'Pyrus Kawakamii','Evergreen Pear','Not Tagged','N/A'),
	(159,'Pyrus Kawakamii','Evergreen Pear','Not Tagged','N/A'),
	(160,'Podocarpus gracilior','Fern Pine','Tagged','N/A'),
	(161,'Vacant','Evergreen Pear','Tagged','N/A'),
	(162,'Podocarpus gracilior','Fern Pine','Not Tagged','N/A'),
	(163,'Prunus Serrulata','Cherry','Not Tagged','N/A'),
	(164,'Podocarpus graccillor','Fern Pine','Tagged','N/A'),
	(165,'Podocarpus gracilior','Fern Pine','Tagged','N/A'),
	(166,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(167,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(168,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(169,'Pyrus Kawakamii','Evergreen Pear','Not Tagged','N/A'),
	(170,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(171,'Acer palmatum \'Bloodgoo','Japanese Maple','Not Tagged','N/A'),
	(172,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','N/A'),
	(173,'Pyrus Kawakamii','Evergreen Pear','Not Tagged','N/A'),
	(174,'Salix babylonica','Weeping Willow','Not Tagged','N/A'),
	(175,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','N/A'),
	(176,'Liquidambar','Sweetgum','Tagged','N/A'),
	(177,'Liquidambar','Sweetgum','Tagged','N/A'),
	(178,'Liquidambar','Sweetgum','Tagged','N/A'),
	(179,'Liquidambar','Sweetgum','Tagged','N/A'),
	(180,'Liquidambar','Sweetgum','Tagged','N/A'),
	(181,'Liquidambar','Sweetgum','Tagged','N/A'),
	(182,'Podocarpus gracilior','Fern Pine','Not Tagged','N/A'),
	(183,'Podocarpus gracilior','Fern Pine','Not Tagged','N/A'),
	(184,'Vacant','Fern Pine','Tagged','N/A'),
	(185,'Podocarpus gracilior','Fern Pine','Tagged','N/A'),
	(186,'Podocarpus gracilior','Fern Pine','Not Tagged','N/A'),
	(187,'Podocarpus gracilior','Fern Pine','Tagged','N/A'),
	(188,'Podocarpus gracilior','Fern Pine','Tagged','N/A'),
	(189,'Podocarpus gracilior','Fern Pine','Not Tagged','N/A'),
	(190,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','N/A'),
	(191,'Acer japonicum','Half Moon Maple','Not Tagged','N/A'),
	(192,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(193,'Pinus halepensis','Aleppo Pine','Not Tagged','N/A'),
	(194,'Koelreuteria bipinnata','Chinese Flame','Not tagged','N/A'),
	(195,'Pinus Thunbergii','Japanese Black Pine','Tagged','Ueki'),
	(196,'Pinus Thunbergii','Japanese Black Pine','Tagged','Ueki'),
	(197,'Acer palmatum','Japanese Maple','Not Tagged','N/A'),
	(198,'Pinus Thunbergii','Japanese Black Pine','Not Tagged','Ueki'),
	(199,'Acer palmatum','Japanese Maple','Not Tagged','N/A');

INSERT INTO users (id, username, password)
VALUES
	(1,'jpAdmin','a029d0df84eb5549c641e04a9ef389e5');


INSERT INTO volunteers (id, firstname, lastname, address, city, state, zip, homephone, cellphone, email, comment, volunteertype)
VALUES
	(1,'sdaf','fsd','sdfs','sdfsd','fd','22222','','','d@s.com',NULL,'Gardening'),
	(2,'asdf','asdf','asdf','asdf','Colorado','90000','','','s@c.com',NULL,'Gardening'),
	(3,'Test in Chrome','adsf','sadf','asdf','Delaware','90000','','','s@c.com',NULL,'Gardening'),
	(4,'asdf','a','asdf','asdf','Wisconsin','90000','8888888888','8888888888','s@yahoc.com',NULL,'Gardening'),
	(5,'asdf','asdf','asdf','asdf','Wisconsin','90000','8888888888','8888888888','s@yahoc.com',NULL,'Gardening'),
	(6,'test nexus','hshs','jdhdb','long beach','California','90806','5624278836','5624375586','hs@hay.com',NULL,'Gardening'),
	(7,'asdf','asdfasdf','asdf','asdf','Wisconsin','90000','8888888888','8888888888','s@yahoc.com',NULL,'Public Education Program'),
	(8,'adsf','asdf','asdf','asdf','Wisconsin','90000','8888888888','8888888888','s@yahoc.com','this is the comment','Public Education Program'),
	(9,'TIIII','S','lsdakjf','alskfj','asf','99999','','','2@dl.com','Test comments - 9:47am','Public Education Program'),
	(10,'asdf','asdf','asdf','asdf','Wisconsin','90000','9999999999','2222222222','asdf@yahoo.com','asdfasdfasdf','Gardening'),
	(11,'asdf','asdf','asdf','asdf','Wisconsin','90000','8888888888','8888888888','s@yahoc.com','blah ','Public Education Program'),
	(12,'asdf','asdf','asdf','asdf','Wisconsin','90000','8888888888','8888888888','s@yahoc.com','This is an awesome comment.','Gardening'),
	(13,'asdf','asdf','asdf','asdf','Wisconsin','90000','8888888888','8888888888','s@yahoc.com','This is another awesome comment.','Gardening'),
	(14,'asdf','asdf','adsf','asdf','California','90000','','8888888888','2@h.com','  ','Public Education Program'),
	(15,'asdf','asdf','asdf','asdf','Wisconsin','90000','8888888888','8888888888','s@yahoc.com','This is a third awesome comment.','Gardening'),
	(16,'asdf','asdf','asdf','asdf','Wisconsin','90000','8888888888','2222222222','s@yahoc.com','   comment2 ','Public Education Program'),
	(17,'asdf','asdf','asdf','asdf','Wisconsin','90000','8888888888','','s@yahoc.com','Test should have no cell phone','Public Education Program'),
	(18,'asdfasf','alsdkjf','asdflkasdf','long beach','California','90000','','6728908763','lkasd@lkjlk.com','asdflkajsdf','Gardening'),
	(19,'asdfers','asdfasdf','asdfasdf','asdf','asdfasdf','90000','','','asdf@yahoo.com','','Gardening');