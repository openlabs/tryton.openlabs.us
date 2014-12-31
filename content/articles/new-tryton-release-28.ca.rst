Nova versió 2.8 de Tryton
#######################################################################################

:link: 
:description: 
:tags: release
:date: 2013/04/22 18:00:00
:lang: ca
:slug: nova-versio-2.8-de-tryton

Estem contents d'anunciar l'alliberament de la versió 2.8 de  `Tryton
<http://www.tryton.org/>`_.

En aquesta versió s'han realitzat canvis a la intefície d'usuari per millorar
la forma de treballar dels usuaris. Els canvis més importants són: cerques
preferides, autocompletat, la cerca global i la revisió de tots els missatges
d'error per a proporcionar més informació. Com és habitual, també s'han
realitzat correccions d'errors, millores i nous mòduls (a continuació se'n
donen més detalls)

Com és habitual, la migració de les versions anteriors està completament
suportada.

Canvis en la interfície d'usuari
--------------------------------

* Afegits dominis a les finestres d'acció:
  Aquesta funcionalitat permet mostrar pestanyes a les vistes de llista.
  Aquestes pestanyes permeten filtrar els registres. Tots els mòduls s'han
  actualitzat per tal d'aprofitar aquesta funcionalitat i per tant s'han reduït
  el nombre d'entrades de menú.

.. raw:: html

    <div class="pagination-centered">

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_act_window_domain.png
    :alt: Dominis a les finestres d'acció

.. raw:: html

    </div>

* Cerques preferides:
  Els usuaris poden guardar les seves cerques preferides i tornar-les a
  executar sempre que ho desitgin.

.. raw:: html

    <div class="pagination-centered">

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_bookmark.png
    :alt: Cerques preferides

.. raw:: html

    </div>

* Auto-completat en camps relacionals (Many2One, Many2Many i One2Many):
  Quan s'escriu a algun d'aquests camps el client prova d'autocompletar per
  permetre una entrada ràpida de les dades. L'auto-completat també proposa dos
  accions addicionals: Crear un nou registre o entrar a la cerca avançada.

.. raw:: html

    <div class="pagination-centered">

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_completion.png
    :alt: Auto-completat

.. raw:: html

    </div>

* Substituïts els accessos directes pels elements de menú preferits:
  S'han re-disenyat els preferits (també coneguts com accessos directes) per
  tal de millorar l'experiència de l'usuari.

.. raw:: html

    <div class="pagination-centered">

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_menu_favorites.png
    :alt: Menú preferits

.. raw:: html

    </div>

* Afegir la cerca global:
  A la part superior del menú s'ha afegit una nova entrada que permet cercar
  sobre tots els objectes i els menús. Quan es selecciona un resultat de la
  cerca el client obre la seva vista de formulari o selecciona les seves
  entrades de menú.  Es pot configurar els tipus de documents que es mostren a
  la cerca global.

.. raw:: html

    <div class="pagination-centered">

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_global_search.png
    :alt: Global Search

.. raw:: html

    </div>

Canvis majors en el servidor
----------------------------

* El mètode create ara accepta una llista de valors, i això permet unificar
  l'`API <http://en.wikipedia.org/wiki/API>`_. Això també millora el rendiment
  en la creació de registres, validant tots els registres de cop.
* Es substitueix (Camp, Operador, Operant) per regles de domini. A més a més
  d'unificar la definició, això millora la velocitat de computació i facilita
  la memòria cau.
* S'ha introduït un nou tipus de camp `Dict`. Aquest camp permet emmagatzemar
  un `diccionari`. Les claus del mateix s'emmagatzemen a la base de dades. El
  nou mòdul  `product_attribute` utilitza aquesta funcionalitat (veure a
  continuació).
* S'ha decidit eliminar els _inherits perquè no assolien completament la seva
  missió. S'han reemplaçant els seus usos (un per un) per camps `Function`, per
  classes de tipus `Mixin <http://en.wikipedia.org/wiki/Mixin>`_  o per un
  `Many2One`.
