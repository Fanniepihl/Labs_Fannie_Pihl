-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 12 feb 2018 kl 18:00
-- Serverversion: 5.6.35
-- PHP-version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databas: `Book`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `admin`
--

CREATE TABLE `admin` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `admin`
--

INSERT INTO `admin` (`userid`, `username`, `userpass`) VALUES
(1, 'helena', '041aef858dc3351b81e128c657063fe20dfe3a3f');

-- --------------------------------------------------------

--
-- Tabellstruktur `author`
--

CREATE TABLE `author` (
  `authorid` int(11) NOT NULL,
  `fname` char(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `lname` char(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `ssn` int(11) NOT NULL,
  `birthyear` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `linkpage` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `author`
--

INSERT INTO `author` (`authorid`, `fname`, `lname`, `ssn`, `birthyear`, `linkpage`) VALUES
(11, 'J.K', 'Rowling', 0, '1965', ''),
(22, 'Jane', 'Austen', 0, '1775', ''),
(33, 'J.R.R.', 'Tolkien', 0, '1892', ''),
(44, 'George R.R.', 'Martin', 0, '1948', ''),
(55, 'Suzanne', 'Collins', 0, '1962', ''),
(66, 'Stephen', 'King', 0, '1947', '');

-- --------------------------------------------------------

--
-- Tabellstruktur `book`
--

CREATE TABLE `book` (
  `bookid` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `author` char(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `pages` int(11) NOT NULL,
  `edition` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `published` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `onloan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `book`
--

INSERT INTO `book` (`bookid`, `title`, `author`, `pages`, `edition`, `published`, `company`, `onloan`) VALUES
(1, 'Harry Potter and the Philosopher\'s Stone', 'J.K Rowling', 352, '', '2014', 'Bloomsbury', 1),
(2, 'Pride and Prejudice', 'Jane Austen', 368, '', '2015', 'Sterling Publishing CO INC', 0),
(3, 'The Fellowship of the Ring', 'J.R.R. Tolkien', 432, '', '2005', 'Harper Collins Publishers', 0),
(4, 'A Game of Thrones', 'George R.R. Martin', 864, '', '2011', 'Harper Collins UK', 0),
(5, 'The Hunger Games', 'Suzanne Collins', 374, '', '2010', 'Scholastic Press', 0),
(6, 'IT', 'Stephen King', 1392, '', '2011', 'Hodder Stoughton', 1),
(262012, 'IT', 'Julius', 678, NULL, '', '', 0),
(778899, 'IT', 'Ohara', 444, NULL, '', '', 0),
(2334512, 'Christmas', 'Santa Claus', 789, NULL, '', '', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `creator`
--

CREATE TABLE `creator` (
  `bookid` int(11) NOT NULL,
  `authorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('fannie', '\'01a125fc64af2cef4a51a1c5a2354f72133703f2\''),
('julle', '041AEF858DC3351B81E128C657063FE20DFE3A3F');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Index för tabell `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorid`);

--
-- Index för tabell `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`);

--
-- Index för tabell `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`bookid`,`authorid`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;