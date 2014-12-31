News from Development July13
#######################################################################################

:lang: en
:slug: news-from-development-july13
:date: 2013/07/08 12:00:00
:tags: development
:link: 
:description: 

Here are some changes recently landed in the development branch of Tryton that
will be available on the next release.

Server
------

* A factor on number widgets. This factor is used for conversion between the
  value displayed and the internal value. The main usage is showing the user a
  percent value like *10%*, while storing *0.1*.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_factor.png
        :alt: factor

* The requests have been removed. Instead the server sends emails to notify
  users and thanks to the Tryton URL users are able to communicate about
  specific records by referencing them. This also removes load on the server as
  each client was polling every 5 minutes for new requests.

Client
------

* A new kind of view has been added: ``calendar``. It allows to display records
  on a calendar using ane start and/or an end date/datetime fields. It is based
  on the widget `GooCalendar <http://code.google.com/p/goocalendar/>`_. It
  supports the Drag&Drop of events, the edition on double-click and it fetches
  only the events to display.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_calendar_production.png
        :alt: production calendar

* Since the version 2.0, Tryton has a `URL scheme
  <http://doc.tryton.org/2.8/tryton/doc/usage.html#url>`_ that the client can
  read. But in the past there was no easy way for the user to get the URL of a
  record. Now the URL is visible at the bottom of each tab. It contains all
  information to open the same tab on any other client.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_url.png
        :alt: url

Modules
-------

Account
~~~~~~~

* Now any move posted with one line of zero is automaticaly reconciled if it is
  on an account to reconcile. With this feature, invoices with an amount of
  zero are automatically marked as paid.
* A legacy of OpenERP, the centralised counterpart option on journal, has been
  removed after a poll that shows nobody was using it.

Account Invoice
~~~~~~~~~~~~~~~

* Once an invoice is posted, the account move is used to show the amounts
  instead of computing it from the lines. This improve a little bit the
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

* It is now possible to create inventories with lot.
* The period cache store also the quantities per lot.

Stock Supply
~~~~~~~~~~~~

* If there are late supplier moves when creating purchase requests, the wizard
  shows a warning to allow the user to change the date of those moves into the
  future if needed otherwise those incoming moves will be ignored.
