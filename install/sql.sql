-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.36-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para golaw
CREATE DATABASE IF NOT EXISTS `golaw` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `golaw`;

-- Copiando estrutura para tabela golaw.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dataCadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tipoPagamento` enum('cartão de credito','boleto','transferencia') DEFAULT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela golaw.clientes: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nome`, `email`, `dataCadastro`, `tipoPagamento`, `ativo`) VALUES
	(1, 'joao silva', 'joao@yahoo.com', '2017-11-27 20:42:15', 'cartão de credito', b'1'),
	(2, 'joao silva', 'joao@gmail.com', '2017-11-27 20:53:06', 'boleto', b'1'),
	(3, 'joao', 'joao@gmail.com', '2017-11-27 21:07:10', 'cartão de credito', b'1'),
	(4, 'joao santana', 'joao@gmail.com', '2017-11-27 21:09:20', 'cartão de credito', b'1'),
	(5, 'joao', 'joao@gmail.com', '2017-11-27 21:09:54', 'boleto', b'1');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela golaw.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela golaw.pedidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Copiando estrutura para tabela golaw.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela golaw.produtos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nome`, `valor`, `descricao`, `foto`, `dataCadastro`, `ativo`) VALUES
	(21, 'Bonequinho do Bills', 50.00, 'Um belissimo Deus da destruição!', '2017.11.28-16.57.57.png', '2017-11-28 16:57:57', b'1'),
	(22, 'Raito', 100.00, 'O proximo rei dos shinigames!', '2017.11.28-18.11.03.jpeg', '2017-11-28 18:11:03', b'1'),
	(23, 'Freeza', 1000.00, 'O melhor dos vilões!', '2017.11.28-18.12.22.jpg', '2017-11-28 18:12:22', b'1');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
