# Projeto API PHP com Slim Framework

### Projeto com arquitetura para a construção de uma API Rest com PHP e Slim Framework


**Iniciar o projeto**

Executar o comando do composer logo abaixo para baixar as dependências

```bash
php composer.phar install
```

**Arquivo environment.php**

Este arquivo está na raiz do projeto, nele deve ser configurado 
a variável de ambiente para a conexão do banco de produção e 
do banco de desenvolvimento.

Aqui definimos qual ambiente será usado em nossa **API.**

Valores aceito: `prod` ou `dev`
```php
putenv('AMBIENTE=dev');
```

## Requisições

### Requisições do tipo GET

Exemplo de uma requisição para o endereço: `http://localhost/api-agenda-contato/api/v1/contato`

Retorno:

```json
[
    {
        "id": 1,
        "nome": "João Marco Antônio Nunes",
        "numero": "0000-0000",
        "fk_codigo_area": 1
    },
    {
        "id": 4,
        "nome": "Thiago",
        "numero": "0000-0007",
        "fk_codigo_area": 7
    },
    {
        "id": 7,
        "nome": "Leonardo",
        "numero": "0000-0004",
        "fk_codigo_area": 4
    }
]
```

### Requisições do tipo POST

Exemplo de uma requisição do tipo `POST` para o endereço: `http://localhost/api-agenda-contato/api/v1/contato`

Enviar no corpo da requisição um objeto `JSON` no padrão abaixo:

```json
{
    "nome": "Leonardo Brutos",
    "codigo_area": 4,
    "numero": "0000-0010"
}
```


### Requisições do tipo PUT

Exemplo de uma requisição do tipo `PUT` para o endereço: `http://localhost/api-agenda-contato/api/v1/contato`

Enviar no corpo da requisição um objeto `JSON` no padrão abaixo:

```json
{
  "id": 7,
  "nome": "Leonardo Brutos",
  "codigo_area": 4,
  "numero": "0000-0010"
}
```


### Requisições do tipo DELETE

Exemplo de uma requisição do tipo `DELETE` para o endereço: `http://localhost/api-agenda-contato/api/v1/contato`

Enviar no corpo da requisição um objeto `JSON` no padrão abaixo:

```json
{
    "id": "8"
}
```

