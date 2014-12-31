New Tryton release 3.2
#######################################################################################

:lang: en
:slug: new-tryton-release-32
:date: 2014/04/21 20:00:00
:tags: release
:link: 
:description: 


We are happy to announce the 3.2 release of `Tryton <http://www.tryton.org/>`_.

This release mainly consolidates many new functionalities added in last two
years.  Also it prepares the future migration to Python 3 by dropping the
support for Python 2.6.  But also as usual there are many bug-fixes,
improvements and new modules (see below).

`Of course, migration from previous series is fully supported.`

Major changes in graphical user interface
-----------------------------------------

* The client uses the local timezone to display date time.

* The copy/paste on editable list has been improved to add new lines if needed
  beside of updating existing records.

* The buttons of the view are also available in the action menu. This allows
  fast access using keyboard shortcuts but also trigger the button for a list
  of selected records.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_button_action_menu.png
        :alt: button action menu

* Buttons and wizards can now trigger actions from the client side. This means
  it behaves like if the user clicked on one of the tool bar buttons.

* The client uses now a pool of connections, this allows to speed up the client
  on requests that can be parallelized.

* The attachment button can now receive drag & drop of file to quickly create
  attachments.

* There is a new widget `multi-selection`, it uses the `Many2Many` field as
  backend. It is very useful and more visual when there is a small number of
  selection.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_multiselection.png
        :alt: multiselection

* The client allows to browse the revisions of a record if it is historized. It
  also works on a full list of records, in this case the client shows the
  result of the search as if it was done at the revision date.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_revisions.png
        :alt: revisions

Major changes on the server side
--------------------------------

* The server runs internally always in UTC timezone.

* The `ModelStorage.write` method receives the similar improvements as the
  `ModelStorage.create` in version 2.8. This means it can write different
  values to many sets of records in one call and so this improves the
  performance by validating all the records at once and also it will validate
  only the modified and dependant fields. Also the action values of relation
  fields have been updated with the same interface.

* A new decorator `fields.depends` is introduced to replace the deprecated
  `on_change`, `on_change_with`, `selection_change_with` and `autocomplete`
  fields attributes. This decorator applies on the called methods and the
  result will be the sum of all depends of all the modules, this brings much
  more flexibility to the modularity.

* Tryton uses bcrypt to hash password if the library is available.

* All types of field can now have a domain to constraint its value and most of
  the domains are supported for pre-validation and inversion on the client
  side.

* The on_change returned value of `One2Many` uses now an index for the ``add``
  keyword. This allows to define the position of the new record in the list
  instead of being always at the bottom.

* A new method `ModelSQL.restore_history` allows to restore the values of a
  record as they were at a specific date time.

Modules
-------

Account
~~~~~~~

* A new journal type `write-off` has been added to ease the creation of
  write-offs.
* Taxes has now an optional start and end, this allows to manage the changes
  over time.

French Chart of Account
~~~~~~~~~~~~~~~~~~~~~~~

* The French chart of account has been updated for the new tax rates of 2014.

Account Statement
~~~~~~~~~~~~~~~~~

* The module prevents now to use an already paid invoice in draft statements.
* It uses the new index of `on_change` to add the new split line under the
  original.

Account Stock Continental
~~~~~~~~~~~~~~~~~~~~~~~~~

* The creation of account move for stock move is speed-up.

Bank
~~~~

* The IBAN numbers are now validated and formatted.

Company
~~~~~~~

* A new timezone field is added to the company to get the right date for today.
* The employee is also taken from the context just like the company. This
  allows to use many clients with the same user but different employees.

Production
~~~~~~~~~~

* It is now possible to define the effective date of a production. This allows
  to enter past productions.

Purchase
~~~~~~~~

* There is now a warning when trying to receive a supplier stock move without
  an origin. Normally, the origin should be a purchase order.
* The purchase tries to create links between stock moves and invoice lines.

Sale
~~~~

* The same warning exists for customer move without origin.
* The sale tries as the purchase to create links between stock moves and
  invoice lines.

Stock
~~~~~

* Supplier Shipment Return can now have partial assignation
* The computation of stock quantities has been reworked to allow easy
  customization and better search.
* It is now possible to define the effective date for all shipments. This
  allows to enter past shipments.

Stock Lot
~~~~~~~~~

* A new relate has been added from lot to moves.

New modules
-----------

* The `Party Relationship` module defines different types of relations between
  parties.
* The `Account Payment` module allows to generate grouped payments for
  receivable and payable account move lines.
* The `Account Payment SEPA` module allows to generate SEPA files for
  payments.
* The `Stock Package` module allows to store packaging information about
  customer and supplier return shipments.
* The `Sale Shipment Grouping` module adds an option to define how stock moves
  generated from sales will be grouped.
* The `Account Credit Limit` module manages credit limit of parties.
* The `Sale Credit Limit` module adds confirmed sale to the credit amount of
  the party.
