-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 05:15 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `placement`
--
CREATE DATABASE IF NOT EXISTS `placement` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `placement`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `generateChoiceQuestionsTesti`()
BEGIN
	DECLARE	NUM INT;
	DECLARE QuestionID INT;
	DECLARE ChoiceCount INT;
	DECLARE AnswerNum INT;
	SET NUM	=	1;
	call getQuestionsTesti (	QuestionID	,	ChoiceCount	,	AnswerNum	);
	mainLoop : LOOP
		IF NUM	>	ChoiceCount THEN
			LEAVE mainloop;
		END IF;
		INSERT INTO tbl_t_questions_testi_choice (id, question_testi_code, `number`) VALUES (NULL, QuestionID, NUM);
		SET NUM	=	NUM	+	1;
	END LOOP;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `generateChoiceQuestionsTestiForUpdate`(IN `QuestionID` INT, IN `ChoiceCount` INT)
BEGIN
	DECLARE	NUM INT;
	SET NUM	=	1;
	mainLoop : LOOP
		IF NUM	>	ChoiceCount THEN
			LEAVE mainloop;
		END IF;
		INSERT INTO tbl_t_questions_testi_choice (id, question_testi_code, `number`) VALUES (NULL, QuestionID, NUM);
		SET NUM	=	NUM	+	1;
	END LOOP;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getQuestionsTesti`( OUT QuestionID INT	,	OUT ChoiceCount INT	,	OUT AnswerNum INT )
BEGIN
	SELECT    id ,choice_count, answer INTO QuestionID	, ChoiceCount , AnswerNum 
	FROM tbl_t_questions_testi 
	ORDER BY id DESC
	LIMIT 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, NULL),
('karfarma_role', '5', NULL, 'N;'),
('karjo_role', '13', NULL, NULL),
('karjo_role', '4', NULL, 'N;'),
('moalemin_role', '8', NULL, 'N;'),
('modir_role', '3', NULL, 'N;'),
('modir_system_role', '2', NULL, 'N;'),
('nazer_role', '7', NULL, 'N;'),
('rahnama_role', '9', NULL, 'N;'),
('Upload.*', '4', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 1, NULL, NULL, NULL),
('City.*', 1, NULL, NULL, 'N;'),
('City.Admin', 0, NULL, NULL, 'N;'),
('City.Create', 0, NULL, NULL, 'N;'),
('City.Delete', 0, NULL, NULL, 'N;'),
('City.Index', 0, NULL, NULL, 'N;'),
('City.Update', 0, NULL, NULL, 'N;'),
('City.View', 0, NULL, NULL, 'N;'),
('Country.*', 1, NULL, NULL, 'N;'),
('Country.Admin', 0, NULL, NULL, 'N;'),
('Country.Create', 0, NULL, NULL, 'N;'),
('Country.Delete', 0, NULL, NULL, 'N;'),
('Country.Index', 0, NULL, NULL, 'N;'),
('Country.Update', 0, NULL, NULL, 'N;'),
('Country.View', 0, NULL, NULL, 'N;'),
('Education.*', 1, NULL, NULL, 'N;'),
('Education.Admin', 0, NULL, NULL, 'N;'),
('Education.Create', 0, NULL, NULL, 'N;'),
('Education.Delete', 0, NULL, NULL, 'N;'),
('Education.Index', 0, NULL, NULL, 'N;'),
('Education.Update', 0, NULL, NULL, 'N;'),
('Education.View', 0, NULL, NULL, 'N;'),
('Expert.*', 1, NULL, NULL, 'N;'),
('Expert.Admin', 0, NULL, NULL, 'N;'),
('Expert.Create', 0, NULL, NULL, 'N;'),
('Expert.Delete', 0, NULL, NULL, 'N;'),
('Expert.Index', 0, NULL, NULL, 'N;'),
('Expert.Update', 0, NULL, NULL, 'N;'),
('Expert.View', 0, NULL, NULL, 'N;'),
('ExpertType.*', 1, NULL, NULL, 'N;'),
('ExpertType.Admin', 0, NULL, NULL, 'N;'),
('ExpertType.Create', 0, NULL, NULL, 'N;'),
('ExpertType.Delete', 0, NULL, NULL, 'N;'),
('ExpertType.Index', 0, NULL, NULL, 'N;'),
('ExpertType.Update', 0, NULL, NULL, 'N;'),
('ExpertType.View', 0, NULL, NULL, 'N;'),
('Information.*', 1, NULL, NULL, 'N;'),
('Information.City', 0, NULL, NULL, 'N;'),
('Information.Expert', 0, NULL, NULL, 'N;'),
('Information.LevelFive', 0, NULL, NULL, 'N;'),
('Information.LevelFour', 0, NULL, NULL, 'N;'),
('Information.LevelOne', 0, NULL, NULL, 'N;'),
('Information.LevelSeven', 0, NULL, NULL, 'N;'),
('Information.LevelSix', 0, NULL, NULL, 'N;'),
('Information.LevelThree', 0, NULL, NULL, 'N;'),
('Information.LevelTwo', 0, NULL, NULL, 'N;'),
('Information.Skill', 0, NULL, NULL, 'N;'),
('Information.UserExpertSave', 0, NULL, NULL, 'N;'),
('Information.UserInformationUpdate', 0, NULL, NULL, 'N;'),
('Information.UserSkillSave', 0, NULL, NULL, 'N;'),
('karfarma_role', 2, 'karfarma_role', NULL, 'N;'),
('karjo_karfarma_role', 2, 'karjo_karfarma_role', NULL, 'N;'),
('karjo_role', 2, 'karjo_role', NULL, 'N;'),
('moalemin_role', 2, 'moalemin_role', NULL, 'N;'),
('modir_role', 2, 'modir_role', NULL, 'N;'),
('modir_system_role', 2, 'modir_system_role', NULL, 'N;'),
('nazer_role', 2, 'nazer_role', NULL, 'N;'),
('rahnama_role', 2, 'rahnama_role', NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('Skill.*', 1, NULL, NULL, 'N;'),
('Skill.Admin', 0, NULL, NULL, 'N;'),
('Skill.Create', 0, NULL, NULL, 'N;'),
('Skill.Delete', 0, NULL, NULL, 'N;'),
('Skill.Index', 0, NULL, NULL, 'N;'),
('Skill.Update', 0, NULL, NULL, 'N;'),
('Skill.View', 0, NULL, NULL, 'N;'),
('SkillType.*', 1, NULL, NULL, 'N;'),
('SkillType.Admin', 0, NULL, NULL, 'N;'),
('SkillType.Create', 0, NULL, NULL, 'N;'),
('SkillType.Delete', 0, NULL, NULL, 'N;'),
('SkillType.Index', 0, NULL, NULL, 'N;'),
('SkillType.Update', 0, NULL, NULL, 'N;'),
('SkillType.View', 0, NULL, NULL, 'N;'),
('State.*', 1, NULL, NULL, 'N;'),
('State.Admin', 0, NULL, NULL, 'N;'),
('State.Create', 0, NULL, NULL, 'N;'),
('State.Delete', 0, NULL, NULL, 'N;'),
('State.Index', 0, NULL, NULL, 'N;'),
('State.Update', 0, NULL, NULL, 'N;'),
('State.View', 0, NULL, NULL, 'N;'),
('task_profile', 1, 'task_profile', NULL, 'N;'),
('TExam.*', 1, NULL, NULL, 'N;'),
('TExam.Admin', 0, NULL, NULL, 'N;'),
('TExam.Create', 0, NULL, NULL, 'N;'),
('TExam.Delete', 0, NULL, NULL, 'N;'),
('TExam.Index', 0, NULL, NULL, 'N;'),
('TExam.Update', 0, NULL, NULL, 'N;'),
('TExam.View', 0, NULL, NULL, 'N;'),
('TLessonGroup.*', 1, NULL, NULL, 'N;'),
('TLessonGroup.Admin', 0, NULL, NULL, 'N;'),
('TLessonGroup.Create', 0, NULL, NULL, 'N;'),
('TLessonGroup.Delete', 0, NULL, NULL, 'N;'),
('TLessonGroup.Index', 0, NULL, NULL, 'N;'),
('TLessonGroup.Update', 0, NULL, NULL, 'N;'),
('TLessonGroup.View', 0, NULL, NULL, 'N;'),
('TQuestionsTashrihi.*', 1, NULL, NULL, 'N;'),
('TQuestionsTashrihi.Admin', 0, NULL, NULL, 'N;'),
('TQuestionsTashrihi.Create', 0, NULL, NULL, 'N;'),
('TQuestionsTashrihi.Delete', 0, NULL, NULL, 'N;'),
('TQuestionsTashrihi.Index', 0, NULL, NULL, 'N;'),
('TQuestionsTashrihi.Update', 0, NULL, NULL, 'N;'),
('TQuestionsTashrihi.View', 0, NULL, NULL, 'N;'),
('TQuestionsTesti.*', 1, NULL, NULL, 'N;'),
('TQuestionsTesti.Admin', 0, NULL, NULL, 'N;'),
('TQuestionsTesti.Create', 0, NULL, NULL, 'N;'),
('TQuestionsTesti.Delete', 0, NULL, NULL, 'N;'),
('TQuestionsTesti.Index', 0, NULL, NULL, 'N;'),
('TQuestionsTesti.Update', 0, NULL, NULL, 'N;'),
('TQuestionsTesti.UpdateYourChoice', 0, NULL, NULL, 'N;'),
('TQuestionsTesti.View', 0, NULL, NULL, 'N;'),
('Upload.*', 1, NULL, NULL, 'N;'),
('Upload.DeleteFileUpload', 0, NULL, NULL, 'N;'),
('Upload.Index', 0, NULL, NULL, 'N;'),
('Upload.ScanedFileDetailList', 0, NULL, NULL, 'N;'),
('Upload.Upload', 0, NULL, NULL, 'N;'),
('User.Activation.*', 1, NULL, NULL, 'N;'),
('User.Activation.Activation', 0, NULL, NULL, 'N;'),
('User.Admin.*', 1, NULL, NULL, 'N;'),
('User.Admin.Admin', 0, NULL, NULL, 'N;'),
('User.Admin.Create', 0, NULL, NULL, 'N;'),
('User.Admin.Delete', 0, NULL, NULL, 'N;'),
('User.Admin.ManageUser', 0, NULL, NULL, 'N;'),
('User.Admin.Update', 0, NULL, NULL, 'N;'),
('User.Admin.View', 0, NULL, NULL, 'N;'),
('User.Default.*', 1, NULL, NULL, 'N;'),
('User.Default.Index', 0, NULL, NULL, 'N;'),
('User.Login.*', 1, NULL, NULL, 'N;'),
('User.Login.Login', 0, NULL, NULL, 'N;'),
('User.Logout.*', 1, NULL, NULL, 'N;'),
('User.Logout.Logout', 0, NULL, NULL, 'N;'),
('User.Profile.*', 1, NULL, NULL, 'N;'),
('User.Profile.Changepassword', 0, NULL, NULL, 'N;'),
('User.Profile.Edit', 0, NULL, NULL, 'N;'),
('User.Profile.Profile', 0, NULL, NULL, 'N;'),
('User.ProfileField.*', 1, NULL, NULL, 'N;'),
('User.ProfileField.Admin', 0, NULL, NULL, 'N;'),
('User.ProfileField.Create', 0, NULL, NULL, 'N;'),
('User.ProfileField.Delete', 0, NULL, NULL, 'N;'),
('User.ProfileField.Update', 0, NULL, NULL, 'N;'),
('User.ProfileField.View', 0, NULL, NULL, 'N;'),
('User.Recovery.*', 1, NULL, NULL, 'N;'),
('User.Recovery.Recovery', 0, NULL, NULL, 'N;'),
('User.Registration.*', 1, NULL, NULL, 'N;'),
('User.Registration.Registration', 0, NULL, NULL, 'N;'),
('User.User.*', 1, NULL, NULL, 'N;'),
('User.User.Index', 0, NULL, NULL, 'N;'),
('User.User.View', 0, NULL, NULL, 'N;'),
('UserInformation.*', 1, NULL, NULL, 'N;'),
('UserInformation.Admin', 0, NULL, NULL, 'N;'),
('UserInformation.Create', 0, NULL, NULL, 'N;'),
('UserInformation.Delete', 0, NULL, NULL, 'N;'),
('UserInformation.Index', 0, NULL, NULL, 'N;'),
('UserInformation.Update', 0, NULL, NULL, 'N;'),
('UserInformation.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('modir_system_role', 'City.*'),
('modir_system_role', 'Country.*'),
('modir_system_role', 'Education.*'),
('modir_system_role', 'Expert.*'),
('modir_system_role', 'ExpertType.*'),
('karfarma_role', 'Information.City'),
('karjo_role', 'Information.City'),
('karfarma_role', 'Information.Expert'),
('karjo_role', 'Information.Expert'),
('karfarma_role', 'Information.LevelFive'),
('karjo_role', 'Information.LevelFive'),
('modir_role', 'Information.LevelFive'),
('karfarma_role', 'Information.LevelFour'),
('karjo_role', 'Information.LevelFour'),
('modir_role', 'Information.LevelFour'),
('karfarma_role', 'Information.LevelOne'),
('karjo_role', 'Information.LevelOne'),
('modir_role', 'Information.LevelOne'),
('karfarma_role', 'Information.LevelSeven'),
('karjo_role', 'Information.LevelSeven'),
('modir_role', 'Information.LevelSeven'),
('karfarma_role', 'Information.LevelSix'),
('karjo_role', 'Information.LevelSix'),
('modir_role', 'Information.LevelSix'),
('karfarma_role', 'Information.LevelThree'),
('karjo_role', 'Information.LevelThree'),
('modir_role', 'Information.LevelThree'),
('karfarma_role', 'Information.LevelTwo'),
('modir_role', 'Information.LevelTwo'),
('karfarma_role', 'Information.Skill'),
('karjo_role', 'Information.Skill'),
('karfarma_role', 'Information.UserExpertSave'),
('karjo_role', 'Information.UserExpertSave'),
('karfarma_role', 'Information.UserInformationUpdate'),
('karjo_role', 'Information.UserInformationUpdate'),
('karfarma_role', 'Information.UserSkillSave'),
('karjo_role', 'Information.UserSkillSave'),
('modir_system_role', 'Skill.*'),
('modir_system_role', 'SkillType.*'),
('modir_system_role', 'State.*'),
('karfarma_role', 'task_profile'),
('karjo_role', 'task_profile'),
('moalemin_role', 'task_profile'),
('modir_role', 'task_profile'),
('modir_system_role', 'task_profile'),
('nazer_role', 'task_profile'),
('rahnama_role', 'task_profile'),
('modir_role', 'TExam.*'),
('modir_role', 'TLessonGroup.*'),
('modir_role', 'TQuestionsTashrihi.*'),
('modir_role', 'TQuestionsTesti.*'),
('moalemin_role', 'User.Admin.ManageUser'),
('modir_role', 'User.Admin.ManageUser'),
('nazer_role', 'User.Admin.ManageUser'),
('rahnama_role', 'User.Admin.ManageUser'),
('task_profile', 'User.Logout.Logout'),
('task_profile', 'User.Profile.Changepassword'),
('task_profile', 'User.Profile.Edit');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_code` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_code` (`state_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول شهرها' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `state_code`, `title`) VALUES
(1, 2, 'پاکدشت'),
(2, 2, 'ورامین');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول کشور ها' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `title`) VALUES
(1, 'ایران');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_duty`
--

CREATE TABLE IF NOT EXISTS `tbl_duty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_code` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` text COLLATE utf8_persian_ci,
  PRIMARY KEY (`id`),
  KEY `type_code` (`type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول وظیفه ها یا دسترسی ها' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education`
--

CREATE TABLE IF NOT EXISTS `tbl_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول تحصیلات' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`id`, `title`) VALUES
(1, 'بی سواد'),
(2, 'ابتدایی'),
(3, 'سیکل'),
(4, 'دیپلم'),
(5, 'فوق دیپلم'),
(6, 'لیسانس'),
(7, 'فوق لیسانس'),
(8, 'دکترا');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employe_order`
--

CREATE TABLE IF NOT EXISTS `tbl_employe_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `karfarma_user_code` int(11) NOT NULL,
  `job_code` int(11) NOT NULL COMMENT 'شغل مورد درخواست',
  `expert_other` text COLLATE utf8_persian_ci COMMENT 'تخصص های دیگر',
  `skill_other` text COLLATE utf8_persian_ci COMMENT 'مهارت های دیگر',
  `sex` tinyint(1) NOT NULL DEFAULT '2' COMMENT '0 is male , 1 is female , 2 is farghi nemikoneh',
  `memo` text COLLATE utf8_persian_ci COMMENT 'توضیحات',
  `expire_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'تاریخ پایان درخواست',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `confirm_memo` text COLLATE utf8_persian_ci,
  `confirm_user_code` int(11) DEFAULT NULL,
  `confirm_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'تاریخ تایید',
  PRIMARY KEY (`id`),
  KEY `karfarma_user_code` (`karfarma_user_code`),
  KEY `confirm_user_code` (`confirm_user_code`),
  KEY `job_code` (`job_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول سفارش یا درخواست نیروی کار' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_employe_order`
--

INSERT INTO `tbl_employe_order` (`id`, `karfarma_user_code`, `job_code`, `expert_other`, `skill_other`, `sex`, `memo`, `expire_date`, `create_date`, `modified_date`, `confirm_memo`, `confirm_user_code`, `confirm_date`) VALUES
(11, 1, 1, '', '', 2, '', '0000-00-00 00:00:00', '2014-03-01 08:19:17', '0000-00-00 00:00:00', NULL, NULL, '0000-00-00 00:00:00'),
(12, 1, 1, '', '', 2, '', '0000-00-00 00:00:00', '2014-03-01 08:20:02', '0000-00-00 00:00:00', NULL, NULL, '0000-00-00 00:00:00'),
(13, 1, 1, '', '', 2, '', '0000-00-00 00:00:00', '2014-03-01 08:20:31', '0000-00-00 00:00:00', NULL, NULL, '0000-00-00 00:00:00'),
(14, 1, 1, '', '', 2, '', '0000-00-00 00:00:00', '2014-03-01 08:25:25', '0000-00-00 00:00:00', NULL, NULL, '0000-00-00 00:00:00'),
(15, 1, 1, '', '', 2, '', '0000-00-00 00:00:00', '2014-03-01 08:27:46', '0000-00-00 00:00:00', NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employe_order_expert`
--

CREATE TABLE IF NOT EXISTS `tbl_employe_order_expert` (
  `employe_order_code` int(11) NOT NULL,
  `expert_code` int(11) NOT NULL,
  UNIQUE KEY `employe_order_code_2` (`employe_order_code`,`expert_code`),
  KEY `employe_order_code` (`employe_order_code`),
  KEY `expert_code` (`expert_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول سفارش یا درخواست نیروی کار(تخصص ها)';

--
-- Dumping data for table `tbl_employe_order_expert`
--

INSERT INTO `tbl_employe_order_expert` (`employe_order_code`, `expert_code`) VALUES
(14, 3),
(14, 4),
(15, 3),
(15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employe_order_skill`
--

CREATE TABLE IF NOT EXISTS `tbl_employe_order_skill` (
  `employe_order_code` int(11) NOT NULL,
  `employe_order_skill` int(11) NOT NULL,
  UNIQUE KEY `employe_order_code_2` (`employe_order_code`,`employe_order_skill`),
  KEY `employe_order_code` (`employe_order_code`),
  KEY `employe_order_skill` (`employe_order_skill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول سفارش یا درخواست نیروی کار(مهارت ها)';

--
-- Dumping data for table `tbl_employe_order_skill`
--

INSERT INTO `tbl_employe_order_skill` (`employe_order_code`, `employe_order_skill`) VALUES
(15, 1),
(15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employment_log`
--

CREATE TABLE IF NOT EXISTS `tbl_employment_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `karjo_user_code` int(11) NOT NULL COMMENT 'کارجو',
  `karfarma_user_code` int(11) NOT NULL COMMENT 'کارفرما',
  `status` tinyint(1) DEFAULT '0' COMMENT '0 is inactive , 1 is active',
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `karjo_user_code` (`karjo_user_code`),
  KEY `karfarma_user_code` (`karfarma_user_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول تاریخچه استخدام ها' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expert`
--

CREATE TABLE IF NOT EXISTS `tbl_expert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expert_type_code` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `expert_type_code` (`expert_type_code`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول تخصص ها' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_expert`
--

INSERT INTO `tbl_expert` (`id`, `expert_type_code`, `title`) VALUES
(3, 2, 'کارمند اداری'),
(4, 2, 'کارمند حسابداری'),
(5, 3, 'برنامه نویسی وب'),
(6, 3, 'برنامه نویسی ویندوز');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expert_lesson_assign`
--

CREATE TABLE IF NOT EXISTS `tbl_expert_lesson_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expert_code` int(11) NOT NULL,
  `lesson_group_code` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `expert_code` (`expert_code`,`lesson_group_code`),
  KEY `lesson_group_code` (`lesson_group_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول تخصیص تخصص به گروه درسی' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_expert_lesson_assign`
--

INSERT INTO `tbl_expert_lesson_assign` (`id`, `expert_code`, `lesson_group_code`) VALUES
(3, 4, 1),
(1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expert_type`
--

CREATE TABLE IF NOT EXISTS `tbl_expert_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول نوع تخصص ها' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_expert_type`
--

INSERT INTO `tbl_expert_type` (`id`, `title`) VALUES
(2, 'اداری'),
(3, 'برنامه نویسی');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE IF NOT EXISTS `tbl_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان شغل',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول شغل ها' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`id`, `title`) VALUES
(1, 'منشی گری'),
(2, 'مترجمی');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_expert_assign`
--

CREATE TABLE IF NOT EXISTS `tbl_job_expert_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expert_code` int(11) NOT NULL,
  `job_code` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `expert_code` (`expert_code`,`job_code`),
  KEY `job_code` (`job_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول تخصیص تخصص به شغل' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_job_expert_assign`
--

INSERT INTO `tbl_job_expert_assign` (`id`, `expert_code`, `job_code`) VALUES
(2, 3, 1),
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_skill_assign`
--

CREATE TABLE IF NOT EXISTS `tbl_job_skill_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_code` int(11) NOT NULL,
  `job_code` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `skill_code` (`skill_code`,`job_code`),
  KEY `job_code` (`job_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول تخصیص مهارت به شغل' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_job_skill_assign`
--

INSERT INTO `tbl_job_skill_assign` (`id`, `skill_code`, `job_code`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `type_code` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `type_code` (`type_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `type_code`) VALUES
(1, 'Admin', 'Administrator', 1),
(2, 'khajehosseini', 'yadollah', 2),
(3, 'modeiri', 'modeir', 1),
(4, 'karjoiii', 'karjo', 2),
(5, 'karfarmai', 'karfarma', 3),
(6, 'karjo_karfarmai', 'karjo_karfarma', 4),
(7, 'nazeri', 'nazer', 5),
(8, 'moalemini', 'moalemin', 6),
(9, 'rahnamai', 'rahnama', 7),
(13, 'user99a', 'user89', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'type_code', 'Type', 'INTEGER', '2', '0', 3, '', '', '', '', '0', 'UWrelBelongsTo', '{"modelName":"Type","optionName":"title","emptyField":"لطفا انتخاب کنید","relationName":"type"}', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_religion`
--

CREATE TABLE IF NOT EXISTS `tbl_religion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول کیش و آیین' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_religion`
--

INSERT INTO `tbl_religion` (`id`, `title`) VALUES
(1, 'شیعه'),
(2, 'سنی'),
(3, 'مسیحیت'),
(4, 'یهودیت'),
(5, 'دیگر');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill`
--

CREATE TABLE IF NOT EXISTS `tbl_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_type_code` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_type_code` (`skill_type_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول مهارت ها' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_skill`
--

INSERT INTO `tbl_skill` (`id`, `skill_type_code`, `title`) VALUES
(1, 1, 'هنر بازیگری'),
(2, 1, 'هنر نقاشی'),
(3, 2, 'مکانیکی'),
(4, 2, 'باتری سازی');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill_type`
--

CREATE TABLE IF NOT EXISTS `tbl_skill_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول نوع مهارت' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_skill_type`
--

INSERT INTO `tbl_skill_type` (`id`, `title`) VALUES
(1, 'هنری'),
(2, 'فنی');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE IF NOT EXISTS `tbl_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_code` (`country_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول استان ها' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `country_code`, `title`) VALUES
(2, 1, 'تهران');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE IF NOT EXISTS `tbl_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول نوع عضویت' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`id`, `title`) VALUES
(1, 'مدیر'),
(2, 'کارجو'),
(3, 'کارفرما'),
(4, 'هم کارجو و هم کارفرما'),
(5, 'ناظر'),
(6, 'معلیمن'),
(7, 'راهنما');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_exam`
--

CREATE TABLE IF NOT EXISTS `tbl_t_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان آزمون',
  `lesson_group_code` int(11) NOT NULL COMMENT 'گروه درسی',
  `testi_conut` int(11) NOT NULL COMMENT 'تعداد تستی',
  `tashrihi_count` int(11) NOT NULL COMMENT 'تعداد تشریحی',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT ' 1 is active , 0 is inactive',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'تاریخ ایجاد',
  PRIMARY KEY (`id`),
  KEY `lesson_group_code` (`lesson_group_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول آزمون ها' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_t_exam`
--

INSERT INTO `tbl_t_exam` (`id`, `title`, `lesson_group_code`, `testi_conut`, `tashrihi_count`, `status`, `create_date`) VALUES
(1, '', 1, 0, 0, 1, '2014-02-03 05:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_lesson_group`
--

CREATE TABLE IF NOT EXISTS `tbl_t_lesson_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان گروه درسی',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='گروههای درسی' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_t_lesson_group`
--

INSERT INTO `tbl_t_lesson_group` (`id`, `title`) VALUES
(1, 'درس صنایع 1'),
(2, 'درس کامپیوتر 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_questions_tashrihi`
--

CREATE TABLE IF NOT EXISTS `tbl_t_questions_tashrihi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_group_code` int(11) NOT NULL COMMENT 'گروه درسی',
  `title` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان سوال',
  `answer` text COLLATE utf8_persian_ci COMMENT 'جواب',
  `question_type` int(11) NOT NULL DEFAULT '1' COMMENT 'نوع سوال',
  `unit` int(11) NOT NULL COMMENT 'بارم',
  `time` float NOT NULL COMMENT 'زمان پسخگویی به سوال',
  PRIMARY KEY (`id`),
  KEY `question_type` (`question_type`),
  KEY `lesson_group_code` (`lesson_group_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول سوالات تشریحی' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_t_questions_tashrihi`
--

INSERT INTO `tbl_t_questions_tashrihi` (`id`, `lesson_group_code`, `title`, `answer`, `question_type`, `unit`, `time`) VALUES
(1, 1, 'سوال یک از گروه درسی صنایع', 'جواب سوال صنایع', 1, 2, 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_questions_testi`
--

CREATE TABLE IF NOT EXISTS `tbl_t_questions_testi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_group_code` int(11) NOT NULL COMMENT 'گروه درسی',
  `choice_count` int(11) NOT NULL COMMENT 'تعداد گزینه ها',
  `title` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان سوال',
  `answer` int(11) NOT NULL COMMENT 'جواب',
  `question_type` int(11) NOT NULL DEFAULT '1' COMMENT 'نوع سوال',
  `unit` int(11) NOT NULL COMMENT 'بارم',
  `time` float NOT NULL COMMENT 'زمان پسخگویی به سوال',
  PRIMARY KEY (`id`),
  KEY `question_type` (`question_type`),
  KEY `lesson_group_code` (`lesson_group_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول سوالا ت' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_t_questions_testi`
--

INSERT INTO `tbl_t_questions_testi` (`id`, `lesson_group_code`, `choice_count`, `title`, `answer`, `question_type`, `unit`, `time`) VALUES
(1, 2, 4, 'سوال تستی صانیع', 1, 2, 3, 0);

--
-- Triggers `tbl_t_questions_testi`
--
DROP TRIGGER IF EXISTS `generateChoice`;
DELIMITER //
CREATE TRIGGER `generateChoice` AFTER INSERT ON `tbl_t_questions_testi`
 FOR EACH ROW call generateChoiceQuestionsTesti()
//
DELIMITER ;
DROP TRIGGER IF EXISTS `generateChoiceUpdate`;
DELIMITER //
CREATE TRIGGER `generateChoiceUpdate` AFTER UPDATE ON `tbl_t_questions_testi`
 FOR EACH ROW IF NEW.choice_count <> OLD.choice_count 
THEN  
	DELETE FROM `tbl_t_questions_testi_choice` WHERE `question_testi_code`= NEW.id ;
	call generateChoiceQuestionsTestiForUpdate (NEW.id	,	NEW.choice_count);
END IF
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_questions_testi_choice`
--

CREATE TABLE IF NOT EXISTS `tbl_t_questions_testi_choice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_testi_code` int(11) NOT NULL COMMENT 'سوال گزینه',
  `number` int(11) NOT NULL COMMENT 'شماره',
  `title` text COLLATE utf8_persian_ci COMMENT 'عنوان گزینه سوال',
  PRIMARY KEY (`id`),
  KEY `question_testi_code` (`question_testi_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول گزینه های گروه تستی' AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_t_questions_testi_choice`
--

INSERT INTO `tbl_t_questions_testi_choice` (`id`, `question_testi_code`, `number`, `title`) VALUES
(13, 1, 1, 'a'),
(14, 1, 2, 'd'),
(15, 1, 3, 'dd'),
(16, 1, 4, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_question_type`
--

CREATE TABLE IF NOT EXISTS `tbl_t_question_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نوع سوال',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول نوع سوال' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_t_question_type`
--

INSERT INTO `tbl_t_question_type` (`id`, `title`) VALUES
(1, 'بصورت تصادفی در آزمون ها بیاید'),
(2, 'حتما در آزمون ها بیاد');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_user_exam`
--

CREATE TABLE IF NOT EXISTS `tbl_t_user_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_code` int(11) NOT NULL COMMENT 'آزمون',
  `user_code` int(11) NOT NULL COMMENT 'کاربر',
  `time_length` tinytext COLLATE utf8_persian_ci NOT NULL COMMENT 'زمان طول کشیده شده',
  `user_ip` int(11) NOT NULL,
  `finish` int(11) NOT NULL DEFAULT '0' COMMENT '1 is azmono tamum kardeh , 0 is morgaresh ghate shodeh',
  `browser` int(11) NOT NULL COMMENT 'مروگر',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `exam_code` (`exam_code`),
  KEY `user_code` (`user_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول آزمون های کاربران' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload`
--

CREATE TABLE IF NOT EXISTS `tbl_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` int(11) NOT NULL,
  `upload_type_code` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `upload_type_code` (`upload_type_code`),
  KEY `user_code` (`user_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='آپلودها' AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_upload`
--

INSERT INTO `tbl_upload` (`id`, `user_code`, `upload_type_code`, `filename`, `create_date`) VALUES
(13, 1, 1, '613.jpg', '2014-01-01 10:38:44'),
(14, 1, 1, '6.jpg', '2014-01-01 10:44:59'),
(15, 1, 1, 'ruzname.jpg', '2014-01-01 10:52:31'),
(16, 1, 1, '649.jpg', '2014-01-01 10:56:59'),
(18, 1, 1, '382.jpg', '2014-01-01 11:10:39'),
(19, 1, 1, '617.jpg', '2014-01-01 11:12:45'),
(20, 1, 2, '622.jpg', '2014-01-01 11:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload_type`
--

CREATE TABLE IF NOT EXISTS `tbl_upload_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول نوع اسکن' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_upload_type`
--

INSERT INTO `tbl_upload_type` (`id`, `title`) VALUES
(1, 'آخرین مدرک دبستان'),
(2, 'آخرین مدرک راهنمایی'),
(3, 'آخرین مدارک دبیرستان'),
(4, 'آخرین مدارک دانشگاه'),
(5, 'گواهی نامه رانندگی پایه 1'),
(6, 'گواهی نامه رانندگی پایه 2'),
(7, 'گواهی نامه رانندگی پایه موتور'),
(8, 'گواهی‌نامه');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `moblie` varchar(11) DEFAULT NULL COMMENT 'شماره موبایل',
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `activkeymoblie` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `moblie` (`moblie`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`),
  KEY `superuser_2` (`superuser`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `moblie`, `activkey`, `activkeymoblie`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '1', '9a24eff8c15a6a141ece27eb6947da0f', NULL, '2013-12-03 10:16:26', '2014-03-09 05:55:26', 1, 1),
(2, 'khajehossini', 'e10adc3949ba59abbe56e057f20f883e', '', '09192915612', 'c577fa5e0de9361458fc92fee6238af4', '52aff17cb3c36', '2013-12-17 06:38:52', '0000-00-00 00:00:00', 0, 1),
(3, 'modeir', 'e10adc3949ba59abbe56e057f20f883e', 'modeir@a.com', NULL, '61da79ed7ad4a5fb8fe8f2710fa8005c', NULL, '2014-02-01 05:38:06', '2014-02-08 08:51:16', 0, 1),
(4, 'karjo', 'e10adc3949ba59abbe56e057f20f883e', 'karjo@a.com', NULL, '2aaceee1c96ed784bd68659c8b42805d', NULL, '2014-02-01 05:39:37', '2014-02-10 04:01:57', 0, 1),
(5, 'karfarma', 'e10adc3949ba59abbe56e057f20f883e', 'karfarma@a.com', NULL, '41d10fae1bd4a228edb7ae5f01ab767a', NULL, '2014-02-01 05:40:23', '2014-03-09 05:55:58', 0, 1),
(6, 'karjo_karfarma', 'e10adc3949ba59abbe56e057f20f883e', 'karjo_karfarma@a.com', NULL, 'dc057966c8e8d5ea14a731aeaacc5f81', NULL, '2014-02-01 05:41:53', '0000-00-00 00:00:00', 0, 1),
(7, 'nazer', 'e10adc3949ba59abbe56e057f20f883e', 'nazer@a.com', NULL, '5bbecdfade523a432f5d6c24d1c748f6', NULL, '2014-02-01 05:42:53', '0000-00-00 00:00:00', 0, 1),
(8, 'moalemin', 'e10adc3949ba59abbe56e057f20f883e', 'moalemin@a.com', NULL, 'e38503211c99ae917a6320a2da4e01d5', NULL, '2014-02-01 05:43:43', '0000-00-00 00:00:00', 0, 1),
(9, 'rahnama', 'e10adc3949ba59abbe56e057f20f883e', 'rahnama@a.com', NULL, 'd8b2632deef259cb3b0f529beaf0a85b', NULL, '2014-02-01 05:44:34', '0000-00-00 00:00:00', 0, 1),
(13, 'user89', 'e10adc3949ba59abbe56e057f20f883e', 'user89@s.com', '09121456789', '492cf56be89ddab91f49f0a3e6c805ad', '52f5cc687136e', '2014-02-08 06:19:20', '2014-02-08 02:55:52', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_expert`
--

CREATE TABLE IF NOT EXISTS `tbl_user_expert` (
  `user_code` int(11) NOT NULL,
  `expert_code` int(11) NOT NULL,
  UNIQUE KEY `user_code_2` (`user_code`,`expert_code`),
  KEY `user_code` (`user_code`),
  KEY `expert_code` (`expert_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول تخصص های کاربر';

--
-- Dumping data for table `tbl_user_expert`
--

INSERT INTO `tbl_user_expert` (`user_code`, `expert_code`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(4, 3),
(4, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_information`
--

CREATE TABLE IF NOT EXISTS `tbl_user_information` (
  `id` int(11) NOT NULL COMMENT 'شمارۀ عضویت',
  `birth_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'تاریخ تولد',
  `sex` tinyint(4) DEFAULT NULL COMMENT '0 is male , 1 is female',
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `meli_num` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'شماره ملی',
  `marrie_status` tinyint(4) DEFAULT NULL COMMENT '0 is Unmarried , 1 is Married  وضعیت تاهل',
  `photo` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تصویر پرسنلی',
  `address` text COLLATE utf8_persian_ci,
  `state_code` int(11) DEFAULT NULL COMMENT 'استان',
  `city_code` int(11) DEFAULT NULL COMMENT 'شهر',
  `zone` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'منطقه',
  `telephone` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تلفن ثابت بیشتر یکی با کاما یا خط تیره جدا می شود',
  `personnel_count` int(11) DEFAULT NULL COMMENT 'تعداد پرسنل',
  `act_history` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'سابقه فعالیت',
  `act_type` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نوع فعالیت',
  `education_code` int(11) DEFAULT NULL COMMENT 'تحصیلات',
  `elementary_name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام  مدرسه دبستان',
  `low_school_name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام مدرسه راهنمایی',
  `high_school_name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام دبیرستان',
  `university_name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام دانشگاه',
  `certification_num` int(11) DEFAULT NULL COMMENT 'شماره گواهی',
  `certification_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `resume_act` text COLLATE utf8_persian_ci COMMENT 'رزومه فعالیتها',
  `favorite` text COLLATE utf8_persian_ci COMMENT 'علایق',
  `expert_other` text COLLATE utf8_persian_ci COMMENT 'تخصص های دیگر',
  `skill_other` text COLLATE utf8_persian_ci COMMENT 'مهارت های دیگر',
  `religion_code` int(11) DEFAULT NULL,
  `religion_other` int(11) DEFAULT NULL COMMENT 'کیش و آیین دیگر',
  `confirm` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 is confirm , 1 is nonconfirm',
  `reason` text COLLATE utf8_persian_ci,
  `confirm_user_code` int(11) DEFAULT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 is pole nadeh , 1 is pole dadeh',
  PRIMARY KEY (`id`),
  KEY `education_code` (`education_code`),
  KEY `religion_code` (`religion_code`),
  KEY `confirm_user_code` (`confirm_user_code`),
  KEY `state_code` (`state_code`),
  KEY `city_code` (`city_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_user_information`
--

INSERT INTO `tbl_user_information` (`id`, `birth_date`, `sex`, `email`, `meli_num`, `marrie_status`, `photo`, `address`, `state_code`, `city_code`, `zone`, `telephone`, `personnel_count`, `act_history`, `act_type`, `education_code`, `elementary_name`, `low_school_name`, `high_school_name`, `university_name`, `certification_num`, `certification_date`, `resume_act`, `favorite`, `expert_other`, `skill_other`, `religion_code`, `religion_other`, `confirm`, `reason`, `confirm_user_code`, `payment_status`) VALUES
(1, '0000-00-00 00:00:00', 1, NULL, '', 0, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 'a', 'bq', 'adsa', 'adww21', NULL, NULL, 0, NULL, NULL, 0),
(2, '2014-02-08 11:57:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0),
(3, '2014-02-08 11:57:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0),
(4, '0000-00-00 00:00:00', 1, NULL, '', 0, NULL, '', NULL, NULL, NULL, '1', NULL, NULL, NULL, 1, '1', '', '', '', NULL, '0000-00-00 00:00:00', '1', '3', 'dcasdad111', NULL, NULL, NULL, 0, NULL, NULL, 0),
(5, '2014-02-08 11:57:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0),
(6, '2014-02-08 11:57:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0),
(7, '2014-02-08 11:57:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0),
(8, '2014-02-08 11:57:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0),
(9, '2014-02-08 11:57:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0),
(13, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_skill`
--

CREATE TABLE IF NOT EXISTS `tbl_user_skill` (
  `user_code` int(11) NOT NULL,
  `skill_code` int(11) NOT NULL,
  UNIQUE KEY `user_code_2` (`user_code`,`skill_code`),
  KEY `user_code` (`user_code`),
  KEY `skill_code` (`skill_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول مهارت های کاربر';

--
-- Dumping data for table `tbl_user_skill`
--

INSERT INTO `tbl_user_skill` (`user_code`, `skill_code`) VALUES
(1, 1),
(1, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workhouse`
--

CREATE TABLE IF NOT EXISTS `tbl_workhouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام شرکت یا محل کار',
  `address` int(11) DEFAULT NULL,
  `state_code` int(11) DEFAULT NULL,
  `city_code` int(11) DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تلفن ثابت بیشتر یکی با کاما یا خط تیره جدا می شود',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_code` (`user_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول محل کار و تاریخ شروع و پایان آنها' AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `tbl_city_ibfk_1` FOREIGN KEY (`state_code`) REFERENCES `tbl_state` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_duty`
--
ALTER TABLE `tbl_duty`
  ADD CONSTRAINT `tbl_duty_ibfk_1` FOREIGN KEY (`type_code`) REFERENCES `tbl_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_employe_order`
--
ALTER TABLE `tbl_employe_order`
  ADD CONSTRAINT `tbl_employe_order_ibfk_1` FOREIGN KEY (`karfarma_user_code`) REFERENCES `tbl_user_information` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_employe_order_ibfk_2` FOREIGN KEY (`confirm_user_code`) REFERENCES `tbl_user_information` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_employe_order_ibfk_3` FOREIGN KEY (`job_code`) REFERENCES `tbl_jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_employe_order_expert`
--
ALTER TABLE `tbl_employe_order_expert`
  ADD CONSTRAINT `tbl_employe_order_expert_ibfk_1` FOREIGN KEY (`employe_order_code`) REFERENCES `tbl_employe_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_employe_order_expert_ibfk_2` FOREIGN KEY (`expert_code`) REFERENCES `tbl_expert` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_employe_order_skill`
--
ALTER TABLE `tbl_employe_order_skill`
  ADD CONSTRAINT `tbl_employe_order_skill_ibfk_1` FOREIGN KEY (`employe_order_code`) REFERENCES `tbl_employe_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_employe_order_skill_ibfk_2` FOREIGN KEY (`employe_order_skill`) REFERENCES `tbl_skill` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_employment_log`
--
ALTER TABLE `tbl_employment_log`
  ADD CONSTRAINT `tbl_employment_log_ibfk_1` FOREIGN KEY (`karjo_user_code`) REFERENCES `tbl_user_information` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_employment_log_ibfk_2` FOREIGN KEY (`karfarma_user_code`) REFERENCES `tbl_user_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_expert`
--
ALTER TABLE `tbl_expert`
  ADD CONSTRAINT `tbl_expert_ibfk_1` FOREIGN KEY (`expert_type_code`) REFERENCES `tbl_expert_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_expert_lesson_assign`
--
ALTER TABLE `tbl_expert_lesson_assign`
  ADD CONSTRAINT `tbl_expert_lesson_assign_ibfk_1` FOREIGN KEY (`expert_code`) REFERENCES `tbl_expert` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_expert_lesson_assign_ibfk_2` FOREIGN KEY (`lesson_group_code`) REFERENCES `tbl_t_lesson_group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_job_expert_assign`
--
ALTER TABLE `tbl_job_expert_assign`
  ADD CONSTRAINT `tbl_job_expert_assign_ibfk_1` FOREIGN KEY (`expert_code`) REFERENCES `tbl_expert` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_job_expert_assign_ibfk_2` FOREIGN KEY (`job_code`) REFERENCES `tbl_jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_job_skill_assign`
--
ALTER TABLE `tbl_job_skill_assign`
  ADD CONSTRAINT `tbl_job_skill_assign_ibfk_1` FOREIGN KEY (`skill_code`) REFERENCES `tbl_skill` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_job_skill_assign_ibfk_2` FOREIGN KEY (`job_code`) REFERENCES `tbl_jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
  ADD CONSTRAINT `tbl_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_profiles_ibfk_2` FOREIGN KEY (`type_code`) REFERENCES `tbl_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_skill`
--
ALTER TABLE `tbl_skill`
  ADD CONSTRAINT `tbl_skill_ibfk_1` FOREIGN KEY (`skill_type_code`) REFERENCES `tbl_skill_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD CONSTRAINT `tbl_state_ibfk_1` FOREIGN KEY (`country_code`) REFERENCES `tbl_country` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_t_exam`
--
ALTER TABLE `tbl_t_exam`
  ADD CONSTRAINT `tbl_t_exam_ibfk_1` FOREIGN KEY (`lesson_group_code`) REFERENCES `tbl_t_lesson_group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_t_questions_tashrihi`
--
ALTER TABLE `tbl_t_questions_tashrihi`
  ADD CONSTRAINT `tbl_t_questions_tashrihi_ibfk_1` FOREIGN KEY (`question_type`) REFERENCES `tbl_t_question_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_t_questions_tashrihi_ibfk_2` FOREIGN KEY (`lesson_group_code`) REFERENCES `tbl_t_lesson_group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_t_questions_testi`
--
ALTER TABLE `tbl_t_questions_testi`
  ADD CONSTRAINT `tbl_t_questions_testi_ibfk_1` FOREIGN KEY (`question_type`) REFERENCES `tbl_t_question_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_t_questions_testi_ibfk_2` FOREIGN KEY (`lesson_group_code`) REFERENCES `tbl_t_lesson_group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_t_questions_testi_choice`
--
ALTER TABLE `tbl_t_questions_testi_choice`
  ADD CONSTRAINT `tbl_t_questions_testi_choice_ibfk_1` FOREIGN KEY (`question_testi_code`) REFERENCES `tbl_t_questions_testi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_t_user_exam`
--
ALTER TABLE `tbl_t_user_exam`
  ADD CONSTRAINT `tbl_t_user_exam_ibfk_1` FOREIGN KEY (`exam_code`) REFERENCES `tbl_t_exam` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_t_user_exam_ibfk_2` FOREIGN KEY (`user_code`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD CONSTRAINT `tbl_upload_ibfk_2` FOREIGN KEY (`upload_type_code`) REFERENCES `tbl_upload_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_upload_ibfk_3` FOREIGN KEY (`user_code`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_user_expert`
--
ALTER TABLE `tbl_user_expert`
  ADD CONSTRAINT `tbl_user_expert_ibfk_2` FOREIGN KEY (`expert_code`) REFERENCES `tbl_expert` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_expert_ibfk_3` FOREIGN KEY (`user_code`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_user_information`
--
ALTER TABLE `tbl_user_information`
  ADD CONSTRAINT `tbl_user_information_ibfk_16` FOREIGN KEY (`state_code`) REFERENCES `tbl_state` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_information_ibfk_17` FOREIGN KEY (`city_code`) REFERENCES `tbl_city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_information_ibfk_18` FOREIGN KEY (`education_code`) REFERENCES `tbl_education` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_information_ibfk_19` FOREIGN KEY (`religion_code`) REFERENCES `tbl_religion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_information_ibfk_20` FOREIGN KEY (`confirm_user_code`) REFERENCES `tbl_user_information` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_information_ibfk_21` FOREIGN KEY (`id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_user_skill`
--
ALTER TABLE `tbl_user_skill`
  ADD CONSTRAINT `tbl_user_skill_ibfk_2` FOREIGN KEY (`skill_code`) REFERENCES `tbl_skill` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_skill_ibfk_3` FOREIGN KEY (`user_code`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_workhouse`
--
ALTER TABLE `tbl_workhouse`
  ADD CONSTRAINT `tbl_workhouse_ibfk_1` FOREIGN KEY (`user_code`) REFERENCES `tbl_user_information` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
