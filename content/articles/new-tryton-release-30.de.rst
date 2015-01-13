Neues Tryton Release 3.0
#######################################################################################

:lang: de
:slug: new-tryton-release-30
:date: 2013/10/21 18:00:00
:tags: release
:link:
:description:


Wir freuen uns, die Veröffentlichung von `Tryton 3.0 <http://www.tryton.org/>`_
bekannt zu geben!

Dieses Release bringt eine neue Kalenderansicht im Frontend, und ist weiterhin
das Ergebnis eines weitreichenden Code-Refactorings, welches mit dem
`python-sql` Projekt vor 2 Jahren gestartet ist. Des weiteren gibt es auch
viele Fehlerkorrekturen, Verbesserungen und neue Module (siehe unten).

`Wie immer ist die Migration aus älteren Versionen voll unterstützt.`

Wesentliche Änderungen in der GUI
---------------------------------

* Eine Kalenderansicht ist nun verfügbar. Diese erlaubt die Anzeige von
  Vorgängen basierend auf Start- und/oder End-Datum bzw. -zeit. Drag&Drop von
  Events sowie editieren per Doppelklick wird unterstützt. Die Ansicht ist
  dahingehend optimiert, nur die anzuzeigenden Events abzurufen.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_calendar_production.png
        :alt: Produktionskalender

* Das `URL-Schema <http://doc.tryton.org/3.0/tryton/doc/usage.html#url>`_, in
  Tryton 2.0 eingeführt, ist nun am Fuße aller Tabs sichtbar. Die URL erlaubt
  das Öffnen des gleichen Tab auf einem anderen Client.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_url.png
        :alt: URL

* Requests wurden wieder entfernt. Stattdessen sollen besser EMails mit URL
  genutzt werden.

* Die ausgewählten Datensätze in einer Listanzeige sind persistent zwischen
  Sitzungen.

Wesentliche Änderungen am Server
--------------------------------

* Der Server nutzt nun `python-sql <http://code.google.com/p/python-sql/>`_ um
  `SQL <http://de.wikipedia.org/wiki/SQL>`_ Abfragen zu erzeugen. Dies
  verbessert die Kompatibilität zwischen unterschiedlichen `Datenbanken
  <http://de.wikipedia.org/wiki/DBMS>`_ - sowohl momentan unterstützten wie
  auch zukünftigen.

* Die `Sucher
  <http://doc.tryton.org/3.0/trytond/doc/ref/models/fields.html#trytond.model.fields.Function.searcher>`_
  Methode kann nun die komplette Domäne zurückgeben (anstatt einer die durch
  eine `AND` Bedingung limitiert ist).

* Das ältere `order_field
  <http://doc.tryton.org/2.8/trytond/doc/ref/models/fields.html#trytond.model.fields.Field.order_field>`_
  Attribut wurde ersetzt durch die Methode `order_<field name>
  <http://doc.tryton.org/3.0/trytond/doc/ref/models/fields.html#ordering>`_ um
  eine höhere Modularität zu erreichen.

* Das Datenbank-Backend kann dynamisch geladen werden, damit kann es in einem
  externen Package von trytond definiert werden.

* Die Performance der `MPTT <http://de.wikipedia.org/wiki/MPTT>`_ Speicherung
  wurde verbessert indem die Standard-Sortierung entfernt und die Anzahl der
  Abfragen verringert wurde.

* Ein neues Attribut `grouped` kann zum `data` -Tag hinzugefügt werden. Das
  erlaubt die gleichzeitige Erzeugung aller Datensätze eines Modells. Damit
  verkürzt sich die Installationszeit von Modulen mit großen Datensätzen.

* Man kann nun eine Standard-Sortierung bei `Action Windows` definieren.

Module
------

* Viele Module wurden einer neuen Entwicklung angepasst, bei dem erzeugte
  Dokumente mit ihrem Ursprung verlinkt werden. Anstatt den Code des Originals
  als Referenz zu kopieren wird ein Referenzfeld verwendet. Dies verbessert die
  Nachverfolgbarkeit der Verlinkungen zwischen Dokumenten ohne
  Informationsverlust, wenn diese später konsolidiert werden.

Account
~~~~~~~

* Ein neuer Assistent vereinfacht die Saldenerzeugung bei nicht abgegrenzten
  Konten am Jahresende.
* Alle Konten eines Kontenplans müssen in der gleichen Firma liegen. Durch
  diese Beschränkung wird die Performance bei der Soll/Haben Berechnung
  dramatisch erhöht.
* Jede Buchung mit einer Nullzeile/Nullwert ist automatisch ausgeziffert wenn
  sie auf einem Abstimmungskonto ist. Damit werden Rechnungen mit Wert Null
  automatisch als `gezahlt` markiert.
* Die `centralised counterpart` Option wurde vom Journal entfernt.

Account Invoice
~~~~~~~~~~~~~~~

* Sobald eine Rechnung gebucht ist, werden die zugehörigen Buchungssätze
  genutzt, um die Buchungswerte anzuzeigen, anstatt sie aus den Rechnungszeilen
  zu berechnen. Das erhöht etwas die Performance, besonders bei Rechnungen mit
  vielen Zeilen.

Account Statement
~~~~~~~~~~~~~~~~~

* Es ist jetzt möglich, direkt eine Rechnung auf eine Auftragzeile abzusetzen.
  Partnerdaten und Konto werden automatisch gezogen.

Stock
~~~~~

* Es ist nun möglich den Bestand mit einem beliebigen Gruppierungsparameter
  abzufragen. So kann z.B. der Bestand pro Charge anstatt nur auf Artikelebene
  abgefragt werden.
* Der Code des Bestandsmoduls wurde überarbeitet, um ein einfacheres
  Customizing der Bestandsbewegungen sowie der Constraints zu erreichen.
* Der Periodencache kann nun verschieden gruppierte Mengen vorhalten.

Stock Lot
~~~~~~~~~

* Felder für Menge und Forecastmenge sind jetzt auf Chargenebene.
* Es können Bestände mit Charge angelegt werden.
* Der Periodencache speichert Mengen pro Charge.

Stock Supply
~~~~~~~~~~~~

* Ein neuer Assistent erzeugt automatisch interne Warenbewegungen.
* Wenn eine Bestellanforderung angelegt wird, und es bereits bekannt ist dass
  der Lieferant nicht zum Wunschlieferdatum liefern kann, erstellt der
  Assistent eine Warnung, damit der User diese erwarteten Wareneingänge in die
  Zukunft legen kann, da sie sonst für diese Bestellung ignoriert würden.

Neue Module
-----------

* Das `Bank` Modul bringt die Referenz zu Banken und Bankkonten.
* Das `Account Dunning` Modul stellt das Mahnwesen über mehrere Stufen bereit.
* Das `Account Dunning Letter` Modul erzeugt die entsprechenden Mahnbriefe.
* Das `Sale Invoice Grouping` Modul erlaubt die Gruppierung von
  Rechnungszeilen, die dem jeweiligen Verkauf zugrunde liegen.
