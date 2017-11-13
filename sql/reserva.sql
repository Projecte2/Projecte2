/*CREACIÓ I UTILITZACIÓ DE LA BASE DE DADES*/

CREATE DATABASE `bd_reserva`;

USE `bd_reserva`;

/*CREACIÓ DE LA TAULA USUARI*/

CREATE TABLE `usuari` (
  `usu_id` int(4) NOT NULL AUTO_INCREMENT,
  `usu_nom` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usu_contrasenya` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  CONSTRAINT pk_usuari PRIMARY KEY(`usu_id`),
  `usu_cognoms` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_email` varchar(40) DEFAULT NULL,
  `usu_telefon` numeric(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*CREACIÓ DE LA TAULA RECURS*/
CREATE TABLE `recurs` (
  `rec_id` int(4) NOT NULL AUTO_INCREMENT,
  CONSTRAINT pk_recurs PRIMARY KEY(`rec_id`),
  `rec_nom` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rec_tipus` ENUM('Aula','Despatx','Sala','Objecte','Mobil','Portatil') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rec_inici` 	DATETIME NULL,
  `rec_alliberacio` DATETIME NULL,
  `rec_contador` NUMERIC (10,0) NOT NULL,
  `rec_estat`     BOOLEAN NOT NULL,
  `rec_imatge`    TINYTEXT NULL,
  `rec_descripcio`    TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*CREACIÓ DE LA TAULA RESERVA*/

CREATE TABLE `reserva` (
	`res_id` int(4) NOT NULL AUTO_INCREMENT,
	CONSTRAINT pk_reserva PRIMARY KEY (`res_id`),
	`rec_id` int(4) NOT NULL,
	`usu_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



/*RELACIONS BBDD*/

ALTER TABLE `reserva`
ADD CONSTRAINT `FK_usuari_reserva` FOREIGN KEY(`usu_id`) REFERENCES `usuari`(`usu_id`);

ALTER TABLE `reserva`
ADD CONSTRAINT `FK_recurs_reserva` FOREIGN KEY(`rec_id`) REFERENCES `recurs`(`rec_id`);


/*REGISTRES*/

/*USUARIS*/
INSERT INTO `usuari` (`usu_nom`, `usu_contrasenya`, `usu_cognoms`, `usu_email`, `usu_telefon`) VALUES ('SI_ADMIN', 'Admon357', '357', 'admon.intranet@gmail.com', '933376542'),
 ('Sebastian', 'Comunism2017', 'Matveyev', 'SebastianMatveyev@gmail.com', '434531085'), ('Fabiano', 'PizzaTime2017', 'Calabrese', 'FabianoCalabrese@gmail.com', '435531085'),
('Fabiano', 'PizzaTime2017', 'Calabrese', 'FabianoCalabrese@gmail.com', '433531085'),
('David', 'DavidCurtis2017', 'Curtis', 'DavidCurtis@gmail.com', '436531085'),
('Alex', 'England2017', ' Bradley', 'AlexBradley@gmail.com', '437531085');

/*RECURSOS*/

INSERT INTO `recurs` (`rec_nom`, `rec_tipus`, `rec_inici`, `rec_alliberacio`, `rec_contador`, `rec_estat`,`rec_imatge`) VALUES
('Xiaomi Redmi Note 4', 'Mobil', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', '1','http://technave.com/data/files/mall/article/201701190951104840.png'),
('Samsung Galaxy Note 7', 'Mobil', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', '1','https://www.androidperfect.net/wp-content/uploads/2016/08/01_Galaxy-Note7_black.png'),
('Carro de portàtils', 'Objecte', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', '1','http://www.um.es/atica/images/eva/carro_portatil_09.jpg'),
('Macbook Pro', 'Portatil', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', '1','https://photos2.insidercdn.com/mbp13-090608-1.png'),
('ASUS F541UV-GQ1078T', 'Portatil', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', '1','https://www.worten.es/i/dac1672a52c30de8762c6792213381ef8bfade37.jpg'),
('Aula de Tutoria 1', 'Aula', '2017-11-09 09:00:00', '2017-11-10 12:00:00', '0', 1,'https://www.uv.es/recursos/fatwirepub/ccurl/407/686/aula%20este%201.jpg'),
( 'Aula de Tutoria 2', 'Aula', '2017-11-09 09:00:00', '2017-11-10 12:00:00', '0', 1,'https://www.uv.es/recursos/fatwirepub/ccurl/789/662/IMG_LO(FILEminimizer).JPG'),
('Aula de Tutoria 3(Sense projector)', 'Aula', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', 1,'https://fcce.us.es/sites/default/files/galeria/Aula%20de%20mobiliario%20fijo%20de%2056%20plazas.jpg'),
('Aula Informatica', 'Aula', '2017-11-07 14:00:00', '2017-11-09 16:00:00', '0', 1,'http://www.nazaret.eus/images/otros-servicios/alquiler-de-aulas/aula-informatica-digitalg.jpg'),
( 'Aula Informatica 2', 'Aula', '2017-11-06 13:00:00', '2017-11-08 17:00:00', '0', 1,'http://formacion.diputacionalicante.es/media/dinamicas/aulas/296/1.jpg'),
('Despatx Entrevista 1', 'Despatx', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', 1,'http://www.moblespujol.com/imatges/imatges_clients/moblespujol/Arasanz%20despatxos%208.jpg'),
('Despatx Entrevista 2', 'Despatx', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', 1,'http://www.viversgi.cat/viver-empreses-forallac/files/despatx08.jpg'),
('Sala de Reunions', 'Sala', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', 1,'https://www.centros-sbc.com/img/salas-reuniones-barcelona-formato-reunion2.jpg'),
( 'Projector portatil', 'Objecte', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', 1,'https://d243u7pon29hni.cloudfront.net/images/products/ppx4010_proyector_portatil_pequeno_hd_01_l.png'),
('LENOVO Ideapad 110-15ACL', 'Portatil', '2017-11-06 13:00:00', '2017-11-08 12:00:00', '0', '1','https://media.flixcar.com/f360cdn/Lenovo-1336106724-lenovo-laptop-ideapad-110-15-display-graphics-2.png');
