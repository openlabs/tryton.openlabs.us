tryton.openlabs.us
==================

The missing Tryton website

Contributing (The hard way)
---------------------------

This website is built using `pelican <http://docs.getpelican.com/>`_. So this
method of contributing involves cloning this repository, making changes and
then sending the changes back. This is required only if you are making changes
to the template or building new features.

To make changes to existing articles, or to just add new articles, you could
use the lazy method outlined below. The choice is yours.

1. Clone this repo
```````````````````

.. code-block:: shell

    git clone git@github.com:openlabs/tryton.openlabs.us
    cd tryton.openlabs.us

2. Installing the site
```````````````````````

You should be doing this in a virtualenv.

.. code-block:: shell

    pip install -r requirements.txt

The above code should install all the required files.

3. Building the site
````````````````````

.. code-block:: shell

    fab build

This should create a new `output` folder where the generated html is placed.
To view this in your web browser, you can use the builtin web server.

.. code-block:: shell

    fab serve

You can now open your web browser and goto `localhost:8000 <http://localhost:8000>`_
to view the generate page.


Contributing (the lazy way)
---------------------------

TODO
