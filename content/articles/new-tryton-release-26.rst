New Tryton release 2.6
#######################################################################################

:lang: en
:slug: new-tryton-release-26
:date: 2012/10/23 12:00:00
:tags: release
:link: 
:description: 

We are happy to announce the 2.6 release of `Tryton <http://www.tryton.org/>`_.

This release brings major changes in the `API
<http://en.wikipedia.org/wiki/API>`_ with the introduction of the `Active
Record <http://en.wikipedia.org/wiki/Active_record>`_ pattern. But also the
graphical user interface was not left without improvements. And as usual there
are many bug-fixes, module improvements and new modules (as announced in the
previous release news).

Of course, migration from previous series is fully supported.

Major changes in graphical user interface
-----------------------------------------

* Management of model access and create/delete field access.

  The client is now aware of the model access which allows the disable buttons
  when the user doesn't have access to it.

  It is also possible to manage the create/delete event on fields in addition
  to read/write.
* Dynamic size limit on the One2Many, Many2Many and Char.

  It is now possible to limit the size of those fields and the client will
  enforce it.
* Remove "Please wait" box. The popup was annoying because it make the client
  lost the focus.
* Paste in editable list view. It is possible to paste from a spreadsheet to
  update a set of rows.

Major changes on the server side
--------------------------------

* Allow to use Reference field in One2Many & Many2Many.

  In addition to the Many2One, the reverse field could be a Reference field.
  In the future, the link between Move and Shipments will be done like that
  instead of having 4 exclusive Many2One fields.
* All kind of buttons have been merge into one simple concept.
* `Active Record <http://en.wikipedia.org/wiki/Active_record>`_: This is the
  result of refactoring work started 2 years ago.

  Here are some benefits:

  * Reduce the amount of code (about 2.2k lines removed) for example
    on_change_with and getter of Function field can be merged.
  * Unify access to the value of record if it is stored or not in the database.
    It allows to remove of values dictionary on on_change method.
  * Remove loop over ids in getter of Function field:

    *before*::

        def getter(self, ids, name):
            res = {}
            for record in self.browse(ids):
                res[record.id] = …
            return res

    *after*::

        def getter(self, name):
            return self.…
  * Rationale the register process of Model (use copy of fields etc.)
  * Remove session in wizard. Now the wizard instance is the session.

* Allow to store the views in a XML file instead of the database. This supports
  the modification of a view without updating the database. A good speedup for
  designing views.
* A new kind of validation has been added the pre_validation.

  The new pre_validation allows to validate a record without saving it. This is
  used by the client to validate lines of a One2Many. With pre_validation it is
  possible to provide feedback to the user as soon as possible and before the
  record is saved.

Modules
-------

account
~~~~~~~

* The Trial Balance report displays now the start and end balance in addition
  to the debit and credit columns.
* Double-clicking on Balance Sheet opens accounts.
* The Account Chart doesn't show cumulate Debit/Credit by default but only for
  the current period.
* The Aged Balance is computed over all fiscalyears.
* The Account Moves have been refactored to include an origin field which
  allows to easily link it to the master document. They have two number fields
  for draft and posted.

account_stock_continental
~~~~~~~~~~~~~~~~~~~~~~~~~

* Updating cost price create automaticaly a stock accounting move.

purchase
~~~~~~~~

* The purchase manages negative quantities on lines, they will generate Return
  Shipments and Credit Note.

stock
~~~~~

* A graph has been added showing the evolution in past and future of the stock
  level for a product per warehouse.

.. raw:: html

    <div class="pagination-centered">

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_product_quantities_warehouse2.png
    :height: 322
    :width: 640
    :alt: product quantities per warehouse

.. raw:: html

    </div>

New modules
-----------

* `stock_lot` defines lot of products.
* `stock_split` adds a wizard to split move.
* `account_fr` adds French account chart.
* `production` defines the basics for production management.
* `stock_supply_production` adds automatic supply mechanisms via production
  requests.

Other changes graphical user interface
--------------------------------------

* Constant interpolation has been added to line graph.
* The group could have a readonly state.
* It is possible to define a time format different of the classic '%H:%M:%S'.

Other changes on server side
----------------------------

* The `ModelSQL.default_sequence` has been removed. The sequence fields will no
  more increase indefinitely.
* The time format is validated, so it is possible to enforce the second to 0
  for example.
* `__tryton__.py` is replaced by `tryton.cfg`, a static file.
* It is possible to use tuple as Reference value. It is useful to construct
  dynamic domain on such field in `PYSON`.
