<?php

	require_once("consola/consola.php");
	
	class instalador extends consola{

		public function arrancar(){

			parent::arrancar();

			$this->instalar();

			
			return "ok";
		}

		public function instalar(){

			$arraySQL = array();
// CREAR BASE DE DATOS
			$arraySQL[] = "CREATE DATABASE baselucas;)";

			$arraySQL[] = "
					SET FOREIGN_KEY_CHECKS=0;
					DROP TABLE deportistas;
					DROP TABLE usuarios;
					DROP TABLE noticias;
					DROP TABLE administradores;
					SET FOREIGN_KEY_CHECKS=0;
			";
			
// CREAR TABLA USUARIOS
			$arraySQL[] = "CREATE TABLE `usuarios` (
				`id` int(5) NOT NULL AUTO_INCREMENT,
				`nombre` varchar(50) DEFAULT NULL,
				`apellido` varchar(50) DEFAULT NULL,
				`email` text,
				`clave` varchar(100) DEFAULT NULL,
				`estado` tinyint(1) DEFAULT NULL,
				PRIMARY KEY (`id`)
			  	)";

// CREAR TABLA DEPORTISTAS


			$arraySQL[] = "CREATE TABLE `deportistas` (
			  `nombre` varchar(50) DEFAULT NULL,
			  `apellido` varchar(50) DEFAULT NULL,
			  `fechaNacimiento` date DEFAULT NULL,
			  `genero` enum('Masculino','Femenino','Otros') DEFAULT NULL,
			  `pais` char(3) DEFAULT NULL,
			  `posicion` varchar(30) DEFAULT NULL,
			  `numero` tinyint(100) NOT NULL,
			  `estado` tinyint(1) DEFAULT NULL,
			  `imagen` char(36) DEFAULT NULL,
			  PRIMARY KEY (`numero`))";

// CREAR TABLA NOTICIAS

			$arraySQL[] = "CREATE TABLE `noticias` (
				`id` int(3) NOT NULL AUTO_INCREMENT,
				`categoria` enum('Resultados','Jugadores','Internacional','Mercado','Sociales') DEFAULT NULL,
				`titulo` varchar(100) DEFAULT NULL,
				`noticia` mediumtext,
				`estado` tinyint(1) DEFAULT NULL,
				`imagen` char(36) DEFAULT NULL,
				`fechapublicacion` date DEFAULT NULL,
				PRIMARY KEY (`id`)) ";

// CREAR TABLA ADMINISTRADORES

			$arraySQL[] = "CREATE TABLE `administradores` (
				`id` int(5) NOT NULL AUTO_INCREMENT,
				`nombre` varchar(50) DEFAULT NULL,
				`mail` text,
				`clave` varchar(100) DEFAULT NULL,
				`estado` tinyint(1) DEFAULT NULL,
				PRIMARY KEY (`id`))";

