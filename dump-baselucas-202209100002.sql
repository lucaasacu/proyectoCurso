-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: baselucas
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administradores`
--

DROP TABLE IF EXISTS `administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administradores` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `mail` text,
  `clave` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administradores`
--

LOCK TABLES `administradores` WRITE;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` VALUES (1,'admin','mail@mail.com','fbc71ce36cc20790f2eeed2197898e71',1),(5,'php1234','mail@mail.com','30f55b2d2628f2bb72beb0c52550af9f',1),(6,'curso','mail@mail.com','1042013feadea5404c396dc5b7eb62ed',1);
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deportistas`
--

DROP TABLE IF EXISTS `deportistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deportistas` (
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `genero` enum('Masculino','Femenino','Otros') DEFAULT NULL,
  `pais` char(3) DEFAULT NULL,
  `posicion` varchar(30) DEFAULT NULL,
  `numero` tinyint(100) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `imagen` char(36) DEFAULT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deportistas`
--

LOCK TABLES `deportistas` WRITE;
/*!40000 ALTER TABLE `deportistas` DISABLE KEYS */;
INSERT INTO `deportistas` VALUES ('Sergio','Rochet','1993-03-23','Masculino','URU','Golero',1,1,'6312baf5cf76f.png'),('MathÃ­as','Laborda','1999-09-15','Masculino','URU','Defensa',2,1,'630fe6a5c66e8.jpg'),('Leo','Coelho','1993-05-17','Masculino','BRA','Defensa',3,1,'63124ac03503c.jpg'),('Mario','Risso','1988-01-31','Masculino','URU','Defensa',4,1,'63124bc7aa162.jpg'),('Yonatan ','RodrÃ­guez','1993-07-01','Masculino','URU','Mediocampista',5,1,'63128e2329df9.jpg'),('Camilo','Candido','1995-06-02','Masculino','URU','Defensa',6,1,'63124c03e9ea1.jpg'),('Emanuel ','Gigliotti','1987-05-20','Masculino','ARG','Delantero',8,1,'6312a19aca098.jpg'),('Luis','SuÃ¡rez','1987-01-24','Masculino','URU','Delantero',9,1,'631242a832ee8.jpg'),('Franco','FagÃºndez','2000-07-19','Masculino','URU','Delantero',10,1,'6312a1a3d978d.jpg'),('Ignacio','RamÃ­rez','1997-02-01','Masculino','URU','Delantero',11,1,'6312a1ab8f74f.jpg'),('MartÃ­n','RodrÃ­guez','1989-09-20','Masculino','URU','Golero',12,1,'631242ccf250a.jpg'),('Christian','Almeida','1989-12-25','Masculino','URU','Defensa',13,1,'63124d34b83c3.jpg'),('Joaquin ','Trasante','1999-03-14','Masculino','URU','Mediocampista',14,1,'63128e461e672.jpg'),('Diego','RodrÃ­guez','1989-09-04','Masculino','URU','Mediocampista',15,1,'631295ee48af5.jpg'),('Leandro','Lozano','1998-12-19','Masculino','URU','Defensa',16,1,'63128be6be7e5.jpg'),('Francisco','Ginella','1999-01-21','Masculino','URU','Mediocampista',17,1,'631296694a5f3.jpg'),('Alfonso','Trezza','1999-06-22','Masculino','URU','Delantero',19,1,'6312a1bad073c.jpg'),('Felipe','Carballo','1996-10-04','Masculino','URU','Mediocampista',20,1,'630fe8da25deb.jpg'),('Renzo','SÃ¡nchez','2004-02-17','Masculino','URU','Mediocampista',21,1,'631296bed8598.jpg'),('Diego','Zabala','1991-09-19','Masculino','URU','Mediocampista',22,1,'63129ef359680.jpg'),('Alex','Castro','1994-03-08','Masculino','COL','Delantero',23,1,'6312a1ec2077d.jpg'),('Manuel','Monzeglio','2001-09-25','Masculino','URU','Mediocampista',24,1,'63129f285947a.jpg'),('Ignacio','SuÃ¡rez','2002-02-05','Masculino','URU','Golero',25,1,'6312426729148.jpg'),('Santiago','Ramirez','2001-09-03','Masculino','URU','Delantero',27,1,'6312a1f6c4ac5.jpg'),('Juan','Gutierrez','2002-02-04','Masculino','URU','Delantero',28,1,'6312a208149b2.jpg'),('Juan','Izquierdo','1997-07-04','Masculino','URU','Defensa',30,1,'63128c1fb8069.jpg'),('MathÃ­as','Bernatene','2000-07-24','Masculino','URU','Golero',40,1,'6312436181c5f.jpg'),('JosÃ©','RodrÃ­guez','1997-03-14','Masculino','URU','Defensa',44,1,'63128c461016f.jpg');
/*!40000 ALTER TABLE `deportistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `categoria` enum('Resultados','Jugadores','Internacional','Mercado','Sociales') CHARACTER SET latin1 DEFAULT NULL,
  `titulo` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `noticia` mediumtext CHARACTER SET latin1,
  `estado` tinyint(1) DEFAULT NULL,
  `imagen` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `fechapublicacion` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` VALUES (27,'Mercado','Â¡Se concretÃ³ la llegada de Luis SuÃ¡rez a Nacional!','El mÃ¡ximo goleador en la historia del fÃºtbol uruguayo retornÃ³ a casa, a Nacional, y lo hizo en plena vigencia, cumpliendo su sueÃ±o personal y el de millones de Bolsos que convirtieron el hashtag #SuarezANacional en una realidad: #SuÃ¡rezEnNacional Nadie fue indiferente a la llegada del Ã­dolo. A media maÃ±ana, cuando aterrizÃ³ el aviÃ³n privado en que llegÃ³ junto a su familia desde Barcelona, ya habÃ­a gente en el camino marcada y anunciado para la caravana de recibimiento.   Horas antes, proyecciones de #SuÃ¡rezEnNacional se vieron en emblemÃ¡ticos edificios de Montevideo y veleros transitaban por la costa de la capital con banderas enormes de Nacional y leyendas de bienvenida a Luis SuÃ¡rez.   El resto es historia viva: de todos los rincones del paÃ­s llegaron hinchas para sumarse a la bienvenida, colmaron el Gran Parque Central que recibiÃ³ a 22 mil personas solamente para ver un jugador entrar a la cancha y ponerse la camiseta. Eso sÃ­, era Luis SuÃ¡rez...  Con el plantel en la cancha y tras un encuentro que mantuvieron en privado en el vestuario, ahora Nacional se prepara para lo mas lindo: competir y en todos los frentes como lo reafirmÃ³ el propio Lucho. Vamos a dar pelea en el Clausura, la Copa Uruguaya, el Uruguayo y la Sudamericana.   Â¡Viva siempre el Club Gigante! ',1,'63193bfcd9baf.jpg','2022-08-01'),(28,'Mercado','Un hasta luego a Nico Marichal','El campeÃ³n uruguayo 2020 seguirÃ¡ su carrera en el DÃ­namo de MoscÃº Se confirmÃ³ la transferencia de NicolÃ¡s Marichal al DÃ­namo de MoscÃº de Rusia.    La operaciÃ³n alcanza los 5.000.000 USD por el 75% de los derechos econÃ³micos del jugador.   La transferencia es por 4.200.000 USD + 800.000 USD en bonos.  Nacional mantiene en su poder el 25% de la ficha del jugador. El Dinamo MoscÃº recuerda el origen de Marichal â€œen el pequeÃ±o asentamiento uruguayo de SarandÃ­ del YÃ­, con una poblaciÃ³n de solo 7000 habitantesâ€, donde â€œjugÃ³ en el Nacional local hasta los 17 aÃ±osâ€.  Luego recuerda que fue â€œadvertido por un ojeador del Nacional capitalinoâ€, a quien le â€œllamÃ³ la atenciÃ³n no solo la velocidad del futbolista, sino tambiÃ©n su habilidad para manejar el balÃ³n y su excelente juego de uno contra unoâ€. ',1,'63193bc9348f5.jpg','2022-08-30'),(29,'Jugadores','Valla invicta y record historico de nuestro golero','Sergio Rochet se convirtiÃ³ en el golero uruguayo con mÃ¡s minutos con la valla invicta sumando 994 minutos entre partidos oficiales por el Campeonato Uruguayo, Copa Libertadores, Sudamericana y amistosos de SelecciÃ³n Nacional Uruguaya Sergio \"Chino\" Rochet llegÃ³ a Nacional el 21 de junio de 2019, hace ya 3 aÃ±os.  Sin mucho ruido y con un perfil bajo, el Chino se fue metiendo en el plantel tricolor.  Su debut se dio en la copa Gigantes de AmÃ©rica el 4 de julio de ese mismo aÃ±o, donde Nacional empato 1-1 con AmÃ©rica de Cali, luego el partido se liquidÃ³ por penales 4-3 a favor del Decano. El debut oficial por Campeonato Uruguayo se dio el 21 de julio de 2019 frente a Danubio, donde Rochet ingresÃ³ en el minuto 46 sustituyendo a Luis MejÃ­a.  La historia desde ese aÃ±o a hoy fue sumando minutos, torneos y atajadas.  Al dÃ­a de hoy, Sergio Rochet acumula 994 minutos con la valla invicta, sumando competencias a nivel local e internacional con Nacional y la selecciÃ³n uruguaya.  Los equipos a los que enfrento y les puso el candado hasta hoy son: FÃ©nix, Defensor, AlbiÃ³n, Bragantino, Cerrito, River Plate, Defensor Sporting, Danubio y UniÃ³n, esto con Nacional y defendiendo la celeste se suman MÃ©xico y los primeros 45 minutos frente a PanamÃ¡.  Llego de Holanda en silencio, hoy es el capitÃ¡n rompiendo todos los rÃ©cords.   Tras esta marca histÃ³rica e inÃ©dita en el fÃºtbol uruguayo, Rochet va por el anhelado RÃ‰CORD de minutos invicto en el Campeonato Uruguayo para el que le faltan 188 minutos por jugar sin recibir goles. ',1,'63168f3e1d128.jpg','2022-06-30'),(30,'Resultados','Otro clasico para el Bolso!','Nacional revalidÃ³ su buen momento en el Campeonato Uruguayo al vencer este domingo a su clÃ¡sico rival, PeÃ±arol, en la cuarta jornada del Torneo Clausura 2022, en un duelo disputado en el estadio Gran Parque Central y donde Luis SuÃ¡rez volviÃ³ a ser una de las figuras del â€˜Bolsoâ€™ gracias al golazo que marcÃ³ en el segundo tiempo.Mientras Laborda abriÃ³ el marcador a los 45 de cabeza tras un tiro de esquina. Para el complemento, el equipo dirigido por Pablo Repetto saltÃ³ al campo con hambre de mÃ¡s y el â€˜Pistoleroâ€™ puso el 2-0 a los 53â€² con un disparo de zurda desde afuera del Ã¡rea que se metiÃ³ en el Ã¡ngulo del arco aurinegro.  Su gol, el tercero para Nacional desde que regresÃ³ al campeonato uruguayo a principios de agosto, fue el mÃ¡s esperado por la hinchada y muy festejado tanto por el â€˜Pistoleroâ€™ como por su familia, que lo acompaÃ±Ã³ emocionada desde el palco tricolor.  El descuento para PeÃ±arol llegÃ³ a los 61 por parte de Kevin MÃ©ndez. Y si bien parecÃ­a que los â€˜aurinegrosâ€™ podÃ­an complicarle las cosas al lÃ­der, al minuto 75â€² Camilo CÃ¡ndido alargÃ³ la diferencia.  En el choque mÃ¡s esperado de la liga local, Nacional era gran favorito por sus Ãºltimas actuaciones y su posiciÃ³n en la tabla del campeonato, ademÃ¡s del ingrediente SuÃ¡rez, mientras que el â€˜Manyaâ€™ no logra superar su discreto nivel mostrado en la temporada.',1,'631a8abb08a5e.jpg','2022-09-04'),(32,'Resultados','Goleada a Torque en el centenario.','Con goles de Luis SuÃ¡rez, Franco FagÃºndez y Emmanuel Gigliotti, Nacional le ganÃ³ 3-0 a Montevideo City Torque este sÃ¡bado por la quinta fecha del torneo Clausura del fÃºtbol uruguayo, encadenando asÃ­ su cuarta victoria consecutiva.    En su primer partido jugado en el mÃ­tico Estadio Centenario desde que regresÃ³ a la liga charrÃºa, SuÃ¡rez habilitÃ³ a FagÃºndez para que a los 8 minutos marcara un estupendo tanto de media distancia.     Luego, tras una gran jugada tambiÃ©n con FagÃºndez, el \'Pistolero\' pateÃ³ de volea a los 27 para poner el 2-0 parcial.    El artillero estuvo cerca de alargar la diferencia a los 50 minutos con un nuevo tanto que el VAR anulÃ³ por posiciÃ³n adelantada.     Siete minutos despuÃ©s, el entrenador Pablo Repetto decidiÃ³ el ingreso del argentino Gigliotti en su lugar, posiblemente pensando en la prÃ³xima fecha ante el archirrival PeÃ±arol.    Gigliotti cerrÃ³ el choque con un tanto de cabeza a los 89, para el definitivo 3-0, en una diferencia que quedÃ³ corta ya que Nacional totalizÃ³ tres goles anulados por el videoarbitraje.',1,'631933e40e5bf.jpg','2022-08-27'),(33,'Resultados','Resultado justo para un partido complicado','Nacional venciÃ³ 1-0 a Liverpool en el cierre de la tercera fecha del Torneo Clausura. El encuentro se disputÃ³ en el Estadio Belvedere y el tricolor se impuso con un tanto de cabeza de Franco FagÃºndez tras asistencia de JosÃ© Luis RodrÃ­guez. Con este resultado, el elenco de Pablo Repetto llegÃ³ a 53 puntos en la Tabla Anual y le sacÃ³ seis al negriazul, que se aleja en la pelea por la tabla acumulada.  A su vez, el albo llegÃ³ a seis puntos en el Clausura y quedÃ³ a tres unidades del lÃ­der River, que tiene puntaje perfecto luego de las primeras tres jornadas. La otra buena noticia para el albo es que Luis SuÃ¡rez, su mÃ¡xima figura, disputÃ³ los 90 minutos por primera vez desde su retorno al club.',1,'631696ba591de.jpg','2022-08-14'),(34,'Mercado','Otormin para Defensa y Justicia','El jugador Leandro Otormin serÃ¡ cedido a prÃ©stamo al Club Social y Deportivo Defensa y Justicia de Argentina hasta el 30 de junio de 2023.    La cesiÃ³n fue acordada con una opciÃ³n de compra para Defensa y Justicia de usd 700 mil, aplicable Ãºnicamente durante la vigencia del prÃ©stamo.   El salario del jugador lo pagarÃ¡ Ã­ntegramente Defensa y Justicia y el Club Nacional de Football es poseedor del 25% de los derechos econÃ³micos del jugador. ',1,'63193c4806d08.jpg','2022-08-11'),(35,'Jugadores','El primer gol del Pistolero en su vuelta a Nacional!','VolviÃ³ Luis SuÃ¡rez. A Nacional y al gol. Si, este viernes, el Bolso recibiÃ³ a Rentistas en el Gran Parque Central por la fecha 2 del Torneo Clausura de la Liga uruguaya y el Pistolero, que mostrÃ³ su inmensa capacidad goleadora, marcÃ³ uno de los tres goles que hizo el dueÃ±o de casa. El Tricolor uruguayo ganaba por dos goles a cero gracias a los tantos de Alex Castro a los cuatro minutos y de Ignacio RamÃ­rez a los 42, cuando la primera mitad agonizaba. Sin embargo, con el local en cÃ³moda ventaja todos estaban esperando que Lucho SuÃ¡rez salte al campo de juego y Pablo Repetto complaciÃ³ a los miles de hinchas del Bolso que se hicieron presentes esa noche en el mÃ­tico recinto.  SuÃ¡rez entrÃ³ al campo de juego disputar los Ãºltimos 45 minutos en lugar de Franco Fagundez y, en tan sÃ³lo 13 minutos, hizo su estreno goleador con el equipo de sus amores. A los 59 minutos, Brian Ocampo ejecutÃ³ un preciso cÃ³rner del sector izquierdo al primer palo, el Pistolero primereÃ³ a su marcador y con la jerarquÃ­a que lo caracteriza impactÃ³ la pelota con un gran testazo, que dejÃ³ al arquero sin opciones de respuesta.  El estadio delirÃ³ ante el tanto de su goleador, que ya estÃ¡ de vuelta en casa.',1,'63193df24edc7.jpg','2022-08-05'),(36,'Internacional','Nacional vs Goianiense por la Sudamericana','Nacional enfrentarÃ¡ este martes a las 19:15 horas al AtlÃ©tico Goianiense por la ida de los Cuartos de Final de la Copa Sudamericana con el GPC totalmente lleno. El Decano buscarÃ¡ este martes sacar un resultado positivo ante el \"Dragao\" luego de un fin de semana repleto de emociones, con un domingo sensacional en el Primer Estadio de las Copas del Mundo donde la familia Tricolor se juntÃ³ en gran nÃºmero para darle una cÃ¡lida bienvenida a Luis SuÃ¡rez al club de sus amores.',1,'63193f0e5d3c1.png','2022-08-01'),(37,'Internacional','TodavÃ­a hay chances!','Nacional visita este martes a las 19:15 horas al AtlÃ©tico Goianiense en busca de una remontada que le de la clasificaciÃ³n. Si bien el Decano no pudo mostrar su mejor cara en el partido de ida, el Dragao hizo pocos mÃ©ritos para llevarse la victoria en el Gran Parque Central, jugando con un estilo similar al caracterÃ­stico del fÃºtbol uruguayo: una defensa fÃ©rrea y aprovechar al mÃ¡ximo las chances que puedas generar.  Teniendo esto en cuenta, Nacional tiene con quÃ© pelearle de igual a igual y conseguir dar vuelta el 0-1, y si de algo sabe el Tricolor en su historia es de remontadas, este aÃ±o lo logrÃ³ en Argentina por las Copas Libertadores y Sudamericana, ganÃ¡ndole a Velez SÃ¡rsfield y UniÃ³n por 2 tantos contra 1, asÃ­ como tambiÃ©n por Campeonato Uruguayo frente a Plaza Colonia.  Mientras el club gigante llega a esta revancha tras una cÃ³moda victoria 3 a 0 ante Rentistas, por el Brasileirao Goianiense derrotÃ³ a Red Bull Bragantino por 2 a 1, donde el tÃ©cnico Jorginho parÃ³ una alineaciÃ³n \"titular\" respecto a quienes disputaron el partido de ida en el Primer Estadio de las Copas del Mundo.',1,'63193f78e744c.jpg','2022-08-08'),(38,'Internacional','El Decano afuera de la copa','Nacional quedÃ³ eliminado en los cuartos de final de la Copa Sudamericana al caer por 3-0 en el Serra Dourada con AtlÃ©tico Goianiense (serie 4-0), en un partido donde no estuvo a la altura y fue ampliamente superado.',1,'631940aa3e314.jpg','2022-08-09'),(39,'Sociales','A correr! La 6k del Bolso','El Club Gigante sigue festejando sus 123 aÃ±os y finalmente, la 7ma ediciÃ³n de la 6K, se realizarÃ¡ el domingo 4 de septiembre a las 9:30hs.   El punto de partida serÃ¡ el Gran Parque Central (por General Urquiza). El recorrido serÃ¡ por 8 de Octubre, 18 de Julio hasta Arenal Grande ida y vuelta. Para participar es obligaciÃ³n pre aprobar el deslinde de responsabilidades por parte de menores y mayores de edad.   Menores de 15 aÃ±os deben participar acompaÃ±ados de un adulto responsable.  Â¡PrepÃ¡rate para vivir una experiencia tricolor gigante!',1,'631a8311ac63d.png','2022-07-10'),(40,'Sociales','Dia del niÃ±o tricolor','El prÃ³ximo domingo 28 de agosto, de 12 a 16 hrs., festejamos una nueva ediciÃ³n del DÃ­a del NiÃ±o Tricolor en el Gran Parque Central.   Los bonos se podrÃ¡n adquirir en nacional.uy o a travÃ©s de los locales Redpagos. Importante: No habrÃ¡ boleterÃ­a en la puerta del evento y solo se podrÃ¡ ingresar con bono (tanto niÃ±os como adultos).  PRECIOS:  NiÃ±os y adultos socios - $100 Generales - $200 El ingreso serÃ¡ a partir de las 12:00 por la Tribuna AbdÃ³n Porte (Gral. Urquiza - PortÃ³n 2).  Todos los niÃ±os (de 0 a 14 aÃ±os) se llevarÃ¡n una camiseta Umbro conmemorativa del evento de regalo que serÃ¡ entregada ese mismo dÃ­a con el documento de identidad a los niÃ±os que estÃ©n presentes en el evento.*  *Los talles de camisetas quedarÃ¡n sujetos a disponibilidad.  No te pierdas de un dÃ­a repleto de diversiÃ³n con inflables, mÃºsica, juegos, plaza de comidas, regalos y muchas sorpresas.  Â¡Los esperamos para compartir un dÃ­a de diversiÃ³n GIGANTE! ',1,'631a83bae7ff9.jpg','2022-08-16'),(41,'Sociales','FiscalÃ­a archivÃ³ la causa que investigaba denuncia contra jugadores de Nacional','El fiscal de Delitos Sexuales de Octavo Turno, Maximiliano Sosa, que investigaba la denuncia de un caso de una menor embarazada en encuentros con jugadores del plantel principal del Club Nacional de Football y de otras instituciones deportivas, finalmente definiÃ³ archivar la causa, segÃºn informaron fuentes de la FiscalÃ­a General de la NaciÃ³n a Montevideo Portal.  BÃ¡sicamente, el argumento que dio Sosa para archivar la causa fue que en los hechos denunciados â€œno se constituÃ­a un delitoâ€. En concreto, desde el punto de vista penal, no se investigarÃ¡ mÃ¡s, aunque la vÃ­ctima o la familia podrÃ­an solicitar que se reexaminara la causa.',1,'631a85ebb3593.jpg','2022-09-06'),(42,'Jugadores','Carbadios hace falta en la seleccion','Felipe Carballo, el mediocampista que viene rompiendola hace tiempo en el tricolor y no para de destacar, su manera de jugar y liderar al equipo son destacantes de su excelente forma de jugar,la gente se ha movilizado en las redes sociales con furor pidiendolo hacia la celeste, creo que estamos todos pendientes y esperando el llamado del Tornado. Hasta el propio Jose Fuentes se refirio a Carballo en una nota,',1,'631a88b16571c.jpg','2022-09-08');
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` text,
  `clave` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (5,'Prueba','Probando','prueba@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',1),(6,'Curso','PHP','cursophp@hotmail.com','218140990315bb39d948a523d61549b4',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'baselucas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-10  0:02:15
