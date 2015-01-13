Nueva versión 3.2 de tryton
#######################################################################################

:lang: es
:slug: nueva-version-32-de-tryton
:date: 2014/04/21 20:00:00
:tags: release
:link:
:description:


Nos complace anunciar el lanzamiento de la nueva versión 3.2 de `Tryton
<http://www.tryton.org/>`_.

Esta versión consolida nuevas funcionalidades añadidas en los últimos dos años.
Además, se preperara la futura migración a Python 3, eliminando el soporte para
Python 2.6. Como es habitual, también se han realizado correcciones
de errores, mejoras y nuevos módulos (a continuación se dan más detalles).

`Por supuesto, la migración desde las versiones anteriores está completamente
soportada.`

Cambios importantes en la interfaz de usuario
---------------------------------------------

* El cliente utiliza la zona horaria local para mostrar los campos de fecha y
  hora.

* Se ha mejorado el pegado en listas editables para añadir nuevas líneas si es
  necesario aparte de actualizar los registros ya existentes.

* Los botones de la vista también se muestran en el menú de acciones. Esto
  permite un acceso mas rápido utilizando los atajos del teclado y también
  ejecutar el botón para el conjunto de registros seleccionados.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_button_action_menu.png
        :alt: button action menu

* Los botones y los assitents ahora pueden ejecutar acciones de cliente. Esto
  quiere decir que se comporta como si el usuario hubiese clicado en alguno de
  los botones de la barra de herramientas.

* El cliente utiliza ahora un conjunto de conexiones. Esto permite mejorar la
  velocidad en peticiones que se pueden hacer en paralelo.

* Se puede soltar un fichero en el botón de adjuntos para crear de forma rápida
  adjuntos.

* Se ha introducido un nuevo widget `multi-selección`, que utiliza un campo
  `Many2Many` para guardar la información. Es muy útil y más visual cuando hay
  un pequeño número de selecciones posibles.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_multiselection.png
        :alt: multiselection

* El cliente permite navegar por las versiones de un registro del que se guarda
  la historia. También funciona en una lista de registros, en este caso el
  cliente muestra el resultado de la búsqueda cómo si se hubiera hecho en la
  fecha de la revisón.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_revisions.png
        :alt: revisions

Cambios mayores en el servidor
------------------------------

* El servidor siempre utiliza internamente la zona horaria UTC.

* El método `ModelStorage.write` recibe mejoras similares a las que recibió el
  método `ModelStorage.create` en la versión 2.8. Esto quiere decir que se
  puede escribir distintos valores en varios conjuntos de registros en una sola
  llamada y que esto mejora el rendimiento validando todos los registros de una
  vez. Además, sólo se validarán los campos modificados y sus dependencias. Las
  acciones de los campos relacionados se han actualizado con la misma
  interfaz.

* Se ha añadido un nuevo decorador `fields.depends` para reemplazar los
  atributos obsoletos `on_change`, `on_change_with`, `selection_change_with` y
  `autocomplete`. Este decorador se aplica en los métodos a llamar y el
  resultado será la suma de todos los depends de todos los módulos. Esto mejora
  la modularidad y aporta más flexiblidad.

* Tryton utiliza la librería bcrypt para emascarar las contraseñas si encuentra
  disponible.

* Todos los tipos de campo pueden tener un restricción de dominio en su valor.
  La mayoría de dominios están soportados para la pre-validación y la inversión
  en la parte del cliente.

* El valor devuelto por un on_change de un campo `One2Many` ahora utiliza un
  índice para la clave ``add``. Esto permite especificar la posición del nuevo
  registro que se va añadir en lugar de añadirlo siempre al final.

* Se ha añadido un nuevo método `ModelSQL.restore_history` que permite
  restaurar los valores de un registro tal como estaban en un fecha y hora
  determinada.

Módulos
-------

Account
~~~~~~~

* Se ha creado un nuevo tipo de diario `Desajuste` para facilitar la creación
  de movimientos de ajuste.
* Los impuestos ahora tienen una fecha inicial y fecha final opcionales, que
  permiten gestionar los cambios a través del tiempo.

French Chart of Account
~~~~~~~~~~~~~~~~~~~~~~~

* El plan contable Francés se ha actualizado con los nuevos impuestos para el
  año 2014.

Account Statement
~~~~~~~~~~~~~~~~~

* El módulo evita que se utilize una factura que ya ha sido pagada en los
  extractos en borrador.
* Utiliza el nuevo índice de la función `on_change` para añadir las nuevas
  líneas seperadas debajo de la línea original.

Account Stock Continental
~~~~~~~~~~~~~~~~~~~~~~~~~

* Se ha mejorado la velocidad de creación de asientos para los movimientos de
  stock/existencias.

Bank
~~~~

* Los números IBAN ahora son validados y formateados.

Company
~~~~~~~

* Se ha añadido un nuevo campo de zona horaria en la Empresa para obtener
  correctamente la fecha de hoy.
* El empleado se lee del contexto, tal como se hace con la empresa. Esto
  permite utilizar más de un cliente con el mismo usuario pero empleados
  distintos.

Production
~~~~~~~~~~

* Ahora es posible definir la fecha efectiva de una producción. Esto permite
  añadir producciones en el pasado.

Purchase
~~~~~~~~

* Ahora se muestra un aviso al intentar recibir un movimiento de stock de
  proveedor sin origen. Normalmente, el origen debe ser una orden de compra.
* Las compras intentan establecer un enlace entre los movimientos de stock
  y las líneas de factura.

Sale
~~~~

* El mismo aviso existe para los movimientos de cliente sin origen.
* Las ventas intentan, como las compras, establecer un enlace entre los
  movimientos de existencias y las líneas de factura.

Stock
~~~~~

* Los albaranes de devolución de proveedor pueden tener asignación parcial.
* Se ha mejorado el cálculo de las cantidades en stock para facilitar la
  personalización y se ha mejorado la búsqueda.
* Ahora es posible definir la fecha efectiva de los albaranes. Esto permite
  añadir albaranes en el pasado.

Stock Lot
~~~~~~~~~

* Se añadido una acción para mostrar los movimientos de stock de un lote.

Nuevos módulos
--------------

* El módulo `Party Relationship` define distintos tipos de relaciones entre
  terceros.
* El módulo `Account Payment` permite generar grupos de pagos para los apuntes
  de las cuentas a pagar y a cobrar.
* El módulo `Account Payment SEPA` permite generar ficheros SEPA para los
  pagos.
* El módulo `Stock Package` permite alamacenar la información de los paquetes
  utilizados en los alabaranes de cliente y de devolución a proveedor.
* El módulo `Sale Shipment Grouping` añade la opción para definir como se van
  a agrupar los movimientos de stock/existencias generados por las ventas.
* El módulo `Account Credit Limit` gestiona los límites de crédito por tercero.
* El módulo `Sale Credit Limit` añade las ventas confirmadas al límite de
  crédito del tercero.
