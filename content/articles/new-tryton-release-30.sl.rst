Nova Tryton izdaja 3.0
#######################################################################################

:lang: sl
:slug: nova-tryton-izdaja-30
:date: 2013/10/21 18:00:00
:tags: release
:link: 
:description: 


Z veseljem vam sporočamo izdajo 3.0 `Trytona <http://www.tryton.org/>`_ .

Ta izdaja prinaša nov koledarski pogled pri uporabniškem vmesniku in
razkriva izid velike preureditve kode, ki se je začela pred 2 leti s
projektom `python-sql`.  Kot ponavadi so tu mnogi popravki napak,
izboljšave in novi moduli (glej spodaj).

`Migracija iz prejšnjih serije je v celoti podprta, seveda.`

Večje spremembe v uporabniškem vmesniku
---------------------------------------


* Na voljo je koledarski pogled, ki omogoča prikaz zapisov na
  koledarju s pomočjo datumskim polj za začetek in/ali konec. Podpira
  operacijo povleci-spusti za dogodke in popravljanje z
  dvoklikom. Pogled je optimiziran tako, da poizvede samo zapise
  prikazanih dogodkov.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_calendar_production.png
        :alt: production calendar

* `URL shema <http://doc.tryton.org/3.0/tryton/doc/usage.html#url>`_,
  vpeljana v verziji 2.0, je sedaj dostopna v statusni vrstici pod
  vsemi zavihki. Ta URL omogoča odpiranje istega zavihka na
  kateremkoli drugem odjemalcu.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/news/tryton_url.png
        :alt: url

* Zahtevki so umaknjeni. Namesto tega se priporoča uporaba
  elektronskih sporočil z URLji.

* Izbrani zapisi v seznamskem pogledu so shranjeni za preklop med
  sejami.

Večje spremembe na strežniški strani
------------------------------------

* Strežnik sedaj uporablja `python-sql
  <http://code.google.com/p/python-sql/>`_ za izdelavo `SQL
  <http://en.wikipedia.org/wiki/SQL>`_ poizvedb. Ta sprememba prinaša
  večjo združljivost z vsemi različnimi trenutno podprtimi
  `podatkovnimi bazami
  <http://sl.wikipedia.org/wiki/Podatkovna_zbirka>`_ (kakor tudi z
  bodočimi).

* Metoda za `iskanje
  <http://doc.tryton.org/3.0/trytond/doc/ref/models/fields.html#trytond.model.fields.Function.searcher>`_
  sedaj lahko vrača celotno domeno (namesto omejene samo na `AND` stavek).

* Za večjo modularnost je nekdanji atribut `order_field
  <http://doc.tryton.org/2.8/trytond/doc/ref/models/fields.html#trytond.model.fields.Field.order_field>`_
  nadomestila metoda `order_<field name>
  <http://doc.tryton.org/3.0/trytond/doc/ref/models/fields.html#ordering>`_


* Zaledni del podatkovne baze se lahko dinamično nalaga, kar
  posledično pomeni, da ga je mogoče definirati z zunanjim trytond
  paketom.

* Zmogljivost shrambe za `MPTT <http://en.wikipedia.org/wiki/MPTT>`_
  se je povečala z odstranitvijo privzetega razvrščanja in s tem
  zmanjšanja števila poizvedb.

* Na značko 'data' je možno dodati atribut `grouped`, kar omogoča
  izdelavo vseh zapisov istega modela naenkrat. To skrajšuje čas
  nameščanja modulov z velikimi količinami podatkov.

* Oknu za ukrep je možno določiti privzeto razvrščanje.

Moduli
------

* Več modulov je bilo prilagojeno novemu dizajnu za povezovanje
  izdelanih dokumentov z njihovim izvorom. Namesto kopiranja šifre
  izvora v sklic se sedaj uporablja sklicno polje in ponavadi je to
  polje na postavkah. To prinaša večji pregled nad vezami med
  dokumenti in brez izgube informacij, ki se lahko pojavi pri
  združevanju dokumentov.

account
~~~~~~~

* Nov čarovnik olajšuje knjiženje izenačevanja neodložljivih kontov ob
  zaključku poslovnega leta.
* Vsi konti iz kontnega načrta morajo vedno biti za isto podjetje. Ta
  omejitev drastično izboljšuje hitrost izračuna debeta/kredita.
* Knjižba z eno samo postavko z vrednostjo 0 se samodejno uskladi, če
  je knjižena na konto za usklajevanje. S to možnostjo so računi z
  zneskom nič samodejno označeni kot plačani.
* Možnost centraliziranega protikonta pri dnevniku je umaknjena. 

account_invoice
~~~~~~~~~~~~~~~

* Ko je račun knjižen, se za prikaz zneska uporablja knjižba namesto
  preračunavanja iz postavk. To nekoliko izboljšuje hitrost, posebej
  pri računih z veliko postavk.

account_statement
~~~~~~~~~~~~~~~~~

* Sedaj je mogoče neposredno nastaviti račun na postavki izpiska, ki
  bo samodejno zapolnil informacijo o stranki in kontu.

stock
~~~~~

* Sedaj je mogoče dobiti količino zaloge s poljubnim združevanjem,
  npr. izračun zaloge po šarži namesto po izdelku.
* Šifra popisa je predelana, da omogoča enostavno prirejanje prometa
  in tudi omejitve po enoličnosti pri popisnih postavkah.
* Predpomnilnik obdobja se lahko prilagodi, da pomni drugačno vrsto
  uskupinjenih količin.

stock_lot
~~~~~~~~~

* Polji Količina in Predvidena količina sta bili dodani k šarži.
* Mogoča je izdelava popisov s šaržo.
* Predpomnilnik obdobja hrani tudi količine po šarži.

stock_supply
~~~~~~~~~~~~

* Nov čarovnik samodejno izdeluje notranje odpremnice.
* V primeru, da pri izdelavi nabavnih zahtevkov vhodni promet od
  dobavitelja zamuja, bo čarovnik opozoril in tako lahko uporabnik po
  potrebi prestavi datume vhodnega prometa v prihodnost, drugače bo ta
  vhodni promet prezrt.

Novi moduli
-----------

* Modul `bank` določa koncept banke in bančnega računa.
* Modul `account_dunning` omogoča vodenje izterjav s sledenjem
  postopka različnih stopenj.
* Modul `account_dunning_letter` dodaja izdelavo opominov pri obdelavi
  izterjav.
* Modul `sale_invoice_grouping` dodajo možnost, kako združiti postavke
  računa, narejenih iz prodajnih nalogov.
