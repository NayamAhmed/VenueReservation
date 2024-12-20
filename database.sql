
CREATE DATABASE IF NOT EXISTS `event_venue`
USE `event_venue`;


DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `confirmation_number` varchar(50) DEFAULT NULL,
  `event_type` varchar(100) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL
)
