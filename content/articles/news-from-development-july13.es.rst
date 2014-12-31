Novedades de desarrollo Juliol13
#######################################################################################

:lang: es
:slug: novedades-de-desarrollo-juliol13
:date: 08/07/2013 12:00:00
:tags: development
:link:
:description:

A continuación puede encontrar algunos cambios que se han introducido en la rama de
desarrollo de Tryton y que estarán disponibles para la próxima versión.

Servidor
--------

* Factor para los campos de números. Este factor se utiliza para la conversión
  entre el valor que se muestra y el valor interno. Básicamente se utiliza para
  mostrar los porcentajes como *10%* aunque internamente se guarde
  *0.1*.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_factor.png
        :alt: factor

* Se han eliminado las solicitudes. En vez de las solicitudes, el servidor
  envía correos electrónicos para notificar a los usuarios y los usuarios pueden
  utilizar los mismos para comunicarse entre ellos y gracias a la URL de
  Tryton se puede hacer referencia a registros específicos. Este hecho permite reducir
  la carga del servidor, ya que los clientes preguntaban por nuevas
  solicitudes cada 5 minutos.

Cliente
-------

* Se ha añadido un nuevo tipo de vista: ``calendario``. Permite mostrar los registros
  en un calendario usando una fecha de inicio y (opcionalmente) una fecha final.
  Está basada en el widget `GooCalendar <http://code.google.com/p/goocalendar/>`_.
  Permite arrastrar y soltar los eventos, editarlos haciendo doble clic y sólo
  busca los eventos que se deben mostrar.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_calendar_production.png
        :alt: production calendar

* Desde la versión 2.0, Tryton dispone de un `Esquema de URL
  <http://doc.tryton.org/2.8/tryton/doc/usage.html#url>`_ que el cliente puede
  leer. De todas formas, antes no había una forma fácil de obtener la URL
  de un recurso. A partir de ahora se muestra la URL en la parte inferior de cada
  pestaña que contiene la URL que se puede utilizar en cualquier cliente.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_url.png
        :alt: url

Módulos
-------

Account
~~~~~~~

* Ahora un apunte confirmado con importe cero se concilia automáticamente si tiene
  una cuenta para conciliar. Con esta funcionalidad, las facturas con importe
  0 se marcan automáticamente como pagadas.
* Una herencia de OpenERP, la opción de contrapartida centralizada en los diarios, se ha
  eliminado después de una encuesta que ha puesto en evidencia que nadie lo usaba.

Account Invoice
~~~~~~~~~~~~~~~

* Cuando la factura ya está confirmada utiliza el apunte contable para mostrar
  los importes en vez de calcularlo desde las líneas. Esto mejora una
  poco el rendimiento, especialmente para facturas con muchas líneas.

Account Statement
~~~~~~~~~~~~~~~~~

* Ahora es posible informar directamente de una factura en una línea de extracto. Con
  esta funcionalidad se rellena automáticamente el tercero y la cuenta.

Stock
~~~~~

* Ahora es posible hacer una consulta sobre la cantidad de stock con cualquier
  tipo de parámetros de agrupación. Por ejemplo, se puede hacer servir para calcular
  la cantidad de un lote en vez de un producto.
* Se ha refactoritzado el código del inventario para que sea más fácil de
  personalizar la creación de movimientos y también la regla de que las líneas
  de inventario deben ser únicas.
* La cache de periodos se puede adaptar para hacer cache de diferentes formas de
  cantidades agrupadas.

Stock Lot
~~~~~~~~~

* Ahora es posible crear inventarios con lote.
* La cache de periodo también guarda las cantidades por lote.

Stock Supply
~~~~~~~~~~~~

* Si hay movimientos de envío tardío cuando se crean las órdenes de compra,
  el asistente muestra un aviso al usuario para que cambie las fechas de estos
  movimientos en una fecha a futuro si es necesario. Si no se hace, las líneas
  de entrada se ignorarán.
