CREATE TABLE IF NOT EXISTS `registrations` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(250) NOT NULL,
	`email` varchar(250) NOT NULL,
	`password` blob,
	`phone` varchar(250) NOT NULL,
	`plan` enum('basic','standart','premium') DEFAULT NULL,
	`date_created` datetime NOT NULL,
	`ip` varchar(15) DEFAULT NULL,
	UNIQUE (`email`),
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;