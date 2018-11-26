

CREATE TABLE cursophp.jobs (
	id INT NOT NULL AUTO_INCREMENT,
	title TEXT NULL,
	description TEXT NULL,
	visible BOOL NULL,
	months INT NULL,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=latin1
COLLATE=latin1_swedish_ci;