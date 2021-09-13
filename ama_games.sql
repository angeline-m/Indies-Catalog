-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2021 at 09:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amanabat1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ama_games`
--

CREATE TABLE `ama_games` (
  `id` int(11) NOT NULL,
  `ama_title` varchar(50) NOT NULL,
  `ama_description` text NOT NULL,
  `ama_developer` varchar(50) NOT NULL,
  `ama_publisher` varchar(50) NOT NULL,
  `ama_release` date NOT NULL,
  `ama_price` decimal(5,2) NOT NULL,
  `ama_platform` text NOT NULL,
  `ama_genre` text NOT NULL,
  `ama_multi` tinyint(1) NOT NULL,
  `ama_cover` varchar(50) NOT NULL,
  `ama_trailer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ama_games`
--

INSERT INTO `ama_games` (`id`, `ama_title`, `ama_description`, `ama_developer`, `ama_publisher`, `ama_release`, `ama_price`, `ama_platform`, `ama_genre`, `ama_multi`, `ama_cover`, `ama_trailer`) VALUES
(1, 'A Hat in Time', 'A Hat in Time is a 3D platform-adventure game where you play as a &#34;Hat Kid&#34; travelling through space in search for Time Pieces. On her journey, she&#39;ll jump, fight, and traverse her way through a variety of vibrant worlds that you&#39;ll want to explore.', 'Gears for Breakfast', 'Gears for Breakfast', '2017-10-05', '32.99', 'Windows, PS4, Xbox One, Switch', 'Action, Adventure', 1, '607508382777b.jpeg', 'um_3_cmnSmg'),
(2, 'A Short Hike', 'Climb to the summit in this charming adventure game. Along the way, you\'ll meet a cast of lovely characters on your climb at Hawk Peak Provincial Park. Are you ready to reach the top?', 'Adam Robinson-Yu', 'Adam Robinson-Yu', '2019-07-30', '8.99', 'Windows, macOS, Linux, Switch', 'Adventure', 0, '607508745c89f.jpeg', 'qsA5p0MKdoM'),
(3, 'Agent A: A Puzzle in Disguise', 'Stop Agent A in this espionage-based puzzle game. Solve puzzles to escape from Agent A\'s plans to keep you locked in her hideaway!', 'Yak & Co', 'Yak & Co', '2019-08-29', '22.79', 'Windows, macOS, PS4, Xbox One, Switch, Android, iOS', 'Puzzle, Point and Click', 0, '6075089b79908.jpeg', '7Q2Ouvhq0Pc'),
(4, 'Assemble with Care', 'From the creators of Monument Valley comes a pleasant and relaxing game about fixing things. Uncover the story hidden in the town of Bellariva, where traveller Maria has parked her bags. Before long you\'ll fall in love with Bellariva too.', 'Ustwo Games', 'Ustwo Games', '2020-03-26', '8.99', 'Windows, macOS, iOS', 'Puzzle', 0, '607508bf2b1a4.jpeg', '5WAK3AIjgck'),
(5, 'Broken Age', 'Broken Age is a unique hand-animated point-and-click adventure game. Designed by Tim Schafer, this crowdfunded game features a star-studded cast including Elijah Wood and Jack Black. Discover a coming-of-age story in this retro-style adventure.', 'Double Fine Productions', 'Double Fine Productions', '2014-01-28', '17.49', 'Windows, Linux, PS4, Xbox One, Switch, iOS, Android', 'Adventure, Point and Click', 0, '607508e1ad970.jpeg', 'RjJAMM1MyTA'),
(6, 'Campfire Cooking', 'Relax by the campfire in this puzzle game about toasting marshmallows. Soon you&#39;ll be making fondue and other meals as you listen to stories during your camping trip. Be warned, it looks cute, but it can get tough!', 'Layton Hawkes', 'Layton Hawkes', '2017-10-18', '6.49', 'Windows', 'Puzzle', 0, '607508fc1d695.jpeg', 'VrwxtCIUqu0'),
(7, 'Catastronauts', 'Play with up to three friends as you try to keep your fix your ship against enemy fire and other disasters. You&#39;ll be running around putting out fires and fixing parts as you fight your way through the dangers of space.', 'Inertia Game Studios', 'Inertia Game Studios', '2018-09-28', '18.49', 'Windows, PS4, Switch', 'Action', 1, '60750910dd93e.jpeg', 'rWqDmXY1FWY'),
(8, 'CHUCHEL', 'CHUCHEL is equal parts funny and charming with a unique art style you won\'t forget. Take on the role of Chuchel on his quest to get the precious cherry. You\'ll be solving puzzles and facing enemies along the way, so be prepared for a fun adventure.', 'Amanita Design', 'Amanita Design', '2018-05-07', '12.99', 'Windows, macOS, Android, iOS', 'Point and Click, Adventure', 0, '60750928005ca.jpeg', 'Ttg6TuGkkTI'),
(9, 'Cosmic Express', 'All aboard the Cosmic Express! In this intergalactic puzzle game, you\'ll be laying down the tracks across different habitats to pick up your passengers. This is an easy-to-learn but difficult-to-master game, don\'t let its cuteness fool you!', 'Cosmic Engineers', 'Draknek', '2017-05-16', '10.99', 'Windows, macOS, Linux, Android, iOS', 'Puzzle', 0, '6075093a14f3d.jpeg', 'L1yB7PxqpJw'),
(10, 'Donut County', 'Donut County is a game about growing holes, mischievous raccoons, and a little town that gets wrapped up in the commotion. You\'ll find this game delightful as you handle physics-based puzzles and uncover an underground campfire story. Warning: this game contains raccoons.', 'Ben Esposito', 'Annapurna Interactive', '2018-08-28', '14.49', 'Windows, macOS, PS4, Xbox One, Switch, Android, iOS', 'Puzzle, Adventure', 0, '60750950924ea.jpeg', 'er2DMi6NUwE'),
(11, 'Florence', 'Join Florence Yeoh in this charming story of her meeting Krish, a cello player. Cook food, send texts, and brush your teeth with slice-of-life minigames. This is a short experience you don\'t want to miss!', 'Mountains', 'Annapurna Interactive', '2020-02-13', '6.69', 'Windows, macOS, Switch, Android, iOS', 'Puzzle, Point and Click', 0, '6075096237512.jpeg', 'HPUwFEhgvVA'),
(12, 'Gorogoa', 'Gorogoa is a gorgeous hand-drawn game like no other. Solve puzzles in breathtaking worlds and environments unlike any other. This BAFTA-winning game is a must-play.', 'Buried Signal', 'Annapurna Interactive', '2017-12-14', '17.49', 'Windows, PS4, Xbox One, Switch, Android, iOS', 'Puzzle', 0, '60750975af35c.jpeg', 'xtZVVW17oCY'),
(13, 'Hidden Folks', 'The most adorable hidden object game you\'ll ever play! Interact with environments to find the things you need. Hidden Folks has a delightful and iconic handmade style and sound effects that you\'ll instantly recognize.', 'Adriaan de Jongh', 'Adriaan de Jongh', '2017-02-15', '14.99', 'Windows, macOS, Linux, Switch, Android, iOS', 'Puzzle, Point and Click', 0, '6075099214866.jpeg', 'kYw_tw__7ow'),
(14, 'Hue', 'Play with colors in this colorful indie platformer. Bring color to your black and white world on your quest for your missing family.', 'Fiddlesticks Games', 'Curve Digital', '2016-08-30', '16.99', 'Windows, PS4, Xbox One, Switch', 'Puzzle, Adventure, Platformer', 0, '607509a69ed59.jpeg', 'coKjsUpdAXY'),
(15, 'Human Fall Flat', 'Human Fall Flat is the most chaotic and hilarious multiplayer platformer-puzzle that you&#39;ll ever play. Traverse across cities, castles, and mountains as you figure out how to reach your goal. Local co-op and online multiplayer available.', 'No Brakes Games', 'Curve Digital', '2016-07-22', '16.99', 'Windows, Linux, PS4, Xbox One, Switch', 'Platformer, Puzzle', 1, '607509b9f1eb9.jpeg', 'T_uA48H1-g4'),
(16, 'Human Resource Machine', 'Video games and programming collide in this tough puzzle game. Human Resource Machine is a game about starting a new corporate office job, break room conversations, and machines.', 'Tomorrow Corporation', 'Tomorrow Corporation', '2015-10-15', '17.49', 'Windows, MacOS, Linux, Switch, Android, iOS', 'Puzzle', 0, '607509cbcdecf.jpeg', '_KDx9ldlPP4'),
(17, 'I Am Dead', 'I Am Dead is a story-rich game about the recently deceased museum curator, Morris Lupton. With the company of his ghost dog Sparky, they must solve the mysteries of the island they inhabit to save it.', 'Hollow Ponds', 'Annapurna Interactive', '2020-10-08', '22.79', 'Windows, macOS, Switch', 'Puzzle, Adventure', 0, '607509db35f8d.jpeg', 'fbdM7MC91yA'),
(18, 'Jenny LeClue: Detectivu', 'Explore and uncover mysteries in this detective game with Jenny LeClue! Featuring a distinct art style and exquisite voice acting, this stylish game will keep you wanting to play for hours.', 'Mografi', 'Mografi', '2019-09-19', '24.99', 'Windows, macOS, Linux, PS4, Xbox One, Switch, Android, iOS', 'Puzzle, Adventure', 0, '607509ec72e69.jpeg', '2SVfpdo5ey4'),
(19, 'Lumino City', 'Solve puzzles and find your granddad in Lumino City! This hand-made puzzle adventure is equal parts delightful and original. It\'s a guarantee that you\'ve never seen puzzles like the ones you\'ll find in Lumino City.', 'State of Play Games', 'State of Play Games', '2014-12-02', '14.49', 'Windows, macOS, Android, iOS', 'Puzzle, Point and Click, Adventure', 0, '60750a03ad338.jpeg', 'btpeCVRslFM'),
(20, 'LUNA The Shadow Dust', 'Hand-animated, great soundtrack, beautiful world, and fantastic storytelling come together in this game. LUNA The Shadow Dust is a cinematic point and click puzzler with a Studio Ghibli-esque art style.', 'Lantern Studio', 'Coconut Island Games', '2020-02-13', '22.79', 'Windows, macOS, Linux, Switch', 'Puzzle, Point and Click, Adventure', 0, '60750a2f3ff08.jpeg', 'cr2tAg62IgM'),
(21, 'Mini Metro', 'Who knew a game about maintaining subway lines could be this addicting and aesthetically pleasing? Draw subway lines to meet demands and keep your system alive as your commuter needs grow. Warning: you could be hooked for hours on this.', 'Dinosaur Polo Club', 'Dinosaur Polo Club', '2015-11-06', '10.99', 'Windows, macOS, Linux, PS4, Switch, Android, iOS', 'Puzzle', 0, '60750a42dc2ce.jpeg', 'UF2fk9xgCdY'),
(22, 'Moving Out', 'A game about running the wackiest moving company. Work with your friends to move furniture and objects out of peoples\' homes onto the moving truck! Local co-op and remote play only.', 'SMG Studio', 'Team17', '2020-04-28', '28.99', 'Windows, macOS, PS4, Xbox, Switch', 'Action', 1, '60750a532fc38.jpeg', 'DwffKcGBUSM'),
(23, 'Night in the Woods', 'Join Mae as she moves back to her hometown after leaving college. Catch up with old friends, uncover a mystery, and explore the old town of Possum Springs.', 'Infinite Fall', 'Finji', '2017-02-21', '21.99', 'Windows, macOS, Linux, PS4, Xbox One, Switch', 'Adventure', 0, '60750a633f22a.jpeg', 'u17kM8oSz3k'),
(24, 'Old Man\'s Journey', 'Traverse beautiful landscapes in this atmospheric adventure. Old Man\'s Journey is a game about going places, interacting with environments, and solving puzzles. This game might just also tug on your heartstrings.', 'Broken Rules', 'Broken Rules', '2017-05-17', '8.79', 'Windows, macOS, PS4, Xbox One, Switch, Android, iOS', 'Puzzle, Adventure', 0, '60750a704705e.jpeg', 'tJ29Ql3xDhY'),
(25, 'Overcooked', 'Play the most chaotic yet exciting 4-player game about cooking in Overcooked. Make rice, wash plates, and serve dishes as orders come through. You\'ll work in restaurants on wheels, in the sky, just about anywhere really!', 'Ghost Town Games Ltd.', 'Team17 Digital Ltd', '2016-08-03', '18.99', 'Windows, PS4, Xbox One, Switch', 'Puzzle, Point and Click, Adventure', 1, '60750a82dc895.jpeg', '0ZK7veYPEJQ'),
(26, 'Phogs', 'Play as one-half of a double-ended dog in this ridiculous puzzle platformer!  This charming and quirky game is as hilarious as it looks, and a guarantee that you and a friend will get into some crazy antics.', 'Bit Loom Games', 'Coatsink', '2020-12-03', '28.99', 'Windows, PS4, Xbox One, Switch', 'Puzzle, Point and Click, Adventure', 1, '60750a967fa92.jpeg', 'xSkBj5fBLfQ'),
(27, 'Snakebird', 'Play as part-snake and part-bird in this puzzle game about eating fruits. Do not let the cute art style fool you! This game is notoriously difficult! Can you beat it?', 'Noumenon Games', 'Noumenon Games', '2015-05-04', '7.79', 'Windows, macOS, Linux, Android', 'Puzzle', 0, '60750aa54a8de.jpeg', 'WJJa3hMbs4s'),
(28, 'Swim Out', 'Swim Out is a turn-based puzzle game about swimming in a pool. Avoid the other swimmers and toss beach balls to traverse the pool to the other side.', 'Lozange Lab', 'Lozange Lab', '2017-09-14', '6.29', 'Windows, macOS, Linux, Xbox One, Switch, Android', 'Puzzle', 0, '60750ab4e3d07.jpeg', '3zc2V_qDcUI'),
(29, 'Thomas Was Alone', 'Thomas Was Alone is a puzzle platformer about polygons. Get hooked into a story about friendship, relationships, insecurities, and unique powers. This is more than your average platformer.', 'Bithell Games', 'Bithell Games', '2012-11-12', '10.99', 'Windows, Linux, PS4, Xbox One, Switch, Android, iOS', 'Puzzle, Platformer', 0, '60750ac549636.jpeg', '5K4zjNtQ3y8'),
(30, 'Untitled Goose Game', 'You play as a goose. Your job is to cause havoc in a small English village. Do goose things. Honk.', 'House House', 'Panic', '2020-09-23', '22.79', 'Windows, macOS, PS4, Xbox One, Switch', 'Puzzle', 1, '60750ad4c3782.jpeg', '9LL2AtHo1gk'),
(31, 'Vignettes', 'Vignettes is a game about interacting with objects and moving them around to change them. Featuring a vibrant art style, this relaxing casual game is all you need if you have a little bit of free time.', 'Skeleton Business', 'Skeleton Business', '2019-03-06', '8.99', 'Windows, macOS, Android, iOS', 'Puzzle, Point and Click', 0, '60750ae79d023.jpeg', 'C29PTvGgd10'),
(32, 'Wandersong', 'Wandersong is a musical adventure where you use your voice to interact with the world. Explore, solve puzzles, and meet a cute cast of characters.', 'Greg Lobanov', 'Greg Lobanov', '2018-09-27', '21.99', 'Windows, macOS, PS4, Xbox One, Switch', 'Adventure', 0, '60750af6f21fe.jpeg', '-xfmb7S-aAI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ama_games`
--
ALTER TABLE `ama_games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ama_games`
--
ALTER TABLE `ama_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
