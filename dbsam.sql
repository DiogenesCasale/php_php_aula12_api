-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/11/2024 às 01:32
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbsam`
--
CREATE DATABASE IF NOT EXISTS `dbsam` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbsam`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `administracoes`
--

DROP TABLE IF EXISTS `administracoes`;
CREATE TABLE `administracoes` (
  `id` int(11) NOT NULL,
  `receita_id` int(11) DEFAULT NULL,
  `data_registro` datetime DEFAULT NULL,
  `enfermeiro_id` int(11) DEFAULT NULL,
  `data_hora_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administracoes`
--

INSERT INTO `administracoes` (`id`, `receita_id`, `data_registro`, `enfermeiro_id`, `data_hora_registro`) VALUES
(1, 1, '2024-10-30 08:30:00', NULL, NULL),
(2, 2, '2024-10-30 09:30:00', NULL, NULL),
(3, 3, '2024-10-30 10:30:00', NULL, NULL),
(4, 4, '2024-10-30 11:30:00', NULL, NULL),
(5, 5, '2024-10-30 12:30:00', NULL, NULL),
(6, 7, NULL, 1, '2024-11-05 20:13:38'),
(7, 7, NULL, 1, '2024-11-05 20:13:44'),
(8, 10, NULL, 6, '2024-11-05 20:26:33'),
(9, 8, NULL, 6, '2024-11-05 20:28:12'),
(10, 9, '2024-11-05 21:07:00', 6, '2024-11-05 21:13:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enfermeiros`
--

DROP TABLE IF EXISTS `enfermeiros`;
CREATE TABLE `enfermeiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `coren` varchar(20) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enfermeiros`
--

INSERT INTO `enfermeiros` (`id`, `nome`, `coren`, `usuario`, `senha`) VALUES
(1, 'Fernanda Lima', 'COREN12345', 'fernanda', 'senha123'),
(2, 'Carlos Santos', 'COREN54321', 'carlos', 'senha123'),
(3, 'Juliana Pereira', 'COREN67890', 'juliana', 'senha123'),
(4, 'Roberto Ferreira', 'COREN09876', 'roberto', 'senha123'),
(5, 'Patrícia Rocha', 'COREN13579', 'patricia', 'senha123'),
(6, 'João Cunha', 'COREN54321', 'jcunha', 'senha123'),
(7, 'Mauro Careca', 'COREN13514', 'carequinha', 'senha321'),
(8, 'Mauro Careca', 'COREN13514', 'carequinha', 'senha321');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `crm` varchar(20) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `especialidade`, `crm`, `usuario`, `senha`) VALUES
(1, 'Dr. João Silva', 'Cardiologia', 'CRM12345', 'joao', 'senha123'),
(2, 'Dra. Maria Souza', 'Pediatria', 'CRM54321', 'maria', 'senha123'),
(3, 'Dr. Pedro Oliveira', 'Neurologia', 'CRM67890', 'pedro', 'senha123'),
(4, 'Dra. Ana Costa', 'Ginecologia', 'CRM09876', 'ana', 'senha123'),
(5, 'Dr. Lucas Almeida', 'Ortopedia', 'CRM13579', 'lucas', 'senha123'),
(6, 'Dr. Gustavo', 'Urologista', 'CRM54311', 'gusta', 'senha123'),
(7, 'Dr. Gustavo', 'Urologista', 'CRM54311', 'gusta', 'senha123'),
(8, 'Dr. Gustavo', 'Urologista', 'CRM54311', 'gusta', 'senha123'),
(9, 'Dr. Gustavo', 'Urologista', 'CRM54311', 'gusta', 'senha123'),
(10, 'Dr. Mauro', 'Neurologista', 'CRM54315', 'mauro', 'senha123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `leito` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `leito`) VALUES
(1, 'Lucas Martins', 'Leito 1'),
(2, 'Ana Beatriz', 'Leito 2'),
(3, 'Carlos Eduardo', 'Leito 3'),
(4, 'Mariana Silva', 'Leito 4'),
(5, 'Felipe Santos', 'Leito 5'),
(6, 'João Cagamuro', 'Leito 7');

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `medicamento` varchar(100) DEFAULT NULL,
  `data_administracao` date DEFAULT NULL,
  `hora_administracao` time DEFAULT NULL,
  `dose` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id`, `paciente_id`, `medicamento`, `data_administracao`, `hora_administracao`, `dose`) VALUES
(1, 1, 'Paracetamol', '2024-10-30', '08:00:00', '500mg'),
(2, 2, 'Amoxicilina', '2024-10-30', '09:00:00', '250mg'),
(3, 3, 'Ibuprofeno', '2024-10-30', '10:00:00', '400mg'),
(4, 4, 'Cetoprofeno', '2024-10-30', '11:00:00', '100mg'),
(5, 5, 'Dipirona', '2024-10-30', '12:00:00', '1g'),
(6, NULL, 'dipirona', '2024-10-29', '21:23:00', '25ml'),
(7, 6, 'dorflex', '2024-10-29', '21:27:00', '225ml'),
(8, 6, 'dorflex', '2024-11-05', '20:10:00', '225ml'),
(9, 6, 'dorflex', '2024-11-05', '20:10:00', '225ml'),
(10, 6, 'dipirona', '2024-11-05', '20:19:00', '25ml'),
(11, 6, 'dorflex', '2024-11-05', '21:29:00', '252525ml');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administracoes`
--
ALTER TABLE `administracoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receita_id` (`receita_id`),
  ADD KEY `fk_enfermeiro_id` (`enfermeiro_id`);

--
-- Índices de tabela `enfermeiros`
--
ALTER TABLE `enfermeiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administracoes`
--
ALTER TABLE `administracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `enfermeiros`
--
ALTER TABLE `enfermeiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `administracoes`
--
ALTER TABLE `administracoes`
  ADD CONSTRAINT `administracoes_ibfk_1` FOREIGN KEY (`receita_id`) REFERENCES `receitas` (`id`),
  ADD CONSTRAINT `fk_enfermeiro_id` FOREIGN KEY (`enfermeiro_id`) REFERENCES `enfermeiros` (`id`);

--
-- Restrições para tabelas `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `receitas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
