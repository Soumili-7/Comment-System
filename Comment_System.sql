CREATE TABLE User (
 `Email` varchar(255) NOT NULL,
 `Pwd` longtext NOT NULL,
 `Secret` varchar(255) NOT NULL,
  PRIMARY KEY(`Email`)
);

CREATE TABLE Comment (
  `msg_id` int(10) NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `msg_date` varchar(255) DEFAULT NULL,
  `msg_time` varchar(255) DEFAULT NULL
   PRIMARY KEY (`msg_id`)
); 