* Els valors de selecció d'un camp de tipus referència o selecció poden ser
  dinàmics.  Això es produeix gràcies a l'atribut `selection_change_with`.

Mòduls
------

account
~~~~~~~

* La seqüència d'apunt és opcional en el període. Si no s'informa s'utilitzarà
  la seqüència de l'exercici físcal.
* Les regles d'impostos i els grups d'impostos tenen un atribut tipus
  (`vendes`, `compres` o `altres`) que s'utilitza per definir on es poden
  utilitzar.

account_invoice
~~~~~~~~~~~~~~~

* Les seqüències de facturació en el període també són opcionals.
* Quan es cancel·la una factura l'apunt existent s'eliminarà si és possible.
  Si no es pot eliminar es generarà un apunt contrari.
* Quan es valida la factura del proveïdor es crea l'apunt en esborrany. En cas
  de la validació en dos fases això permet obtenir informes actualitzats.
* Les factures de proveïdor i  els abonaments de proveïdor no es poden retornar
  de forma automàtica perquè s'han de revisar amb l'abonament del proveïdor.

dashboard
~~~~~~~~~

* Per facilitar a l'usuari la selecció d'accions de l'escriptori aquestes es
  filtren en funció de l'ús de l'`escriptori`.

party
~~~~~

* S'utilitza la url en les vistes de llista per al medi de contacte.

.. raw:: html

    <div class="pagination-centered">

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_contact_mechanisms_url.png
    :alt: Medis de contacte

.. raw:: html

    </div>

purchase
~~~~~~~~

* A partir d'ara és possible deixar el temps d'enviament buit per un producte
  d'un proveïdor. Això significa que no sabem quan ens l'enviarà.

stock
~~~~~

* Amb el nou disseny del flux de treball ja no hi ha més colls d'ampolla per
  afegir un nou moviment d'estoc.
* Totes les relacions Many2One en els enviaments s'han simplificat en una sola
  referència a l'enviament.

stock_supply
~~~~~~~~~~~~

* El mètode `find_best_supplier` ja no optimitza el retard d'enviament per tal
  de respectar l'ordre de prioritat en seleccionar un proveïdor.

timesheet
~~~~~~~~~

* A partir d'ara és possible definir un període que indica el temps en que el
  treball estarà disponible per entrar als fulls de treball.

Nous mòduls
-----------

* `account_asset` afegeix la depreciació fixa d'actius.
* `sale_supply` afegeix l'opció `envia a la venda` al producte per tal de
  generar comandes de compra des de les línies de venda independentment dels
  nivells d'estoc.
* `sale_supply_drop_shipment` afegeix l'opció `enviament directe` al producte
  si s'ha marcat l'opció `envia a la venda` per generar un enviament directe.
* `project_invoice` afegeix mètodes de facturació (`Manual`, `Per l'esforç
  estimat`, `Per les hores realitzades`) als projectes.
* `product_attribute` afegeix atributs de producte flexibles.

.. raw:: html

    <div class="pagination-centered">

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_product_attribute.png
    :alt: Atributs de producte

.. raw:: html

    </div>

Altres canvis a l'interfície d'usuari
-------------------------------------

* Es pot utilitzar un rang de Dates/Hores en la cerca de registres.
* Es permet la multiselecció per camps de tipus Selecció a la cerca de
  registres.
* La vista de llista pot mostrar url's.
* El menú plugins s'ha mogut a la barra d'eines accions.

Altres canvis al servidor
-------------------------

* L'idioma per defecte s'emmagatzema a la base de dades, cosa que soluciona
  errors inesperats en cas que la configuració del servidor es canviï.
* S'ha eliminat la restricció única a les regles d'accés del model i del camp
  per tal de permetre que diferents mòduls creïn accessos que es solapen.
* La llista de _constraints s'ha declarat obsoleta i s'ha reemplaçat pel mètode
  `validate` per millorar els missatges d'error.
* Ara és possible buscar sobre el resultat dels camps de referència.
