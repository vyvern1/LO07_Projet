# Centres de vaccination

## Introduction
L'objectif de ce projet et de simuler la gestion d'un ensemble de centres de vaccination. 

Ce projet peut être séparé en 3 partie en fonction des différents acteurs concerné.
- Premièrement le centre de vaccination. 
- Deuxièmement le vaccin.
- Troisièmement le patient.

Chaque partie regroupe différentes fonctionnalités ainsi que différentes requêtes pour communiquer avec la base de données.

## Centre de vaccination
Concernant la partie centre de vaccination, elle est assez simple, on peut ainsi :
- Afficher les centres de vaccination
- Créer un centre de vaccination (centre, adresse)

## Vaccin
La partie vaccin est également assez simple, on peut :
- Afficher la Liste des vaccins disponible dans un centre de vaccination
- Modifier les stocks de vaccins d'un centre
- Ajouter un nouveau vaccin (vaccin, doses)

## Patient
Cette partie est la plus complexe, elle est composée d'une partie patient et d'une partie rendez-vous :
1. Patient
- Afficher la liste des patients
- Créer un nouveau patient (nom, prénom, adresse)
2. Rendez-vous, cette partie permet d'effectuer le schéma vaccinal d'un patient, il peut donc :
- Prendre son premier rendez-vous et choisir son vaccin et son centre
- Prendre les rendez-vous suivants (ils sont choisis en fonction du premier vaccin injecté).
- Voir l'état de sa vaccination (nombre de doses reçues)

## Visualisation
Cette partie permet de visualiser sous forme de diagramme, 3 donnés :
- L'état total de vaccination
- Nombre de personnes vacciné ou partiellement vacciné par vaccin
- Nombre de vaccins en stock
