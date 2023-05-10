
# API Sokoban

Voici l'api du sokoban en reactNative fais en php avec le framework Cody
Cody : [@Cody](https://github.com/TheRake66/Cody)




## API Reference

#### Get all map

```http
  GET /api/map
```

#### Get map

```http
  GET /api/map/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Obligatoire**. Id de la map |


#### PUT edit map

```http
  PUT /api/map/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Obligatoire**. Id de la map |

#### body

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `niveaux`      | `int` | le niveaux de la map |
| `json`      | `string` | le contenu de la map |

#### DELETE edit map

```http
  DELETE /api/map/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Obligatoire**. Id de la map |







## Tech Stack

**Server:** Cody, MySQL, REST







## Authors

- [@anthonydt16](https://github.com/Anthonydt16)
En binome sur le projet avec : 
- [@max-las](https://github.com/max-las)

