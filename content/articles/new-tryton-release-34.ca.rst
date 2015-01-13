Nova versió 3.4 de Tryton
#######################################################################################

:lang: ca
:slug: nova-versio-34-de-tryton
:date: 2014-10-20 18:00:00 UTC
:tags: release
:link:
:description:
:type: text

Estem contents d'anunciar l'alliberament de la versió 3.4 de
`Tryton <http://www.tryton.org/>`_.

A més de les millores habituals sobre les funcionalitats existents per a
usuaris i desenvolupadors, aquesta versió mostra els resultats del treball
exhaustiu realitzat en l'àrea de comptabilitat.

`Per descomptat, la migració de les versions anteriors està plenament
suportada amb l'excepció del mòdul ldap_connection que ha estat eliminat.`

Principals canvis en la interfície d'usuari
-------------------------------------------

* La cerca de registres relacionats ha estat redissenyada per aprofitar els
  avantatges de l'emplenament automàtic. En aquesta versió, la finestra
  emergent manté el text introduït en la cerca.

* Ara el botó de `Obre/Cerca un registre` dels registres relacionats està
  situat dins la caixa de text i el botó `Crea un nou registre` s'ha
  substituït per les accions d'emplenament automàtic o el botó de la finestra
  emergent. Aquest canvi permet harmonitzar les dimensions dels camps en els
  formularis.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_many2one_button_inside.png
        :alt: botons interiors camp many2one

* Ara es poden mostrar imatges a la vista de llistat/arbre.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_widget_image_tree.png
        :alt: camp imatge dins llistats

* Es poden realitzar prevalidacions de camps abans d'executar accions de botó.
  Les validacions ressalten els camps erronis en comptes d'informar de l'error
  en una finestra emergent.

* S'incrementen les possibilitats de l'exportació de dades incorporant
  l'etiqueta de camps selecció i el valor intern (ID) del registre (`CSV
  <https://en.wikipedia.org/wiki/Comma-separated_values>`_).

* Exportar la informació que s'està consultant ara és més fàcil i més ràpid, ja
  que la finestra d'exportació es predefineix amb els camps que es visualitzen.

* Els camps predefinits d'exportació ara es poden substituir directament per
  una nova selecció de camps. Una millora pensada per facilitar la creació de
  plantilles d'exportació.

* Ara podem ordenar fàcilment la llista de camps per exportar seleccionant i
  arrossegant els elements.

* Els rangs de cerca ara inclouen per defecte ambdós extrems. Aquest
  comportament és menys estrany pels usuaris encara que el comportament
  anterior d'incloure - no incloure el extrems tingués alguns avantatges
  pràctics.

* En aquesta versió el client també carrega els 'plug-ins' definits en el
  directori local de l'usuari. (`~/.config/tryton/x.y/plugins`).

Principals canvis en el servidor
--------------------------------

* S'introdueix la classe `Mixin <https://en.wikipedia.org/wiki/Mixin>`_
  `MatchMixin` que permet implementar un patró comú de cerca de registres
  a partir de certs valors.

* També s'afegeix la classe `UnionMixin` que permet definir un `ModelSQL` que
  és la `UNION <http://en.wikipedia.org/wiki/Union_(SQL)#UNION_operator>`_
  de varis `ModelSQL`.

* En la versió anterior, Tryton no actualitzava els registres de configuració
  definits mitjançant un fitxer `XML` si es modificaven fora del fitxer. En la
  nova versió és possible trobar aquests registres i forçar la seva
  actualització per sincronitzar-los amb l'arxiu `XML`.

* S'ha afegit un
  `Descriptor de Python <https://docs.python.org/2/howto/descriptor.html>`_ als
  camps Selection. Permet definir quin atribut d'un model conté l'etiqueta de
  la selecció del registre. Està previst actualitzar tots els informes perquè
  utilitzin aquest descriptor en comptes de valors fixos.

* S'ha introduït un nou format pel fitxer de configuració del servidor. Aquest
  format es pot estendre fàcilment per ser usat pels mòduls. Aquest fitxer
  utilitza el `format de configuració de registres de Python
  <https://docs.python.org/2/library/logging.config.html#configuration-file-format>`_.

* El context definit en els camps relacionats ara s'utilitza per instanciar el
  destí.

* La consulta SQL utilitzada pel domini d'un camp ara pot ser personalitzada
  utilitzant el mètode `domain_<field>`. Aquest mètode està dissenyat per
  suportar JOINs i permet definir consultes SQL més eficients en alguns casos.

