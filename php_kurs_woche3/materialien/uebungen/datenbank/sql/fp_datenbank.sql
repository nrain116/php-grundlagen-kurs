-- Notiz‑Manager DB – Schema & Seed
-- Charset & Collation je nach Server ggf. anpassen
CREATE DATABASE IF NOT EXISTS hardware
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;
USE hardware;

DROP TABLE IF EXISTS fp;

CREATE TABLE fp (
  artnummer VARCHAR(15)  PRIMARY KEY,
  hersteller VARCHAR(255) NULL,
  typ VARCHAR(255) NULL,
  gb INT NULL,
  preis DOUBLE NULL,
  prod DATE NULL
) ENGINE=InnoDB;
