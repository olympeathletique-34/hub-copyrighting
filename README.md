# Hub copywriting

Outil de gestion des contenus de copywriting : https://hub-copyrighting.vercel.app

## Principe
- **Accueil** : tous les projets en vignettes, avec l'étape en cours, la barre d'avancement, le nombre de pages de tunnel, de produits, de fichiers à affecter, de contenus validés, de notes ✏️ et 🧪, la prochaine action et l'échéance.
- **Pilotage** (par projet) : 7 étapes (cadrage, recherche, produits, tunnel, relecture & tests, lancement, optimisation). Chaque étape a sa liste de tâches (modifiable) et des vérifications automatiques calculées à partir des fichiers. « À faire maintenant » rassemble les tâches de l'étape, les notes ✏️, les fichiers à affecter et les fiches incomplètes. On passe à l'étape suivante d'un clic.
- **Contenu du cadrage et de la recherche** : dans Pilotage, les rubriques de l'étape (cible, promesse, offre et prix, différence, limites et ton ; verbatims, concurrents, objections, angles, sources) se remplissent et s'enregistrent dans `<projet>/gestion-projet.md` (hub-projets). Les vérifications automatiques en tiennent compte (ex. au moins 20 verbatims). Bouton « Brief IA » pour faire compléter la section par une IA.
- **Source de vérité : le dépôt GitHub `olympeathletique-34/hub-projets`.** Chaque dossier racine est un projet (aura, zone-4e…). Rien n'est stocké ailleurs : le hub lit et écrit directement dans le dépôt.
- **Trois colonnes par projet** :
  - **Tunnel** : fichiers de `<projet>/marketing/tunnels/`, dans l'ordre du tunnel, avec leur étape (capture, vente, upsell…).
  - **Produits** : fichiers de `<projet>/produits/`, regroupés par type (ebook, quiz, outil…), avec leur rôle dans l'offre.
  - **À affecter** : les fichiers versés dans `<projet>/a-classer/` et ceux trouvés ailleurs dans le projet. En les affectant, le fichier rejoint son dossier.
- **Verser des fichiers** : glisser-déposer n'importe où (→ À affecter) ou directement sur la colonne Tunnel ou Produits.
- **Fiche** de chaque fichier : catégorie, étape ou type, rôle, statut (brouillon / à revoir / validé), résumé, pour qui, promesse.
- **Notes** sur un fichier ou sur un passage sélectionné : ✅ c'est bien · ✏️ à changer · 🧪 à tester en A/B · 💡 idée. Vue « Toutes les notes » par projet.
- **Modifier** : éditeur visuel, enregistrement direct sur GitHub (scripts coupés pendant l'édition, pour ne pas enregistrer le contenu qu'ils génèrent).
- **Brief IA** : copie la fiche et les notes à traiter, prêtes à coller dans une autre IA.
- **Parcourir** le tunnel page par page.
- Thème clair par défaut, sombre en option.

## Où sont les infos
`<projet>/hub.json` : la clé `projet` (étape en cours, objectif, échéance, tâches) et une entrée par fichier (clé = chemin depuis le dossier projet). Les IA fournissent les infos de base d'une page HTML avec des balises `<meta name="hub:…">` : voir `00-hub/FICHES-HUB.md` dans hub-projets (installable depuis ⚙︎ Réglages). Les anciens `produits.json` et `tunnel.json` sont repris comme valeurs par défaut.

## Token
Token GitHub fine-grained limité à `hub-projets`, permission Contents : Read and write. Il reste dans le navigateur (clé `cf_gh_cfg`, la même que l'ancien tableau de bord).

## Ancien outil
`copyfunnel-dashboard.html` (Brevo, WordPress, génération de tunnel) reste accessible, mais n'est plus la page d'accueil. Les démos déjà publiées (`aura/`, `zone-4e/`…) ne changent pas.
