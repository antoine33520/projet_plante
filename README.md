# Projet Plante connectée

Le projet *Plante connectée* est le projet obligatoire de notre UF (Unité de Formation) Développement logiciels.
Ce projet a été réalisé par  Antoine THYS et Evan Baudier étudiant Bachelor 1 Ynov Informatique au campus Ynov de Bordeaux.

Notre projet est constitué de 3 parties, un site web, une base de données ainsi qu'une partie capteurs.

L'interface web permet de stocker des informations sur des plantes dans la base de données et de récupérer les valeurs des capteurs associés.

## Organisation du dépot

Le contenu du dépôt est organisé de cette façon :

- La documentation se trouve dans le dossier [Doc](./Doc/)./
Avec notamment :
  - Le [Dossier technique](./Doc/Dossier_technique.pdf)
  - Le [Schéma de montage](Doc/Montage/Schéma_de_montage.png)
- Dans [Ressources](Ressources/) il y a :
  - Les scripts et programmes dans le dossier [Scripts](./Ressources/Scripts/)
  - Un [export](Ressources/SQL/plant_uf.sql) de la base de données dans le dossier [SQL](Ressources/SQL)
- Le dossier [Présentation](Présentation) contient notre présentation oral que les autres documents demandés pour le rendu final.

## Utilisation de notre travail

Afin de pouvoir réutiliser notre travail vous devez avoir :

- Des capteurs (température, hygrométrie et luminosité)
- Une carte Arduino
- Ainsi qu'une Raspberry sous Raspbian (n'a pas été testé sur une autre platforme)
- Avoir installé Apache et MariaDB sur la Raspberry
- Après avoir effectué le montage correspondant au [Schéma de montage](./Doc/Montage/Schéma_de_montage.png)

Maintenant les étapes à suivres sont les suivantes :

- Importation du [dump](Ressources/SQL/plant_uf.sql) de la mariaDB
- Si nécessaire modification du [programme](Ressources/Scripts/Arduino/sketch/sketch.ino) Arduino
- Compilation du programme et envoi sur la carte
- Modification du [programme](Ressources/Scripts/Python/releves_capteurs.py) python
- Execution du programme

Il ne reste plus qu'à vous connecter sur l'interface web pour ajouter vos plantes.
