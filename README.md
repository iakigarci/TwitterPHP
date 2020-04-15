# TwitterES
Proyecto individual realizado para la asignatura de "Servicios y Aplicaciones en Red". Proyecto de libre elección, con el objetivo de utilizar los sistemas web.

## Introduccion
En este caso se trata de un **sistema web** basado en la red social de Twitter. Se han replicado las funciones básicas, pero no se han implementado las funciones avanzadas. 

[imagen]: https://github.com/iakigarci/TwitterES/blob/master/Twitter.PNG "Ejemplo de ejecución"
![alt text][imagen]

El sistema no tiene las funcionalidades de seguir a diferentes usuarios ni las funciones de RT/Me Gusta. Aún así, el sistema es extensible a estas funcionalidades ya que las BD si que disponen de esas opciones. Además, el código del _backend_ es modular, por consiguiente no es dificil añadir extras. Por lo cual, el sistema muestro todos los _tweet_ que se han publicado 3 días atrás. Para terminar, dispone de la API de Twitter que proporciona los hastgs más importantes en tiempo real. 

## Herramientas
Se han utilizado diferentes herramientas y tecnologías:

1. _Backend_: **PHP**, además de la API de Twitter.
2. _Frontend_: **HTML**, **JS** (uso de AJAX, BD y XML) y **CSS** (Bootstrap). 

## Instalación
Es necesario alojar el sistema en un servidor. En mi caso he utilizado XAMPP, por lo que he utilizado _phpmyadmin_ y _Apache_.