// INSERT DEPORTISTAS
			$arraySQL[] = "INSERT INTO baselucas.deportistas (nombre,apellido,fechaNacimiento,genero,pais,posicion,numero,estado,imagen) VALUES
			('Sergio','Rochet','1993-03-23','Masculino','URU','Golero',1,1,'6312baf5cf76f.png'),
			('Mathi­as','Laborda','1999-09-15','Masculino','URU','Defensa',2,1,'630fe6a5c66e8.jpg'),
			('Leo','Coelho','1993-05-17','Masculino','BRA','Defensa',3,1,'63124ac03503c.jpg'),
			('Mario','Risso','1988-01-31','Masculino','URU','Defensa',4,1,'63124bc7aa162.jpg'),
			('Yonatan ','Rodri­guez','1993-07-01','Masculino','URU','Mediocampista',5,1,'63128e2329df9.jpg'),
			('Camilo','Candido','1995-06-02','Masculino','URU','Defensa',6,1,'63124c03e9ea1.jpg'),
			('Emanuel ','Gigliotti','1987-05-20','Masculino','ARG','Delantero',8,1,'6312a19aca098.jpg'),
			('Luis','Suarez','1987-01-24','Masculino','URU','Delantero',9,1,'631242a832ee8.jpg'),
			('Franco','Fagundez','2000-07-19','Masculino','URU','Delantero',10,1,'6312a1a3d978d.jpg'),
			('Ignacio','Rami­rez','1997-02-01','Masculino','URU','Delantero',11,1,'6312a1ab8f74f.jpg');
			('Marti­n','Rodri­guez','1989-09-20','Masculino','URU','Golero',12,1,'631242ccf250a.jpg'),
			('Christian','Almeida','1989-12-25','Masculino','URU','Defensa',13,1,'63124d34b83c3.jpg'),
			('Joaquin ','Trasante','1999-03-14','Masculino','URU','Mediocampista',14,1,'63128e461e672.jpg'),
			('Diego','Rodri­guez','1989-09-04','Masculino','URU','Mediocampista',15,1,'631295ee48af5.jpg'),
			('Leandro','Lozano','1998-12-19','Masculino','URU','Defensa',16,1,'63128be6be7e5.jpg'),
			('Francisco','Ginella','1999-01-21','Masculino','URU','Mediocampista',17,1,'631296694a5f3.jpg'),
			('Alfonso','Trezza','1999-06-22','Masculino','URU','Delantero',19,1,'6312a1bad073c.jpg'),
			('Felipe','Carballo','1996-10-04','Masculino','URU','Mediocampista',20,1,'630fe8da25deb.jpg'),
			('Renzo','Sanchez','2004-02-17','Masculino','URU','Mediocampista',21,1,'631296bed8598.jpg'),
			('Diego','Zabala','1991-09-19','Masculino','URU','Mediocampista',22,1,'63129ef359680.jpg');
			('Alex','Castro','1994-03-08','Masculino','COL','Delantero',23,1,'6312a1ec2077d.jpg'),
			('Manuel','Monzeglio','2001-09-25','Masculino','URU','Mediocampista',24,1,'63129f285947a.jpg'),
			('Ignacio','Suarez','2002-02-05','Masculino','URU','Golero',25,1,'6312426729148.jpg'),
			('Santiago','Ramirez','2001-09-03','Masculino','URU','Delantero',27,1,'6312a1f6c4ac5.jpg'),
			('Juan','Gutierrez','2002-02-04','Masculino','URU','Delantero',28,1,'6312a208149b2.jpg'),
			('Juan','Izquierdo','1997-07-04','Masculino','URU','Defensa',30,1,'63128c1fb8069.jpg'),
			('Mathi­as','Bernatene','2000-07-24','Masculino','URU','Golero',40,1,'6312436181c5f.jpg'),
			('Jose','Rodri­guez','1997-03-14','Masculino','URU','Defensa',44,1,'63128c461016f.jpg');)";


			
			
