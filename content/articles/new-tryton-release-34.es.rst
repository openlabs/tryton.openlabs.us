Nueva versión 3.4 de Tryton
#######################################################################################

:lang: es
:slug: nueva-version-34-de-tryton
:date: 2014-10-20 18:00:00 UTC
:tags: release
:link: 
:description: 
:type: text

Estamos contentos de anunciar la publicación de la versión 3.4 de 
`Tryton <http://www.tryton.org/>`_.

Además de las mejoras habituales de las funcionalidades existentes para
usuarios y desarrolladores, esta versión muestra los resultados del trabajo
exhaustivo realizado en el área de contabilidad.

`Como siempre, la migración de las versiones anteriores está totalmente
soportada a excepción del módulo ldap_connection que ha sido eliminado.`

Principales cambios en la interfaz de usuario
---------------------------------------------

* La búsqueda de registros relacionados ha sido rediseñada para aprovechar las
  ventajas del autocompletado automático. En esta versión, la ventana emergente
  mantiene el texto introducido en la búsqueda.

* Ahora el botón de `Abrir/Buscar registro` de los registros relacionados se
  sitúa dentro de la caja de texto, y el botón `Crear un nuevo registro` ha
  sido sustituido por las acciones de autocompletado o por el botón de la
  ventana emergente. Este cambio permite armonizar las dimensiones de los
  campos en los formularios.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_many2one_button_inside.png
        :alt: botones interiores campo many2one

* Ahora se pueden mostrar imágenes en la vista de listado/árbol.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_widget_image_tree.png
        :alt: campo imagen dentro listados

* Se pueden realizar prevalidaciones de campos antes de ejecutar acciones de
  botón. Las validaciones resaltan los campos erróneos en vez de informar del
  error en una ventana emergente.

* Se incrementan las posibilidades de la exportación de datos incorporando la
  etiqueta de campos selección y el valor interno (ID) del registro (`CSV
  <https://en.wikipedia.org/wiki/Comma-separated_values>`_).

* Exportar la información que se está consultando es ahora más fácil y rápido,
  ya que la ventana de exportación se predefine con los campos que se
  visualizan.

* Los campos predefinidos de exportación ahora se pueden sustituir directamente
  por una nueva selección de campos. Una mejora pensada para facilitar la
  creación de plantillas de exportación.

* Ahora podemos ordenar fácilmente la lista de campos a exportar seleccionando
  y arrastrando los elementos.

* Los rangos de búsqueda ahora incluyen por defecto ambos extremos. Este
  comportamiento es menos extraño para los usuarios aunque el comportamiento
  anterior de incluir - no incluir los extremos tuviera algunas ventajas
  prácticas.

* En esta versión el cliente también carga los 'plug-ins' definidos en el
  directorio local del usuario. (`~/.config/tryton/x.y/plugins`).

Principales cambios en el servidor
----------------------------------

* Se introduce la clase `Mixin <https://en.wikipedia.org/wiki/Mixin>`_
  `MatchMixin` que permite implementar un patrón común de búsqueda de registros
  a partir de ciertos valores.

* También se añade la clase `UnionMixin` que permite definir un `ModelSQL` que
  es la `UNION <http://en.wikipedia.org/wiki/Union_(SQL)#UNION_operator>`_ de
  varios `ModelSQL`.

* En la versión anterior, Tryton no actualizaba los registros de configuración
  definidos mediante un fichero `XML` si se modificaban fuera del fichero. En
  la nueva versión es posible encontrar estos registros y forzar su
  actualización para sincronizarlos con el archivo `XML`.

* Se ha añadido un
  `Descriptor de Python <https://docs.python.org/2/howto/descriptor.html>`_ a
  los campos Selection. Permite definir qué atributo de un modelo contiene la
  etiqueta de la selección de un registro. Está previsto actualizar todos los
  informes para que utilicen este descriptor en lugar de valores fijos.

* Se ha introducido un nuevo formato para el fichero de configuración del
  servidor. Este formato puede extenderse fácilmente para ser usado por los
  módulos. Este fichero utiliza el `formato de configuración de registros de
  Python
  <https://docs.python.org/2/library/logging.config.html#configuration-file-format>`_.

* El contexto definido en los campos relacionados ahora se utiliza para
  instanciar el destino.

* La consulta SQL utilizada por el dominio de un campo ahora puede ser
  personalizada utilizando el método `domain_<field>`. Este método está
  diseñado para soportar JOINs y permite definir consultar SQL más eficientes
  en algunos casos.

