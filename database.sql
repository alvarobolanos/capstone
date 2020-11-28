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
VALUES ('World Geography', 'A trivia game about world geography in which you will test your knowledge about places, bodies of water and other interesting facts that everyone should know. If you do not know these, then you should have stayed in school kido.','https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/OrteliusWorldMap.jpeg/2560px-OrteliusWorldMap.jpeg'),
('World Sports', 'A trivia game about world sports. No... really, not just the National Leagues. On your mark, get set... GO!', 'https://s2.qwant.com/thumbr/0x0/4/d/95ccbad1ebd8dc6448bda48852193cb916a09a9bc26301a17e395d853f0839/sports-cancun.jpg?u=https%3A%2F%2Fwww.discoverymundo.com%2Fblog%2Fwp-content%2Fuploads%2F2016%2F07%2Fsports-cancun.jpg&q=0&b=1&p=0&a=1');

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
('What is the most densely populated country in Africa in 2020?','Ethiopia','Egypt','DR Congo','Nigeria','Nigeria',1)
('The club with the most european football champion league titles is:','Bayern Munchen','Milan FC','Real Madrid FC','Liverpool FC','Real Madrid FC',2),
('The Formula 1 driver who has won the most Grand Prix in history is:','Lewis Hamilton','Michael Schumacher','Sebastian Vettel','Ayrton Senna','Lewis Hamilton',2),
('The national team that has conquered the most Rugby Leage World Cup titles is:','Australia','New Zealand','Papua New Guinea','England','Australia',2),
('The national team that has won the most Fifa World Cup Men titles is:','France','Argentina','Brazil','Germany','Brazil',2),
('The national team that has won the most FIFA World Cup Women titles is:','France','USA','Denmakr','South Korea','USA',2),
('In 2014 the men in the Brazilian lost the semifinal of the FIVB world cup. Which national team prevented their fourth consecutive title?','Cuba','Russia','Poland','Italy','Poland',2),
('The NBA player with the most regular season points is:','Kobe Bryant','Michael Jordan','Kareem Abdul-Jabbar','Karl Malone','Kareem Abdul-Jabbar',2),
('The record holder Quarterback for most consecutive wins during regular season is:','Peyton Manning','Tom Brady','Brett Favre','Joe Montana','Peyton Manning',2),
('This Bill Masterton Memorial trophy is presented to the player who best exemplifies the qualities of perseverance, sportsmanship and dedication to:','Badmington','Bowling','Lacrosse','Hockey','Hockey',2),
('Which of the following drivers did not win a total of 7 NASCAR Cup Series Championship','Richard Petty','Jeff Gordon','Jimmie Johnson','Dale Earnhardt','Jeff Gordon',2),
('Which American has won more Grand Slam Titles','Helen Wills','Andre Agassi','Serena Williams','Pete Sampras','Serena Williams',2),
('Which Formula 1 team has started more races?','Williams','McLaren','Ferrari','Lotus','Ferrari',2),
('Which of these is not a real sport?','Hobbyhorsing','Shin Kicking','Chess Boxing','Tackle-Bok','Tackle-Bok',2),
('Where is the 24 hours endurance race in the World Endurance Championship run?','Le Mans','Seebring','Spa-Frnacorchamps','Fuji','Le Mans',2),
('The most wins record by a rider in Tour de France stages belongs to:','Mark Cavendish','Peter Sagan','Andre Gripel','Eddy Merckx','Eddy Merckx',2),
('The most world records in swimming is held by:','Sarah Sjostrom','Caeleb Dressel','Michael Phelps','Kelsi Dahlia','Caeleb Dressel',2);


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