// INSERT NOTICIAS
			$arraySQL[] = "INSERT INTO baselucas.noticias (categoria,titulo,noticia,estado,imagen,fechapublicacion) VALUES
			('Mercado','¡Se concretó la llegada de Luis Suárez a Nacional!','El máximo goleador en la historia del fútbol uruguayo retornó a casa, a Nacional, y lo hizo en plena vigencia, cumpliendo su sueño personal y el de millones de Bolsos que convirtieron el hashtag #SuarezANacional en una realidad: #SuárezEnNacional Nadie fue indiferente a la llegada del ídolo. A media mañana, cuando aterrizó el avión privado en que llegó junto a su familia desde Barcelona, ya había gente en el camino marcada y anunciado para la caravana de recibimiento. Horas antes, proyecciones de #SuárezEnNacional se vieron en emblemáticos edificios de Montevideo y veleros transitaban por la costa de la capital con banderas enormes de Nacional y leyendas de bienvenida a Luis Suárez. El resto es historia viva: de todos los rincones del país llegaron hinchas para sumarse a la bienvenida, colmaron el Gran Parque Central que recibió a 22 mil personas solamente para ver un jugador entrar a la cancha y ponerse la camiseta. Eso sí, era Luis Suárez... Con el plantel en la cancha y tras un encuentro que mantuvieron en privado en el vestuario, ahora Nacional se prepara para lo mas lindo: competir y en todos los frentes como lo reafirmó el propio Lucho. Vamos a dar pelea en el Clausura, la Copa Uruguaya, el Uruguayo y la Sudamericana. ¡Viva siempre el Club Gigante!',1,'63193bfcd9baf.jpg','2022-08-01'),
			('Mercado','Un hasta luego a Nico Marichal','El campeón uruguayo 2020 seguirá su carrera en el Dínamo de Moscú Se confirmó la transferencia de Nicolás Marichal al Dínamo de Moscú de Rusia. La operación alcanza los 5.000.000 USD por el 75% de los derechos económicos del jugador. La transferencia es por 4.200.000 USD + 800.000 USD en bonos. Nacional mantiene en su poder el 25% de la ficha del jugador. El Dinamo Moscú recuerda el origen de Marichal “en el pequeño asentamiento uruguayo de Sarandí del Yí, con una población de solo 7000 habitantes”, donde “jugó en el Nacional local hasta los 17 años”. Luego recuerda que fue “advertido por un ojeador del Nacional capitalino”, a quien le “llamó la atención no solo la velocidad del futbolista, sino también su habilidad para manejar el balón y su excelente juego de uno contra uno”.. ',1,'63193bc9348f5.jpg','2022-08-30'),
			('Jugadores','Valla invicta y record historico de nuestro golero','Sergio Rochet se convirtió en el golero uruguayo con más minutos con la valla invicta sumando 994 minutos entre partidos oficiales por el Campeonato Uruguayo, Copa Libertadores, Sudamericana y amistosos de Selección Nacional Uruguaya Sergio Chino Rochet llegó a Nacional el 21 de junio de 2019, hace ya 3 años. Sin mucho ruido y con un perfil bajo, el Chino se fue metiendo en el plantel tricolor. Su debut se dio en la copa Gigantes de América el 4 de julio de ese mismo año, donde Nacional empato 1-1 con América de Cali, luego el partido se liquidó por penales 4-3 a favor del Decano. El debut oficial por Campeonato Uruguayo se dio el 21 de julio de 2019 frente a Danubio, donde Rochet ingresó en el minuto 46 sustituyendo a Luis Mejía. La historia desde ese año a hoy fue sumando minutos, torneos y atajadas. Al día de hoy, Sergio Rochet acumula 994 minutos con la valla invicta, sumando competencias a nivel local e internacional con Nacional y la selección uruguaya. Los equipos a los que enfrento y les puso el candado hasta hoy son: Fénix, Defensor, Albión, Bragantino, Cerrito, River Plate, Defensor Sporting, Danubio y Unión, esto con Nacional y defendiendo la celeste se suman México y los primeros 45 minutos frente a Panamá. Llego de Holanda en silencio, hoy es el capitán rompiendo todos los récords. Tras esta marca histórica e inédita en el fútbol uruguayo, Rochet va por el anhelado RÉCORD de minutos invicto en el Campeonato Uruguayo para el que le faltan 188 minutos por jugar sin recibir goles.',1,'63168f3e1d128.jpg','2022-06-30'),
			('Resultados','Otro clasico para el Bolso!','Nacional revalidó su buen momento en el Campeonato Uruguayo al vencer este domingo a su clásico rival, Peñarol, en la cuarta jornada del Torneo Clausura 2022, en un duelo disputado en el estadio Gran Parque Central y donde Luis Suárez volvió a ser una de las figuras del ‘Bolso’ gracias al golazo que marcó en el segundo tiempo.Mientras Laborda abrió el marcador a los 45 de cabeza tras un tiro de esquina. Para el complemento, el equipo dirigido por Pablo Repetto saltó al campo con hambre de más y el ‘Pistolero’ puso el 2-0 a los 53′ con un disparo de zurda desde afuera del área que se metió en el ángulo del arco aurinegro. Su gol, el tercero para Nacional desde que regresó al campeonato uruguayo a principios de agosto, fue el más esperado por la hinchada y muy festejado tanto por el ‘Pistolero’ como por su familia, que lo acompañó emocionada desde el palco tricolor. El descuento para Peñarol llegó a los 61 por parte de Kevin Méndez. Y si bien parecía que los ‘aurinegros’ podían complicarle las cosas al líder, al minuto 75′ Camilo Cándido alargó la diferencia. En el choque más esperado de la liga local, Nacional era gran favorito por sus últimas actuaciones y su posición en la tabla del campeonato, además del ingrediente Suárez, mientras que el ‘Manya’ no logra superar su discreto nivel mostrado en la temporada.',1,'631a8abb08a5e.jpg','2022-09-04'),
			('Resultados','Goleada a Torque en el centenario.','Con goles de Luis Suárez, Franco Fagúndez y Emmanuel Gigliotti, Nacional le ganó 3-0 a Montevideo City Torque este sábado por la quinta fecha del torneo Clausura del fútbol uruguayo, encadenando así su cuarta victoria consecutiva. En su primer partido jugado en el mítico Estadio Centenario desde que regresó a la liga charrúa, Suárez habilitó a Fagúndez para que a los 8 minutos marcara un estupendo tanto de media distancia. Luego, tras una gran jugada también con Fagúndez, el 'Pistolero' pateó de volea a los 27 para poner el 2-0 parcial. El artillero estuvo cerca de alargar la diferencia a los 50 minutos con un nuevo tanto que el VAR anuló por posición adelantada. Siete minutos después, el entrenador Pablo Repetto decidió el ingreso del argentino Gigliotti en su lugar, posiblemente pensando en la próxima fecha ante el archirrival Peñarol. Gigliotti cerró el choque con un tanto de cabeza a los 89, para el definitivo 3-0, en una diferencia que quedó corta ya que Nacional totalizó tres goles anulados por el videoarbitraje.',1,'631933e40e5bf.jpg','2022-08-27'),
			('Resultados','Resultado justo para un partido complicado','Nacional venció 1-0 a Liverpool en el cierre de la tercera fecha del Torneo Clausura. El encuentro se disputó en el Estadio Belvedere y el tricolor se impuso con un tanto de cabeza de Franco Fagúndez tras asistencia de José Luis Rodríguez. Con este resultado, el elenco de Pablo Repetto llegó a 53 puntos en la Tabla Anual y le sacó seis al negriazul, que se aleja en la pelea por la tabla acumulada. A su vez, el albo llegó a seis puntos en el Clausura y quedó a tres unidades del líder River, que tiene puntaje perfecto luego de las primeras tres jornadas. La otra buena noticia para el albo es que Luis Suárez, su máxima figura, disputó los 90 minutos por primera vez desde su retorno al club.',1,'631696ba591de.jpg','2022-08-14'),
			('Mercado','Otormin para Defensa y Justicia','El jugador Leandro Otormin será cedido a préstamo al Club Social y Deportivo Defensa y Justicia de Argentina hasta el 30 de junio de 2023. La cesión fue acordada con una opción de compra para Defensa y Justicia de usd 700 mil, aplicable únicamente durante la vigencia del préstamo. El salario del jugador lo pagará íntegramente Defensa y Justicia y el Club Nacional de Football es poseedor del 25% de los derechos económicos del jugador. ',1,'63193c4806d08.jpg','2022-08-11'),
			('Jugadores','El primer gol del Pistolero en su vuelta a Nacional!','Volvió Luis Suárez. A Nacional y al gol. Si, este viernes, el Bolso recibió a Rentistas en el Gran Parque Central por la fecha 2 del Torneo Clausura de la Liga uruguaya y el Pistolero, que mostró su inmensa capacidad goleadora, marcó uno de los tres goles que hizo el dueño de casa. El Tricolor uruguayo ganaba por dos goles a cero gracias a los tantos de Alex Castro a los cuatro minutos y de Ignacio Ramírez a los 42, cuando la primera mitad agonizaba. Sin embargo, con el local en cómoda ventaja todos estaban esperando que Lucho Suárez salte al campo de juego y Pablo Repetto complació a los miles de hinchas del Bolso que se hicieron presentes esa noche en el mítico recinto. Suárez entró al campo de juego disputar los últimos 45 minutos en lugar de Franco Fagundez y, en tan sólo 13 minutos, hizo su estreno goleador con el equipo de sus amores. A los 59 minutos, Brian Ocampo ejecutó un preciso córner del sector izquierdo al primer palo, el Pistolero primereó a su marcador y con la jerarquía que lo caracteriza impactó la pelota con un gran testazo, que dejó al arquero sin opciones de respuesta. El estadio deliró ante el tanto de su goleador, que ya está de vuelta en casa.',1,'63193df24edc7.jpg','2022-08-05'),
			('Internacional','Nacional vs Goianiense por la Sudamericana','Nacional enfrentará este martes a las 19:15 horas al Atlético Goianiense por la ida de los Cuartos de Final de la Copa Sudamericana con el GPC totalmente lleno. El Decano buscará este martes sacar un resultado positivo ante el Dragao luego de un fin de semana repleto de emociones, con un domingo sensacional en el Primer Estadio de las Copas del Mundo donde la familia Tricolor se juntó en gran número para darle una cálida bienvenida a Luis Suárez al club de sus amores.',1,'63193f0e5d3c1.png','2022-08-01'),
			('Internacional','Todavi­a hay chances!','Nacional visita este martes a las 19:15 horas al Atlético Goianiense en busca de una remontada que le de la clasificación. Si bien el Decano no pudo mostrar su mejor cara en el partido de ida, el Dragao hizo pocos méritos para llevarse la victoria en el Gran Parque Central, jugando con un estilo similar al característico del fútbol uruguayo: una defensa férrea y aprovechar al máximo las chances que puedas generar. Teniendo esto en cuenta, Nacional tiene con qué pelearle de igual a igual y conseguir dar vuelta el 0-1, y si de algo sabe el Tricolor en su historia es de remontadas, este año lo logró en Argentina por las Copas Libertadores y Sudamericana, ganándole a Velez Sársfield y Unión por 2 tantos contra 1, así como también por Campeonato Uruguayo frente a Plaza Colonia. Mientras el club gigante llega a esta revancha tras una cómoda victoria 3 a 0 ante Rentistas, por el Brasileirao Goianiense derrotó a Red Bull Bragantino por 2 a 1, donde el técnico Jorginho paró una alineación titular respecto a quienes disputaron el partido de ida en el Primer Estadio de las Copas del Mundo.',1,'63193f78e744c.jpg','2022-08-08');
			('Internacional','El Decano afuera de la copa','Nacional quedó eliminado en los cuartos de final de la Copa Sudamericana al caer por 3-0 en el Serra Dourada con Atlético Goianiense (serie 4-0), en un partido donde no estuvo a la altura y fue ampliamente superado.',1,'631940aa3e314.jpg','2022-08-09'),
			('Sociales','A correr! La 6k del Bolso','El Club Gigante sigue festejando sus 123 años y finalmente, la 7ma edición de la 6K, se realizará el domingo 4 de septiembre a las 9:30hs. El punto de partida será el Gran Parque Central (por General Urquiza). El recorrido será por 8 de Octubre, 18 de Julio hasta Arenal Grande ida y vuelta. Para participar es obligación pre aprobar el deslinde de responsabilidades por parte de menores y mayores de edad. Menores de 15 años deben participar acompañados de un adulto responsable. ¡Prepárate para vivir una experiencia tricolor gigante!',1,'631a83bae7ff9.jpg','2022-08-16'),
			('Sociales','Fiscali­a archiva la causa que investigaba denuncia contra jugadores de Nacional','El fiscal de Delitos Sexuales de Octavo Turno, Maximiliano Sosa, que investigaba la denuncia de un caso de una menor embarazada en encuentros con jugadores del plantel principal del Club Nacional de Football y de otras instituciones deportivas, finalmente definió archivar la causa, según informaron fuentes de la Fiscalía General de la Nación a Montevideo Portal. Básicamente, el argumento que dio Sosa para archivar la causa fue que en los hechos denunciados “no se constituía un delito”. En concreto, desde el punto de vista penal, no se investigará más, aunque la víctima o la familia podrían solicitar que se reexaminara la causa.',1,'631a85ebb3593.jpg','2022-09-06'),
			('Sociales','Dia del niño tricolor','El próximo domingo 28 de agosto, de 12 a 16 hrs., festejamos una nueva edición del Día del Niño Tricolor en el Gran Parque Central. Los bonos se podrán adquirir en nacional.uy o a través de los locales Redpagos. Importante: No habrá boletería en la puerta del evento y solo se podrá ingresar con bono (tanto niños como adultos). PRECIOS: Niños y adultos socios - $100 Generales - $200 El ingreso será a partir de las 12:00 por la Tribuna Abdón Porte (Gral. Urquiza - Portón 2). Todos los niños (de 0 a 14 años) se llevarán una camiseta Umbro conmemorativa del evento de regalo que será entregada ese mismo día con el documento de identidad a los niños que estén presentes en el evento.* *Los talles de camisetas quedarán sujetos a disponibilidad. No te pierdas de un día repleto de diversión con inflables, música, juegos, plaza de comidas, regalos y muchas sorpresas. ¡Los esperamos para compartir un día de diversión GIGANTE!',1,'631a83bae7ff9.jpg','2022-08-16'),
			('Jugadores','Carbadios hace falta en la seleccion','Felipe Carballo, el mediocampista que viene rompiendola hace tiempo en el tricolor y no para de destacar, su manera de jugar y liderar al equipo son destacantes de su excelente forma de jugar,la gente se ha movilizado en las redes sociales con furor pidiendolo hacia la celeste, creo que estamos todos pendientes y esperando el llamado del Tornado. Hasta el propio Jose Fuentes se refirio a Carballo en una nota.',1,'631a88b16571c.jpg','2022-09-08');
			)";
		   

		   
// INSERT USUARIOS
			$arraySQL[] = "INSERT INTO baselucas.usuarios (nombre,apellido,email,clave,estado) VALUES
			('Prueba','Probando','prueba@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',1),
			('Curso','PHP','cursophp@hotmail.com','218140990315bb39d948a523d61549b4',1);
	   		)";


// INSERT ADMINISTRADORES
			$arraySQL[] = "INSERT INTO baselucas.administradores (nombre,mail,clave,estado) VALUES
			('admin','mail@mail.com','fbc71ce36cc20790f2eeed2197898e71',1),
			('php1234','mail@mail.com','30f55b2d2628f2bb72beb0c52550af9f',1),
			('curso','mail@mail.com','1042013feadea5404c396dc5b7eb62ed',1);
			)";

			foreach($arraySQL as $sql){

				print_r($sql);
				$this->ejecutarConsulta($sql);	

			}
		}

	}






?>