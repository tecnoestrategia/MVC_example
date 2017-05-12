-- --------------------------------------------------------
-- Host:                         172.16.10.41
-- Versión del servidor:         5.7.15 - MySQL Community Server (GPL)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para mvctest
CREATE DATABASE IF NOT EXISTS `mvctest` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `mvctest`;

-- Volcando estructura para tabla mvctest.author
CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique id of book',
  `name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'The title of book',
  `id_country` int(11) NOT NULL COMMENT 'The id of country was born',
  `alive` tinyint(4) NOT NULL COMMENT 'If the author is alive or not',
  `born_data` date NOT NULL COMMENT 'Data of born',
  `bio` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Bio and description of author',
  `photo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Photo of author',
  PRIMARY KEY (`id_author`),
  UNIQUE KEY `id_pattern` (`id_author`),
  KEY `FK_author_countrys` (`id_country`),
  CONSTRAINT `FK_author_countrys` FOREIGN KEY (`id_country`) REFERENCES `countrys` (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC COMMENT='Anothe entity, in this case books';

-- Volcando datos para la tabla mvctest.author: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` (`id_author`, `name`, `id_country`, `alive`, `born_data`, `bio`, `photo`) VALUES
	(1, 'Andrew Hodges', 1, 1, '1970-06-23', '<p>Hodges was born in London. Since the early 1970s, Hodges has worked on twistor theory, which is the approach to the problems of fundamental physics pioneered by Roger Penrose. He was also involved in gay liberation movement these times.</p>\r\n<p>Hodges is best known as the author of Alan Turing: The Enigma, the story of the British computer pioneer and codebreaker Alan Turing. Critically acclaimed at the time — Donald Michie in New Scientist called it "marvellous and faithful" — the book was chosen by Michael Holroyd as part of a list of 50 \'essential\' books (that were currently available in print) in The Guardian, 1 June 2002.</p>\r\n<p>Hodges is also the author of works that popularize science and mathematics.</p>\r\n<p>He is a Tutorial Fellow in mathematics at Wadham College, Oxford University. Having taught at Wadham since 1986, Hodges was elected a Fellow in 2007, and was appointed Dean from start of the 2011/2012 academic year.</p>', 'andrewhodges.jpg'),
	(2, 'Isaac Asimov', 2, 0, '1919-04-11', '<p>He was an American writer and professor of biochemistry at Boston University. He was known for his works of science fiction and popular science. Asimov was a prolific writer, and wrote or edited more than 500 books and an estimated 90,000 letters and postcards.His books have been published in 9 of the 10 major categories of the Dewey Decimal Classification.</p>\r\n<p>Asimov wrote hard science fiction and, along with Robert A. Heinlein and Arthur C. Clarke, he was considered one of the "Big Three" science fiction writers during his lifetime. Asimov\'s most famous work is the Foundation Series; his other major series are the Galactic Empire series and the Robot series. The Galactic Empire novels are explicitly set in earlier history of the same fictional universe as the Foundation series. Later, beginning with Foundation\'s Edge, he linked this distant future to the Robot and Spacer stories, creating a unified "future history" for his stories much like those pioneered by Robert A. Heinlein and previously produced by Cordwainer Smith and Poul Anderson.[7] He wrote hundreds of short stories, including the social science fiction "Nightfall", which in 1964 was voted by the Science Fiction Writers of America the best short science fiction story of all time. Asimov wrote the Lucky Starr series of juvenile science-fiction novels using the pen name Paul French.</p>\r\n<p>Asimov also wrote mysteries and fantasy, as well as much nonfiction. Most of his popular science books explain scientific concepts in a historical way, going as far back as possible to a time when the science in question was at its simplest stage. He often provides nationalities, birth dates, and death dates for the scientists he mentions, as well as etymologies and pronunciation guides for technical terms. Examples include Guide to Science, the three-volume set Understanding Physics, and Asimov\'s Chronology of Science and Discovery, as well as works on astronomy, mathematics, history, William Shakespeare\'s writing, and chemistry.</p>\r\n<p>Asimov was a long-time member and vice president of Mensa International, albeit reluctantly; he described some members of that organization as "brain-proud and aggressive about their IQs".He took more joy in being president of the American Humanist Association.The asteroid 5020 Asimov, a crater on the planet Mars, a Brooklyn elementary school, and a literary award are named in his honor.</p>', 'isaacasimov.jpg');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;

-- Volcando estructura para tabla mvctest.books
CREATE TABLE IF NOT EXISTS `books` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique id of book',
  `description` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Description (explain) ',
  `title` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'The title of book',
  `id_category` int(11) NOT NULL COMMENT 'The category of the book',
  `number_of_pages` int(11) NOT NULL COMMENT 'Numer of pages of book',
  `isbn` varchar(50) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'ISBN number',
  `id_author` int(11) NOT NULL COMMENT 'The id of Author',
  `year` year(4) NOT NULL COMMENT 'Year of publish',
  `photo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'path to front photo',
  PRIMARY KEY (`id_book`),
  UNIQUE KEY `id_pattern` (`id_book`),
  KEY `FK_book_categories` (`id_category`),
  KEY `FK_books_author` (`id_author`),
  CONSTRAINT `FK_book_categories` FOREIGN KEY (`id_category`) REFERENCES `book_categories` (`id_category`),
  CONSTRAINT `FK_books_author` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Anothe entity, in this case books';

-- Volcando datos para la tabla mvctest.books: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id_book`, `description`, `title`, `id_category`, `number_of_pages`, `isbn`, `id_author`, `year`, `photo`) VALUES
	(1, '<p>It is only a slight exaggeration to say that the British mathematician Alan Turing (1912-1954) saved the Allies from the Nazis, invented the computer and artificial intelligence, and anticipated gay liberation by decades--all before his suicide at age forty-one. This classic biography of the founder of computer science, reissued on the centenary of his birth with a substantial new preface by the author, is the definitive account of an extraordinary mind and life. A gripping story of mathematics, computers, cryptography, and homosexual persecution, Andrew Hodges\'s acclaimed book captures both the inner and outer drama of Turing\'s life.</p>\r\n<p>Hodges tells how Turing\'s revolutionary idea of 1936--the concept of a universal machine--laid the foundation for the modern computer and how Turing brought the idea to practical realization in 1945 with his electronic design. The book also tells how this work was directly related to Turing\'s leading role in breaking the German Enigma ciphers during World War II, a scientific triumph that was critical to Allied victory in the Atlantic. At the same time, this is the tragic story of a man who, despite his wartime service, was eventually arrested, stripped of his security clearance, and forced to undergo a humiliating treatment program--all for trying to live honestly in a society that defined homosexuality as a crime</p>', 'Alan Turing: The Enigma', 1, 586, '9780691155647', 1, '2012', '9780691155647.jpg'),
	(2, '<p>In this fascinating and enlightening new book, Dr. Andrew G. Hodges conducts an imaginary interview with the most influential person in history, Jesus Christ. A psychologist and a Christian, Dr. Hodges draws on his professional background and a profound knowledge of Scripture to "interview" Jesus on a fascinating variety of the most provocative and challenging topics from his life and teachings.</p>\r\n<p>Jesus\' candid answers to these and many other questions give readers added insight and a clearer understanding of His timeless message. From this "first-hand" account of Jesus Christ\'s remarkable life emerges a truly human portrait of Jesus-both as man and God. Moving and unforgettable, "Jesus: " An Interview Across Time adds a powerful, surprising new dimension to the greatest story every told.</p>', 'Jesus: An Interview Across Time', 1, 432, '9780553274257', 1, '1988', '9780553274257.jpg'),
	(3, '<p>The history of a small, semicivilized tribe who rose from obscurity and in 500 years created the greatest and most peaceful empire in the Western world</p>', 'The roman republic', 1, 277, '9780786900109', 2, '1967', 'roman_republic_asimov.jpg'),
	(7, '<p>Gladia Delmarre\'s homeworld, the Spacer planet Solaria, has been abandoned - by its human population. Countless robots remain there. And when traders from Settler worlds attempt to salvage them, the robots of Solaria turn to killing ... in defiance of the Three Laws of Robotics. Pax Robotica Long ago, Gladia\'s robots Daneel and Giskard played a vital role in opening the worlds beyond the Solar system to Settlers from Earth. Now the conscience-stricken robots are faced with an even greater challenge. Either the sacred Three Laws of Robotics are in ruins - or a new, superior Law must be established to bring peace to the galaxy. With Madam Gladia and D.G. Baley - the captain of the Settler traders and a descendant of the robots\' friend Elijah Baley - Daneel and Giskard travel to the robot stronghold of Solaria ... where they uncover a sinister Spacer plot to destroy Earth itself.</p>', 'Robots and empire', 2, 508, '9780586062005', 2, '1986', '9780586062005.jpg'),
	(8, '<p>A millennium into the future two advancements have altered the course of human history:  the colonization of the galaxy and the creation of the positronic brain.  Isaac Asimov\'s Robot novels chronicle the unlikely partnership between a New York City detective and a humanoid robot who must learn to work together.  Like most people left behind on an over-populated Earth, New York City police detective Elijah Baley had little love for either the arrogant Spacers or their robotic companions.  But when a prominent Spacer is murdered under mysterious circumstances, Baley is ordered to the Outer Worlds to help track down the killer.  The relationship between Life and his Spacer superiors, who distrusted all Earthmen, was strained from the start.  Then he learned that they had assigned him a partner:  R. Daneel Olivaw.  Worst of all was that the "R" stood for robot--and his positronic partner was made in the image and likeness of the murder victim!</p>', 'Caves of steel', 2, 288, '9780307792419', 2, '2011', '9780307792419.jpg');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Volcando estructura para tabla mvctest.book_categories
CREATE TABLE IF NOT EXISTS `book_categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique id of category',
  `title` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'The title of category',
  `description` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Explain the category',
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `id_categorie` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='The categories of books';

-- Volcando datos para la tabla mvctest.book_categories: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `book_categories` DISABLE KEYS */;
INSERT INTO `book_categories` (`id_category`, `title`, `description`) VALUES
	(1, 'History', 'History refer to the academic discipline which uses a narrative to examine and analyse a sequence of past events, and objectively determine the patterns of cause and effect that determine them'),
	(2, 'Scfi', 'Science fiction (often shortened to SF, sci-fi or scifi) is a genre of speculative fiction, typically dealing with imaginative concepts such as futuristic science and technology, space travel, time travel, faster than light travel, parallel universes, and extraterrestrial life. Science fiction often explores the potential consequences of scientific and other innovations, and has been called a "literature of ideas.'),
	(3, 'Biographies', 'A biography, or simply bio, is a detailed description of a person\'s life. It involves more than just the basic facts like education, work, relationships, and death; it portrays a person\'s experience of these life events.'),
	(4, 'Fantasy', 'Fiction with strange or otherworldly settings or characters; fiction which invites suspension of reality'),
	(5, 'Autobiographies', 'An autobiography (from the Greek, αὐτός-autos self + βίος-bios life + γράφειν-graphein to write) is a self-written account of the life of a person. The word "autobiography" was first used deprecatingly by William Taylor in 1797 in the English periodical The Monthly Review, when he suggested the word as a hybrid, but condemned it as "pedantic".'),
	(6, 'Art', 'Art is a diverse range of human activities in creating visual, auditory or performing artifacts (artworks), expressing the author\'s imaginative or technical skill, intended to be appreciated for their beauty or emotional power'),
	(7, 'Math', 'Mathematics is the body of knowledge justified by deductive reasoning about abstract structures, starting from axioms and definitions.'),
	(8, 'Travel', 'A guide book or travel guide is "a book of information about a place designed for the use of visitors or tourists".It will usually include information about sights, accommodation, restaurants, transportation, and activities. Maps of varying detail and historical and cultural information are often included.'),
	(9, 'Health', 'Health is the level of functional and metabolic efficiency of a living organism. In humans it is the ability of individuals or communities to adapt and self-manage when facing physical, mental, psychological and social changes'),
	(10, 'Mystery', 'Mystery fiction is a genre of fiction usually involving a mysterious death or a crime to be solved. In a closed circle of suspects, each suspect must have a credible motive and a reasonable opportunity for committing the crime. The central character must be a detective who eventually solves the mystery by logical deduction from facts fairly presented to the reader'),
	(11, 'Romance', 'The romance novel or romantic novel discussed in this article is the mass-market literary genre. Novels of this type of genre fiction place their primary focus on the relationship and romantic love between two people, and must have an "emotionally satisfying and optimistic ending.'),
	(12, 'Self help', 'Self-help or self-improvement is a self-guided improvement[1]—economically, intellectually, or emotionally—often with a substantial psychological basis. Many different self-help group programs exist, each with its own focus, techniques, associated beliefs, proponents and in some cases, leaders. Concepts and terms originating in self-help culture and Twelve-Step culture, such as recovery, dysfunctional families, and codependency have become firmly integrated in mainstream language'),
	(13, 'Science', 'A science book is a work of nonfiction, usually written by a scientist, researcher, or professor. These books are written for a wide audience presumed to have a general education rather than a specifically scientific training, as opposed to the very narrow audience that a scientific paper would have, and are therefore referred to as popular science.'),
	(14, 'Action and adventure', 'Adventure refers to action that usually presents danger, or gives the reader a sense of excitement.'),
	(15, 'Poetry', 'Poetry (the term derives from a variant of the Greek term, poiesis, "making") is a form of literature that uses aesthetic and rhythmic qualities of language—such as phonaesthetics, sound symbolism, and metre—to evoke meanings in addition to, or in place of, the prosaic ostensible meaning.');
/*!40000 ALTER TABLE `book_categories` ENABLE KEYS */;

-- Volcando estructura para tabla mvctest.countrys
CREATE TABLE IF NOT EXISTS `countrys` (
  `id_country` int(11) NOT NULL AUTO_INCREMENT,
  `ISO` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'ISO code for country',
  `name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Name of country (english)',
  PRIMARY KEY (`id_country`),
  UNIQUE KEY `id_country` (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Contrys and ISO codes';

-- Volcando datos para la tabla mvctest.countrys: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `countrys` DISABLE KEYS */;
INSERT INTO `countrys` (`id_country`, `ISO`, `name`) VALUES
	(0, 'ES', 'Spain'),
	(1, 'GB', 'United Kingdom'),
	(2, 'RU', 'Russian Federation');
/*!40000 ALTER TABLE `countrys` ENABLE KEYS */;

-- Volcando estructura para tabla mvctest.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique id of page',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Title of page',
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Contents of page',
  `create_on` datetime NOT NULL COMMENT 'Datetime of creation',
  PRIMARY KEY (`id_page`),
  UNIQUE KEY `id_page` (`id_page`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Pages of site';

-- Volcando datos para la tabla mvctest.pages: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id_page`, `title`, `content`, `create_on`) VALUES
	(1, 'Welcome', '<p>Hello</p>\r\n<p>This is a example of MVC with bootstrap and jquery in php using PDO and CRUD model</p>\r\n<p>Also, contains a simple estructure oriented to single entity model</p>\r\n', '2017-01-10 08:54:32'),
	(2, 'About', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet.</p>\r\n<p>We view immigration as being hugely positive for skilled workers and use our professional experience to make a path for them. We accept instructions only from clients about whom we are confident we can obtain the type of entry being sought. We believe in expertise at work and so have different departments for client relations, documentation and legal assistance to make sure each of you are treated as an individual and with due amount of respect and confidentiality. Our consultants leave no stone unturned in our quest to ensure our clients achieve the immigration outcome they are entitled to. Britannia Consultants takes pride in our ability to establish with our clients, long term relationship built on trust, mutual respect and our outstanding service. We view immigration as being hugely positive for skilled workers and use our professional experience to make a path for them.</p>', '2017-03-02 14:28:51'),
	(3, 'Our Catalog of books', '<p>In our catalog, you can see and consult all our books and filtering by its attributes</p>\r\n<p>There is nothing better than a good book to stimulate the mind, imagination and creativity.</p>\r\n<p>Enjoy¡¡</p>', '2017-04-27 13:57:43');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
