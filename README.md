# Doc API

## Observações:

- Api conta com dois endpoints um para user e outro para task.
- Banco de dados postgres, relacao 1 para N entre user e task.
- Ao longo dessa semana vou fazendo correcoes e subindo testes unitarios
- Deixa sua estrelinha ai ze

## Endpoints

users:
- `GET /user` – para consultar todos recursos criados.
- `GET /user/[:id]` – para consultar um recurso especifico.
- `GET /user/[:id]/task` – para consultar as tasks de um user.
- `POST /user` – para criar um recurso.
- `PUT /user[:id]` – para atualizar um recurso.
- `DELETE /user/[:id]` – para deletar um recurso.

tasks:
- `GET /task` – para consultar todos recursos criados.
- `GET /task/[:id]` – para consultar um recurso especifico.
- `POST /task` – para criar um recurso.
- `PUT /task[:id]` – para atualizar um recurso.
- `DELETE /task/[:id]` – para deletar um recurso.


### Criação de user
`POST /user`

Aceita requisição no formato JSON com os seguintes parâmetros:

| **name** | obrigatório, único, type: string |
| **email** | obrigatório, precisa ser email valido. |
| **created_at** | Vai ser gerado automaticamente |
| **updated_at** | Vai ser gerado automaticamente |


Exemplos de requisições válidas:

```json
{
    "name" : "josé",
    "email" : "josé@example.com",
}
```

```json
{
    "name" : "ana",
    "email" : "AnaBarbosa@example.com",
}
```


Exemplos de requisições inválidas:
```json
{
    "name" : "josé", 
    "email" : "josé@example.com", // caso "josé" já tenha sido criado em outra requisição
}
```

```json
{
    "name" : "Ana",
    "email" : null, // não pode ser null
}
```

```json
{
    "name" : null, // não pode ser null
    "email" : "Ana@example.com",
}
```

### Criação de Task
`POST /task`

Aceita requisição no formato JSON com os seguintes parâmetros:

| **user_id** | obrigatório, pode criar um user e dps passar o id dele |
| **title** | obrigatório, type: string |
| **description** | obrigatório, type: string |
| **created_at** | Vai ser gerado automaticamente |
| **updated_at** | Vai ser gerado automaticamente |


Exemplos de requisições válidas:

```json
{
    "title" : "Fazer X",
    "description" : "fazer x qnd y acontecer",
    "user_id": 1,
}
```



Exemplos de requisições inválidas:
```json
{
    "title" : null, // não pode ser null
    "description" : "fazer x qnd y acontecer",  
    "user_id": 1,
}
```

```json
{
    "title" : "Comer", 
    "description" : null, // não pode ser null  
    "user_id": 1,
}
```

```json
{
    "title" : "Comer", 
    "description" : "fazer x qnd y acontecer", 
    "user_id": null, // não pode ser null  
}
```

### Detalhe de uma task
`GET /task/[:id]`

Deverá retornar os detalhes de uma pessoa caso esta tenha sido criada anteriormente. O retorno deve ser como o exemplo a seguir.

URL Example: `GET localhost:8000/task/1`

```json
{
	"id": 1,
	"user_id": 1,
	"title": "Tarefa 1 do João",
	"description": "Esta é a primeira tarefa de João.",
	"created_at": "2023-10-30 22:55:03.311464",
	"updated_at": "2023-10-30 22:55:03.311464"
}
```


### Arquivo docker-compose
A aplicação vai subir em contêineres com docker-compose. Voce deverá copiar e colar o arquivo `docker-compose.example.yml`,insira as credenciais do seu banco de dados ou, se preferir, você pode alterá-las para o banco de sua escolha. Não se esqueça de atualizar o arquivo 'db.example.php' para garantir a conexão correta com o banco de dados.

**aplicação estará rodando na porta 8000**


