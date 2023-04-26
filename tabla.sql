CREATE TABLE players (
id int(11) NOT NULL auto_increment,
nombre varchar(32) NOT NULL,
apellido varchar(32) NOT NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO players VALUES(1, 'Cristian', 'Pérez');
INSERT INTO players VALUES(2, 'Pedro', 'Rodriguez');
INSERT INTO players VALUES(3, 'Raquel', 'Roberta');
INSERT INTO players VALUES(4, 'Samuel', 'Clavero');