* Las reglas de acceso se han mejorado para que sólo estén activadas en las
  llamadas `RPC <https://en.wikipedia.org/wiki/Remote_procedure_call>`_. Con
  este diseño, Tryton sigue el principio de validar los datos en los extremos
  de la aplicación. De modo que ya no es necesario cambiar al usuario root
  cuando se necesitan permisos de usuario más específicos a no ser que estemos
  dentro de una llamada RPC.

Módulos
-------

Account
~~~~~~~

* Se ha añadido un nuevo asistente para conciliar apuntes contables. El
  programa busca para cada cuenta contable y tercero proponiendo apuntes para
  conciliar. Una funcionalidad que permite aumentar notablemente la velocidad
  del proceso de conciliación.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_reconcile_wizard.png
        :alt: asistente para conciliar

* También se ha añadido un nuevo asistente para facilitar la creación de
  asientos de cancelación que concilia automáticamente el apunte con la
  contrapartida de cancelación.

* Se ha añadido la opción de 'Tercero requerido' en las cuentas contables. Esta
  opción obliga introducir el tercero en los apuntes de las cuentas marcadas y
  prohíbe introducirlo en las otras.

Account Invoice
~~~~~~~~~~~~~~~

* Ahora es posible configurar el redondeo de impuestos tanto a nivel de línea
  de factura como a nivel global de factura. Por defecto es a nivel global de
  factura.

Account Payment
~~~~~~~~~~~~~~~

* Se ha incorporado la posibilidad de modificar el estado de los pagos
  'Con éxito' a 'Fallado'.

Account Payment SEPA
~~~~~~~~~~~~~~~~~~~~

* Se habilitado el esquema `de empresa a empresa` para domiciliaciones
  bancarias.

* Ahora los mandatos reciben una identificación única a partir de la secuencia
  configurada.

* Se ha adaptado el módulo para las notificaciones de débito/crédito de banco a
  cliente (CAMT.054).

* Se ha añadido un informe para imprimir un formulario estándar para los
  mandatos.

Account Statement
~~~~~~~~~~~~~~~~~

* Ahora podemos ordenar las líneas de extracto y numerarlas. Una mejora que
  permite reproducir de forma fiel los extractos bancarios.

* Se ha añadido un informe de extracto que permite, por ejemplo, repasar los
  extractos de depósito de cheques.

* En esta versión se puede definir el método de validación en el diario de
  extracto. Los métodos disponibles son: `Balance`,` Importe` y `Número de
  líneas`. Esto permite utilizar los extractos para distintos propósitos tales
  como la conciliación bancaria o el control de depósito de cheques.

Account Stock Continental/Anglo-Saxon
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* Ahora el método se define por ejercicio fiscal en vez de activarse a nivel
  global en la instalación del módulo.

Country
~~~~~~~

* La nueva versión permite almacenar códigos postales por país. Se proporciona
  un script para descargar códigos postales desde `GeoNames
  <http://www.geonames.org/>`_.

LDAP Authentication
~~~~~~~~~~~~~~~~~~~

* El módulo `ldap_connection` ha sido sustituido por una entrada en el fichero
  de configuración de `trytond`.

Party
~~~~~

* La nueva funcionalidad de códigos postales del módulo 'Country' se utiliza
  para el autocompletado de los campos ciudad y código postal de las
  direcciones.

Purchase
~~~~~~~~

* El estado `Confirmado` se ha dividido en dos estados `Confirmado` y
  `En proceso`, para hacerlo similar al proceso de ventas.

Sale Supply Drop Shipment
~~~~~~~~~~~~~~~~~~~~~~~~~

* La gestión de las excepciones de los envíos directos de proveedor a cliente
  se propagan desde la venta hasta la compra.


Nuevos módulos
--------------

* El nuevo módulo `Account Payment Clearing` permite generar asientos de
  liquidación entre las cuentas a cobrar o a pagar y la cuenta de liquidación
  cuando un pago ha tenido éxito. La cuenta de liquidación se concilia
  posteriormente con los extractos.

Proteus
-------

Proteus es una librería Python para acceder a Tryton como si fuera un cliente.

* Ahora permite ejecutar informes. Es útil para testearlos.

* Se ha añadido un nuevo método de duplicado de registros que es similar al
  menú de copiar del cliente.
