-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2015 at 04:31 PM
-- Server version: 5.0.24
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `acessos`
--

-- --------------------------------------------------------

--
-- Table structure for table `dados`
--

CREATE TABLE IF NOT EXISTS `dados` (
  `id_dados` int(11) NOT NULL,
  `email_user` varchar(40) default NULL,
  `email_pass` varchar(20) default NULL,
  `skype_user` varchar(40) default NULL,
  `skype_pass` varchar(20) default NULL,
  `totvs_user` varchar(40) default NULL,
  `totvs_pass` varchar(20) default NULL,
  `ocomon_user` varchar(40) default NULL,
  `ocomon_pass` varchar(20) default NULL,
  `net_user` varchar(40) default NULL,
  `net_pass` varchar(20) default NULL,
  `bloqueado` tinyint(1) default '0',
  PRIMARY KEY  (`id_dados`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dados`
--

INSERT INTO `dados` (`id_dados`, `email_user`, `email_pass`, `skype_user`, `skype_pass`, `totvs_user`, `totvs_pass`, `ocomon_user`, `ocomon_pass`, `net_user`, `net_pass`, `bloqueado`) VALUES
(1, 'edu@vit', '', 'eduvita', '', 'edu_vit', '', 'edu.vita', '', 'edu_vita', '', 0),
(2, 'edu@vit', 'vit', 'eduvita', 'tetete', 'edu_vit', 'vit', 'edu.vita', '', 'edu_vita', '', 0),
(6, 'teste', '333333333', 'testet', '333333333', 'tetstet', '333333333', 'tetste', '3333333333', 'tetste', '33333333', 0),
(7, 'eduardosouza@vitasons.com.br', 'vitasons', 'eduardosouzavitasons', 'vitasons', 'eduardo_souza', 'vitasons', 'eduardo.souza', 'vitasons', 'eduardo_souza', 'vitasons', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gerencia`
--

CREATE TABLE IF NOT EXISTS `gerencia` (
  `id_gerencia` int(11) NOT NULL auto_increment,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_gerencia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gerencia`
--

INSERT INTO `gerencia` (`id_gerencia`, `user`, `password`, `admin`) VALUES
(1, 'edu_souza', 'vita', 1),
(5, 'Master', 'Master', 1),
(6, 'RH_user', 'planejamentoagora', 0),
(7, 'user', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupos` int(11) NOT NULL,
  `grupo1` tinyint(1) default '0',
  `grupo2` tinyint(1) default '0',
  `grupo3` tinyint(1) default '0',
  `grupo4` tinyint(1) default '0',
  `grupopoa` tinyint(1) default '0',
  `grupopoa2` tinyint(1) default '0',
  `grupomatriz` tinyint(1) default '0',
  `grupomatriz2` tinyint(1) default '0',
  `gestores` tinyint(1) default '0',
  `gestoresmatriz` tinyint(1) default '0',
  `gestorespoa` tinyint(1) default '0',
  `grupovarejo` tinyint(1) default '0',
  `grupoatacado` tinyint(1) default '0',
  `controlediario` tinyint(1) default '0',
  PRIMARY KEY  (`id_grupos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id_grupos`, `grupo1`, `grupo2`, `grupo3`, `grupo4`, `grupopoa`, `grupopoa2`, `grupomatriz`, `grupomatriz2`, `gestores`, `gestoresmatriz`, `gestorespoa`, `grupovarejo`, `grupoatacado`, `controlediario`) VALUES
(1, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(7, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `infousuario`
--

CREATE TABLE IF NOT EXISTS `infousuario` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `nome` varchar(40) NOT NULL,
  `depfilial` varchar(20) default NULL,
  `cargo` varchar(20) default NULL,
  `admissao` date default NULL,
  `demissao` date default NULL,
  PRIMARY KEY  (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Triggers `infousuario`
--
DROP TRIGGER `acessos`.`atribuir_id`;
DELIMITER //
CREATE TRIGGER `acessos`.`atribuir_id` AFTER INSERT ON `acessos`.`infousuario`
 FOR EACH ROW BEGIN
    insert into dados (id_dados) values (new.id_usuario);
    insert into grupos (id_grupos) values (new.id_usuario);
END
//
DELIMITER ;
DROP TRIGGER `acessos`.`bloquear`;
DELIMITER //
CREATE TRIGGER `acessos`.`bloquear` AFTER UPDATE ON `acessos`.`infousuario`
 FOR EACH ROW BEGIN
    if new.demissao > 0000-00-00 then
    UPDATE dados set bloqueado=1 where id_dados=new.id_usuario;
    end if;
END
//
DELIMITER ;

--
-- Dumping data for table `infousuario`
--

INSERT INTO `infousuario` (`id_usuario`, `nome`, `depfilial`, `cargo`, `admissao`, `demissao`) VALUES
(2, 'teste', 'teste', 'teste', '2015-10-30', '0000-00-00'),
(3, 'teste', 'teste', 'teste', '2015-10-30', '0000-00-00'),
(4, 'hue da ZN', 'zuueira', 'zueiro', '3000-04-01', '0000-00-00'),
(5, 'testet', 'sei la', 'hue', '2015-10-29', '0000-00-00'),
(6, 'block', 'block', 'block', '2015-09-29', '2015-10-14'),
(7, 'Eduardo da Silva Souza', 'TI - Matriz', 'Estagiario', '2015-04-01', '0000-00-00');
