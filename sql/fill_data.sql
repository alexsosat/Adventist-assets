use advAssets;

INSERT INTO `dimension` (`id`, `name`) VALUES ('1', '2D'), ('2', '3D');
INSERT INTO `format` (`id`, `name`) VALUES ('1', 'PNG'), ('2', 'JPG'), ('3', 'SVG'), ('4', 'OBJ'), ('5', 'FBX'), ('6', 'BLEND'), ('7', 'CAD'), ('8', '3DS');

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`) VALUES (NULL, 'Alejandro', 'Sosa Trejo', 'email@ejemplo.com', 'contraseña');

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`) VALUES (NULL, 'Miguel Angel', 'Varela Delgado', 'email@ejemploVarela.com', 'contraseña2');

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`) VALUES (NULL, 'Freddy', 'Santos', 'ejemplo@ejemploFreddy.com', 'contraseña3');


INSERT INTO `publication` (`id`, `user_id`, `title`, `desc`, `url`, `dimension`, `format`) VALUES 
(NULL, '1', 'Arca del pacto', 
'El Arca de la Alianza, también conocida como el Arca del Testimonio, y en algunos versos en varias traducciones como el Arca de Dios, es un cofre de madera cubierto de oro con tapa que se describe en el Libro del Éxodo como conteniendo las dos tablas de piedra de los Diez Mandamientos. ', 'https://drive.google.com/drive/folders/1H11-HeK4TmXz7L-2VxCFrQOzzrkDw16B?usp=sharing', 
'1', '4'), 
(NULL, '1', 'Pack de animales de bajos polígonos', 'Solo algunos animales low poly.', 'https://drive.google.com/drive/folders/1GqH9KNqEYV8YwFb39sqGgtpjO1A5iOSA?usp=sharing', '1', '5'), 
(NULL, '1', 'Animal perro Shiba', '¿Soy lindo? :D', 'https://drive.google.com/drive/folders/1GttsAW_uygrErAcaEc8rC2C5JNUSoEP2?usp=sharing', '1', '4');

INSERT INTO `publication` (`id`, `user_id`, `title`, `desc`, `url`, `dimension`, `format`) VALUES 
(NULL, '2', 'Recursos de mobiliario de iglesia', 'Este es un pequeño paquete de activos que estoy trabajando actualmente en el interior de una iglesia. Será simple en el estilo y sus activos. Actualmente solo tienen los elementos Wodden que estará dentro de la iglesia, continuará añadiendo más a ella, \r\n\r\nSi decides usar esto, por favor, dame crédito. También me gustaría ver para qué lo utilizas.', 'https://drive.google.com/drive/folders/1GvvxO9Ph9r-fChmz2lHxSi9RRvzJ3i6f?usp=sharing', '1', '4'), 
(NULL, '2', 'Águila blanca de bajos polígonos', NULL, 'https://drive.google.com/drive/folders/1GjVMeZ0OmDFFC3Wpnq87jzJh8azCD3sz?usp=sharing', '1', '3'), 
(NULL, '2', 'Casa Egipcia cartoon', 'Casa estilizada del antiguo Egipto\r\n\r\nModelado en 3ds max, pintado a mano en photoshop', 'https://drive.google.com/drive/folders/1H-jrKhxg4fDrkpbwJKDkBmItne7yPWij?usp=sharing', '1', '4');

INSERT INTO `publication` (`id`, `user_id`, `title`, `desc`, `url`, `dimension`, `format`) VALUES 
(NULL, '3', 'Monte de Jesús', 'El Bom Jesus do Monte es un santuario portugués situado en una colina de la ciudad de Braga, en el norte de Portugal. Tiene una hermosa vista de la ciudad, buenos restaurantes y una hermosa arquitectura.', 'https://drive.google.com/drive/folders/1Guq5I2c1ba4rRAATqDZpHRtv_-JZldYt?usp=sharing', '1', '3'), 
(NULL, '3', 'Arca de Noé', 'Este es el modelo preliminar que hice para mi proyecto del arca. Cuando termine la animación, la versión final, junto con las texturas, se subirá en ese momento para su compra.', 'https://drive.google.com/drive/folders/1GyQakBjJyQHLoGfNOTPRiqjpA_ihMaXN?usp=sharing', '1', '5'), 
(NULL, '3', 'Sinagoga', 'Modelado de una antigua sinagoga', 'https://drive.google.com/drive/folders/1H06bx0c226u3aSJQ364P6GHSWSOZxVEL?usp=sharing', '1', '3');


