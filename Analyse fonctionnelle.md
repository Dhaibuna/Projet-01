# Analyse Fonctionnelle (Cahier des charges)

**Objectif** : Créer un média collaboratif, une plateforme sur laquelle les utilisateurs pourront délivrer leurs connaissances sur des sujets divers sous format d'articles et de billets d'humeur.

- La possibilité pour un potentiel utilisateur de **s'inscrire** et de **se connecter** sur la plateforme (OK)
- L'utilisateur enregistré simple peut **publier** des articles, les **modifier**, les **supprimer**, **consulter** les profiles des autres utilisateurs(OK)
- L'utilisateur non enregistré peut uniquement consulter les articles et le profile de l'utilisateur simple (OK)
- La page d'accueil doit **recenser** les articles (OK)
- Chaque utilisateur a le droit de **modifier** ses informations via un onglet "settings" (OK)
- Chaque profil d'utilisateur **contient** l'ensemble de leurs articles sous forme de vignettes titre / image (OK)
- Chacune de ces vignettes comporte un **lien** vers l'article complet auquel **une page unique est dédiée** (OK)

## Landing Page = Log In page

 **Question** : Quel élément doit absolument figurer sur une landing page ? 

### Visuel

- Logo 
- Couleurs du site ( identité visuelle du site)
- Titre
- Images représentatives

### Fonctionnement 

- La possibilité de s'enregistrer grâce à un bouton 
- Page unique sans scroll

1. **Connexion**

Deux boutons : "Log in" / "Sign up" ( design : hierarchie des boutons, le "sign up" devra être beaucoup plus visible)

**Log in button** 

Une modale s'ouvre permettant la connexion de l'utilisateur via son identifiant et son mot de passe. Le HTML se compose d'un formulaire. 

**Sign up button** 

Une modale s'ouvre permettant la création d'un compte. Même principe que pour le bouton "log in". Sauf qu'ici, il y aura une nécessité de validation par e-mail de l'utilisateur pour valider l'inscription et accéder au site. 

**Erreur d'entrée** 

Si le mot de passe ou le nom d'utilisateur est incorrect, afficher à nouveau la page demandant de vérifier le mdp ou le pseudo (Avec éventuellement une couleur flashy disant que quelque chose a foiré)

Phrase en dessous du bouton qui demande *"Mot de passe ou identifiant oublié ? "*

## Navigation

Une barre de recherche pour rechercher des articles et des profils d'utilisateurs. Accessible aussi bien aux utilisateurs enregistrés qu'aux utilisateurs non enregistrés. 

lien profil disponible pour l"utilisateur qui s'est connecté, celle-ci comporte : 


Un bouton permettant de valider l'enregistrement des nouvelles valeurs dans la DB ou d'annuler les modifications 

Un bouton d'annulation et au clic l'utilisateur est redirigé vers la page d'index

  - Preferences 

-  Un lien Profil
  - Accès aux posts  

Une fois l'utilisateur déconnecté il est redirigé vers la page de connexion.


## Index

**Utilisateurs non enregistrés**

- Peuvent simplement consulter le contenu mais ne peuvent pas publier ni intéragir (comme commenter par exemple) avec le contenu sauf : 
  - Partager 
  - Liker

**Utilisateurs enregistrés**

Ils ont accès à la page d'accueil dès leur connexion avec l'ensemble des article de leur fil d'actualité. 

Ils ont accès aux articles de la communauté. Bien qu'ils ne peuvent pas modifier les articles des autres, ils peuvent liker et commenter et bien sûr partager ceux-ci. 

## Page d'accueil

L'ensemble des articles de leur fil d'actualité défini en fonction de leurs préférences (dans les settings). 

Les auteurs les plus consultés / likés

## Page profil

- Détails de l'utilisateur
- Vue d'ensemble des posts publiés. Chaque post est composé d'une page. Il suffit de cliquer sur la vignette pour accèder à l'article. 
- Vue d'ensemble des posts likés
- Vue d'ensemble des commentaires 

-Un lien "Sign out"
-Un lien "Help"
- Un lien "Setting": 
  - Account settings
    - Personnal informations avec la possibilité d'enregistrer ses thèmes préférés
    - Delete account 

    **Rmq** : Aller plus loin dans le détail de : Comment on fait pour faire telle fonction, exemple : Ok, il faut un lien Sign Out, donc comment est-ce que je vais faire ca. Quand je vais cliquer, qu'est ce qu'il va se passer. On peut dire de facon ultra explicite ce qui est fait. 