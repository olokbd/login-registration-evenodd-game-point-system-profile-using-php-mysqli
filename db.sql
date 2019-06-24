CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `birth_day` int(4) NOT NULL,
  `birth_month` varchar(4) NOT NULL,
  `birth_year` int(4) NOT NULL,
  `gpoint` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
