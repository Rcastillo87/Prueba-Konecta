buenas tardes, estas son las consideraciones para poner en marcha la prueba:

* Una máquina por lo menos 8 gb de ram, procesador min i3.
* instalar Xampp que posee la versión 8 de php o superior.
* internet para consumir las librerías que una el aplicativo.

para poner en marcha el proyecto es necesario los siguientes  pasos:

* Instalar la base de datos entregada de la prueba( la configuracion de la  bade de datos esta en la orchivo .evn q esta en la raiz del proyecto, junto con la base de datos).
* poner los archivos del proyecto en la carpeta htdoc que se en encuentra en la carpeta de instalacion del Xampp
* abrir la consola de comandos, ubicarse en las carpeta de raiz del proyecto y ejecutar los comandos
-> composer update 
->npm install 
para descargar las librerías necesarias.
* para poner en marcha el proyecto se debe ejecutar 
-> npm rum dev 
para ingresar al proyecto  debes abrir un navegador de tu preferencia e ingresar el siguiente link 
http://localhost/prueba_konecta/public/welcome 


SQl solicitados, esto se hace en a la base de datos que se entrega

->producto con más stock

SELECT * FROM productos
WHERE stock = (SELECT MAX(stock) FROM productos	)
LIMIT 1

->producto con más compras 

SELECT p.* FROM productos p
INNER JOIN(
	SELECT id_producto, sum( cantidad ) cont  
	FROM ventas GROUP BY id_producto 
) ventas ON  ventas.id_producto = p.id
ORDER BY ventas.cont DESC
LIMIT 1

->producto con más ventas 

SELECT p.* FROM productos p
INNER JOIN(
	SELECT id_producto, count( id_producto ) cont  
	FROM ventas GROUP BY id_producto 
) ventas ON  ventas.id_producto = p.id
ORDER BY ventas.cont DESC
LIMIT 1
