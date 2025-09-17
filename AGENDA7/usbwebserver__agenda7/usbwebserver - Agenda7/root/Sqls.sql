CREATE SCHEMA `pwii` ;

CREATE TABLE `pwii`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `preco` FLOAT NOT NULL,
  `quantidade` INT NOT NULL,
  PRIMARY KEY (`idproduto`));

  CREATE TABLE `pwii`.`estado` (
  `idestado` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sigla` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`idestado`));

INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Acre','AC');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Alagoas','AL');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Amapá','AP');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Amazonas','AM');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Bahia','BA');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Ceará','CE');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Espírito Santo','ES');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Goiás','GO');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Maranhão','MA');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Mato Grosso','MT');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Mato Grosso do Sul','MS');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Minas Gerais','MG');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Pará','PA');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Paraíba','PB');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Paraná','PR');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Pernambuco','PE');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Piauí','PI');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Rio de Janeiro','RJ');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Rio Grande do Norte','RN');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Rio Grande do Sul','RS');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Rondônia','RO');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Roraima','RR');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Santa Catarina','SC');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('São Paulo','SP');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Sergipe','SE');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Tocantins','TO');
INSERT INTO `pwii`.`estado` (`nome`, `sigla`) VALUES ('Distrito Federal','DF');
