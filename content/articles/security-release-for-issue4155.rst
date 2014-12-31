Security Release for issue4155
#######################################################################################

:lang: en
:slug: security-release-for-issue4155
:date: 2014-09-30 10:00:00 UTC
:tags: release,security
:link: 
:description: 
:type: text

Synopsis
--------

A vulnerability in `trytond <http://pypi.python.org/pypi/trytond>`_ has been
found by `duesenfranz <https://bugs.tryton.org/user497>`_, that might allow a
malicious user to execute arbitrary commands on the server via the `safe_eval`
function (see `issue4155 <https://bugs.tryton.org/issue4155>`_).

Impact
------

Any authenticated user can run arbitrary commands on the server with the
permissions of the `trytond` user.

Workaround
----------

There is no workaround.

Resolution
----------

All users should upgrade `trytond` to the latest version of the used series.

References
----------

* issue4155 https://bugs.tryton.org/issue4155
* CVE-2014-6633 https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2014-6633

Concern?
--------

Any security concerns should be reported on the bug-tracker at
https://bugs.tryton.org/ with the type `security`.
