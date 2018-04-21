CREATE TABLE ft_table (
	id int PRIMARY KEY AUTO_INCREMENT,
	login VARCHAR(8) DEFAULT 'toto' NOT NULL,
	`group` enum("staff", "student", "other") NOT NULL,
	creation_date DATE NOT NULL
);
