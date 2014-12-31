Nova Tryton izdaja 3.2
#######################################################################################

:lang: sl
:slug: nova-tryton-izdaja-32
:date: 2014/04/21 20:00:00
:tags: release
:link: 
:description: 


Z veseljem vam sporočamo, da je izšla nova izdaja `Trytona
<http://www.tryton.org/>`_.

Ta izdaja v glavnem utrjuje več novih funkcionalnosti, dodanih v
zadnjih dveh letih. Med drugim se ta izdaja z opustitvijo podpore za
Python 2.6 pripravlja na bodočo selitev na Python 3 platformo.  Kot
ponavadi je v tej izdaji mnogo popravkov, izboljšav in novih modulov
(glej spodaj).

`Selitev s prejšnjih verzij je, seveda, v celoti podprta.`


Večje spremembe v grafičnem uporabniškem vmesniku
-------------------------------------------------

* Odjemalec uporablja krajevni časovni pas za prikaz datuma in časa.

* Poleg ažuriranja obstoječih postavk je na urejevalnem seznamu
  izboljšano kopiranje/lepljenje za dodajanje novih postavk.

* Gumbi na obrazcu so na voljo tudi meniju za ukrepe. Na ta način je
  mogoč hiter dostop preko tipkovnice in tudi omogoča proženje gumba
  za izbrane zapise.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_button_action_menu.png
        :alt: gumb v meniju za ukrepe

* Gumbi in čarovniki lahko sedaj prožijo ukrepe na odjemalčevi
  strani. To pomeni, da se obnaša tako, kot da bi uporabnik kliknil na
  enega od gumbov na orodni vrstici.

* Odjemalec sedaj uporablja zalogo povezav, ki omogoča pospešitev
  odjemalca pri zahtevah, katere lahko paralelizira.

* Za hitrejše pripenjanje prilog lahko sedaj gumb za priloge sprejme
  povleci-in-spusti operacijo datoteke.

* Dodan je nov gradnik `multi-selection`, ki kot zaledje uporablja
  polje `Many2Many`.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_multiselection.png
        :alt: multiselection

* Odjemalec omogoča brskanje različic zapisa, če je le ta
  historiziran. Deluje tudi na celotnem naboru zapisov in v tem
  primeru odjemalec prikaže rezultat iskanja, kot da bi bilo iskanje
  izvedeno na datumu različice.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_revisions.png
        :alt: različice


Večje spremembe na strežniški strani
------------------------------------

* Strežnik interno teče vedno v UTC časovnem pasu.

* Metoda `ModelStorage.write` prejme podobne izboljšave kot metoda
  `ModelStorage.create` v inačici 2.8. To pomeni, da lahko spremeni
  različne vrednosti večim zapisom v enem klicu in tako izboljša
  zmogljivost z vrednotenjem vseh zapisov naenkrat in to samo
  spremenjena in odvisna polja. Poleg tega so bili z istim vmesnikom
  posodobljeni ukrepi pri veznim poljih.
 
* Vpeljan je nov dekorator `fields.depends`, ki nadomešča opuščene
  atribute `on_change`, `on_change_with`, `selection_change_with` in
  `autocomplete`.  Ta dekorator velja za klicane metode in rezultat je
  seštevek vseh metod s tem dekoratorjem na vseh modulih, kar prinaša
  modularnosti veliko več prožnosti.
 
* Če je knjižnica `bcrypt` na voljo, jo Tryton uporablja za
  zgoščevanje gesel.

* Vsi tipi polj imajo lahko sedaj domeno za omejevanje svojih
  vrednosti. Na odjemalčevi strani je večina domen podprtih pri
  prevrednotenju in inverziji.

* Vrnjena vrednost `on_change` polja tipa `One2Many` sedaj uporablja
  indeks pri ključni besedi ``add``. To omogoča določanje pozicije
  novega zapisa v seznamu, namesto da je vedno na koncu seznama.

* Nova metoda `ModelSQL.restore_history` omogoča povrnitev vrednosti
  zapisa, ki so bile ob določenem datumu.


Moduli
------


account
~~~~~~~

* Za izdelavo odpisov je dodana je nova vrsta dnevnika `odpis`
  (`write-off`).

* Davki imajo sedaj neobvezen začetni in končni datum, kar omogoča
  kasnejše popravke.


account_fr
~~~~~~~~~~

* Francoski kontni načrt je posodobljen z novimi davčnimi stopnjami,
  vpeljanimi v letu 2014.


account_statement
~~~~~~~~~~~~~~~~~

* Modul sedaj preprečuje uporabo že plačanih računov v pripravljenih izpiskih.

* Za dodajanje nove razdelitvene postavke pod originalom modul
  uporablja nov indeks pri `on_change`.


account_stock_continental
~~~~~~~~~~~~~~~~~~~~~~~~~

* Knjiženje prenosa zaloge je pospešeno.


bank
~~~~

* IBAN računi so sedaj vrednoteni in formatirani. 


company
~~~~~~~

* Družbi je dodano novo polje za časovni pas, da se pridobi pravilen datum za današnji dan.

* Zaposlenec se isto jemlje iz konteksta, podobno kot družba. To
  omogoča uporabo večih odjemalcev z istim uporabnikom, a z različnimi
  zaposlenci.


production
~~~~~~~~~~

* Sedaj je možno določiti dejanski datum proizvodnje, kar omogoča
  vnašanje preteklih proizvodenj.


purchase
~~~~~~~~

* Vpeljano je opozorilo, ko se poskuša prejeti prenos zaloge
  dobavitelja brez porekla.  Ponavadi je poreklo nabavni nalog.

* Nabavni modul poskuša vzpostaviti povezavo med prenosom zaloge in
  postavkami prejetih računov.


sale
~~~~

* Enako opozorilo kot pri nabavnem modulu obstaja tudi za prenos
  zaloge kupca brez porekla.

* Prodajni modul poskuša vzpostaviti povezavo med prenosom zaloge in
  postavkami izdanih računov.


stock
~~~~~

* Vrnjena pošiljka dobavitelja ima lahko sedaj delno dodeljena.

* Izračun količin zaloge je predelan, da omogoča enostavno nastavitev
  po meri in boljše iskanje.

* Sedaj je možno določiti dejanski datum za vse pošiljke, kar omogoča
  vnašanje preteklih pošiljk.


stock_lot
~~~~~~~~~

* Dodana je nova veza med serijo in prenosom zaloge.


Novi moduli
-----------

* Modul `party_relationship` definira različne vrste razmerij med
  partnerji.

* Modul `account_payment` omogoča izdelavo združenih plačil pri
  knjiženju postavk obveznosti in terjatev.

* Modul `account_payment_sepa` omogoča izdelavo datotek za SEPA
  plačila.

* Modul `stock_package` omogoča shranjevanje informacij o pakiranju
  pri vrnjenih pošiljkah kupcev in dobaviteljev.

* Modul `sale_shipment_grouping` dodaja možnost, kako združiti promet
  zaloge iz prodaje.

* Modul `account_credit_limit` vodi kreditni limit partnerjev.

* Modul `sale_credit_limit` dodaja potrjeno prodajo k znesku
  kreditnega limita partnerja.

