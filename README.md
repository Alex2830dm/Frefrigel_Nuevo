1.- Para la instalación de la aplicación web, es necesario tener descargado previamente el programa xampp y el programa Visual Studio Code al igual que la dependencia composer.

2.- Links para las descargas de las aplicaciones:

    *Xampp: https://www.apachefriends.org/es/index.html

    *Visual Studio Code: https://code.visualstudio.com/

    *Composer: https://getcomposer.org/

3.- Para inicializar el proyecto será requerido que se inicie el programa xampp con las características Apache y MySQL activados.

4.- Para la base de datos, en el proyecto se encuentra el archivo 'DBFrefrigel.sql'. Este archivo se importará en el gestor de base de datos de su preferencia.

5.- Abriremos el proyecto en Visual Studio Code, así que desde el explorador de Windows nos ubicaremos en la carpeta del proyecto y la abrimos con Visual Studio Code

6.- El archivo .env.example lo renombraremos como .env. Posteriormente, cambiaremos las variables como el nombre de la base de datos y usuario. En caso de no existir alguna contraseña con XAMPP MySQL se dejará como se encuentra actualmente el archivo.

7.- Para iniciar la aplicación abriremos una terminal dentro de la carpeta en visual studio code 
    *Si solo queremos abrirla en la computadora, el comando será: php artisan serve. 
    *Si queremos abrir la aplicación desde cualquier dispositivo, verificaremos cuál es la ipv4 de nuestra computadora y en la consola de visual escribiremos: php artisan serve --host=ipv4 de nuestra computadora.

8.- Así podremos ingresar a la aplicación proporcionada desde el link que nos indique la consola, o desde la URL por defecto de Laravel que es: http://127.0.0.1:8000. En caso de haberle puesto IP, será http:// + IPv4:8000

9.- En esta aplicación se cuenta con un control de pedidos de productos que los clientes de la empresa Frefrigel realizan. Para realizar un pedido, se ingresará al sistema desde el menú, se selecciona la opción menú o abrir la ruta http://127.0.0.1:8000/login, y se ingresa con las siguientes credenciales:
    email:cliente@gmail.com
    password: password
Una vez dentro, la aplicación mostrará el menú de categorías de los productos. Se puede abrir cualquier categoría y se mostrarán los productos. Vamos a colocar la cantidad de pedido del producto y daremos clic en "Agregar", la aplicación irá agregando los productos dentro del carrito que se puede visualizar en la parte superior se encuentra un botón "Ver Pedido", y mostrará una ventana con los detalles del pedido, además de que una vez finalizado el pedido podemos guardarlo dando clic en el botón "Guardar Pedido".

10.- Una vez guardado el pedido, se direccionará a la vista con los detalles del pedido, donde también se podrá descargar el comprobante del pedido. En la opción "Pedidos" del menú lateral se mostrará el historial de pedidos del cliente.

11.- De parte de Frefrigel se podrá acceder con las credenciales:
    email: admin@gmail.com
    password: password
Una vez dentro, mostrará la vista de bienvenido; el menú lateral mostrará más opciones. Una de las opciones es "Producción", dentro de esta opción se mostrará una vista donde arroje el total de productos que se tienen que elaborar. Esto irá incrementando dependiendo de los productos pedidos por los clientes.

12.- En la opción "Pedidos", mostrará el historial de todos los pedidos realizados por los clientes, donde también se podrán realizar pedidos seleccionando el cliente en la venta de detalles del pedido.

13.- Las opciones "Productos", "Clientes", "Empleados", son para registrar datos correspondientes a cada opción.
    *En caso de registrar un cliente la contraseña de acceso será Frefrigel2024