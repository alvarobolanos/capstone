DROP DATABASE IF EXISTS `capstone`;

CREATE DATABASE IF NOT EXISTS `capstone`;
USE `capstone`;

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
	`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`username` VARCHAR(255) NOT NULL UNIQUE,
	-- `email` VARCHAR(255) NOT NULL UNIQUE,
	-- `password` VARCHAR(255) NOT NULL,
	`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`title` VARCHAR(250) NOT NULL UNIQUE, 
	`description` TEXT NOT NULL,
	`image_url` VARCHAR(2083),
	`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`score` FLOAT(2) NOT NULL DEFAULT 0,
	`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`game_id` INT,
	FOREIGN KEY (`game_id`) REFERENCES games(`id`)
);

DROP TABLE IF EXISTS `players_scores`;
CREATE TABLE `players_scores` (
	`player_id` INT,
	FOREIGN KEY (`player_id`) REFERENCES players(`id`),
	`score_id` INT,
	FOREIGN KEY (`score_id`) REFERENCES scores(`id`)
);

DROP TABLE IF EXISTS `qanda`;
CREATE TABLE `qanda` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `question` TEXT NOT NULL,
    `answer_1` TINYTEXT NOT NULL,
    `answer_2` TINYTEXT NOT NULL,
    `answer_3` TINYTEXT NOT NULL,
    `answer_4` TINYTEXT NOT NULL,
    `correct_answer` TINYTEXT NOT NULL,
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `game_id` INT,
	FOREIGN KEY (`game_id`) REFERENCES games(`id`)
);

INSERT 
INTO capstone.games (title, description, image_url)
VALUES ('World Geography', 'A trivia game about world geography in which you will test your knowledge about places, bodies of water and other interesting facts that everyone should know. If you do not know these, then you should have stayed in school kido.','https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/OrteliusWorldMap.jpeg/2560px-OrteliusWorldMap.jpeg');

SELECT * FROM games;

INSERT
INTO capstone.qanda (question, answer_1, answer_2, answer_3, answer_4, correct_answer, game_id)
VALUES ('What is the largest Island in the Caribbean?', 'Puerto Rico', 'La Hispaniola', 'Cuba', 'Dominica', 'Cuba', 1), 
('Where is the tallest waterfall located?','Venezuela','USA','Congo','Denmark','Denmark',1),
('What is the tallest peak in Europe?','Mt. Elbrus','Mt. Blanc','Mt. Olympus','Mt. Edna','Mt. Elbrus',1),
('In what country could you find Tungurahua volcano?','Costa Rica','Ecuador','Mexico','Chile','Ecuador',1),
('What is the biggest metropolitan area (by population) in the USA?','Boston-Cambridge-Newton','Dallas-Fort Worth','Miami-Ft. Lauderdale-West Palm Beach','New York-Newark-Jersey City','New York-Newark-Jersey City',1),
('What country has the highest bird diversity?','USA','India','Colombia','Indonesia','Colombia',1),
('What is the country with the largest forest area?','Russian Federation','Brazil','Canada','China','Russian Federation',1);

SELECT * FROM qanda;

SELECT question, correct_answer FROM capstone.qanda WHERE game_id=1;