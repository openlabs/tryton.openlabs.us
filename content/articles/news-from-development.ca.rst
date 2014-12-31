Novetats de desenvolupament
#######################################################################################

:lang: ca
:slug: novetats-de-desenvolupament
:date: 2013/02/18 12:00:00
:tags: desenvolupament
:link: 
:description: 

A continuació es detallen alguns canvis recents disponibles en la branca de
desenvolupament que seran incorporats en la següent versió.

Servidor
--------

* La llengua per defecte en la base de dades té preferència amb el idioma del
  fitxer de configuració. Això permet l'ús de múltiples base de dades amb
  diferents idiomes.
* El ``(Camp, Operador, Operant)`` en les regles d'accés ha estat reemplaçat
  per a text pla en el domini. Aquest canvi comporta mes rapidesa (30%) en
  els tests.
* La API_ del ``ModelStorage.create`` ha canviat per ser utilitzat una llista
  de valors. Això permet creat molts registres a la vegades en una sola crida.
* Un nou tipus de camp es troba disponible: ``Diccionari``. Aquest camp permet
  guardar un ``diccionari`` en la base de dades.
* L'atribut ``selection_change_with`` està disponible en camps de ``Selecció``
  i ``Relacionats``. Es comporta com ``on_change_with`` però modifica la llista
  de valors. El sistema de validació també té present aquests nous atributs.

.. _API: http://en.wikipedia.org/wiki/API

Client
------

* El nou cercador li permetrà:

  * multi-selecció de valors pels camps ``Selecció``

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_multi_selection_filter.png
        :alt: multi-selection filter

  * rang en els camps``Data`` i ``Data/Hora``

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_range_date_filter.png
        :alt: range date filter

* Reduir el número d'entrades de menú, un nou concepte introduït a:
  El `domini per tabulació`. Li permet definir un conjunt de pestanyes que son filtrats
  per domini.
  Li permet passar d'una pestanya a una altra i els registres es refresquen segons la
  informació solicitada. Tots els mòduls s'han actualitzat per disposar d'aquesta funcionalitat.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_domain_tab.png
        :alt: domain tab

* Els usuaris poden afegir favorits de les seves cerques.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_search_bookmark.png
        :alt: search bookmark

* La icona de la ``URL`` pot ser dinàmic.
* La icona de la ``URL`` també està disponible en la vista de llistat.
* El menú favorits reemplaça pel menú curt.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_menu_favorites.png
        :alt: menu favorites

* Disponible una cerca global. Es pot cercar dins de tots els registres disponibles.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_global_search.png
        :alt: global search

Mòduls
------

Account Asset
~~~~~~~~~~~~~

És un nou mòdul per gestionar pagaments.

Per ara es calcula només per càlcul “lineal“ però es poden afegir nous sistemes de càlcul.

Account
~~~~~~~

* S'ha afegit el camp``tipus`` en el `grup d'impostos` i `Regles d'impostos` amb les opcions:
  `Vendes`, `Compres` o `Ambos`. Cada compte comptable es pot utilitzar la selecció de taxes.

Account Invoice
~~~~~~~~~~~~~~~

* El flux de treball de la `factura` s'ha revisat.

  * En l'estat de Cancel·lat, el `moviment` es eliminat o cancel·lat.
  * Els `moviments` en esborrany de la `Factura de proveïdor` es creat en la validació.
  * L'estat de Proforma és reanomenat per Validat per ser més genèric.
  * L'estat Obert es reanomenat per `Emesa` per ser mes coherent en la restat del programari.

Stock
~~~~~

* El flux de treball s'ha afegit `Moviments d'estoc`.

Product Attribute
~~~~~~~~~~~~~~~~~

Un nou mòdul per gestionar grups d'atributs a `Productes` utilitzant un nou camp `Diccionari``.

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_product_attribute.png
    :alt: product attribute
