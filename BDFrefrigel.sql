/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 8.0.30 : Database - frefrigel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`frefrigel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `frefrigel`;

/*Table structure for table `categorias_productos` */

DROP TABLE IF EXISTS `categorias_productos`;

CREATE TABLE `categorias_productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo_producto` int NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categorias_productos` */

insert  into `categorias_productos`(`id`,`tipo_producto`,`categoria`,`created_at`,`updated_at`) values 
(1,1,'Congeladas','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(2,1,'Gelatinas','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(3,1,'Gomas','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(4,1,'Tamarindos','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(5,1,'Vela Goma','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(6,2,'Barquillos y Galletas','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(7,2,'Cacahuates','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(8,2,'Chocos','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(9,2,'Cocos','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(10,2,'Dulces Leche','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(11,2,'Enchilados','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(12,2,'Estuches','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(13,2,'Gomas','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(14,2,'Juguetes','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(15,2,'Malvaviscos','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(16,2,'Mechudas','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(17,2,'Obleas','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(18,2,'Paletas y Caramelos','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(19,2,'Popotes','2024-04-16 14:36:28','2024-04-16 14:36:28'),
(20,2,'Tarugos y Tamarindos','2024-04-16 14:36:28','2024-04-16 14:36:28');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nameClient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Cliente / Compañia',
  `rsCliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NA' COMMENT 'Razón Social de la compañia',
  `phoneClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NA' COMMENT 'Teléfono de la compañia',
  `emailClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NA' COMMENT 'Correo de la compañia',
  `contactClient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre del contacto',
  `jobcontactClient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Puesto del contacto',
  `phonecontactClient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Teléfono del contacto',
  `addressStreet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Dirección - Calle',
  `addressColony` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Dirección - Colonia',
  `addressMunicipality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Dirección - Municipio',
  `addressState` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Dirección - Estado',
  `addressCP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Dirección - CP',
  `imageClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Logo del cliente',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`nameClient`,`rsCliente`,`phoneClient`,`emailClient`,`contactClient`,`jobcontactClient`,`phonecontactClient`,`addressStreet`,`addressColony`,`addressMunicipality`,`addressState`,`addressCP`,`imageClient`,`activo`,`created_at`,`updated_at`) values 
(1,'Super Garis Lerma','Garis S.A de C.V','NA','garis@mail.com','Juan Vazquez','Jefe de Dulceria','7226987181','Av. Reolín Barejon 13','Centro','Lerma','México','52000',NULL,1,'2024-04-16 14:36:28','2024-04-16 14:36:28'),
(2,'Dulcería Princesa',NULL,NULL,NULL,'Marilu Sanchez','Propietario','7297539510','Benito Juarez 20','Álvaro Obregón','Lerma','México','52060','fotoCliente.jpg',1,'2024-04-16 16:30:03','2024-04-16 16:30:03');

/*Table structure for table `detalles_ventas` */

DROP TABLE IF EXISTS `detalles_ventas`;

CREATE TABLE `detalles_ventas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `folio_venta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad_venta` double(8,2) NOT NULL,
  `importe_venta` double(8,2) NOT NULL DEFAULT '0.00',
  `entregado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detalles_ventas` */

insert  into `detalles_ventas`(`id`,`folio_venta`,`id_producto`,`cantidad_venta`,`importe_venta`,`entregado`,`created_at`,`updated_at`) values 
(1,'1',1,5.00,42.50,0,'2024-04-16 16:13:51','2024-04-16 16:13:51'),
(2,'1',2,5.00,47.50,0,'2024-04-16 16:13:51','2024-04-16 16:13:51'),
(3,'1',6,5.00,155.00,0,'2024-04-16 16:13:51','2024-04-16 16:13:51'),
(4,'1',39,5.00,225.00,0,'2024-04-16 16:13:51','2024-04-16 16:13:51'),
(5,'1',43,5.00,100.00,0,'2024-04-16 16:13:51','2024-04-16 16:13:51'),
(6,'2',1,5.00,42.50,0,'2024-04-16 16:32:25','2024-04-16 16:32:25'),
(7,'2',2,5.00,47.50,0,'2024-04-16 16:32:25','2024-04-16 16:32:25'),
(8,'2',6,5.00,155.00,0,'2024-04-16 16:32:25','2024-04-16 16:32:25'),
(9,'2',39,5.00,225.00,0,'2024-04-16 16:32:25','2024-04-16 16:32:25'),
(10,'2',43,5.00,100.00,0,'2024-04-16 16:32:25','2024-04-16 16:32:25'),
(11,'2',62,5.00,225.00,0,'2024-04-16 16:32:25','2024-04-16 16:32:25'),
(12,'2',148,5.00,325.00,0,'2024-04-16 16:32:25','2024-04-16 16:32:25'),
(13,'3',1,7.00,59.50,0,'2024-04-16 16:41:45','2024-04-16 16:41:45'),
(14,'3',6,5.00,155.00,0,'2024-04-16 16:41:45','2024-04-16 16:41:45'),
(15,'3',140,5.00,110.00,0,'2024-04-16 16:41:45','2024-04-16 16:41:45'),
(16,'3',144,5.00,95.00,0,'2024-04-16 16:41:45','2024-04-16 16:41:45');

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_apellido` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `empleados` */

insert  into `empleados`(`id`,`name`,`p_apellido`,`s_apellido`,`foto`,`telefono`,`activo`,`created_at`,`updated_at`) values 
(1,'Alex Donaldo','Martínez','Jiménez','fotoFefrigel.jpg','7226729504',1,'2024-04-16 14:36:28','2024-04-16 14:36:28');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2024_01_03_211015_create_permission_tables',1),
(7,'2024_01_05_234546_create_productos_table',1),
(8,'2024_01_08_195549_create_clientes_table',1),
(9,'2024_01_10_180526_create_ventas_table',1),
(10,'2024_01_15_141800_create_detalles__ventas_table',1),
(11,'2024_02_07_140921_create_categorias__productos_table',1),
(12,'2024_02_14_120958_create_empleados_table',1);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\Models\\User',1),
(2,'App\\Models\\User',2),
(2,'App\\Models\\User',3);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'users.index','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(2,'users.create','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(3,'users.store','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(4,'users.edit','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(5,'users.update','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(6,'users.delete','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(7,'roles.index','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(8,'roles.create','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(9,'roles.store','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(10,'roles.edit','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(11,'roles.update','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(12,'roles.destroy','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(13,'productos.index','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(14,'productos.create','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(15,'productos.store','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(16,'productos.edit','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(17,'productos.update','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(18,'productos.destroy','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(19,'productos.inactives','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(20,'productos.inactive','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(21,'productos.active','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(22,'clientes.index','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(23,'clientes.create','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(24,'clientes.store','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(25,'clientes.edit','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(26,'clientes.update','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(27,'clientes.destroy','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(28,'clientes.inactives','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(29,'ventas.index','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(30,'ventas.venta','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(31,'ventas.store','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(32,'ventas.show','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(33,'pedidos.index','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(34,'pedidos.pedido','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(35,'pedidos.store','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(36,'pedidos.show','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(37,'pedidos.entrega','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(38,'entradas.index','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(39,'entradas.entrada','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(40,'entradas.store','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(41,'entradas.show','web','2024-04-16 14:36:26','2024-04-16 14:36:26'),
(42,'entradas.info_producto','web','2024-04-16 14:36:26','2024-04-16 14:36:26');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codeProduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Código Producto',
  `nameProduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Producto',
  `descriptionProduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Descripción',
  `unitProduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Unidad',
  `cantidadUnit` int NOT NULL COMMENT 'Cantidad por Unidad',
  `cantidad_Stock` int NOT NULL DEFAULT '0' COMMENT 'Cantidad Stock',
  `priceProduct` double(8,2) NOT NULL COMMENT 'Precio por cajas',
  `linea_producto` int NOT NULL COMMENT 'Linea de Producto',
  `id_categoria` int NOT NULL COMMENT 'Categoria del producto',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `productos` */

insert  into `productos`(`id`,`codeProduct`,`nameProduct`,`descriptionProduct`,`unitProduct`,`cantidadUnit`,`cantidad_Stock`,`priceProduct`,`linea_producto`,`id_categoria`,`foto`,`activo`,`created_at`,`updated_at`) values 
(1,'GORDA','GORDA 10 PZS','GORDA 10 PZS. CAJA 25 BOLSAS','Caja',25,0,8.50,1,1,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(2,'EXTRA','EXTRA 20 PZS','EXTRA 20 PZS. CAJA 25 BOLSAS','Caja',25,0,9.50,1,1,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(3,'FRESKIN','FRESKIN 20 PZS','FRESKIN 20 PZS. CAJA 15 BOLSAS','Caja',15,0,14.00,1,1,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(4,'FRESKITA','FRESKITA 10 PZAS ','FRESKITA 10 PZAS. CAJA 14 BOLSAS','Caja',14,0,11.00,1,1,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(5,'PLACERA','PLACERA 18 PZ','PLACERA 18 PZS. CAJA 50 BOLSAS','Caja',50,0,7.00,1,1,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(6,'GEL A 60','ALMOHADITA GELATINA AGUA 60 PZS','ALMOHADITA GELATINA AGUA 60 PZS. CAJA 15 BOLSAS','Caja',15,0,31.00,1,1,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(7,'GEL L 60','ALMOHADITA GELATINA LECHE 60 PZS','ALMOHADITA GELATINA LECHE 60 PZS. CAJA 15 BOLSAS','Caja',15,0,31.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(8,'GEL A 20','GELATINA AGUA 20 PZS','GELATINA AGUA 20 PZS. CAJA 30 BOLSAS','Caja',30,0,11.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(9,'GEL L 20','GELATINA LECHE 20 PZS','GELATINA LECHE 20 PZS. CAJA 30 BOLSAS','Caja',30,0,11.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(10,'GEL CHA 30','GELATINA CHAROLA COMBINADA 30 PZS','GELATINA CHAROLA COMBINADA 30 PZS.  CAJA 20 CHAROLAS','Caja',20,0,17.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(11,'GEL A 50','GELATINA AGUA 50 PZS','GELATINA AGUA 50 PZS. CAJA 20 BOLSAS','Caja',20,0,26.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(12,'GEL L 50','GELATINA LECHE 50 PZS','GELATINA LECHE 50 PZS. CAJA 20 BOLSAS','Caja',20,0,26.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(13,'POPOTINA C','POPOTINA GELATINA COMB. AGUA 30 PZS','POPOTINA COMBINADA AGUA 30 PZS. CAJA 20 BOLSAS','Caja',20,0,20.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(14,'POPOTINA A','GELATINA POPOTINA AGUA 30 PZS','GELATINA POPOTINA AGUA 30 PZS. CAJA 20 BOLSAS','Caja',20,0,20.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(15,'POPOTINA L','GELATINA POPOTINA LECHE 30 PZS','GELATINA POPOTINA LECHE 30 PZS. CAJA 20 BOLSAS','Caja',20,0,20.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(16,'GEL A 40','GELATINA AGUA 40 PZS','GELATINA AGUA 40 PZS. CAJA 20 BOLSAS','Caja',20,0,20.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(17,'GEL L 40','GELATINA LECHE 40 PZS','GELATINA LECHE 40 PZS. CAJA 20 BOLSAS','Caja',20,0,20.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(18,'GOMA 800 GOTA A','GOMAS 800GR, GOTA AGUA','GOMAS 800GR, GOTA AGUA. CAJA 10 BOLSAS','Caja',10,0,45.00,1,2,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(19,'GOMA 800 GOTA L','GOMAS 800GR, GOTA LECHE','GOMAS 800GR, GOTA LECHE. CAJA 10 BOLSAS','Caja',10,0,45.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(20,'GOMA 800 FRUTAS','GOMAS 800GR,  FRUTITAS','GOMAS 800GR,  FRUTITA. CAJA 10 BOLSAS','Caja',10,0,45.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(21,'GOMA 800 ESTRELLA','GOMAS 800GR, ESTRELLA','GOMAS 800GR, ESTRELLA. CAJA 10 BOLSAS','Caja',10,0,45.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(22,'GOMA 800 GAJO','GOMAS 800GR, GAJO','GOMAS 800GR, GAJO. CAJA 10 BOLSAS','Caja',10,0,45.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(23,'GOMA 800 FLOR','GOMAS 800GR, FLOR','GOMAS 800GR, FLOR. CAJA 10 BOLSAS','Caja',10,0,45.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(24,'GOMA 800 CORAZON','GOMAS 800GR, CORAZÓN','GOMAS 800GR, CORAZÓN. CAJA 10 BOLSAS','Caja',10,0,45.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(25,'GOMA 800 OSO','GOMAS 800GR, OSO','GOMAS 800GR, OSO. CAJA 10 BOLSAS','Caja',10,0,45.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(26,'GOMA  SURTIDA 50','GOMA SURTIDA 50 PZS','GOMA SURTIDA 50 PZS. CAJA 40 BOLSAS','Caja',40,0,20.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(27,'GOMA SURTIDA 25','GOMA SURTIDA 25 PZS CAJA C/40 BOLSAS','GOMA SURTIDA 25 PZS. CAJA 40 BOLSAS','Caja',40,0,20.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(28,'GOMA SURT 450 GR','GOMA SURTIDA 450 GR','GOMA SURTIDA 450 GR.','Caja',1,0,25.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(29,'GOMA ROLLO 1K','GOMA ROLLO 1 KILO','GOMA ROLLO 1 KILO','Caja',1,0,54.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(30,'GOMA GAJO 1K','GOMA GAJO 1 KILO ','GOMA GAJO 1 KILO','Caja',1,0,54.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(31,'TAM 20','TAMARINDO PURO 20 PZS','TAMARINDO PURO 20 PZS. CAJA 25 BOLSAS','Caja',25,0,30.00,1,3,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(32,'TAM 13','TAMARINDO PURO 13 PZS','TAMARINDO PURO 13 PZS. EXIBIDOR','Caja',40,0,20.00,1,4,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(33,'TAMBOR N 20','TAMBORCITO VASO NEGRO 20 PZS','TAMBORCITO VASO NEGRO 20 PZAS. CAJA 25 BOLSAS','Caja',25,0,30.00,1,4,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(34,'TAMBOR N 13','TAMBORCITO VASO NEGRO 13 PZS','TAMBORCITO VASO NEGRO 13 PZS. CAJA 20 BOLSAS','Caja',20,0,20.00,1,4,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(35,'TAMBOR R 20','TAMBORCITO VASO ROJO 20 PZS','TAMBORCITO VASO ROJO 20 PZS. CAJA 25 BOLSAS','Caja',25,0,30.00,1,4,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(36,'TAMBO R 13','TAMBORCITO VASO ROJO 13 PZS','TAMBORCITO VASO ROJO 13 PZS. CAJA 20 BOLSAS','Caja',20,0,20.00,1,4,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(37,'CHELA 1K','CHAMOY CHELA 1 KILO','CHAMOY CHELA 1 KILO CAJA 20','Caja',20,0,45.00,1,4,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(38,'VELA A 120','VELA CHICA AGUA 120 PZS','VELA CHICA AGUA 120 PZS. CAJA 20 BOLSAS','Caja',20,0,45.00,1,4,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(39,'VELA L 120','VELA CHICA LECHE 120 PZS','VELA CHICA LECHE 120 PZAS. CAJA 20 BOLSAS','Caja',20,0,45.00,1,5,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(40,'VELA A 60','VELA GRANDE AGUA 60 PZS','VELA GRANDE AGUA 60 PZS.  CAJA 20 BOLSAS','Caja',20,0,45.00,1,5,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(41,'VELA L 60','VELA GRANDE LECHE 60 PZS','VELA GRANDE LECHE 60 PZS. CAJA 20 BOLSAS','Caja',20,0,45.00,1,5,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(42,'VELA A 25','VELA AGUA 25 PZS','VELA AGUA 25 PZS. CAJA 40 BOLSAS','Caja',40,0,20.00,1,5,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(43,'VELA L 25','VELA LECHE 25 PZS','VELA AGUA 25 PZS. CAJA 40 BOLSAS','Caja',40,0,20.00,1,5,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(44,'BARQ CAJETA','Barquillo Cajeta 100 PZS','BARQUILLO CAJETA ESTUCHE  100 PZS CAJA 12','Caja',12,0,80.00,1,5,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(45,'ALEG 10','ALEGRIA CHICA 10 PZS','ALEGRIA CHICA 10 PZS. CAJA 66 PAQUETES','Caja',66,0,20.00,2,6,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(46,'ALEG 12','ALEGRIA GRANDE 12 PZS','ALEGRIA GRANDE 12 PZS. CAJA 32 PAQUETES','Caja',32,0,39.00,2,6,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(47,'BAR CHOCO 120','BARQUILLO CHOCOLATE VITRO 120 PZS','BARQUILLO CHOCOLATE VITRO 120 PZS.','Caja',12,0,82.00,2,6,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(48,'BARQ BOM 20','BARQUILLO BOMBON 20 PZS','BARQUILLO BOMBON 20 PZS. CAJA 35 BOLSAS ','Caja',35,0,16.00,2,6,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(49,'BARQ BOM 40','BARQUILLO BOMBON 40 PZS','BARQUILLO BOMBON 40 PZS. CAJA 20 BOLSAS','Caja',20,0,30.00,2,6,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(50,'GALLET SURT 60','GALLETA SURTIDA 60 PZS','GALLETA SURTIDA 60 PZS','Caja',12,0,55.00,2,6,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(51,'BARQ CHOCO 30','BARQUILLO CHOCOLATE BOLSA  30 PZS','BARQUILLO CHOCOLATE BOLSA 30 PZS. CAJA 20','Caja',20,0,27.00,2,6,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(52,'GALLET GLASS 60','GALLETA GLASS 60 PZS','GALLETA GLASS 60 PZS','Caja',12,0,55.00,2,6,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(53,'PALANQ 20','PALANQUETA 20 PZS','PALANQUETA 20 PZS. CAJA 30 BOLSAS','Caja',20,0,23.00,2,6,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(54,'PALANQ EST 95','PALANQUETA ESTUCHE 95 PZS','PALANQUETA ESTUCHE 95 PZS. CAJA 16','Caja',16,0,99.00,2,7,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(55,'JAP 15','JAPONES 15 GRS','JAPONES 15 GRAMOS BOLSA 25BOLS','Caja',25,0,41.00,2,7,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(56,'JAP 900','JAPONES 900 GRS','JAPONES 900 GRS BOLSA BULTO 25','Caja',25,0,51.00,2,7,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(57,'FLAMY 900','FLAMING HOT NUTS 900 GRS ','FLAMING HOT NUTS 900 GRS BULTO 25','Caja',25,0,58.00,2,7,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(58,'HOT N 900','HOT NUGTS 900 GRS QUESO','HOT NUGTS 900 GRS QUESO BULTO 25','Caja',25,0,58.00,2,7,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(59,'JAP 40','JAPONES 40 GRS','JAPONES 40 GRS BULTO 15 BOLS','Caja',20,0,105.00,2,7,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(60,'PALANQUETA CHAROLA','PALANQUETA CHAROLA AMARANTO 9 PZ','PALANQUETA CHAROLA AMARANTO 9 PZ','Caja',1,0,33.00,2,7,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(61,'ALM CHOCO K','CHOCO ALMENDRA 1 KG','CHOCO ALMENDRA 1 KG. CAJA 10 BOLSAS','Caja',10,0,93.00,2,7,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(62,'ALM CHOCO 450','CHOCO ALMENDRA  450 GRS','CHOCO ALMENDRA  450 GRS. CAJA 30 BOLSAS ','Caja',30,0,45.00,2,8,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(63,'CHOCO BOMB 30','CHOCO BOMBON 30 PZS','CHOCO BOMBON 30 PZS. CAJA 30 BOLSAS','Caja',20,0,36.50,2,8,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(64,'CHOCO MENTA 500','CHOCOMENTA  500 GRS','CHOCOMENTA  500 GRS. CAJA 20 BOLSAS','Caja',20,0,40.00,2,8,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(65,'CHOCO BOMB 100','CHOCO BOMBON ESTUCHE 100 PZS','CHOCO BOMBON ESTUCHE 80 PZS','Caja',12,0,98.00,2,8,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(66,'CHOCO HERSEHY 40','CHOCO HERSEHY 40 PZ','CHOCO HERSEHY 40 PZ BOLSA CAJA 20 BOLS','Caja',20,0,42.00,2,8,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(67,'LUNETA 450','LUNETA 450 GRS','LUNETA 450 GR. CAJA 20 BOLSAS','Caja',20,0,39.00,2,8,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(68,'FRESKAS','FRESKAS 250 GRS','FRESKAS 250 GR. CAJA 20 BOLSAS','Caja',20,0,46.00,2,8,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(69,'BOTON CHOCO','BOTON GALLETAS CHOCO 50 PZS','BOTÓN GALLETA CHOCO 50 PZ CAJA 20','Caja',20,0,36.00,2,8,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(70,'TRONCH 500','TRONCHIS SUSPIRO  500 GRS','TRONCHIS SUSPIRO  500 GRS. BOLSA CAJA 20 BOLSAS','Caja',20,0,43.00,2,8,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(71,'COCO SURT  60','COCO SURTIDO ESTUCHE 60 PZS','COCO SURTIDO ESTUCHE 60 PZS. CAJA 20','Caja',20,0,88.00,2,8,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(72,'COCO DOM 30','COCO DOMO 30 PZS','COCO DOMO 30 PZS. ','Caja',12,0,115.00,2,9,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(73,'MUELA VT 100','MUELA DE COCO VITRO 100 PZS','MUELA DE COCO VITRO 100 PZS. CAJA 8 ','Caja',8,0,74.00,2,9,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(74,'MUELA 30','MUELAS 30 PZS','MUELAS 30 PZS. CAJA 30 BOLSAS','Caja',20,0,23.00,2,9,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(75,'CAMOTES 18','CAMOTE 18 PZS','CAMOTE 18 PZS. CAJA 24 PAQ.','Caja',24,0,82.00,2,9,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(76,'BORRACH 70','BORRACHO ESTUCHE DIAZ 70 PZS','BORRACHO DIAZ ESTUCHE 70 PZS. CAJA 20','Caja',20,0,71.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(77,'MACARRON  75','MACARRON ESTUCHE 75 PZS','MACARRON DOMO 75 PZS. CAJA 20','Caja',20,0,53.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(78,'OBLEA CAJETA MINI','OBLEA CAJETA MINI 20 PZ','OBLEA CAJETA MINI 20 PZ','Caja',1,0,25.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(79,'ROLLO LECHE SABORES','ROLLO DE LECHE SABORES TUKUMAN','ROLLO DE LECHE SABORES TUKUMAN','Caja',1,0,28.00,2,17,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(80,'ATE CORAZÓN','Ate Corazón','ATE POVERA CORAZÓN','Caja',1,0,32.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(81,'ATE RUEDA G','Ate Rueda Grande','ATE RUEDA GDE','Caja',1,0,57.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(82,'ATE RUEDA CH','ate polverea 2','ATE POLVERA 2','Caja',1,0,21.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(83,'ATE BOLSA CH','Ate bolsa chica','ATE BOLSA CHICA','Caja',1,0,15.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(84,'ATE BOLSA MED','ate bolsa mediana lujo','ATE BOLSA MEDIANA LUJO','Caja',1,0,23.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(85,'ATE BOLSA G','ate bolsa grande especial','ATE BOLSA GDE ESPECIAL','Caja',1,0,29.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(86,'ATE MINI AZUCAR','ate mini azucar','ATE MINI AZUCAR','Caja',1,0,15.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(87,'COCO ROLLO LETY','coco rollo lety','COCO ROLLO LETY DISPLAY 40 PZ','Caja',1,0,110.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(88,'MINI COCO MARQUETA','coco mini','COCO MINI  MARQUETA BLANCO AMARILLO','Caja',1,0,15.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(89,'BORRACHIO DOSIT CH','BORRACHITO DOSIT','BORRACHITO DOSIT CH 24 PZ','Caja',1,0,28.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(90,'MACARRON BOLSA 20','MACARRON BOLSA 20 PZ','MACARRÓN BOLSA 20 PZ','Caja',1,0,31.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(91,'CHAROLA JAMONCILLO','CHAROLA JAMONCILLO ','CHAROLA JAMONCILLO','Caja',1,0,35.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(92,'ROLLO DE LECHE NUEZ CH','ROLLO DE LECHE NUEZ CH','ROLLO DE LECHE NUEZ CH','Caja',1,0,22.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(93,'PIKINGO 120','PIKINGO  GOMA ESTUCHE 120 PZS','GOMA PIKINGO ESTUCHE 120 PZS. CAJA 20','Caja',20,0,57.00,2,10,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(94,'GOMA VIB 60','GOMA VIBORA ESTUCHE 60 PZS','GOMA VIBORA ESTUCHE 60 PZS. CAJA 20','Caja',20,0,55.00,2,11,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(95,'MANG EST 90','MANGUITO ESTUCHE 90 PZS','MANGUITO ESTUCHE 90 PZS APROX. CAJA 20','Caja',20,0,65.00,2,11,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(96,'OLLITA100','OLLITA ESTUCHE 100 PZS','OLLITA ESTUCHE 100 PZAS. CAJA 20','Caja',20,0,43.00,2,11,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(97,'CHOCO ROMP 100','CHOCO ROMPOPE 100 PZS','CHOCO ROMPOPE ESTUCHE 100 PZS. CAJA 18','Caja',18,0,82.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(98,'TRUF GANZ EST 50','TRUFA GANZO ESTUCHE 50 PZS','TRUFA GANZO ESTUCHE 50 PZS. CAJA 24','Caja',24,0,52.00,2,12,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(99,'GOMA OSO CHAMOY 60','GOMA OSO CHAMOY 60 PZS','GOMA OSO CHAMOY 60 PZS ','Caja',20,0,55.00,2,12,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(100,'GOM DINO 60','GOMA  DINO ESTUCHE 60 PZS','GOMA  DINO ESTUCHE 60 PZAS. CAJA 20','Caja',20,0,58.00,2,13,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(101,'GOM VÍB EST 60','GOMA  VÍBORA ESTUCHE 60 PZS','GOMA  VÍBORA ESTUCHE 60 PZAS. CAJA 20','Caja',20,0,55.00,2,13,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(102,'GOMA SUR CHAR 40','GOMA SURTIDA CHAROLA 40 PZS','GOMA SURTIDA CHAROLA 40 PZS. CAJA 30','Caja',30,0,26.00,2,13,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(103,'GOMA VIB CHAR 30','GOMA VIBORA CHAROLA 30 PZS','GOMA VIBORA CHAROLA 30 PZS. CAJA 30 ','Caja',30,0,26.00,2,13,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(104,'GOMA SURT EST 60','GOMA SURTIDA ESTUCHE 60 PZS','GOMA SURTIDA ESTUCHE 60 PZS. CAJA 20','Caja',20,0,55.00,2,13,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(105,'HUEVO SORPRESA','HUEVO SORPRESA 25 PZS','HUEVO SORPRESA 25 PZS','Caja',1,0,30.00,2,13,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(106,'YOYO','JUGUETE YOYOS 12 PZ','JUGUETE YOYOS 12 PZ','Caja',1,0,90.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(107,'PISTOLITA','JUGUETE PISTOLA 12 PZ','JUGUETE PISTOLA 12 PZ','Caja',1,0,40.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(108,'CAMIÓN','JUGUETE CAMIÓN 10 PZ','JUGUETE CAMIÓN 10 PZ','Caja',1,0,34.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(109,'PIRINOLA','JUGUETE PIRINOLYN 12 PZ','JUGUETE PIRINOLYN 12 PZ','Caja',1,0,28.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(110,'TOMATODO','JUGUETE TOMA TODO 12 PZ','JUGUETE TOMA TODO 12 PZ','Caja',1,0,35.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(111,'MOTO G','JUGUETE MOTO GDE ','JUGUETE MOTO GDE ','Caja',1,0,32.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(112,'MOTO CH','JUGUETE MOTO CH','JUGUETE MOTO CH','Caja',1,0,28.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(113,'CEL','JUGUETE CELULAR 6 PZ','JUGUETE CELULAR 6 PZ','Caja',1,0,28.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(114,'CEL PANT','JUGUETE CELULAR PANTALLA 6 PZ','JUGUETE CELULAR PANTALLA 6 PZ','Caja',1,0,30.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(115,'HELICOP','JUGUETE HELICÓPTERO','JUGUETE HELICÓPTERO','Caja',1,0,40.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(116,'BOLSA SOFI','JUGUETE BOLSA SOFI 12 PZ','JUGUETE BOLSA SOFI 12 PZ','Caja',1,0,33.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(117,'VENADO','JUGUETE VENADO','JUGUETE VENADO','Caja',1,0,40.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(118,'LICUADORA','JUGUETE LICUADORA 6 PZ','JUGUETE LICUADORA 6 PZ','Caja',1,0,36.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(119,'RELOJ','JUGUETE RELOJ 6 PZ','JUGUETE RELOJ 6 PZ','Caja',1,0,31.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(120,'MARUCHIN','JUGUETE MARUCHIN 20 PZ','JUGUETE MARUCHIN 20 PZ','Caja',1,0,34.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(121,'CHAMAQUITOS','JUGUETE CHAMAKITOS 10 PZ','JUGUETE CHAMAKITOS 10 PZ','Caja',1,0,40.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(122,'BIBERÓN','JUGUETE BIBERÓN 12 PZ','JUGUETE BIBERÓN 12 PZ','Caja',1,0,38.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(123,'GUITAR','JUGUETE GUITARRA 6 PZ','JUGUETE GUITARRA 6 PZ','Caja',1,0,33.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(124,'CARRERAS','JUGUETE CARRO CARRERAS 6 PZ','JUGUETE CARRO CARRERAS 6 PZ','Caja',1,0,34.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(125,'PATOS','JUGUETE PATOS 6 PZ','JUGUETE PATOS 6 PZ','Caja',1,0,36.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(126,'MAMILA','JUGUETE MAMILITA OSO 6 PZ','JUGUETE MAMILITA OSO 6 PZ','Caja',1,0,25.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(127,'SORPRESA','SORPRESA 16 PZ ','SORPRESA 16 PZ ','Caja',1,0,65.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(128,'RIFA','RIFA 30 PZ','RIFA 30 PZ','Caja',1,0,65.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(129,'MALVAVISCO','MALVAVISCO SURTIDO ESTUCHE 50 PZS','MALVAVISCO SURTIDO ESTUCHE 50 PZS. CAJA 16','Caja',16,0,55.00,2,14,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(130,'M SEMAFORO','MECHUDA SEMAFORO 15 PZS.','MECHUDA SEMAFORO 15 PZS.','Caja',1,0,27.50,2,15,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(131,'M ELLOS','MECHUDA ELLOS 20 PZS','MECHUDA ELLOS 20PZS.','Caja',1,0,20.00,2,16,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(132,'M ELLAS','MECHUDA ELLAS  20 PZS','MECHUDA ELLAS 20 PZS.','Caja',1,0,20.00,2,16,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(133,'M CORAZÓN G','MECHUDA CORAZÓN GDE 12 PZS.','MECHUDA CORAZÓN GRANDE 12 PZS.','Caja',1,0,34.00,2,16,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(134,'M CORAZÓN CH','MECHUDA CORAZÓN CH 20 PZS','MECHUDA CORAZÓN CHICO 20 PZS.','Caja',1,0,24.00,2,16,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(135,'M COLORES','MECHUDA COLORES 20 PZS','MECHUDA COLORES 20 PZS.','Caja',1,0,20.00,2,16,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(136,'M DIAMANTE','MECHUDA DIAMANTE 20 PZS','MECHUDA DIAMANTE 20 PZS.','Caja',1,0,21.00,2,16,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(137,'M MEGA','MECHUDA MEGA 20PZS.','MECHUDA MEGA 20 PZS.','Caja',1,0,35.00,2,16,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(138,'M VITRO','MECHUDA VITROLERO 120 PZS.','MECHUDA VITROLERO 120 PZS','Caja',1,0,112.00,2,16,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(139,'HUEVO SAURIO','HUEVO SAURIO ESTUCHE 60 PZS','HUEVO SAURIO ESTUCHE 60 PZS. CAJA 12','Caja',12,0,49.00,2,16,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(140,'OBLEA COMAL','OBLEA COMAL 23 PZS','OBLEA COMAL CAJA 23 PZS','Caja',50,0,22.00,2,17,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(141,'OBLE MINI','OBLEA MINI 12 PZS','OBLEA MINI 12 PZS. CAJA 200 BOLSAS','Caja',200,0,9.50,2,17,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(142,'OBLE MINI EST','OBLEA MINI ESTUCHE 64 PZS','OBLEA MINI ESTUCHE 64 PZS. CAJA 32','Caja',32,0,42.00,2,17,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(143,'OBLEA RECORTE','OBLEA RECORTE 24 PZS','OBLEA RECORTE 24 PZS. BULTO 10 BOLSAS','Caja',10,0,24.00,2,17,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(144,'OBLEA ATUNERA','OBLEA ATUNERA 12 PZS','OBLEA ATUNERA 12 PZS','Caja',1,0,19.00,2,17,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(145,'OBLEA PEPITORIA','PEPITORIA 15 PZS','PEPITORIA 15 PZ','Caja',1,0,28.00,2,17,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(146,'MIEL 240 G','CARAMELO MIEL EXHIBIDOR 240 GRS','CARAMELO MIEL EXHIBIDOR 240 GRS. CAJA 20','Caja',20,0,21.00,2,17,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(147,'MIEL 1K','CARAMELO MIEL 1 K','CARAMELO MIEL 1 K','Caja',1,0,71.00,2,18,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(148,'PALEVASO','PALETA VASO ESTUCHE 60 PZS','PALETA VASO ESTUCHE 60 PZS. CAJA 12','Caja',12,0,65.00,2,18,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(149,'CONCAVA CH','CONCAVA CHICA 25 PZS','CONCAVA CHICA 25 PZS','Caja',1,0,15.00,2,18,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(150,'CONCAVA MED','CONCAVA MEDIANA 25 PZS','CONCAVA MEDIANA 25 PZS','Caja',1,0,25.00,2,18,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(151,'CONCAVA G','CONCAVA GRANDE 25 PZS','CONCAVA GRANDE 25 PZS','Caja',1,0,37.00,2,18,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(152,'CONCABA HELICE','CONCAVA HELICE 10 PZS','CONCAVA HELICE 10 PZS','Caja',1,0,27.00,2,18,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(153,'CONCA LLANTA','CONCAVA LLANTA 25 PZS','CONCAVA LLANTA 25 PZS','Caja',1,0,18.00,2,18,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(154,'CONCAVA SOMBRERO','CONCAVA JUGUETE 12 PZS','CONCAVA CON JUGUETE 12 PZS CAJA 20','Caja',20,0,18.00,2,18,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(155,'CONCACA BEJUCO','CONCAVA BEJUCO','CONCAVA BEJUCO 12 PZ','Caja',1,0,23.00,2,18,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(156,'CHICOTAZO SAB','CHICOTAZO SABORES 50 PZS','CHICOTAZO SABORES 50 PZS. CAJA 50 BOLSAS','Caja',50,0,29.00,2,18,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(157,'CHICOTAZO CHILE','CHICOTAZO CHILE 50 PZS','CHICOTAZO CHILE 50 PZS. CAJA 50 BOLSAS','Caja',50,0,29.00,2,19,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(158,'POPOTE ANILLO','POPO ANILLO 10 PZ ','POPO ANILLO 10 PZ ','Caja',1,0,32.00,2,19,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(159,'POPOTE PULSERA','POPO PULCERA 10 PZ ','POPO PULCERA 10 PZ ','Caja',1,0,32.00,2,19,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(160,'POPOTIX','POPOTIX 50 PZS','POPOTIX 50 PZS. CAJA 40 BOLSAS','Caja',40,0,29.00,2,19,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(161,'BANDERILLA COMB VITRO 100','BANDERILLA COMBINADA VITRO 100 PZS','BANDERILLA COMBINADA ESTUCHE 100 PZS. CAJA 12','Caja',12,0,65.00,2,19,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(162,'BANDERILLA VITRO G CHILE','BANDERILLA GDE 50 PZ CHILE VITRO ','BANDERILLA VITRO GDE 50 PZ CHILE CAJA 12','Caja',12,0,45.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(163,'BANDERILLA VITRO G TAJIN','BANDERILLA GDE 50 PZ TAJIN VITRO ','BANDERILLA VITRO GDE 50 PZ TAJIN CAJA 12','Caja',12,0,45.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(164,'BANDERILLA VITRO G AZUCAR','BANDERILLA GDE 50 PZ AZUCAR VITRO ','BANDERILLA VITRO GDE 50 PZ AZUCAR CAJA 12','Caja',12,0,45.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(165,'BANDERILLA VITRO G MORA','BANDERILLA GDE 50 PZ MORA AZUL VITRO ','BANDERILLA VITRO GDE 50 PZ MORA AZUL CAJA 12','Caja',12,0,45.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(166,'BAND VITRO CHICA CHILE','BANDERILLA VITRO CHICA 50 PZ CHILE ','BANDERILLA VITRO CHICA 50 PZ CHILE CAJA 22','Caja',22,0,33.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(167,'BAND VITRO CHICA TAJIN','BANDERILLA VITRO CHICA 50 PZ TAJIN ','BANDERILLA VITRO CHICA 50 PZ TAJIN CAJA 22','Caja',22,0,33.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(168,'BAND VITRO CHICA AZUCAR','BANDERILLA VITRO CHICA 50 PZ AZUCAR ','BANDERILLA VITRO CHICA 50 PZ AZUCAR CAJA 22','Caja',22,0,33.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(169,'BAND VITRO CHICA MORA','BANDERILLA VITRO CHICA 50 PZ MORA AZUL','BANDERILLA VITROCHICA 50 PZ MORA AZUL CAJA 22','Caja',22,0,33.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(170,'BANDERILLA CHILE BOLSA','BANDERILLA GDE CHILE 25 PZS BOLSA','BANDERILLA GRANDE CHILE 25 PZS. CAJA 40 BOLSAS','Caja',40,0,24.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(171,'BANDERILLA TAJIN BOLSA','BANDERILLA GDE TAJIN 25 PZS BOLSA','BANDERILLA GRANDE TAJIN 25 PZS. CAJA 40 BOLSAS','Caja',40,0,24.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(172,'BANDERILLA AZUCAR BOLSA','BANDERILLA GDE AZUCAR 25 PZS BOLSA','BANDERILLA GRANDE AZUCAR 25 PZS. CAJA 40 BOLSAS','Caja',40,0,24.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(173,'BANDERILLA MORA BOLSA','BANDERILLA GDE MORA AZUL 25 PZS BOLSA','BANDERILLA GRANDE AZUL 25 PZS. CAJA 40 BOLSAS','Caja',40,0,24.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(174,'TARUGO DOMO CHILE','TARUGO DOMO CHILE 25 PZ.','TARUGO DOMO 25 PZ. CAJA 20 DOMOS','Caja',20,0,25.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(175,'TARUGO DOMO TAJIN','TARUGO DOMO TAJIN 25 PZ.','TARUGO DOMO 25 PZ. CAJA 20 DOMOS','Caja',20,0,25.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(176,'TARUGO DOMO AZUCAR','TARUGO DOMO AZUCAR 25 PZ.','TARUGO DOMO 25 PZ. CAJA 20 DOMOS','Caja',20,0,25.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(177,'TARUGO DOMO MORA','TARUGO DOMO MORA 25 PZ.','TARUGO DOMO 25 PZ. CAJA 20 DOMOS','Caja',20,0,25.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:23','2024-04-16 15:38:23'),
(178,'MARUCHAN','MARUCHAN TAMARINDO ESTUCHE 50 PZS','MARUCHAN TAMARINDO ESTUCHE 50 PZS. CAJA 16','Caja',16,0,81.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:24','2024-04-16 15:38:24'),
(179,'TARUGO EST COMBINADO','TARUGO ESTUCHE COMBINADO 60 PZ','TARUGO ESTUCHE COMBINADO 60 PZ CAJA 20 ','Caja',20,0,56.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:24','2024-04-16 15:38:24'),
(180,'TAMALINDO','TAMALINDO 20 PZ','TAMALINDO 20 PZ','Caja',1,0,25.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:24','2024-04-16 15:38:24'),
(181,'PULPA','PULPA DE TAMARINDO 20 PZ','PULPA DE TAMARINDO 20 PZ','Caja',1,0,35.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:24','2024-04-16 15:38:24'),
(182,'CUCHARA','CUCHARA TAMARINDO PEPIN 20 PZ','CUCHARA TAMARINDO PEPIN 20 PZ','Caja',1,0,21.00,2,20,'fotoProducto.jpg',1,'2024-04-16 15:38:24','2024-04-16 15:38:24');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(9,1),
(10,1),
(11,1),
(12,1),
(13,1),
(14,1),
(15,1),
(16,1),
(17,1),
(18,1),
(19,1),
(20,1),
(21,1),
(22,1),
(23,1),
(24,1),
(25,1),
(26,1),
(27,1),
(28,1),
(29,1),
(30,1),
(31,1),
(32,1),
(33,1),
(34,1),
(35,1),
(36,1),
(37,1),
(38,1),
(39,1),
(40,1),
(41,1),
(42,1),
(33,2),
(34,2),
(35,2),
(36,2);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'Administrador','web','2024-04-16 14:36:25','2024-04-16 14:36:25'),
(2,'Cliente','web','2024-04-16 14:36:25','2024-04-16 14:36:25');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `tipo_usuario` int NOT NULL,
  `id_identificacion` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`two_factor_confirmed_at`,`tipo_usuario`,`id_identificacion`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Administrador Frefrigel','admin','admin@gmail.com',NULL,'$2y$12$guss4Bx23ljejLX4SjPDguazdIGABjoVGo0hMEHL6gLNuqParEiSG',NULL,NULL,NULL,1,1,NULL,'2024-04-16 14:36:27','2024-04-16 14:36:27'),
(2,'Cliente Frefrigel',NULL,'cliente@gmail.com',NULL,'$2y$12$35gwHipiGV6PhSXFHEWUJO7CGV8.cBSy64aq4Z1WLARpBbZLi5u8G',NULL,NULL,NULL,2,1,NULL,'2024-04-16 14:36:28','2024-04-16 14:36:28'),
(3,'Marilu Sanchez',NULL,'marilu@gmail.com',NULL,'$2y$12$yknuOgYlj6MUy7F2ANamDuLrq5nJcP3BgOVIpnaiZEcN8zI6Ca26W',NULL,NULL,NULL,2,2,NULL,'2024-04-16 16:30:03','2024-04-16 16:30:03');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `proceso` int NOT NULL,
  `id_encargado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `id_cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `fecha_entrega` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0000-00-00',
  `total_venta` double DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ventas` */

insert  into `ventas`(`id`,`proceso`,`id_encargado`,`id_cliente`,`fecha_entrega`,`total_venta`,`created_at`,`updated_at`) values 
(1,2,'0','1','2024-04-17',570,'2024-04-16 16:13:51','2024-04-16 16:13:51'),
(2,2,'0','2','2024-04-17',1120,'2024-04-16 16:32:25','2024-04-16 16:32:25'),
(3,2,'0','1','2024-04-17',419.5,'2024-04-16 16:41:45','2024-04-16 16:41:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
