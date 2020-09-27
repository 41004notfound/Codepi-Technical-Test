## Codepi Technical Test

Test technique préalable à l'embauche réalisé par [Lucas Côté](https://lucascote.fr) pour l'entreprise [Codepi](https://codepi.com).

## Ressources utilisées
- [Framework Laravel](https://laravel.com/docs/),
- [Framework Livewire for Laravel](https://laravel-livewire.com/docs/),
- [Bootstrap](https://bootstrap.com),
- [FontAwesome](https://fontawesome.com).

## Installation

Installer composer
```
composer install
```

# Initialiser l'environnement.
Renommer le fichier .env.example en .env et configurer votre environnement.
```
DB_DATABASE={votre bdd}
DB_USERNAME={votre user}
DB_PASSWORD={votre password}
```

# Regénérer la clé de l'application
```
php artisan key:generate
```

# Exécuter les migrations
```
php artisan migrate
```

## Démo
Pour mettre en place une version demo afin d'avoir plusieurs produits, caractéristiques et catégories de démonstration, vous devez
importer, à votre base de donnée, les données démo que vous trouverez dans le dossier /BDD.

## Exécuter l'application
Maintenant, vous pouvez lancer le serveur web
```
php artisan serve
```

## Accéder à votre application
Vous pouvez accéder à votre application à l'adresse suivante : http://127.0.0.1:8000/

## Notes
Le framework Laravel Livewire n'étant assez pas connu pour le moment, j'ai pris la liberté de commenter les classes en quantité, dans le but de pouvoir vous faciliter la lecture du code des composants Livewire que j'ai écrit.
