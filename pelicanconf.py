#!/usr/bin/env python
# -*- coding: utf-8 -*- #
from __future__ import unicode_literals

AUTHOR = u'Tryton'
SITENAME = u'Tryton'
SITEURL = ''

PATH = 'content'
PAGE_PATHS = ['pages']
STATIC_PATHS = ['images']
ARTICLE_PATHS = ['articles']
DIRECT_TEMPLATES = ('index', 'categories', 'authors', 'archives', 'tags')

PLUGIN_PATHS = ['pelican-plugins']
PLUGINS = ['i18n_subsites', ]

# Internationalization
JINJA_EXTENSIONS = ['jinja2.ext.i18n',]
I18N_GETTEXT_LOCALEDIR = 'i18n/'
I18N_GETTEXT_DOMAIN = 'messages'
I18N_SUBSITES = {
    'fr': {}
}


TIMEZONE = 'Europe/Paris'

DEFAULT_LANG = u'en'

# Feed generation is usually not desired when developing
FEED_ALL_ATOM = None
CATEGORY_FEED_ATOM = None
TRANSLATION_FEED_ATOM = None
AUTHOR_FEED_ATOM = None
AUTHOR_FEED_RSS = None

# Blogroll
LINKS = (
    ('You can modify those links in your config file', '#'),
)

# Social widget
SOCIAL = (
    ('You can add links in your config file', '#'),
    ('Another social link', '#'),
)

DEFAULT_PAGINATION = 10
DELETE_OUTPUT_DIRECTORY = True

RELATIVE_URLS = True


THEME = 'theme'

TEMPLATE_PAGES = {
    'home.html': 'index.html',  # change root page of website
    'features.html': 'features.html',
    'app.html': 'app.html',
    'foundation.html': 'foundation.html',
    'ecommerce.html': 'ecommerce.html',
    'accounts.html': 'accounts.html',
    'inventory.html': 'inventory.html',
    'crm.html': 'crm.html',
    'purchase.html': 'purchase.html',
    'orders.html': 'orders.html',
    'projects.html': 'projects.html',
    'community.html': 'community.html',
    'download.html': 'download.html'
}

# Output dir structure
ARTICLES_URL_ROOT = 'blogs'

INDEX_SAVE_AS = '%s/index.html' % ARTICLES_URL_ROOT
ARTICLE_URL = "%s/{slug}.html" % ARTICLES_URL_ROOT
ARTICLE_SAVE_AS = "%s/{slug}.html" % ARTICLES_URL_ROOT

CATEGORIES_SAVE_AS = '%s/categories.html' % ARTICLES_URL_ROOT
CATEGORY_URL = "%s/category/{slug}.html" % ARTICLES_URL_ROOT
CATEGORY_SAVE_AS = "%s/category/{slug}.html" % ARTICLES_URL_ROOT

TAGS_SAVE_AS = '%s/tags.html' % ARTICLES_URL_ROOT
TAG_URL = "%s/tag/{slug}.html" % ARTICLES_URL_ROOT
TAG_SAVE_AS = "%s/tag/{slug}.html" % ARTICLES_URL_ROOT
