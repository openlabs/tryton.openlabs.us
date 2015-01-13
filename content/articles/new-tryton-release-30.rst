New Tryton release 3.0
#######################################################################################

:lang: en
:slug: new-tryton-release-30
:date: 2013/10/21 18:00:00
:tags: release
:link: 
:description: 


We are happy to announce the 3.0 release of `Tryton <http://www.tryton.org/>`_.

This release brings a new calendar view for the graphical user interface and
sees the result of a large refactoring of the code started 2 years ago with the
project `python-sql`. But also as usual there are many bug-fixes, improvements
and new modules (see below).

`Of course, migration from previous series is fully supported.`

Major changes in graphical user interface
-----------------------------------------

* A calendar view is now available. It allows to display records on a calendar
  using a start and/or an end date/datetime fields. It supports the Drag & Drop
  of events and the edition on double-click. The view is optimized to fetch only
  the events displayed.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_calendar_production.png
        :alt: production calendar

* The `URL scheme <http://doc.tryton.org/3.0/tryton/doc/usage.html#url>`_,
  introduced in 2.0, is now accessible at the bottom of all tabs. This URL
  allows to open the same tab on any other client.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_url.png
        :alt: url

* The request has been removed. It is suggested to use emails with URL instead.

* The selected records in list view is remembered between sessions.

Major changes on the server side
--------------------------------

* The server uses now `python-sql <http://code.google.com/p/python-sql/>`_ to
  generate the `SQL <http://en.wikipedia.org/wiki/SQL>`_ queries. This change
  brings a better compatibility with all the different `Databases
  <http://en.wikipedia.org/wiki/DBMS>`_ currently supported (and also with the
  future ones).

* The `searcher
  <http://doc.tryton.org/3.0/trytond/doc/ref/models/fields.html#trytond.model.fields.Function.searcher>`_
  method can now return a full domain (instead of one limited to `AND` clause
  only).

* The older `order_field
  <http://doc.tryton.org/2.8/trytond/doc/ref/models/fields.html#trytond.model.fields.Field.order_field>`_
  attribute is replaced by method `order_<field name>
  <http://doc.tryton.org/3.0/trytond/doc/ref/models/fields.html#ordering>`_ to
  be more modular.

* The database backend can be loaded dynamically which means it is possible to
  define one in a external package of trytond.

* The performance of `MPTT <http://en.wikipedia.org/wiki/MPTT>`_ storage has
  been improved by removing the default order and reducing the number of
  queries.

* A new attribute `grouped` can be added on the `data` tag. It allows to create
  all the records of the same Model at once. This improves the installation time
  of modules with large sets of data.

* It is possible to define a default order on the Action Window.

Modules
-------

* Many modules have been adapted to a new design to link generated documents
  with their origin. Instead of copying the code of the origin as reference, a
  Reference field is used and most of the time the field is on the lines. This
  brings a better vision of the links between documents without loosing
  information when merge of documents occurs.

Account
~~~~~~~

* A new wizard appears to ease the creation of the balance move for
  non-deferral accounts at the end of the fiscal year.
* All accounts of a chart must always be in the same company. This constraint
  improves drastically the performance of computing the debit/credit.
* Any move posted with one line of zero is automatically reconciled if it is on
  an account to reconcile. With this feature, invoices with amount of zero are
  automatically marked as paid.
* The centralised counterpart option on journal has been removed.

Account Invoice
~~~~~~~~~~~~~~~

* Once an invoice is posted, the account move is used to show the amounts
  instead of computing it from the lines. This improves a little bit the
  performance especially for invoices with a lot of lines.

Account Statement
~~~~~~~~~~~~~~~~~

* Now it is possible to directly set an invoice on a statement line. This will
  fill the party and account automatically.

Stock
~~~~~

* It is now possible to query the stock quantity with any kind of grouping
  parameters. For example, it can be used to compute the stock quantity of a
  lot instead of a product.
* The code of inventory has been reworked to allow easy customization of the
  move creation and also of the unique constraint on the inventory lines.
* The period cache can now be adapted to cache different kind of grouped
  quantities.

Stock Lot
~~~~~~~~~

* The quantity and forecast quantity fields have been added on lot.
* It is now possible to create inventories with lot.
* The period cache stores also the quantities per lot.

Stock Supply
~~~~~~~~~~~~

* A new wizard appears to create automatically internal shipments.
* If there are late supplier moves when creating purchase requests, the wizard
  shows a warning to allow the user to change the date of those moves into the
  future if needed otherwise those incoming moves will be ignored.

New modules
-----------

* The `Bank` module defines the concept of bank and account.
* The `Account Dunning` module allows to manage the dunning following a
  procedure with different levels.
* The `Account Dunning Letter` module adds the generation of a letter when
  processing dunnings.
* The `Sale Invoice Grouping` module adds an option to define how invoice lines
  generated from sales will be grouped.
