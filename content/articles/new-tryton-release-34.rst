New Tryton release 3.4
#######################################################################################

:lang: en
:slug: new-tryton-release-34
:date: 2014-10-20 18:00:00 UTC
:tags: release
:link: 
:description: 
:type: text

Weee are proud to announce the 3.4 release of `Tryton <http://www.tryton.org/>`_.

In addition to the usual improvements of existing features for users and
developers, this release has seen a lot of work done on the accounting part.

`Of course, migration from previous series is fully supported with the obvious
exception of the ldap_connection module which was removed.`

Major changes in graphical user interface
-----------------------------------------

* The search of relation record has been re-worked to take advantage of the
  auto-completion. The search box of the pop-up window is filled with the text
  entered in the widget.

* The `search`/`open` button of the `Many2One` widget is now inside the entry
  box and the `create` button is removed in favor of auto-completion actions or
  pop-up button. This change allow to harmonize the size of all widgets inside
  a form.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_many2one_button_inside.png
        :alt: many2one button inside

* A new image widget is available on list/tree view.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_widget_image_tree.png
        :alt: widget image tree

* The client can now perform a pre-validation before executing a button action.
  The validation is based on a domain and so the offending fields can be
  highlighted and focused instead of having an error message pop-up.

* The selection label are now available in addition of the internal value for
  the export data (`CSV
  <https://en.wikipedia.org/wiki/Comma-separated_values>`_) functionality.

* The export data window is now predefined with the fields of the current view.
  This gives a fast way to export what you see.

* The predefined export can now be replaced directly with a new selection of
  fields. This eases the process of creating such predefined exportation.

* It is now possible to re-order the list of the exported fields using drag and
  drop.

* The range operator of the search box is now including on both endpoints. It
  appears to be less astonishing behavior for users even if the previous
  behavior including-excluding had some practical advantages.

* The client loads now plug-ins defined in the user local directory
  (`~/.config/tryton/x.y/plugins`).

Major changes on the server side
--------------------------------

* A new `Mixin <https://en.wikipedia.org/wiki/Mixin>`_ `MatchMixin` is
  introduced. It allows to implement a common pattern in Tryton to find records
  that match certain values.

* Another `UnionMixin` is also introduced. It allows to define a `ModelSQL`
  which is the `UNION
  <http://en.wikipedia.org/wiki/Union_(SQL)#UNION_operator>`_ of some
  `ModelSQL`'s.

* Actually, Tryton doesn't update a record defined in a `XML` file if this one
  has been modified outside the `XML`. Now, it is possible to find those
  records and force the update to get the record synchronised with the `XML`.

* A `Python descriptor <https://docs.python.org/2/howto/descriptor.html>`_ has
  been added to the Selection field. It allows to define an attribute on a
  Model which will contains the selection label of the record. It is planned to
  update all the reports to use such descriptor instead of hard-coded values.

* A new configuration file format is introduced for the server. It is easily
  extendable to be used by modules. For example, the `ldap_authentication`
  module starts using it in replacement of the removed `ldap_connection`.

* It is now possible to give a logging configuration files to setup the server
  logging. This file uses the `Python logging configuration format
  <https://docs.python.org/2/library/logging.config.html#configuration-file-format>`_.

* The context defined on relation fields are now used to instantiate the target.

* The SQL clause for a domain on a field can be now customized using a
  `domain_<field>` method. This method allows in some cases a more efficient
  SQL query. The method is designed to support joins.

* The access rights has been reworked to be active only on `RPC
  <https://en.wikipedia.org/wiki/Remote_procedure_call>`_ calls. With this
  design, Tryton follows the principle of checking input on the border of the
  application. So it is no more required to switch to the root user when
  calling methods requiring some specific access rights as far as it is not
  from an RPC call.

Modules
-------

Account
~~~~~~~

* A new wizard to help reconcile all accounts has been added. It loops over
  each account and party and makes a proposal of lines to reconcile if it
  could find one. This really speeds up the reconciliation task.

  .. class:: img-rounded img-responsive
  .. image:: ../images/news/tryton_reconcile_wizard.png
        :alt: reoncilie wizard

* There is also another new wizard to ease the creation of cancellation moves.
  The wizard also reconciles automatically the line with the cancelled sibling.

* A new option `Party Required` on account has been added. This option makes
  the party required for move lines of this account and forbids it for others.

Account Invoice
~~~~~~~~~~~~~~~

* It is now possible to configure which tax rounding to use. There are two
  ways implemented: per document and per line. The default stays per document.

Account Payment
~~~~~~~~~~~~~~~

* It is now possible to change a succeeded payment to failed.

Account Payment SEPA
~~~~~~~~~~~~~~~~~~~~

* The scheme `Business to Business` is supported for direct debit.

* The mandate receives now a default unique identification using a configured
  sequence.

* The module supports now the bank to customer debit/credit notification
  message (CAMT.054).

* A report to print a standard form for mandate has been added.

Account Statement
~~~~~~~~~~~~~~~~~

* It is now possible to order the statement lines and to give them a number.
  With those features, it is easier to reproduce the same layout of a bank
  statement.

* A report for statement has been added. For example, it can be used when using
  the statement for check deposit.

* A validation method can be defined on the statement journal. The available
  methods are: `Balance`, `Amount` and `Number of Lines`. This helps to uses
  the statement for different purposes like bank statement or check deposit.

Account Stock Continental/Anglo-Saxon
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* The method is now defined on the fiscal year instead of being globally
  activated on module installation.

Country
~~~~~~~

* It is now possible to store zip code per country. A script is provided to
  load zip codes from `GeoNames <http://www.geonames.org/>`_.

LDAP Authentication
~~~~~~~~~~~~~~~~~~~

* The module `ldap_connection` has been replaced by an entry in the
  configuration file of `trytond`.

Party
~~~~~

* The new zip code from the module `country` is used to auto-complete zip and
  city field on address.

Purchase
~~~~~~~~

* The `Confirmed` state has been split into `Confirmed` and `Processing`, just
  like the Sale workflow.

Sale Supply Drop Shipment
~~~~~~~~~~~~~~~~~~~~~~~~~

* The management of exception on drop shipment is propagated from the sale to
  the purchase.

New modules
-----------

* The `Account Payment Clearing` module allows to generate clearing account
  move when a payment has succeeded between the receivable/payable account to a
  clearing account. The clearing account will be reconciled later by the
  statement.

Proteus
-------

Proteus is a library to access Tryton like a client.

* It is now possible to run reports. It is useful for testing them.

* A new duplicate method is added which is similar to the copy menu entry of
  the client.
