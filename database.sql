DROP DATABASE IF EXISTS `capstone`;

CREATE DATABASE IF NOT EXISTS `capstone`;
USE `capstone`;

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
	`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`username` VARCHAR(191) NOT NULL UNIQUE,
	-- `email` VARCHAR(191) NOT NULL UNIQUE,
	-- `password` VARCHAR(191) NOT NULL,
	`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	-- `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`title` VARCHAR(191) NOT NULL UNIQUE, 
	`description` TEXT NOT NULL,
	`image_url` VARCHAR(191),
	`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	-- `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`score` FLOAT(2) NOT NULL DEFAULT 0,
	`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`game_id` INT,
	FOREIGN KEY (`game_id`) REFERENCES games(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `players_scores`;
CREATE TABLE `players_scores` (
	`player_id` INT,
	FOREIGN KEY (`player_id`) REFERENCES players(`id`),
	`score_id` INT,
	FOREIGN KEY (`score_id`) REFERENCES scores(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
	-- `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `game_id` INT,
	FOREIGN KEY (`game_id`) REFERENCES games(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT 
INTO capstone.games (title, description, image_url)
VALUES ('World Geography', 'A trivia game about world geography in which you will test your knowledge about places, bodies of water and other interesting facts that everyone should know. If you do not know these, then you should have stayed in school kido.','https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/OrteliusWorldMap.jpeg/2560px-OrteliusWorldMap.jpeg');

SELECT * FROM games;

INSERT
INTO capstone.qanda (question, answer_1, answer_2, answer_3, answer_4, correct_answer, game_id)
VALUES ('What is the largest Island in the Caribbean?', 'Puerto Rico', 'La Hispaniola', 'Cuba', 'Dominica', 'Cuba',1), 
('Where is the tallest waterfall located?','Venezuela','USA','Congo','Denmark','Denmark',1),
('What is the tallest peak in Europe?','Mt. Elbrus','Mt. Blanc','Mt. Olympus','Mt. Edna','Mt. Elbrus',1),
('In what country could you find Tungurahua volcano?','Costa Rica','Ecuador','Mexico','Chile','Ecuador',1),
('What is the biggest metropolitan area (by population) in the USA?','Boston-Cambridge-Newton','Dallas-Fort Worth','Miami-Ft. Lauderdale-West Palm Beach','New York-Newark-Jersey City','New York-Newark-Jersey City',1),
('What country has the highest bird diversity?','USA','India','Colombia','Indonesia','Colombia',1),
('What is the country with the largest forest area?','Russian Federation','Brazil','Canada','China','Russian Federation',1),
('Which country is surrounded by only one ocean?','USA','Iceland','Panama','Canada','Iceland',1),
('In what continent is the Gobi Desert located?','North America','Africa','Asia','South America','Asia',1),
('What is the worlds deepest lake?','Victoria','Titicaca','Como','Baikal','Baikal',1),
('What is the worlds longest above-water mountain range?','The Andes','Transantarctic Mountains','Rocky Mountains','Alpes Mountains','The Andes',1),
('What is the longest river in Europe called?','Volga','Danube','Don','Reka','Volga',1),
('Which is the only country where you can see above sea-level the longest mountain range Mid-Atlantic ridge?','Azore','Tristan da Cunha','Iceland','Ascension Island','Iceland',1),
('What is the oldest city in the United States?','Jamestown Virginia','Saint Augustine Florida','Santa Fe New Mexico','Plymouth Massachusetts','Saint Augustine Florida',1),
('What is the oldest continuously inhabited city in the world?','Aleppo Syria','Athens Greece','Faiyum Egypt','Damascus Syria','Damascus Syria',1),
('Where is located the oldest continuously working university in the Americas?','Harvard Cambridge','Autonomous University of Santo Domingo','University of San Marcos Lima','Universidad de La Habana','University of San Marcos Lima',1),
('Which US state borders Lake Huron?','Michigan','Wisconsin','Ohio','Pennsylvania','Michigan',1),
('What was the most polluted country in 2019?','China','Bangladesh','India','USA','Bangladesh',1),
('What is the smallest country in Europe?','Monaco','San Marino','Andorra','Vatican City','Vatican City',1),
('What is the most densely populated country in Africa in 2020?','Ethiopia','Egypt','DR Congo','Nigeria','Nigeria',1);


-- Insert values into the players table
-- INSERT 
-- INTO capstone.players (username)
-- VALUES ('Alvaro');
-- $lastPlayerId = $mysqli-> insert_id

-- Insert values into scores table
-- INSERT
-- INTO capstone.scores (score, game_id)
-- VALUES (90.0, 1);
-- $lastScoreId = $mysqli -> insert_id

-- Insert values into players_scores table
-- INSERT 
-- INTO capstone.players_scores (player_id, score_id)
-- VALUES (1, 1); 
-- use the $lastPlayerId and $lastScoreId

-- SELECT * FROM capstone.players;

-- SELECT * FROM capstone.scores;

-- SELECT * FROM capstone.players_scores;

-- Query scores and player name to populate the top scores table
-- SELECT players.username, scores.score FROM players 
-- JOIN players_scores ON players_scores.player_id = players.id
-- JOIN scores ON scores.id = players_scores.score_id
-- ORDER BY scores.score desc
-- LIMIT 5;

-- update scores and the players_scores table
