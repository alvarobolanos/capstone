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

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`question_text` TEXT NOT NULL,
	`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`game_id` INT,
	FOREIGN KEY (`game_id`) REFERENCES games(`id`)
);

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers`(
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`answer_text` TINYTEXT NOT NULL,
	`meta` ENUM ('correct', 'incorrect') NOT NULL, 
	`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`question_id` INT,
	FOREIGN KEY (`question_id`) REFERENCES questions(`id`)
);

INSERT 
INTO capstone.games (title, description)
VALUES ('World Geography', 'A trivia game about world geography in which you will test your knowledge about places, bodies of water and other interesting facts that everyone should know. If you do not know these, then you should have stayed in school kido.');

SELECT * FROM games;

INSERT 
INTO capstone.questions (question_text, game_id)
VALUES ('What is the largest Island in the Caribbean?', 1),
('Where is the tallest waterfall located?', 1),
('What is the tallest peak in Europe?', 1),
('In what country could you find Tungurahua volcano?', 1),
('What is the biggest metropolitan area (by population) in the USA?', 1),
('What country has the highest bird diversity?', 1),
('What is the country with the largest forest area?', 1);

SELECT * FROM questions;

INSERT 
INTO capstone.answers (answer_text, meta, question_id)
Values ('Puerto Rico','incorrect',1),
('La Hispaniola','incorrect',1),
('Cuba','correct',1),
('Dominica','incorrect',1),
('Venezuela','incorrect',2),
('USA','incorrect',2),
('Congo','incorrect',2),
('Denmark','correct',2),
('Mt. Elbrus','correct',3),
('Mt. Blanc','incorrect',3),
('Mt. Olympus','incorrect',3),
('Mt. Edna','incorrect',3),
('Costa Rica','incorrect',4),
('Ecuador','correct',4),
('Mexico','incorrect',4),
('Chile','incorrect',4),
('Boston-Cambridge-Newton','incorrect',5),
('Dallas-Fort Worth','incorrect',5),
('Miami-Ft. Lauderdale-West Palm Beach','incorrect',5),
('New York-Newark-Jersey City','correct',5),
('USA','incorrect',6),
('India','incorrect',6),
('Colombia','correct',6),
('Indonesia','incorrect',6),
('Russian Federation','correct',7),
('Brazil','incorrect',7),
('Canada','incorrect',7),
('China','incorrect',7);

SELECT * FROM answers WHERE question_id=1 AND meta='correct';