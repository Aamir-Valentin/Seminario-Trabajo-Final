# 🏢 Atentos CRM - Sistema de Gestión de Clientes y Proyectos

![Estado del Proyecto](https://img.shields.io/badge/Estado-En_Desarrollo-yellow)
![Versión](https://img.shields.io/badge/Versión-0.1.0-blue)

**Atentos CRM** es una solución interna desarrollada por **Atentos S.A.C.**, empresa española de desarrollo de software. Este sistema centraliza la administración de personal, el seguimiento de clientes corporativos y el control de los proyectos tecnológicos en desarrollo, optimizando los procesos operativos internos de la organización.

## ✨ Características Principales (Features)

El sistema cuenta con un esquema simplificado orientado a la agilidad operativa y la gestión rápida de información:

* **Gestión de Clientes:** Módulo para la creación, edición, eliminación y consulta de las empresas clientes con las que se mantienen acuerdos comerciales.
* **Gestión de Usuarios:** Control e identificación del personal interno de Atentos S.A.C. que tiene acceso al sistema.
* **Gestión de Proyectos:** Panel informativo para visualizar el estado, detalles y características de los sistemas de software en desarrollo para cada cliente.
* **Modelo Relacional Ligero:** Estructura de tres entidades principales (*Usuarios*, *Clientes*, *Proyectos*) diseñada para un despliegue y mantenimiento eficiente.

## 🛠️ Stack Tecnológico

El proyecto está construido bajo una arquitectura web tradicional cliente-servidor:

* **Frontend:** HTML5 + CSS3 (Estructuración y diseño de interfaces).
* **Backend:** PHP (Lógica de servidor y procesamiento de datos).
* **Base de Datos:** MySQL (Almacenamiento relacional de datos).

## 🚀 Requisitos Previos

Antes de ejecutar este proyecto de forma local, asegúrate de contar con un entorno de servidor web local configurado:

* Servidor Web Local ([XAMPP](https://www.apachefriends.org/), Laragon o WAMP)
* [PHP](https://www.php.net/) (v7.4 o superior)
* [MySQL](https://www.mysql.com/) / MariaDB
* [Git](https://git-scm.com/)

## 👥 Perfiles de Usuario

Dado que el sistema se encuentra en su fase inicial de construcción y enfocado en un producto mínimo viable (MVP), no se han parametrizado roles complejos de permisos.

| Perfil | Descripción | Principales responsabilidades |
|---|---|---|
| **Usuario General (En construcción)** | Personal interno de Atentos S.A.C. | Acceso general a los módulos de registro de usuarios, edición de clientes y visualización de proyectos. |

> Los permisos específicos, niveles de acceso y roles definidos (ej. Administrador, Gestor de Proyectos) serán integrados en versiones posteriores conforme evolucione el desarrollo.

## ⚙️ Instalación y Configuración Local

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/Aamir-Valentin/Seminario-Trabajo-Final.git](https://github.com/Aamir-Valentin/Seminario-Trabajo-Final.git)
   cd Seminario-Trabajo-Final
