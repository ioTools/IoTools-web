DROP DATABASE IF EXISTS my_iotools;
CREATE DATABASE IF NOT EXISTS my_iotools DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;
USE my_iotools;

CREATE TABLE t_furgoni (
  ID 		          BIGINT				NOT NULL 	AUTO_INCREMENT,
  Furgone          VARCHAR(50),
  Password         VARCHAR(50),
  PRIMARY KEY(ID)
) ENGINE = InnoDB;

CREATE TABLE t_attrezzi (
  ID 		         BIGINT				NOT NULL 	AUTO_INCREMENT,
  Attrezzo            VARCHAR(150),
  PRIMARY KEY(ID)
) ENGINE = InnoDB;

CREATE TABLE t_amministratori (
  ID 		         BIGINT				NOT NULL 	AUTO_INCREMENT,
  Nome            VARCHAR(150),
  Cognome         VARCHAR(150),
  Email           VARCHAR(100) UNIQUE,
  Password         VARCHAR(50),
  PRIMARY KEY(ID)
) ENGINE = InnoDB;

CREATE TABLE t_squadre (
  ID 		         BIGINT				NOT NULL 	AUTO_INCREMENT,
  Squadra            VARCHAR(150),
  FK_Furgone          BIGINT,
  PRIMARY KEY(ID),
  FOREIGN KEY(FK_Furgone)    REFERENCES t_furgoni(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE t_lavoratore (
  ID 		         BIGINT				NOT NULL 	AUTO_INCREMENT,
  Nome               VARCHAR(150),
  Cognome            VARCHAR(150),
  Cellulare          VARCHAR(20),
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
  Tempo              DATETIME, 
  FK_Furgone          BIGINT,
  FK_Attrezzo          BIGINT,

  PRIMARY KEY(ID),
  FOREIGN KEY(FK_Furgone)    REFERENCES t_furgoni(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY(FK_Attrezzo)    REFERENCES t_attrezzi(ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;