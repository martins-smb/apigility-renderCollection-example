CREATE TABLE IF NOT EXISTS `clients` (
  `cl_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `contacts` (
  `ctc_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctc_cl_id` int(4) unsigned zerofill NOT NULL,
  `ctc_name` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `ctc_email` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ctc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;