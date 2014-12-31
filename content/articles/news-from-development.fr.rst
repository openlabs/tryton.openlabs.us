Derniers développements
#######################################################################################

:lang: fr
:slug: derniers-developpements
:date: 2013/02/18 12:00:00
:tags: development
:link: 
:description: 

Voici les changements récents qui sont rentrés dans la branche de développement
de Tryton et donc qui seront disponibles dans la prochaine version.

Serveur
-------

* Maintenant la langue par défaut est stockée dans la base de données et prévaut
  sur celui du fichier de configuration. Ceci permet d'avoir un serveur
  multi-DB avec des langues par défaut différentes.
* L'ensemble ``(Champ, Operateur, Operande)`` dans les règles d'enregistrement
  a été remplacé par un simple domaine standard. Ce changement a permis un gain
  de performance de 30% sur l'exécution des tests unitaires.
* L'API_ de ``ModelStorage.create`` a été changée pour utiliser une liste de
  valeurs. Ceci permet de créer plusieurs enregistrements en un seul appel et
  ainsi tirer avantage de la validation par groupe.
* Un nouveau type de champs a été ajouté : ``Dict``. Ce champ permet de stocker
  un ``dictionaire`` pour lequel les définitions des clés viennent de la base
  de données.
* L'attribut ``selection_change_with`` a été ajouté aux champs ``Selection``
  et ``Reference``. Il se comporte comme le ``on_change_with`` mais il modifie
  la liste des valeurs de la selection. Le processus de validation prend
  évidement en compte ce nouvel attribut.

.. _API: http://fr.wikipedia.org/wiki/Interface_de_programmation

Client
------

* La boite de recherche a été améliorée pour permettre:

  * la sélection multiple de valeurs pour les champs ``Selection``

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_multi_selection_filter.png
        :alt: sélection multiple de recherche

  * une plage pour les champs ``Date`` et ``DateTime``

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_range_date_filter.png
        :alt: recherche par plage de date

* Afin de réduire le nombre d'entrées de menu, un nouveau concept est
  introduit: le `Domain d'onglet`. Il ajoute un ensemble d'onglets liés à un
  domaine. En passant d'un onglet à un autre, la liste des enregistrements est
  mise à jour suivant le domaine. Tous les modules ont été mis à jour pour
  tirer avantage de cette fonctionalité et ainsi réduire le nombre d'entrées
  dans le menu.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_domain_tab.png
        :alt: domain d'onglet

* Les utilisateurs peuvent maintenant mettre en signet leur propre recherche.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_search_bookmark.png
        :alt: signet de recherche

* L'icône du widget ``URL`` peut être dynamique.
* Le widget ``URL`` est disponible en vue liste.
* Les favoris remplacent les raccourcis menu. La nouvelle conception donne une
  meilleure expérience utilisateur.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_menu_favorites.png
        :alt: favorites menu

* Une recherche globale est maintenant disponible. Elle permet de rechercher
  sur tous les enregistrements métiers.

    .. class:: img-rounded img-responsive
    .. image:: ../images/news/tryton_global_search.png
        :alt: recherche globale

Modules
-------

Account Asset
~~~~~~~~~~~~~

C'est un nouveau module pour la gestion des amortissements des immobilisations.
Pour l'instant, seul l'amortissement «linéaire» est disponible mais le module
est conçu pour en accueillir de nouveaux.

Account
~~~~~~~

* Un champ ``kind`` a été ajouté aux `Group de taxe` et `Règle de taxe` avec
  les valeurs possibles: `Vente`, `Achat` ou `Les deux`. Chaque plan comptable
  peut les utiliser pour faciliter la sélection de taxe.

Account Invoice
~~~~~~~~~~~~~~~

* Le « workflow » de la `Facture` a été revu. Voici le résultat:

  * Dans l'état Annulé, le `Mouvement` sur la `Facture` est supprimé ou annulé.
  * Un `Mouvement` brouillon est créé à la validation de `Facture fournisseur`.
    Ceci permet d'avoir des rapports comptables plus précis en mode brouillard.
  * L'état Proforma est renommé en Validé pour être plus générique.
  * L'état Ouvert est renommé en Posté pour être plus cohérent avec le reste du
    logiciel.

Stock
~~~~~

* Un « workflow » a été ajouté au `Mouvement de stock` grâce au nouveau
  « workflow » léger introduit dans la série 2.4 qui ne pose plus de problème
  de performance.

Product Attribute
~~~~~~~~~~~~~~~~~

C'est un nouveau module pour gérer tout un ensemble d'attributs sur le
`Produit` en utilisant le nouveau champ ``Dict``.

.. class:: img-rounded img-responsive
.. image:: ../images/news/tryton_product_attribute.png
    :alt: attribute de produit
