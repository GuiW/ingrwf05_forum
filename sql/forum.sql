CREATE TABLE `questions` (
  `id_questions` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(42),
  `mail` VARCHAR(42),
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_questions`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `reponses` (
  `id_reponses` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(42),
  `mail` VARCHAR(42),
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texte` VARCHAR(42),
  `id_questions` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_reponses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `reponses` ADD FOREIGN KEY (`id_questions`) REFERENCES `questions` (`id_questions`);