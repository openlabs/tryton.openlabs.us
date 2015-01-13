Nouvelle version de Tryton 2.6
#######################################################################################

:lang: fr
:slug: nouvelle-version-de-tryton-26
:date: 2012/10/23 12:00:00
:tags: release
:link: 
:description: 

Nous sommes heureux d'annoncer la version 2.6 de `Tryton
<http://www.tryton.org/fr/>`_.

Cette version apporte de nombreux changements dans l'`API
<http://en.wikipedia.org/wiki/API>`_ avec l'introduction du patron `Active
Record <http://en.wikipedia.org/wiki/Active_record>`_. L'interface graphique a
elle aussi reçu son lot d'améliorations. Comme d'habitude, la nouvelle version
s'accompagne de corrections de bogues, de nouveaux modules (que nous annoncions
précédemment) et de améliorations de modules existants.

Évidemment la migration depuis une version précédente est entièrement
fonctionnelle.

Les changements majeurs dans l'interface graphique
--------------------------------------------------

* Gestion des droits d'accès au niveau du modèle et des champs.

  Le client est maintenant capable de désactiver le bouton ‘Enregistrer’ quand
  un utilisateur n'a pas le droit de l'utiliser.

  Cette fonctionnalité est aussi présente sur les champs relation pour la
  création/l'effacement d'enregistrements distants.
* Limitation dynamique de la taille des champs One2Many, Many2Many et Char.

  Il est possible de limiter la taille de ces champs tant au niveau du serveur
  que du client.
* Suppression de la boite « Patientez … ». Cette fenêtre pop-up était ennuyante
  car elle entraînait une perte de focus.
* Le copier/coller en vue ‘liste éditable’ peut mettre à jour une sélection
  carrée depuis par exemple un logiciel de type tableur.

Changements majeurs apportés au serveur
---------------------------------------

* Les champs ‘Reference’ sont utilisables pour les One2Many et Many2Many.

  En plus de pouvoir utiliser un Many2One comme lien inverse de la relation, il
  est à présent possible d'utiliser un champ ‘Reference’.
  À l'avenir le lien entre les mouvements de stock (‘Move’) et les livraisons
  (‘Shipment’) utiliseront ce principe plutôt que quatre Many2One mutuellement
  exclusifs.
* Tous les boutons ont été fusionnés dans un seul concept bien plus simple.
* `Patron Active Record <http://fr.wikipedia.org/wiki/Active_record>`_ : Ceci
  est le résultat d'un travail de refactorisation commencé il y a 2 ans.

  Voici quelques uns des bénéfices que nous en tirons:

  * La taille du code a été réduite (à peu près 2200 lignes de code retirées)
    par exemple les on_change_with et les getter des champs Function peuvent
    être fusionnés.
  * Unification de la manière d'accéder aux valeurs d'un enregistrement qu'il
    soit ou non dans la base de données. Ceci permet par exemple de simplifier
    les appels à la méthode on_change.
  * Suppression de la boucle sur les ids dans les getter des champs Function:

    *avant*::

        def getter(self, ids, name):
            res = {}
            for record in self.browse(ids):
                res[record.id] = …
            return res

    *après*::

        def getter(self, name):
            return self.…
  * Rationalisation du processus d'enregistrement des Model (copie des champs etc.)
  * Suppression du paramètre session dans les ‘wizard’. Maintenant l'instance
    du ‘wizard’ est la session.

* Les vues peuvent être stockée dans un fichier XML au lieu de la base de
  données. Ceci permet la modification des vue sans mise à jour de la base de
  données et accélère leur conception.
* Un nouveau genre de validation a été ajouté la pre_validation.

  Cette nouvelle pre_validation permet de valider l'enregistrement sans le
  sauver. Elle est utilisée par le client pour valider les lignes du  One2Many.
  Avec la pre_validation, il est possible de fournir un retour à l'utilisateur
  au plus tôt et ce avant la sauvegarde.

Modules
-------

account
~~~~~~~

* La balance affiche maintenant la balance de départ et de fin en plus des
  colonnes débit et crédit.
* Le double-clique sur le bilan ouvre les comptes.
* Le plan comptable n'affiche plus les débit/crédit cumulés par défaut mais
  seulement pour la période courante.
* La balance âgée est calculée sur toutes les années fiscales.
* Les mouvements comptables ont été refactorisés pour inclure un champ origine
  ce qui permet de faire un lien vers le document maître. Ils ont aussi deux
  champs numérotés pour l'état brouillon et l'état posté.

account_stock_continental
~~~~~~~~~~~~~~~~~~~~~~~~~

* La mise à jour du prix de revient crée automatiquement un mouvement
  comptable.

purchase
~~~~~~~~

* Les achats gèrent les quantités négatives sur les lignes. Un retour
  d'expédition et une note de crédit seront générées.

stock
~~~~~

* Un graphique a été ajouté montrant l'évolution dans le passé et le futur du
  niveau de stock pour un produit par entrepôt.

.. raw:: html

    <div class="pagination-centered">

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_product_quantities_warehouse2.png
    :height: 322
    :width: 640
    :alt: quantités de produit par entrepôt

.. raw:: html

    </div>

New modules
-----------

* `stock_lot` définit des lot de produits.
* `stock_split` ajoute un ‘wizard’ pour fractionner les mouvements.
* `account_fr` ajoute le plan comptable français.
* `production` définit les bases pour la gestion de production.
* `stock_supply_production` ajoute l'approvisionnement via des demandes de
  production.

Autres changements dans l'interface graphique
---------------------------------------------

* L'interpolation «constante» a été ajoutée au graphique linéaire.
* Les groupes peuvent avoir un état ‘readonly’.
* Il est possible de définir un format pour le temps différent du classique
  '%H:%M:%S'.

Autres changements côté serveur
-------------------------------

* La méthode `ModelSQL.default_sequence` a été supprimée. Les champs séquence
  ne vont plus augmenter indéfiniment.
* Le format du temps est validé, donc il est possible d'assurer que les
  secondes valent 0 par exemple.
* `__tryton__.py` est remplacé par `tryton.cfg`, un fichier statique.
* Il est possible d'utiliser un tuple comme valeur de Reference. C'est utile
  pour construire des domaines dynamiques sur de tel champs en `PYSON`.