* Les regles d'accés s'han millorat perquè només estiguin activades a les
  crides `RPC <https://en.wikipedia.org/wiki/Remote_procedure_call>`_ . Amb
  aquest disseny, Tryton segueix el principi de validar les dades als extrems
  de l'aplicació.  Amb això, ja no és necessari canviar a l'usuari root
  quan es necessiten permisos d'usuaris més específics sinó és que ens trobem
  dins d'una crida RPC.

Mòduls
-------

Account
~~~~~~~

* S'ha afegit un nou assistent per conciliar apunts comptables. El programa
  cerca per a cada compte comptable i tercer proposant apunts per conciliar.
  Una funcionalitat que permet augmentar notablement la velocitat del procés
  de conciliació.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_reconcile_wizard.png
        :alt: assistent per conciliar

* També s'ha afegit un nou assistent per facilitar la creació d'assentaments de
  cancel·lació que concilia automàticament l'apunt amb la seva contrapartida
  de cancel·lació.

* S'ha afegit l'opció de `Tercer requerit` en els comptes comptables. Aquesta
  opció obliga introduir el tercer en els apunts dels comptes marcats i
  prohibeix introduir-lo en els altres.

Account Invoice
~~~~~~~~~~~~~~~

* Ara és possible configurar l'arrodoniment d'impostos tant a nivell de línia
  de factura com a nivell global de factura. Per defecte és a nivell global de
  factura.

Account Payment
~~~~~~~~~~~~~~~

* S'ha incorporat la possibilitat de modificar l'estat dels pagaments
  `Amb èxit` a `Fallat`.

Account Payment SEPA
~~~~~~~~~~~~~~~~~~~~

* S'ha habilitat l'esquema `Empresa a Empresa` per domiciliacions bancàries.

* Ara els mandats reben una identificació única a partir de la seqüència
  configurada.

* S'ha adaptat el mòdul per a les notificacions de dèbit/crèdit de banc a
  client (CAMT.054).

* S'ha afegit un informe per imprimir un formulari estàndard per als mandats.

Account Statement
~~~~~~~~~~~~~~~~~

* Ara podem ordenar les línies d'extracte i numerar-les. Una millora que permet
  reproduir de forma fidel els extractes bancaris.

* S'ha afegit un informe d'extracte que permet, per exemple, repassar els
  extractes de dipòsits de xecs.

* En aquesta versió es pot definir el mètode de validació al diari d'extracte.
  Els mètodes disponibles són: `Balanç`, `Import` i `Número de línies`. Això
  permet utilitzar els extracte per diferents propòsits com ara la conciliació
  bancària o el control de dipòsits de xecs.

Account Stock Continental/Anglo-Saxon
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* Ara el mètode es defineix per exercici fiscal en comptes d'activar-se a
  nivell global en la instal·lació del mòdul.

Country
~~~~~~~

* La nova versió permet emmagatzemar codis postals per país. Es proporciona un
  script per descarregar codis postals des de
  `GeoNames <http://www.geonames.org/>`_.

LDAP Authentication
~~~~~~~~~~~~~~~~~~~

* El mòdul `ldap_connection` s'ha substituït per una entrada en el fitxer de
  configuració de `trytond`.

Party
~~~~~

* La nova funcionalitat del mòdul 'Country' s'utilitza per l'autocompletat dels
  camps ciutat i codi postal de les adreces.

Purchase
~~~~~~~~

* L'estat `Confirmat` s'ha dividit en dos estats `Confirmat` i `En procés`,
  per fer-lo similar al procés de vendes.

Sale Supply Drop Shipment
~~~~~~~~~~~~~~~~~~~~~~~~~

* La gestió de les excepcions dels enviaments directes de proveïdor a client
  es propaguen des de la venda fins a la compra.


Nous mòduls
-----------

* El nou mòdul `Account Payment Clearing` permet generar assentaments de
  liquidació entre els comptes a cobrar o a pagar i el compte de liquidació
  quan un pagament ha tingut èxit. El compte de liquidació es concilia
  posteriorment amb els extractes.

Proteus
-------

Proteus és una llibreria Python per accedir a Tryton com si fos un client.

* Ara permet executar informes. És útil per testejar-los.

* S'ha afegit un nou mètode de duplicat de registres que és similar al menú de
  copiar del client.
