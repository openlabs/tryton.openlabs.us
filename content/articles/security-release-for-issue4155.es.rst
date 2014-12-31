Publicación seguridad para issue4155
#######################################################################################

:lang: es
:slug: publicacion-seguridad-para-issue4155
:date: 2014-09-30 10:00:00 UTC
:tags: release,security
:link: 
:description: 
:type: text

Sinopsis
--------

Una vulnerabilidad en `trytond <http://pypi.python.org/pypi/trytond>`_ ha sido
encontrada por `duesenfranz <https://bugs.tryton.org/user497>`_, que podría
permitir a un usuario malicioso ejecutar código arbitrario en el servidor a
través de la función `safe_eval` (ver
`issue4155 <https://bugs.tryton.org/issue4155>`_).

Impacto
-------

Cualquier usuario autenticado puede ejecutar comandos arbitrarios en el
servidor con los permisos del usuario `trytond`.

Alternativa
-----------

No existe ninguna alternativa.

Resolución
----------

Todos los usuarios deben actualizar `trytond` a la última versión de la serie
utilizada.

Referencias
-----------

* issue4155 https://bugs.tryton.org/issue4155
* CVE-2014-6633 https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2014-6633

¿Incidencias?
-------------

Cualquier incidencia de seguridad debe ser reportada en el bug-tracker
https://bugs.tryton.org/ con el tipo `security`.
