DROP DATABASE IF EXISTS my_iotools;
CREATE DATABASE IF NOT EXISTS my_iotools DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;
USE my_iotools;

CREATE TABLE t_furgoni (
  ID 		          BIGINT				NOT NULL 	AUTO_INCREMENT,
  Furgone          VARCHAR(50) NOT NULL,
  Password         VARCHAR(50) NOT NULL,
  PRIMARY KEY(ID)
) ENGINE = InnoDB;

CREATE TABLE t_attrezzi (
  ID 		         BIGINT				NOT NULL 	AUTO_INCREMENT,
  Attrezzo            VARCHAR(150) NOT NULL,
  Speciale            BOOLEAN NOT NULL,
  PRIMARY KEY(ID)
) ENGINE = InnoDB;

CREATE TABLE t_amministratori (
  ID 		         BIGINT				NOT NULL 	AUTO_INCREMENT,
  Nome            VARCHAR(150) NOT NULL ,
  Cognome         VARCHAR(150) NOT NULL ,
  Email           VARCHAR(100) UNIQUE NOT NULL ,
  Password         VARCHAR(50) NOT NULL ,
  PRIMARY KEY(ID)
) ENGINE = InnoDB;

CREATE TABLE t_squadre (
  ID 		         BIGINT				NOT NULL 	AUTO_INCREMENT,
  Squadra            VARCHAR(150) NOT NULL,
  FK_Furgone          BIGINT NOT NULL,
  PRIMARY KEY(ID),
  FOREIGN KEY(FK_Furgone)    REFERENCES t_furgoni(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE t_lavoratore (
  ID 		         BIGINT				NOT NULL 	AUTO_INCREMENT,
  Nome               VARCHAR(150) NOT NULL ,
  Cognome            VARCHAR(150) NOT NULL ,
  Cellulare          VARCHAR(20) UNIQUE NOT NULL ,
  FK_Squadra          BIGINT,
  PRIMARY KEY(ID),
  FOREIGN KEY(FK_Squadra)    REFERENCES t_squadre(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE t_evento (
  ID 		         BIGINT				NOT NULL 	AUTO_INCREMENT,
  Latitudine         VARCHAR(150),
  Longitudine        VARCHAR(150),
  Tempo              TIMESTAMP, 
  FK_Furgone          BIGINT NOT NULL ,
  FK_Attrezzo          BIGINT NOT NULL ,

  PRIMARY KEY(ID),
  FOREIGN KEY(FK_Furgone)    REFERENCES t_furgoni(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY(FK_Attrezzo)    REFERENCES t_attrezzi(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;


INSERT INTO `my_iotools`.`t_amministratori` (`ID`, `Nome`, `Cognome`, `Email`, `Password`) 
VALUES (NULL, 'Giuseppe', 'Verdi', 'verdi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');