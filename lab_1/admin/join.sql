-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 12 feb 2018 kl 18:02
-- Serverversion: 5.6.35
-- PHP-version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databas: `Join`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `authors`
--

CREATE TABLE `authors` (
  `authorid` int(255) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `SSN` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `authors`
--

INSERT INTO `authors` (`authorid`, `fname`, `lname`, `SSN`) VALUES
(1, 'J. K.', 'Rowling', 11),
(2, 'Fannie', 'Pihl', 22);

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `bookid` int(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `pages` int(255) NOT NULL,
  `ISBN` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`bookid`, `title`, `pages`, `ISBN`) VALUES
(1, 'IT', 1186, 1134567),
(2, 'Harry Potter and the Philosopher\'s Stone', 352, 1408855895);

-- --------------------------------------------------------

--
-- Tabellstruktur `book_author`
--

CREATE TABLE `book_author` (
  `bookid` int(255) NOT NULL,
  `authorid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `book_author`
--

INSERT INTO `book_author` (`bookid`, `authorid`) VALUES
(2, 2),
(1, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorid`);

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Index för tabell `book_author`
--
ALTER TABLE `book_author`
  ADD KEY `get_author` (`authorid`),
  ADD KEY `get_title` (`bookid`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `get_author` FOREIGN KEY (`authorid`) REFERENCES `authors` (`authorid`),
  ADD CONSTRAINT `get_title` FOREIGN KEY (`bookid`) REFERENCES `books` (`bookid`);
