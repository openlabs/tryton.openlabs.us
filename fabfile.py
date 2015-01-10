from fabric.api import *
import fabric.contrib.project as project
import os
import sys
import SimpleHTTPServer
import SocketServer

from pelicanconf import I18N_GETTEXT_LOCALEDIR, I18N_GETTEXT_DOMAIN

# Local path configuration (can be absolute or relative to fabfile)
env.deploy_path = 'output'
DEPLOY_PATH = env.deploy_path

# Remote server configuration
production = 'root@localhost:22'
dest_path = '/var/www'

# Rackspace Cloud Files configuration settings
env.cloudfiles_username = 'my_rackspace_username'
env.cloudfiles_api_key = 'my_rackspace_api_key'
env.cloudfiles_container = 'my_cloudfiles_container'


def i18n_extract():
    """
    Extract translatable strings
    """
    local(
        'pybabel extract '
        '--mapping babel.cfg '
        '--output %s/messages.pot ./' % (I18N_GETTEXT_LOCALEDIR, )
    )


def i18n_init(lang):
    """
    Initialize for a new language
    """
    local(
        'pybabel init '
        '--input-file %s/messages.pot '
        '--output-dir %s '
        '--locale %s '
        '--domain %s ' % (
            I18N_GETTEXT_LOCALEDIR,
            I18N_GETTEXT_LOCALEDIR,
            lang,
            I18N_GETTEXT_DOMAIN,
        )
    )


def i18n_compile():
    """
    Compile all translations
    """
    local(
        'pybabel compile '
        '--directory %s '
        '--domain %s ' % (
            I18N_GETTEXT_LOCALEDIR,
            I18N_GETTEXT_DOMAIN,
        )
    )


def i18n_update_catalog():
    """
    Update catalog when messages change
    """
    local(
        'pybabel update '
        '--input-file %s/messages.pot '
        '--output-dir %s '
        '--domain %s ' % (
            I18N_GETTEXT_LOCALEDIR,
            I18N_GETTEXT_LOCALEDIR,
            I18N_GETTEXT_DOMAIN,
        )
    )


def clean():
    if os.path.isdir(DEPLOY_PATH):
        local('rm -rf {deploy_path}'.format(**env))
        local('mkdir {deploy_path}'.format(**env))

def build():
    local('pelican -s pelicanconf.py')

def rebuild():
    clean()
    build()

def regenerate():
    local('pelican -r -s pelicanconf.py')

def serve():
    os.chdir(env.deploy_path)

    PORT = 8000
    class AddressReuseTCPServer(SocketServer.TCPServer):
        allow_reuse_address = True

    server = AddressReuseTCPServer(('', PORT), SimpleHTTPServer.SimpleHTTPRequestHandler)

    sys.stderr.write('Serving on port {0} ...\n'.format(PORT))
    server.serve_forever()

def reserve():
    build()
    serve()

def preview():
    local('pelican -s publishconf.py')


def s3_upload():
    rebuild()
    local('s3cmd sync output/* s3://www.tryton.us')

def cf_upload():
    rebuild()
    local('cd {deploy_path} && '
          'swift -v -A https://auth.api.rackspacecloud.com/v1.0 '
          '-U {cloudfiles_username} '
          '-K {cloudfiles_api_key} '
          'upload -c {cloudfiles_container} .'.format(**env))

@hosts(production)
def publish():
    local('pelican -s publishconf.py')
    project.rsync_project(
        remote_dir=dest_path,
        exclude=".DS_Store",
        local_dir=DEPLOY_PATH.rstrip('/') + '/',
        delete=True,
        extra_opts='-c',
    )
