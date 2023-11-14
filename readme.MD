ENDPOINTS
Aclaración: los valores usados son tan solo algunos ejemplos.

- GET /api/chapters/3 
    Obtiene un capitulo específico según su id (3).

- GET /api/chapters 
    Obtiene todos los capitulos.

- GET /api/chapters?sort=name&order=desc

    Ordena capitulos según un campo de la tabla y en orden, en caso de que el parametro
    "order" no sea pasado, por defecto se hace ascendente.

- GET /api/chapters?sort=description&filter=history
    Filtra capítulos según un campo de la tabla y un contenido específico (texto, valor, etc).

- GET /api/chapters?offset=3&limit=10
    Pagina una cantidad de capítulos (limit), partiendo desde una pagina determinada en el parametro (offset).

- POST /api/chapters
    Agrega un capítulo (datos en formato json en el body).

- PUT /api/chapters/2
    Edita un capítulo (datos en formato json en el body).
