Tryton Website
==============

This repository holds a pelican powered static site generator that is
used to build the tryton website. This README has information you may
need if you wish to contribute to the site.

Setting up a development environment
------------------------------------

.. code:: bash


    # Clone the repo
    git clone git@github.com:openlabs/tryton.us
    cd tryton.us

    # The pelican plugins are in a submodule
    git submodule init
    git submodule update

    # Install the dependencies
    pip install -r requirements.txt

    # Build the pages
    fab build

    # Serve the pages to view on browser
    fab serve

Your terminal should now say ``Serving on port 8000 ...``

Open  `localhost:8000  <http://localhost:8000/>`_ and you should be able to see the tryton website
on your browser.

You should now be able to see the content but the page will look broken
to you if this is the first time you are running ``fab build``. This is
because the CSS and JS assets are not bundled with the repo, but have to
be installed using `bower  <http://bower.io/>`_  (``pip`` equivalent in the web development
world).

.. code:: bash


    # From the root of the folder
    bower install

    # To update the dependencies
    bower update

You must have  `bower installed  <http://bower.io/#install-bower/>`_  for the above command to work.

Template Pages and Articles
---------------------------

The two main content types through the website are pages like apps,
features and contact-us and articles which are blog posts, news items
and tutorials. The pages are generated directly from templates and are
explicitly listed on the ``pelicanconf.py`` file. The articles however
are automatically discovered from the content folder. If you are
confused if what you wish to write has to be a page or an article,
please open up a github issue and perhaps others could help ?

Folder structure
~~~~~~~~~~~~~~~~

Articles are written in the content folder and their translated versions
are written in the specific language folders.

::

    ├── content
    │   ├── fr
    │   │   └── my-article.md
    │   └── my-article.md

Translating content
-------------------

The translation system uses standard gettext and the jinja2 plugin
system to build pages with translations. The articles however require
separate files where the translated article is written (see folder
structure above).

Some useful commands that will help you translate the website are
documented below. All commands are implemented in the fabfile and can be
invoked using ``fab <cmd>:<arg>``.

``i18n_init:<lang_code>``
~~~~~~~~~~~~~~~~~~~~~~~~~

Initialize for a new language translation folder which does not exist
already. You can check if a translation folder already exists.

Example:

``fab i18n_init:fr``

while would initialize french translations.

``i18n_extract``
~~~~~~~~~~~~~~~~

Extract translatable strings once again by going through the templates.
This would be usually done by a release manager before releasing a new
version of the website.

``i18n_update_catalog``
~~~~~~~~~~~~~~~~~~~~~~~

Update catalog when messages changes. Usually done after an extract
operation is done. This could add untranslated strings to the individual
language po files.

``i18n_compile``
~~~~~~~~~~~~~~~~

Compile all translations from the corresponding po files of each
language.

::

    ├── i18n
    │   ├── fr
    │   │   └── LC_MESSAGES
    │   └── messages.pot
