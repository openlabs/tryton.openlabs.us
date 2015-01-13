Nueva versión 3.0 de tryton
#######################################################################################

:lang: es
:slug: nueva-version-30-de-tryton
:date: 2013/10/21 18:00:00
:tags: release
:link:
:description:


Nos complace anunciar la salida de la nueva versión 3.0 de `Tryton
<http://www.tryton.org/>`_.

está versión trae la nueva vista de calendario en la interfície gráfica y el
resultado de una larga refactorización de código que empezó hace 2 años con el
proyecto `python-sql`. Como es habitual, también se han realizado correcciones
de errores, mejoras y nuevos módulos (a continuación se dan más detalles).

`Por supuesto, la migración desde las versiones anteriores está completamente
soportada.`

Cambios importantes en la interfaz de usuario
---------------------------------------------

* La vista de calendario ya está disponible. Permite mostrar los registros en
  un calendario utilizando fecha inicio y/o fin de campos fecha/fecha y hora.
  También soporta arrastrar y soltar eventos y la edición de los mismos con
  el doble clic. está vista esta optimizada para obtener solo los registros de
  los eventos que se muestran.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_calendar_production.png
        :alt: calendario de producción

* El `esquema de URL <http://doc.tryton.org/3.0/tryton/doc/usage.html#url>`_,
  introducido en la versión 2.0, ahora es accessible en la parte inferior de
  todas las pestañas. Esta URL permite abrir la misma pestaña en cualquier
  otro cliente.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_url.png
        :alt: url

* Se han eliminado las solicitudes. Se sugiere utilizar emails con URL para su
  sustitución.

* Los registros seleccionados en la vista de lista se guardan entre sesiones.

Cambios mayores en el servidor
------------------------------

* El servidor ahora utiliza `python-sql <http://code.google.com/p/python-sql/>`_
  para generar las consultas `SQL <http://en.wikipedia.org/wiki/SQL>`_. Este
  cambio permite una mejor compatibilidad con los diferentes `Motores de Bases
  de datos <http://en.wikipedia.org/wiki/DBMS>`_ soportados actualmente (y
  también con los que se soporten en el futuro).

* El método `searcher
  <http://doc.tryton.org/3.0/trytond/doc/ref/models/fields.html#trytond.model.fields.Function.searcher>`_
  puede devolver un dominio completo (en lugar de uno limitado solo a clásuslas
  `AND`).

* El antiguo atributo `order_field
  <http://doc.tryton.org/2.8/trytond/doc/ref/models/fields.html#trytond.model.fields.Field.order_field>`_
  se remplaza por el método `order_<field name>
  <http://doc.tryton.org/3.0/trytond/doc/ref/models/fields.html#ordering>`_
  para ser más modular.

* El motor de base de datos se puede cargar dinámicamente, cosa que permite
  utilizar uno definido en un paquete externo al servidor de tryton.

* El rendimiento del almacenamiento `MPTT <http://en.wikipedia.org/wiki/MPTT>`_
  se ha mejora eliminando el orden por defecto y reduciendo el número de
  consultas.

* Un nuevo atributo `grouped` se puede añadir al tag `data`. Esto permite
  crear todos los registros de un mismo modelo a la vez. Esto mejora el tiempo
  de instalación de módulos con una gran cantidad de información.

* Se puede definir un orden por defecto en las acciones de ventana.

Módulos
-------

* Muchos módulos se han adaptado al nuevo diseño de relacionar documentos
  generados con su origen. En vez de copiar el código de origen como referencia
  se utiliza un campo Reference. La mayoría de las veces el enlace se encuentra
  a nivel de línea. Esto proporciona una mejor visión de los enlaces entre
  documentos sin perder la información cuando se mezclan documentos.

Account
~~~~~~~

* Se ha creado un nuevo asistente para facilitar al creación de asiento de
  regularización al final del período fiscal.
* Todas las cuentas de un plan contable deben pertencer a la misma empresa. Esta
  validación mejora radicalmente el rendimiento del cálculo del debe/haber.
* Cualquier asiento confirmado con algún apunte con importe cero se concilia
  automáticamente si la cuenta está marcada como a conciliar. Con esta
  funcionalidad, las facturas con importe cero se marcan automáticamente cómo
  pagadas.
* La opción de contrapartida centralizada en el diario se ha eliminado.

Account Invoice
~~~~~~~~~~~~~~~

* Cuando una factura se confirma, se utiliza el asiento contable para mostrar
  los importes en vez de calcularlo a partir de las líneas. Esto mejora el
  rendimiento, especialmente para las facturas con muchas líneas.

Account Statement
~~~~~~~~~~~~~~~~~

* Ahora es posible vincular una factura con una línea de extracto. Esto llenará
  automàticamente el tercero y la cuenta.

Stock
~~~~~

* Es posible consultar la cantidad en estoc con cualquier tipo de parámetros
  de agrupación. Por ejemplo, se puede utilizar para calcular la cantidad en
  estoc por lote, en vez de por producto.
* El código de los inventarios se ha refactorizado para facilitar su
  personalización y también la validación de unicidad de las líneas de
  inventario.
* La cache del período se puede adaptar para guardar diferentes tipos de
  agrupaciones de cantidad.

Stock Lot
~~~~~~~~~

* Se han añadido los campos cantidad y cantidad estimada en los lotes.
* Ahora es posible crear inventarios con lote.
* La cache del período también guarda las cantidades por lote.

Stock Supply
~~~~~~~~~~~~

* Se ha añadido un nuevo asistente para crear automáticamente movimientos
  internos.
* Si hay movimientos tardíos de proveedor cuando se crean las solicitudes de
  compra, el asistente muestra un aviso para que el usuario pueda modificar la
  fecha de estos movimientos a un futuro si es necesario. Si no estos
  movimientos de entrada serán ignorados.

Nuevos módulos
--------------

* El módulo `Bank` define el concepto de banco y cuenta bancaria.
* El módulo `Account Dunning` permite gestionar reclamaciones siguiendo un
  procedimiento con diferentes niveles.
* El módulo `Account Dunning Letter` añade la generación de cartas cuando se
  procesan reclamaciones.
* El módulo `Sale Invoice Grouping` añade la opción de definir cómo se agruparán
  las líneas de venta al generar las líneas de factura.
