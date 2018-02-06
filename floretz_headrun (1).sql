-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 01:26 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `floretz_headrun`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL,
  `order_index` int(11) NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `order_index`, `image_path`, `created_by`, `created_at`, `updated_at`) VALUES
(15, 1, 'assets/images/banner_images/banner-1.jpg', 18, '2016-04-06', '2016-04-13'),
(17, 2, 'assets/images/banner_images/banner-4.jpg', 18, '2016-04-06', '2016-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE IF NOT EXISTS `birthday` (
  `id` int(11) NOT NULL,
  `order_index` int(11) NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `order_index`, `image_path`, `created_by`, `created_at`, `updated_at`) VALUES
(12, 1, 'assets/images/birthday_images/banner-1.jpg', 18, '2016-04-06', '2016-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `type` varchar(20) NOT NULL,
  `eventstart` date NOT NULL,
  `eventend` date NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL 
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `type`, `eventstart`, `eventend`, `description`, `createdby`, `created_at`, `updated_at`) VALUES
(15, 'bandi', 'Holiday', '2016-04-20', '2016-04-21', 'asdfkjanfkjshdfanksdj', 18, '2016-03-31 22:35:40', '2016-04-04 13:19:07'),
(16, 'vasu', 'Holiday', '2016-04-18', '2016-04-19', 'fdsklnafnsngfjndgksnfsd', 18, '2016-04-04 07:48:38', '2016-04-04 07:48:38'),
(17, 'sample', 'Holiday', '2016-04-04', '2016-04-12', 'gdfsgs', 18, '2016-04-05 08:51:21', '2016-04-05 08:51:21'),
(18, '', 'default', '0000-00-00', '0000-00-00', '', 18, '2016-04-05 08:51:22', '2016-04-05 08:51:22'),
(19, 'vasu', 'Others', '2016-04-18', '2016-04-18', 'vdffgs', 18, '2016-04-05 08:51:22', '2016-04-05 08:51:22'),
(20, 'Ugadhi', 'Holiday', '2016-05-03', '2016-05-07', 'This is Big celebration in Andrapradesh. sample description . and its for checking purpose', 18, '2016-04-13 22:47:13', '2016-04-13 22:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `flashnews`
--

CREATE TABLE IF NOT EXISTS `flashnews` (
  `id` int(11) NOT NULL,
  `order_index` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flashnews`
--

INSERT INTO `flashnews` (`id`, `order_index`, `content`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(15, 1, '<p>sample 1</p>\n', 18, 18, '2016-04-04', '2016-04-13'),
(17, 2, '<p>sample 3</p>\n', 18, 18, '2016-04-04', '2016-04-13'),
(20, 3, '<p><img src="http://www.floretz.com/images/photos/About-Us-Our-Schools/OurSchools-HSR-Layout.JPG" style="float:left; height:200px; margin:10px; width:250px" /><img src="http://www.floretz.com/images/photos/About-Us-Our-Schools/OurSchools-Sarjapur-Road.JPG" style="float:right; height:200px; margin:10px; width:250px" /></p>\n\n<p>Set up in 2005, Floretz Academy has 2 Schools. One in HSR Layout and the other on Sarjapur Road. Both these Schools serve the educational and post school care needs of the communities in South East Bangalore areas of HSR Layout, Koramangala, Bommanahalli, areas in and around Sarjapur Road, Kaikondrahalli, Kasavanahalli, areas in and around the Outer Ring Road, Bellandur, Bommanahalli, Maratahalli and BTM Layout.</p>\n\n<p>The School offers Montessori Education for children from the age group of 2-6 years, post school care for children from the age group of 2-12 years, accelerated math program, music (keyboard and guitar classes), dance (bharatanatyam and contemporary) and Physical activities. The School will launch the internationally acclaimed Multiple Intelligence Program from June 2014 onwards. The School follows the Montessori Method and all teachers are Montessori Trained and Certified.</p>\n\n<p>Students passing out of Floretz have joined Bethany High School, NPS, Greenwood High, Oakridge International, Zee School, Sherwood High, Freedom International, Harvest International School, Sri Sri Ravishankar Vidya Mandir, Notre Dame, Samhita Academy, India International School, Primus, New Horizon, Bishop Cottons, Baldwins, etc.</p>\n', 18, 18, '2016-04-11', '2016-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `created_at`, `updated_at`) VALUES
(1, 'home', '2016-04-05', '2016-04-07'),
(2, 'team', '2016-04-27', '2016-04-28'),
(3, 'montessori', '2016-04-14', '2016-04-15'),
(4, 'vision', '2016-04-06', '2016-04-07'),
(5, 'tieups', '2016-04-14', '2016-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE IF NOT EXISTS `page_content` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `page_data` longtext NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`id`, `page_id`, `page_data`, `created_at`, `updated_at`) VALUES
(1, 1, '<h2 style="font-style:italic;">Floretz Academy</h2>\n\n<p><img src="http://www.floretz.com/images/photos/About-Us-Our-Schools/OurSchools-HSR-Layout.JPG" style="float:left; height:185px; margin:10px; width:260px" /><img src="http://www.floretz.com/images/photos/About-Us-Our-Schools/OurSchools-Sarjapur-Road.JPG" style="float:right; height:185px; margin:10px; width:260px" /></p>\n\n<p>Set up in 2005, Floretz Academy has 2 Schools. One in HSR Layout and the other on Sarjapur Road. Both these Schools serve the educational and post school care needs of the communities in South East Bangalore areas of HSR Layout, Koramangala, Bommanahalli, areas in and around Sarjapur Road, Kaikondrahalli, Kasavanahalli, areas in and around the Outer Ring Road, Bellandur, Bommanahalli, Maratahalli and BTM Layout.</p>\n\n<p>The School offers Montessori Education for children from the age group of 2-6 years, post school care for children from the age group of 2-12 years, accelerated math program, music (keyboard and guitar classes), dance (bharatanatyam and contemporary) and Physical activities. The School will launch the internationally acclaimed Multiple Intelligence Program from June 2014 onwards. The School follows the Montessori Method and all teachers are Montessori Trained and Certified.</p>\n\n<p>Students passing out of Floretz have joined Bethany High School, NPS, Greenwood High, Oakridge International, Zee School, Sherwood High, Freedom International, Harvest International School, Sri Sri Ravishankar Vidya Mandir, Notre Dame, Samhita Academy, India International School, Primus, New Horizon, Bishop Cottons, Baldwins, etc.</p>\n\n<h2 style="font-style:italic;"><tt><strong>The Team</strong></tt></h2>\n\n<p><img src="http://www.floretz.com/images/photos/About-Us-The-Team/TeamPhoto.JPG" style="float:left; margin:10px" /></p>\n\n<p>Floretz Academy is led by Deepa Ravichandran, Director and Founder Principal. Deepa is a renowned Montessorian. She holds a Masters Degree in Industrial Electronics but decided to follow her passion &ndash; being with and teaching children. She not only did the Montessori Program for Elementary and Primary Children but has also completed a Special Education and Language &amp; Communication Training Course. She also teaches at the Indian Montessori Training Centre (IMTC), works with IMTC to train teachers in rural and semi-urban areas and is an examiner at the IMTC.</p>\n\n<p>Deepa is known for her passion for the Montessori Method and its application in every-day life. Her other interests include music, dance, painting (Thanjavur Painting), art and craft. She also volunteers at the Isha Home School, Isha Vidya Schools and the Isha Foundation at Coimbatore.</p>\n', '2016-04-06', '2016-04-13'),
(2, 2, '<center> <h1>The Team</h1> </center>\n			<img src="http://floretz.com/images/photos/About-Us-The-Team/TeamPhoto.JPG" class="img-polaroid img-rounded pull-left margin_right ">\n			<p>Floretz Academy is led by Deepa Ravichandran, Director and Founder Principal. Deepa is a renowned Montessorian. She holds a Masters Degree in Industrial Electronics but decided to follow her passion – being with and teaching children. She not only did the Montessori Program for Elementary and Primary Children but has also completed a Special Education and Language & Communication Training Course. She also teaches at the Indian Montessori Training Centre (IMTC), works with IMTC to train teachers in rural and semi-urban areas and is an examiner at the IMTC.</p>\n            <p>Deepa is known for her passion for the Montessori Method and its application in every-day life. Her other interests include music, dance, painting (Thanjavur Painting), art and craft. She also volunteers at the Isha Home School, Isha Vidya Schools and the Isha Foundation at Coimbatore.</p>\n			<p>Deepa is joined by her husband, Ravichandran. He has over 30 years experience in the Corporate world. He is a corporate and investment banker. During the last 12 years, he has worked in setting up the back office operations of ANZ Bank and Hewlett Packard (HP). He was the Managing Director of ANZ Bank''s back office in India, the Managing Director of HP''s Back Office Operations in India and then the Global Head of the HP''s Shared Services before joining Floretz. Ravi has led large teams of 18,000 people across 58 countries and comes with a strong finance and commercial background.</p>\n            <p>Floretz has dedicated teachers who are all Montessori Trained. They have an interesting mix of educational backgrounds – Botany, Commerce, Social Sciences, Electronics, Bio-Chemistry and Bio-Medical Sciences. The strength of Floretz comes from the diverse background of its team. Each of our teachers and the Founder Principal are known for their dedication, passion and love for children.</p>', '2016-04-05', '2016-04-14'),
(3, 3, '<center> <h1>Montessori</h1> </center>\n			<h3 class="fz_heading3 ">What is Montessori Education?</h3>\n                        <div class="row margin_bottom">\n                        	<div class="span3">\n                            	<img src="http://floretz.com/images/photos/Arithmetic1.jpg" class="img-polaroid img-rounded">\n                            </div>\n                            <div class="span7">\n                            	<blockquote class="fz_quote maria">\n                                    <img src="http://floretz.com/images/Dr-Maria-Montessori.jpg" class="pull-left img-rounded" style="margin-right:20px;">\n                                    <p>\n                                    	"Education is an aid to life… It is a natural process carried out by the human individual, and is acquired not by listening to words, but by experiences in the environment." <small>Dr. Maria Montessori.</small>\n                                    </p>\n                                    <div class="clearfix"></div>\n                                </blockquote>\n                                <p>\n                                	Montessori is an educational philosophy based on the belief that a child learns best within a social environment that supports and nurtures each individual''s unique development. Montessori education was founded by Dr. Maria Montessori.\n                                </p>\n                            </div>\n                        </div>\n                        \n                        <h3 class="fz_heading3">Who was Dr. Maria Montessori?</h3>\n                        <div class="row margin_bottom">\n                            <div class="span7">\n                                <p>\n                                    Maria Montessori (1870-1952) was an early 20th century Italian educator and visionary. She became the first female doctor in Italy in 1896. Through her work with children, she developed a unique educational method known as the Montessori Method. She received a total of six nominations for the Nobel Peace Prize in a three-year period: 1949, 1950, and 1951.\n                                </p>\n                            </div>\n                            <div class="span3">\n                            	<img src="http://floretz.com/images/photos/About-Us-Montessori/Montessori-Who-was-maria-montessori4.jpg" class="img-polaroid img-rounded">\n                            </div>\n                        </div>\n                        \n                        <h3 class="fz_heading3 no_margin_top">How Did It Begin?</h3>\n                        <div class="row margin_bottom">\n                        	<div class="span3">\n                            	<img src="http://floretz.com/images/photos/About-Us-Montessori/Montessori-how-did-it-begin-casa-dei-bambini.jpg" class="img-polaroid img-rounded">\n                            	\n                            </div>\n                            <div class="span7">\n                                <p>\n                                	In 1907, she opened her first classroom, the Casa dei Bambini, or Children''s House, in a tenement building in Rome. From the beginning, Montessori based her work on her observations of children and experimentation with the environment, materials, and lessons available to them. She frequently referred to her work as <strong>"scientific pedagogy".</strong>\n                                </p>\n                                <p>\n                                	Montessori continued to extend her work during her lifetime, developing a comprehensive model of psychological development from birth to age 24. As Montessori developed her theory and practice, she came to believe that education had a role to play in the development of world peace. She felt that children allowed to develop according to their inner laws of development would give rise to a more peaceful and enduring civilization.\n                                </p>\n                            </div>\n                        </div>\n                        \n                        <h3 class="fz_heading3">Basis of Montessori Education/curriculum</h3>\n                        <div class="row margin_bottom">\n                            <div class="span7">\n                                <p>\n                                    Montessori observed four distinct periods, or "planes", in human development, extending from birth to six years, from six to twelve, from twelve to eighteen, and from eighteen to twenty-four. She saw different characteristics, learning modes, and developmental imperatives active in each of these planes, and called for educational approaches specific to each period.\n                                </p>\n                            </div>\n                            <div class="span3">\n                            	<img src="http://floretz.com/images/photos/Language.jpg" class="img-polaroid img-rounded">\n                            </div>\n                        </div>\n                        \n                        <h3 class="fz_heading3 ">At Floretz we handle children who are in the first plane</h3>\n                        <div class="row margin_bottom">\n                        	<div class="span3">\n                            	<img src="http://floretz.com/images/photos/Sensorial6.jpg" class="img-polaroid img-rounded">\n                            </div>\n                            <div class="span7">\n                                <p>\n                                	The first plane extends from birth to around six years of age. During this period, Montessori observed that the child undergoes striking physical and psychological development. The first plane child is seen as a concrete, sensorial explorer and learner engaged in the developmental work of psychological self-construction and building functional independence. Montessori introduced several concepts to explain this work, including the absorbent mind, sensitive periods, and normalization.\n                                </p>\n                            </div>\n                        </div>\n                        \n                        <h3 class="fz_heading3 no_margin_top">Absorbent mind</h3>\n                        <div class="row margin_bottom">\n                            <div class="span7">\n                                <p>\n                                	Montessori described the young child''s behavior of effortlessly assimilating the sensorial stimuli of his or her environment, including information from the senses, language, culture, and the development of concepts with the term "absorbent mind". She believed that this is a power unique to the first plane, and that it fades as the child approached age six.\n                                </p>\n                            </div>\n                            <div class="span3">\n                            	<img src="http://floretz.com/images/photos/Arithmetic3.JPG" class="img-polaroid img-rounded">\n                            </div>\n                        </div>\n                        \n                        <h3 class="fz_heading3 no_margin_top">Sensitive periods</h3>\n                        <div class="row margin_bottom">\n                        	<div class="span3">\n                            	<img src="http://floretz.com/images/photos/About-Us-Montessori/Montessori-Sensitive-Period.JPG" class="img-polaroid img-rounded">\n                            </div>\n                            <div class="span7">\n                                <p>\n                                	Montessori also observed periods of special sensitivity to particular stimuli during this time which she called the "sensitive periods". In Montessori education, the classroom environment responds to these periods by making appropriate materials and activities available while the periods are active in the young child. She identified the following periods and their duration.\n                                </p>\n                                <ul>\n                                    <li>Acquisition of language—from birth to around six years old</li>\n                                    <li>Interest in small objects—from around 18 months to three years old</li>\n                                    <li>Order—from around one to three years old</li>\n                                    <li>Sensory refinement—from birth to around four years old</li>\n                                    <li>Social behavior—from around two and a half to four years old</li>\n                                </ul>\n                            </div>\n                        </div>\n                        \n                        <h3 class="fz_heading3 no_margin_top">Normalization</h3>\n                        <div class="row margin_bottom">\n                            <div class="span7">\n                                <p>\n                                	Finally, Montessori observed in children from three to six years old a psychological state she termed "normalization". Normalization arises from concentration and focus on activity which serves the child''s developmental needs, and is characterized by the ability to concentrate as well as "spontaneous discipline, continuous and happy work, social sentiments of help and sympathy for others."\n                                </p>\n                            </div>\n                            <div class="span3">\n                            	<img src="http://floretz.com/images/photos/Cultural7.JPG" class="img-polaroid img-rounded">\n                            </div>\n                        </div>\n                        \n                        <h3 class="fz_heading3 no_margin_top">Multiple Intelligence</h3>\n                        <div class="row margin_bottom">\n                        	<div class="span3">\n                            	<img src="http://floretz.com/images/photos/Language2.jpg" class="img-polaroid img-rounded">\n                            </div>\n                            <div class="span7">\n                                <p>\n                                	One of the differences between Dr. Montessori''s approach to early childhood education and the approach found in many primary schools is the adoption of elements of the Multiple Intelligence Theory. Harvard professor Howard Gardner developed and codified this theory in the late 20th Century. Dr. Maria Montessori would seem to have developed her approach to teaching children along very similar lines. This educational approach was also used in ancient India as mentioned in the Indian Texts, the Upanishads.\n                                </p>\n                            </div>\n                        </div>', '2016-04-12', '2016-04-14'),
(4, 4, '<center><h1>Our Vision</h1></center>\n			<div class="vision">\n                <img src="http://floretz.com/images/photos/About-Us-Vision-Values/VisionPage-LeftPane.jpg" class="pull-left margin_right">\n                <p>\n                	<strong>“Floretz is a group of customer centric and passionate educators who enable today''s children to be the change in tomorrow''s world.”</strong>\n                    <br>\n                    The Child is our Customer and our Focus. Our Vision is more than education to children. It is about grooming children to become the change agents of the world that they inherit. It is about providing an environment that is Child Centric. An environment that works for the Child. We, therefore, believe that we are shaping the future.\n                </p>\n                <div class="clearfix"></div>\n            </div>\n            <br>\n			<center><h1>Our Values</h1></center>\n			<br>\n			<p><img src="http://floretz.com/images/ourvalues.png" /></p>', '2016-04-06', '2016-04-14'),
(5, 5, '<h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;School Tie-Ups</h1>\n\n<p>Floretz is proud to announce that it is now the feeder school to various well known schools in Bangalore. The tie-ups will ensure that our children have different options to choose from, for 1st standard. The names of the schools and their website links are:</p>\n\n<p>Its working</p>\n', '2016-04-13', '2016-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `page_content_backup`
--

CREATE TABLE IF NOT EXISTS `page_content_backup` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `backup_page_content` longtext NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_content_backup`
--

INSERT INTO `page_content_backup` (`id`, `page_id`, `backup_page_content`, `created_at`, `updated_at`) VALUES
(9, 1, '<h2>Floretz Academy</h2>\n\n<p><img src="http://www.floretz.com/images/photos/About-Us-Our-Schools/OurSchools-HSR-Layout.JPG" style="float:left; height:185px; margin:10px; width:260px" /><img src="http://www.floretz.com/images/photos/About-Us-Our-Schools/OurSchools-Sarjapur-Road.JPG" style="float:right; height:185px; margin:10px; width:260px" /></p>\n\n<p>Set up in 2005, Floretz Academy has 2 Schools. One in HSR Layout and the other on Sarjapur Road. Both these Schools serve the educational and post school care needs of the communities in South East Bangalore areas of HSR Layout, Koramangala, Bommanahalli, areas in and around Sarjapur Road, Kaikondrahalli, Kasavanahalli, areas in and around the Outer Ring Road, Bellandur, Bommanahalli, Maratahalli and BTM Layout.</p>\n\n<p>The School offers Montessori Education for children from the age group of 2-6 years, post school care for children from the age group of 2-12 years, accelerated math program, music (keyboard and guitar classes), dance (bharatanatyam and contemporary) and Physical activities. The School will launch the internationally acclaimed Multiple Intelligence Program from June 2014 onwards. The School follows the Montessori Method and all teachers are Montessori Trained and Certified.</p>\n\n<p>Students passing out of Floretz have joined Bethany High School, NPS, Greenwood High, Oakridge International, Zee School, Sherwood High, Freedom International, Harvest International School, Sri Sri Ravishankar Vidya Mandir, Notre Dame, Samhita Academy, India International School, Primus, New Horizon, Bishop Cottons, Baldwins, etc.</p>\n\n<h2><tt><strong>The Team</strong></tt></h2>\n\n<p><img src="http://www.floretz.com/images/photos/About-Us-The-Team/TeamPhoto.JPG" style="float:left; margin:10px" /></p>\n\n<p>Floretz Academy is led by Deepa Ravichandran, Director and Founder Principal. Deepa is a renowned Montessorian. She holds a Masters Degree in Industrial Electronics but decided to follow her passion &ndash; being with and teaching children. She not only did the Montessori Program for Elementary and Primary Children but has also completed a Special Education and Language &amp; Communication Training Course. She also teaches at the Indian Montessori Training Centre (IMTC), works with IMTC to train teachers in rural and semi-urban areas and is an examiner at the IMTC.</p>\n\n<p>Deepa is known for her passion for the Montessori Method and its application in every-day life. Her other interests include music, dance, painting (Thanjavur Painting), art and craft. She also volunteers at the Isha Home School, Isha Vidya Schools and the Isha Foundation at Coimbatore.</p>\n', '2016-04-13', '2016-04-13'),
(13, 1, '<p>Set up in 2005, Floretz Academy has 2 Schools. One in HSR Layout and the other on Sarjapur Road. Both these Schools serve the educational and post school care needs of the communities in South East Bangalore areas of HSR Layout, Koramangala, Bommanahalli, areas in and around Sarjapur Road, Kaikondrahalli, Kasavanahalli, areas in and around the Outer Ring Road, Bellandur, Bommanahalli, Maratahalli and BTM Layout.</p>\n\n<p>The School offers Montessori Education for children from the age group of 2-6 years, post school care for children from the age group of 2-12 years, accelerated math program, music (keyboard and guitar classes), dance (bharatanatyam and contemporary) and Physical activities. The School will launch the internationally acclaimed Multiple Intelligence Program from June 2014 onwards. The School follows the Montessori Method and all teachers are Montessori Trained and Certified.</p>\n\n<p>Students passing out of Floretz have joined Bethany High School, NPS, Greenwood High, Oakridge International, Zee School, Sherwood High, Freedom International, Harvest International School, Sri Sri Ravishankar Vidya Mandir, Notre Dame, Samhita Academy, India International School, Primus, New Horizon, Bishop Cottons, Baldwins, etc.</p>\n\n<p>its working</p>\n', '2016-04-13', '2016-04-13'),
(19, 3, '<h3>What is Montessori Education?</h3>\n\n<p><img src="http://floretz.com/images/photos/Arithmetic1.jpg" style="border-style:solid; border-width:3px; float:left; margin:10px" /></p>\n\n<blockquote><img src="http://floretz.com/images/Dr-Maria-Montessori.jpg" style="float:left; margin:5px" />\n<p>&quot;Education is an aid to life&hellip; It is a natural process carried out by the human individual, and is acquired not by listening to words, but by experiences in the environment.&quot;&nbsp;<small>Dr. Maria Montessori.</small></p>\n</blockquote>\n\n<p>Montessori is an educational philosophy based on the belief that a child learns best within a social environment that supports and nurtures each individual&#39;s unique development. Montessori education was founded by Dr. Maria Montessori.</p>\n\n<h3>&nbsp;</h3>\n\n<h3>Who was Dr. Maria Montessori?</h3>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="http://floretz.com/images/photos/About-Us-Montessori/Montessori-Who-was-maria-montessori4.jpg" style="border-style:solid; border-width:3px; float:right; margin:10px" />Maria Montessori (1870-1952) was an early 20th century Italian educator and visionary. She became the first female doctor in Italy in 1896. Through her work with children, she developed a unique educational method known as the Montessori Method. She received a total of six nominations for the Nobel Peace Prize in a three-year period: 1949, 1950, and 1951</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>How Did It Begin?</p>\n\n<p><img src="http://floretz.com/images/photos/About-Us-Montessori/Montessori-how-did-it-begin-casa-dei-bambini.jpg" style="border-style:solid; border-width:3px; float:left; margin:10px" /></p>\n\n<p>In 1907, she opened her first classroom, the Casa dei Bambini, or Children&#39;s House, in a tenement building in Rome. From the beginning, Montessori based her work on her observations of children and experimentation with the environment, materials, and lessons available to them. She frequently referred to her work as&nbsp;<strong>&quot;scientific pedagogy&quot;.</strong></p>\n\n<p>Montessori continued to extend her work during her lifetime, developing a comprehensive model of psychological development from birth to age 24. As Montessori developed her theory and practice, she came to believe that education had a role to play in the development of world peace. She felt that children allowed to develop according to their inner laws of development would give rise to a more peaceful and enduring civilization.</p>\n\n<p>&nbsp;</p>\n\n<p>Changes done</p>\n', '2016-04-14', '2016-04-14'),
(25, 4, '<h3>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Our Vision</h3>\n\n<p><img src="http://floretz.com/images/photos/About-Us-Vision-Values/VisionPage-LeftPane.jpg" style="border-style:solid; border-width:3px; float:left; margin:10px" /></p>\n\n<p><strong>&ldquo;Floretz is a group of customer centric and passionate educators who enable today&#39;s children to be the change in tomorrow&#39;s world.&rdquo;</strong>&nbsp;<br />\nThe Child is our Customer and our Focus. Our Vision is more than education to children. It is about grooming children to become the change agents of the world that they inherit. It is about providing an environment that is Child Centric. An environment that works for the Child. We, therefore, believe that we are shaping the future.</p>\n\n<h3>&nbsp;</h3>\n\n<h3>&nbsp;</h3>\n\n<h3>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Our Values</h3>\n\n<p><img src="http://floretz.com/images/ourvalues.png" /></p>\n', '2016-04-14', '2016-04-14'),
(27, 5, '<h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; School Tie-Ups</h1>\n\n<p>Floretz is proud to announce that it is now the feeder school to various well known schools in Bangalore. The tie-ups will ensure that our children have different options to choose from, for 1st standard. The names of the schools and their website links are:</p>\n\n<p>Its working</p>\n', '2016-04-14', '2016-04-14'),
(28, 2, '<h2 style="font-style:italic"><strong>The Team</strong></h2>\n\n<p><img src="http://floretz.com/images/photos/About-Us-The-Team/TeamPhoto.JPG" style="float:left; margin:10px" /></p>\n\n<p>Floretz Academy is led by Deepa Ravichandran, Director and Founder Principal. Deepa is a renowned Montessorian. She holds a Masters Degree in Industrial Electronics but decided to follow her passion &ndash; being with and teaching children. She not only did the Montessori Program for Elementary and Primary Children but has also completed a Special Education and Language &amp; Communication Training Course. She also teaches at the Indian Montessori Training Centre (IMTC), works with IMTC to train teachers in rural and semi-urban areas and is an examiner at the IMTC.</p>\n\n<p>Deepa is known for her passion for the Montessori Method and its application in every-day life. Her other interests include music, dance, painting (Thanjavur Painting), art and craft. She also volunteers at the Isha Home School, Isha Vidya Schools and the Isha Foundation at Coimbatore.</p>\n\n<p>Deepa is joined by her husband, Ravichandran. He has over 30 years experience in the Corporate world. He is a corporate and investment banker. During the last 12 years, he has worked in setting up the back office operations of ANZ Bank and Hewlett Packard (HP). He was the Managing Director of ANZ Bank&#39;s back office in India, the Managing Director of HP&#39;s Back Office Operations in India and then the Global Head of the HP&#39;s Shared Services before joining Floretz. Ravi has led large teams of 18,000 people across 58 countries and comes with a strong finance and commercial background.</p>\n\n<p>Floretz has dedicated teachers who are all Montessori Trained. They have an interesting mix of educational backgrounds &ndash; Botany, Commerce, Social Sciences, Electronics, Bio-Chemistry and Bio-Medical Sciences. The strength of Floretz comes from the diverse background of its team. Each of our teachers and the Founder Principal are known for their dedication, passion and love for children.</p>\n\n<p>this is for checking</p>\n', '2016-04-14', '2016-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `parents_speak`
--

CREATE TABLE IF NOT EXISTS `parents_speak` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents_speak`
--

INSERT INTO `parents_speak` (`id`, `name`, `parent_comments`, `image_path`, `status`, `is_approved`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Harsha', 'sample 1', 'assets/images/banner_images/headrun-technologies-squarelogo-1410294774742.png', 'Active', 1, 18, 18, '2016-04-06', '2016-04-11'),
(2, 'Raja Shekar', 'sample', 'assets/images/banner_images/banner-1.jpg', 'Active', 1, 18, 18, '2016-04-06', '2016-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL ,
  `updated_at` timestamp NOT NULL 
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `mobile_no`, `created_at`, `updated_at`) VALUES
(1, 'FLORETZ', 'Ravi', 'male', 'vasu@gmail.com', '$2y$10$paEEk2aF2.mA651RCwi4/.KlNl2DyIa5GJ8TF668SqGY9kzJNl4U2', '7795503599', '2016-03-23 06:21:03', '2016-03-23 00:51:03'),
(7, 'Floretz', 'Vasu', 'male', 'vasu@gmail.com', '$2y$10$fX4x2k83wTuBqqx3kbp1Ru.qIgBceLQ3Sw9v/0on6h4MkJgLA0wmu', '9581218102', '2016-03-21 09:38:51', '2016-03-21 09:38:51'),
(8, 'Floretz', 'John', 'male', 'john@gmail.com', '$2y$10$k.2ZKbNezux.SQDXQXcLge6bbvZcQgt2EyFzCia.wj6iUHoBR2wJi', '9581218102', '2016-03-21 09:43:49', '2016-03-21 09:43:49'),
(9, 'Sample', 'sample name', 'male', 'sample@gmail.com', '$2y$10$xaYnTjFzJz0pWCGztQWX..WI3F5XA2yhrSaGeviPtFhGktN/bTJHa', '9090909090', '2016-03-21 10:04:51', '2016-03-21 10:04:51'),
(10, 'Floretz', 'James', 'male', 'james@gmail.com', '$2y$10$6jzaK.RQqBubWTmVDuiizuO1Q5iK8.HQo2tVnp0kJ7mrRmOnbmBSm', '9898989898', '2016-03-21 22:46:40', '2016-03-21 22:46:40'),
(11, 'Floretz', 'Jimme123', 'male', 'jimme@gmail.com', '$2y$10$pPt7li/1ToxhSfBKMSe2QeIPn3qGCy5QwCadzf4sIKJb9ckDxaPai', '9090909090', '2016-03-25 10:14:47', '2016-03-25 04:44:47'),
(13, 'Floretz', 'Jimme', 'male', 'jimme@gmail.com', '$2y$10$tTVFuRvwnGteuI3H.STzsOpkwVRLVGjzhTighNgv2ZkNml/3.zqoW', '9797979797', '2016-03-21 22:50:09', '2016-03-21 22:50:09'),
(14, 'Floretz', 'main', 'male', 'main@gmail.com', '$2y$10$aJ6.lI7K3rLByWKTjiB3WO/ou7q.QnPfvZLZdKTNU3lwBSMNkVOjC', '9581218102', '2016-03-23 01:11:51', '2016-03-23 01:11:51'),
(15, 'ram', 'bandi', 'male', 'ram@gmail.com', '$2y$10$MqieQ4iqi06FvePxWdP28e/Y1shjnCyLMM9EcbAIqy7OmbEAwScbu', '9090909099', '2016-03-28 07:03:02', '2016-03-28 01:33:01'),
(16, 'sample', 'sample', 'male', 'sample@gmail.com', '$2y$10$e4NThrXUb.wuoobP3HOAL.Vb2QlXRiHVxFCh5RSUfaFUJK2KYqIly', '1234567890', '2016-03-25 04:43:42', '2016-03-25 04:43:42'),
(17, 'Vinay', 'Medikonda', 'male', 'vinay@gmail.com', '$2y$10$7iKjM6RUcIGB78Gw7kmduObvLiVvQXbYzsQZH3fO1yAM4c7xw8JPK', '9090909090', '2016-03-25 07:37:55', '2016-03-25 07:37:55'),
(18, 'prasad', 'k', 'male', 'prasad@gmail.com', '$2y$10$TT2AcFgo3Gq/j.UfbV2uMu5U/LRPNE7TD8FjMGzVWGti15eB4apAG', '9090909090', '2016-03-28 01:32:28', '2016-03-28 01:32:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flashnews`
--
ALTER TABLE `flashnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_content_backup`
--
ALTER TABLE `page_content_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents_speak`
--
ALTER TABLE `parents_speak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `flashnews`
--
ALTER TABLE `flashnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `page_content_backup`
--
ALTER TABLE `page_content_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `parents_speak`
--
ALTER TABLE `parents_speak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
