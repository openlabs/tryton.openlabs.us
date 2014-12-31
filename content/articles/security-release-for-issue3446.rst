Security Release for issue3446
#######################################################################################

:lang: en
:slug: security-release-for-issue3446
:date: 2013/11/04 10:00:00
:tags: release,security
:link: 
:description: 

Synopsis
--------

A vulnerability in `tryton <http://pypi.python.org/pypi/tryton>`_ has been
found, that might allow a malicious server to send a crafted extention as
answer to a report request leading the client to write the report on any file
of the client host with the right of the user running the client (see
`issue3446 <http://bugs.tryton.org/issue3446>`_).

Impact
------

Any file can be created on the client host with the access permissions of the
user running the client.

Workaround
----------

Users should connect only to trusted servers.

Resolution
----------

All users should upgrade to the latest version of the used series.

References
----------

* issue3446 https://bugs.tryton.org/issue3446
* CVE-2013-4510 https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2013-4510

Concern?
--------

Any security concerns should be reported on the bug-tracker at
http://bugs.tryton.org/ with the type `security`.
