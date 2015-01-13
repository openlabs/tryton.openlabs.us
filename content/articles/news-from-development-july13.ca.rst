Novetats de desenvolupament Juliol13
#######################################################################################

:lang: ca
:slug: novetats-de-desenvolupament-juliol13
:date: 2013/07/08 12:00:00
:tags: development
:link:
:description:

A continuació podeu trobar alguns canvis que s'han introduït a la branca de
desenvolupament de Tryton i que estaran disponibles per la pròxima versió.

Servidor
--------

* Factor pels camps de números. Aquest factor es fa servir per la conversió
  entre el valor que es mostra i el valor intern. Basicament es fa servir per
  a mostrar els percentatges com a *10%* encara que internament es guardi
  *0.1*.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_factor.png
        :alt: factor

* S'han eliminat les sol·licituts. En comptes de les sol·licituts, el servidor
  envia correus electrònics per notificar als usuaris i els usuaris poden
  utilitzar els mateixos per a comunicarse entre ells i gràcies a la URL de
  Tryton es pot fer referència a registres específics. Aquest fet permet reduïr
  la càrrega del servidor, ja que els clients preguntaven per noves
  sol·licituds cada 5 minuts.

Client
------

* S'ha afegit un nou tipus de vista: ``calendari``. Permet mostrar els registres
  en un calendari utilitzant una data d'inici i (opcionalment) una data final.
  Està basada amb el giny `GooCalendar <http://code.google.com/p/goocalendar/>`_.
  Permet arrosegar i soltar els events, editar-los fent doble clic i només va a
  buscar els events que s'han de mostrar.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_calendar_production.png
        :alt: production calendar

* Des de la versió 2.0, Tryton disposa d'un  `Esquema de URL
  <http://doc.tryton.org/2.8/tryton/doc/usage.html#url>`_ que el client pot
  llegir. De totes formes, abans no hi havia una forma fàcil d'obtenir la URL
  d'un recurs. A partir d'ara es mostra la URL a la part inferior de cada
  pestanya que conté la URL que es pot utilitzar en qualsevol client.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_url.png
        :alt: url

Moduls
------

Account
~~~~~~~

* Ara un apunt confirmat amb import zero es concilia automaticament si té
  un compte per conciliar. Amb aquesta funcionalitat, les factures amb import
  0 es marquen automàticament com a pagades.
* Una herència d'OpenERP, l'opció de contrapartida centralizada als diaris, s'ha
  eliminat desprès d'una enquesta que ha fet palés que ningú ho feia servir.

Account Invoice
~~~~~~~~~~~~~~~

* Quan la factura ja està confirmada s'utilitza l'apunt contable per mostrar
  els imports en comptes de calcular-ho des de les línies. Això millora una
  mica el rendiment, especialment per factures amb moltes línies.

Account Statement
~~~~~~~~~~~~~~~~~

* Ara és possible informar directament d'una factura en una línea d'extracte. Amb
  aquesta funcionaltiat s'omplena automàticament el tercer i el compte.

Stock
~~~~~

* Ara és possible fer una consulta sobre la quantitat d'estoc amb qualsevol
  tipus de paràmetres d'agrupació. Per exemple, es pot fer sevir per calcular
  la quantitat d'un lot en comptes d'un producte.
* S'ha refactoritzat el codi de l'inventari per a que sigui més fàcil de
  personalitzar la creació de moviments i també la regla de que les línies
  d'inventari han de ser úniques.
* La cache de periodes es pot adaptar per fer cache de diferents formes de
  quantitats agrupades.

Stock Lot
~~~~~~~~~

* Ara és posible crear inventaris amb lot.
* La cache de periode també guarda les quantitats per lot.

Stock Supply
~~~~~~~~~~~~

* Si hi ha moviments d'enviament tardà quan es creen les ordres de compra,
  l'assistent mostra un avís a l'usuari per a que canviï les dates d'aquests
  moviments en una data a futur si és necessari. Si no es fa, les línies
  d'entrada s'ignoraran.
