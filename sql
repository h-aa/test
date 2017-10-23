CREATE TABLE `city` (
  `city_id` int(5) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_region` int(3) NOT NULL
) DEFAULT CHARSET=utf8;

INSERT INTO `city` (`city_id`, `city_name`, `city_region`) VALUES
(1, 'Краснодар', 1),
(2, 'Кропоткин', 1),
(3, 'Славянск', 1),
(4, 'Ростов', 2),
(5, 'Шахты', 2),
(6, 'Батайск', 2),
(7, 'Ставрополь', 3),
(8, 'Пятигорск', 3),
(9, 'Кисловодск', 3);

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `third_name` varchar(100) NOT NULL,
  `region` int(3) NOT NULL,
  `city` int(5) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL
) DEFAULT CHARSET=utf8;

CREATE TABLE `region` (
  `region_id` int(3) NOT NULL,
  `region_name` varchar(255) NOT NULL
) DEFAULT CHARSET=utf8;

INSERT INTO `region` (`region_id`, `region_name`) VALUES
(1, 'Краснодарский край'),
(2, 'Ростовская область'),
(3, 'Ставропольский край');

ALTER TABLE `city` ADD PRIMARY KEY (`city_id`);
ALTER TABLE `comment` ADD PRIMARY KEY (`comment_id`);
ALTER TABLE `region` ADD PRIMARY KEY (`region_id`);
ALTER TABLE `city` MODIFY `city_id` int(5) NOT NULL AUTO_INCREMENT;
ALTER TABLE `comment` MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `region` MODIFY `region_id` int(3) NOT NULL AUTO_INCREMENT;