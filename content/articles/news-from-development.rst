News from Development
#######################################################################################

:lang: en
:slug: news-from-development
:date: 2013/02/18 12:00:00
:tags: development
:link: 
:description: 

Here are some changes recently landed in the development branch of Tryton that
will be available on the next release.

Server
------

* Now the default language stored in database overrule the default language of
  the configuration file. This allows to have a multi-database server with
  different default languages.
* The ``(Field, Operator, Operand)`` in record rules has been replaced by a
  plain standard domain. This change shows a speed-up increase of 30% on
  running the unit test suite.
* The API_ of the ``ModelStorage.create`` has been changed to use a list of
  values. This allows to create many records in one call and takes advantage of
  validation per bunch.
* A new kind of field has been added: ``Dict``. This field allows to store a
  ``dictionary`` for which the definitions of the keys are stored in the
  database.
* The ``selection_change_with`` attribute is added to the ``Selection`` and
  ``Reference`` fields. It behaves like the ``on_change_with`` but it modifies
  the list of selection values. The validation process takes care also of this
  new attribute.

.. _API: http://en.wikipedia.org/wiki/API

Client
------

* The filter box has been improved to allow:

  * multi-selection of values for ``Selection`` fields

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_multi_selection_filter.png
        :alt: multi-selection filter

  * range for ``Date`` and ``DateTime`` fields

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_range_date_filter.png
        :alt: range date filter

* In order to reduce the number of menu entries, a new concept is introduced:
  the `Tab Domain`. This allows to define a set of tabs linked to a domain.
  Switching from one tab to another, update the list of records according to
  the domain. All the modules have been updated to take advantage of this
  feature and remove the extra menu entries.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_domain_tab.png
        :alt: domain tab

* Users can now bookmark their own search.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_search_bookmark.png
        :alt: search bookmark

* The icon for ``URL`` widget can be dynamic.
* The ``URL`` widget is available also on list view.
* The menu favorites replaces the menu shortcut. The new design gives a better
  user experience.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_menu_favorites.png
        :alt: menu favorites

* A global search is now available. It allows to search over all the business
  records.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_global_search.png
        :alt: global search

Modules
-------

Account Asset
~~~~~~~~~~~~~

It is a new module to manage depreciation of fixed assets.
For now, only “linear“ depreciation method is available but the module is
designed to welcome new methods.

Account
~~~~~~~

* A ``kind`` field has been added to `Tax Group` and `Tax Rule` with the
  possible values: `Sale`, `Purchase` or `Both`. Each chart of account can use
  them to ease tax selection.

Account Invoice
~~~~~~~~~~~~~~~

* The workflow of the `Invoice` have been reviewed. Here's the result:

  * In Cancel state the `Move` on the `Invoice` is deleted or cancelled.
  * Draft `Move` for `Supplier Invoice` is created on validation. This gives
    more accurate accounting report for those who use draft moves.
  * The Proforma state is renamed into Validated to be more generic.
  * The Opened state is renamed into Posted to be more coherent with the rest
    of the software.

Stock
~~~~~

* A workflow has been added to `Stock Move` thanks to the new lightweight
  workflow introduced in 2.4 series which no longer causes performance issues.

Product Attribute
~~~~~~~~~~~~~~~~~

It is a new module to manage any set of attributes on `Product` by using the
new ``Dict`` field.

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_product_attribute.png
    :alt: product attribute
