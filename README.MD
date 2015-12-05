# API GITHUB || PHP

Aplicació PHP que ens permet fer ús de l'API de GITHUB per realitzar diverses tasques amb el nostre compte d'usuari. Les funcionalitats que té incorporades actualment són les següents:

  - Visualitzar tots els repositoris
  - Visualitzar un repositori en concret
  - Crear nous repositoris
  - Eliminar repositoris
  - Visualitzar les dades de l'usuari


Mitjançant l'ús de crides HTTP a partir de CURL, l'aplicación consta d'un conjunt de mètodes que ens retornaran les respostes amb format objecte PHP gràcies a [JSON_DECODE].
# Mètodes
## getRepositories
```
 mixed getRepositories([string $name = null])
````
#### $name
> Nom del repositori. En cas de cridar al mètode sense indicar la variable retornarà tots els repositoris del compte. En cas contrari retorna un únic repositori si existeix.

## getCommits
````
 mixed getRepositories(string $user, string $name)
````
Retorna els commits realitzats a un únic repositori.
Els dos paràmetres són obligatoris.
#### $user
> Nom de l'usuari

#### $name
> Nom del  repositori

## getReadme
````
 mixed getReadme(string $user, string $name)
````
Retorna l'arxiu README.MD del repositori indicat ja formatat
#### $user
> Nom de l'usuari

#### $name
> Nom del repositori

## getUserData
````
 mixed getUserData()
````
Retorna un variable php amb les dades de l'usuari

## createRepository
````
 mixed createRepository(string $name, bool $private, bool $wiki, string $desc = '', string $license = 'mit', bool $download)
````
Crear un repositori a GitHub segons els paràmetres indicats. Retorna el resultat de l'operació
#### $name
> Nom que rebrà el nou repositori

#### $private
> Booleà que indicarà l'estat de visibilitat del repositori

#### $wiki
> Booleà que indicarà si estan permesos els wikis

#### $desc
> Text descriptiu del repositori

#### $license
> Nom de la llicencia. [Llicencies permeses]

#### $download
> Booleà que indicarà si estan permeses les descàrregues

## getNotifications
````
 mixed getNotifications()
````
Retorna un variable php amb les dades de l'usuari

## deleteRepository
````
 mixed deleteRepository(string $name)
````
Elimina un repositori existent. Retorna l'estat de la resposta

#### $user
> Nom del repositori

## Versió
1.0.0

## Tecnologies i recursos

* [CURL] - Classe PHP per realitzar peticions HTTP
* [Parsedown] - Classe PHP que transforma el format markdown per la visualització en navegadors
* [Twitter Bootstrap] - Framework UI responsive
* [jQuery] - Llibreria JavaScript

License
----

MIT



   [JSON_DECODE]: <http://php.net/manual/en/function.json-decode.php>
   [Parsedown]: <http://parsedown.org/>
   [CURL]: <http://github.com/>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [Llicencies permeses]: <https://github.com/github/choosealicense.com/tree/gh-pages/_licenses>
