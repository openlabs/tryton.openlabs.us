Nova versió 3.2 de tryton
#######################################################################################

:lang: ca
:slug: nova-versio-32-de-tryton
:date: 2014/04/21 20:00:00
:tags: release
:link:
:description:


Estem contents d'anunciar l'alliberament de la versió 3.2 de
`Tryton <http://www.tryton.org/>`_.

Aquesta versió consolida noves funcionalitats afegides els últims dos anys.
També prepara la migració a Python 3 eliminant el suport per Python 2.6.
Com és habitual també s'han realitzat correccions d'errors, millores i nous
móduls (a continuació se'n donen més detalls).

`Per suposat, la migració de les versions anteriors està completament
suportada.`

Canvis en la interfície d'usuari
--------------------------------

* El client fa servir la zona horària local per mostrar les hores.

* S'ha millorat la funcionalitat d'enganxar en llistes editables per tal
  d'afegir noves línies si es necessita, a part d'actualitzar els registres
  existents.

* Els botons de les vistes també es mostren al menú d'accions. Això permet un
  accès ràpid a través de les dreceres del teclat, i també executar un botó
  per tots els registres seleccionats.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_button_action_menu.png
        :alt: button action menu

* Els botons i els assitents també poden llençar accions del client. Això vol dir
  que es comporten tal com si l'usuari hagués clicat sobre un dels botons de
  la barra d'eines.

* El client ara fa servir un conjunt de connexions. Això permet millorar la
  velocitat del client per les peticions que poden ser paral·lelitzades.

* Es poden arrosegar fitxers al botó d'adjunts per tal de crear adjunts de
  forma ràpida.

* S'ha afegit un nou giny `multi-selecció`, que fa servir els camps `Many2Many`
  per guardar les dades. És molt útil i més visual quan hi ha un petit nombre
  de seleccions.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_multiselection.png
        :alt: multiselection

* El client permet navegar per les versions d'un registre que està versionat.
  També funciona en una llista de registres i en aquest cas el client mostra
  el resultat de la cerca com si s'hagués fet a la data de la revisió.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_revisions.png
        :alt: revisions

Canvis majors en el servidor
----------------------------

* El servidor utilitza internament la zona horària UTC.

* El mètode `ModelStorage.write` rep millores similars a les que va rebre el
  mètode `ModelStorage.create` a la versió 2.8. Això vol dir que pot escriure
  diferents valors a varis conjunts de registres amb una sola crida. Això
  millora el rendiment, validant tots els registres d'una vegada. A més a més
  només es validaran els camps modificats i les seves dependències. A més a
  més les accions dels camps relacionats s'han actualitzat amb la mateixa
  interfície.

* S'ha afegit un nou decorador `fields.depends` que té com objectiu reemplaçar
  els attributs `on_change`, `on_change_with`, `selection_change_with` i
  `autocomplete` que han estat depreciats. Aquest decorador s'aplica als
  mètodes que es criden, i el resultat serà la suma de les dependències de tots
  els mòduls. Això proporciona molta més flexiblitat.

* Tryton fa servir la llibreria bcrypt per encriptar les contrasenyes si la
  llibreria està disponible.

* Ara tots els tipus de camps poden tenir una restricció de domini pels seus
  valors i la majoria de valors estan suportats en la prevalidació i la
  inversió en la banda del client.

* El valor retornant per un on_change d'un `One2Many` a partir d'ara utilitza
  un índex per la funció ``add``. Això permet definir la posició del nou
  registre en la llista, en compte d'afegir-lo sempre al final.

* S'ha creat un nou mètode `ModelSQL.restore_history` que permet restaurar
  els valors d'un registre tal com estaven a una data determinada.

Mòduls
------


Account
~~~~~~~

* S'ha creat un nou diari de tipus `Desajust` per facilitar la creació
  d'ajustaments.
* Es pot definir opcionalment als impostos la seva data d'inici i final de
  validesa. Això permet gestionar canvis a través del temps.

French Chart of Account
~~~~~~~~~~~~~~~~~~~~~~~

* El pla comptable francès s'ha actualitzat amb els nous impostos del 2014.

Account Statement
~~~~~~~~~~~~~~~~~

* A partir d'ara no es pot utilizar una factura ja pagada en els extractes en
  esborrany.
* Es fa servir el nou índex del `on_change` per afegir les noves línies
  separades a sota de les originals.

Account Stock Continental
~~~~~~~~~~~~~~~~~~~~~~~~~

* S'ha millorat el rendiment de la creació dels apunts comptables pels
  moviments d'estoc.

Bank
~~~~

* Els nombres IBAN a partir d'ara són validats i formatejats.

Company
~~~~~~~

* S'ha afegit la zona horària a l'empresa per obtenir la data actual
  correctament.
* L'empleat es llegeix del context com l'empresa. Això permet utilitzar més
  d'un client amb el mateix usuari i diferents empleats.

Production
~~~~~~~~~~

* Ara és possible introduïr la data efectiva d'una producció. Això permet
  introduir produccions realitzades en el passat.

Purchase
~~~~~~~~

* Ara hi ha un avís quan s'intenta rebre un moviment d'estoc de proveïdor sense
  orígen. Normalment, l'orígen ha de ser una ordre de compra.
* La compra intenta relacionar els moviments d'estoc amb les línies de factura.

Sale
~~~~

* El mateix avís existeix pels moviments de client sense orígen.
* Les vendes també intenten relacionar els moviments d'estoc amb les línies de
  factura, tal com es fa en les compres.

Stock
~~~~~

* Els albarans de retorn de proveïdor poden tenir assignació parcial.
* El càlcul de les quantitats d'estoc s'ha refactoritzat per facilitar la
  personalització i millorar la cerca.
* Ara és possible introduir la data efectiva de tots els albarans. Això permet
  introduir alabarans realitzats en el passat.

Stock Lot
~~~~~~~~~

* S'ha afegit una acció per visualitzar tots els moviments d'un lot.

Nous mòduls
-----------

* El mòdul `Party Relationship` defineix diferents tipus de relacions entre
  tercers.
* El mòdul `Account Payment` per generar pagaments agrupats pels apunts dels
  comptes a cobrar i a pagar.
* El mòdul `Account Payment SEPA` permet generar fitxers SEPA pels pagaments.
* El mòdul `Stock Package` permet emmagatzemar la informació d'empaquetament
  dels albarans de clients i els albarans de retorn de proveïdor.
* El mòdul `Sale Shipment Grouping` afegeix una opció per definir com s'agruparan
  els moviments d'estoc generats per una venda.
* El mòdul `Account Credit Limit` gestiona els límits de crèdit dels tercers.
* El mòdul `Sale Credit Limit` afegeix les vendes confirmades a l'import de
  crèdit del tercer.
