<h3 align="center"> Serasa &amp; ProWay challenge </h3>

## :computer: Projeto

O projeto consiste em criar serviços para responder à jornada do desafio CréditoParaTodxs.

### :heavy_check_mark: Requisitos 

Para a criação do projeto, foram utilizados os seguintes requisitos:

- Composer 2.0.7
- Laravel Framework 8.47.0
- MySQL
  
### :rocket: Tecnologias

- <a href="https://laravel.com/docs/8.x">Laravel Framework 8.47.0</a>

<p align="center">
  <img height="100px" widht="100px" src="https://laravel.com/assets/img/components/logo-laravel.svg">
</p>

### :mega: Utilização 

1. Entrar na pasta raiz do projeto.
2. Edite no arquivo `.env` os campos "DB_DATABASE", "DB_USERNAME" e "DB_PASSWORD" para se adequar à sua database.
3. Execute o comando `composer install` (certifique-se de que não ocorreu nenhum erro referente à antivirus ou ao Windows Search Indexer, se ocorrer, repetir o comando).
4. Execute o comando `php artisan migrate` para criar as tabelas na database.
5. Execute o comando `php artisan db:seed` para popular automaticamente algumas tabelas na database.
6. Execute o comando `php artisan serve` para iniciar o seu projeto.

Obs.: Para visualizar todas as rotas disponíveis, utilize `php artisan route:list`.

### :mega: Testes 

Para não afetar os dados do banco de "produção", foi optado por realizar os testes em um banco diferente.

1. Para realizar os testes é necessário alterar no arquivo `.env` o campo "DB_TEST_DATABASE" para se adequar à sua database. <br>
2. Também alterar no arquivo `phpunit.xml` o valor "<server name="DB_DATABASE" value=`serasa_test`/>" para se adequar à sua database. <br>
3. Rodar o comando `php artisan test`.
      
### :newspaper: Documentação

Padrão: http://127.0.0.1:8000/

```
+--------+----------+------------------------+------+------------------------------------------------------------+--------------------------------------------+
| Domain | Method   | URI                    | Name | Action                                                     | Middleware                                 |
+--------+----------+------------------------+------+------------------------------------------------------------+--------------------------------------------+
|        | GET|HEAD | /                      |      | Closure                                                    | web                                        |
|        | POST     | api/auth               |      | App\Http\Controllers\AuthenticationController@authenticate | api                                        |
|        | POST     | api/client/create      |      | App\Http\Controllers\ClientController@create               | api                                        |
|        | GET|HEAD | api/client/offers      |      | App\Http\Controllers\ClientController@offers               | api App\Http\Middleware\EnsureTokenIsValid |     
|        | GET|HEAD | api/offers             |      | App\Http\Controllers\OfferController@index                 | api App\Http\Middleware\EnsureTokenIsValid |
|        | GET|HEAD | api/offers/{id}        |      | App\Http\Controllers\OfferController@show                  | api App\Http\Middleware\EnsureTokenIsValid |
|        | POST     | api/offers/{id}/accept |      | App\Http\Controllers\OfferController@accept                | api App\Http\Middleware\EnsureTokenIsValid |
+--------+----------+------------------------+------+------------------------------------------------------------+--------------------------------------------+
```

Os serviços que necessitam de autenticação, precisam que primeiramente a rota `api/auth` seja consultada informando um usuário criado ou o usuário padrão:

```json
{
  "email": "thomas.ricardo.reinke@gmail.com", 
  "password": "desafioserasa"
}
```
E após receber a resposta:

```json
{
  "name": "xxxxxxx xxxxxxx",
  "email": "xxxxxxxxxxxxxx@xxxxxx.com",
  "cpf": "xxx.xxx.xxx-xx",
  "api_token": "d0mEfeVrFZxEBz0FjFJyNqbIo4fLN2BVTsc07tMhZ8DEcK7Eux7spqS7TKPh"
}
```
Utilizar o `api_token` no header das demais requisições:

```python
'API-Token': 'd0mEfeVrFZxEBz0FjFJyNqbIo4fLN2BVTsc07tMhZ8DEcK7Eux7spqS7TKPh'
```

#### Utilização dos Serviços

<details hidden>
  <summary>:lock: Sistema</summary>
    
  > [Autenticação](documentation/authentication.md) <br>

</details>

<details hidden>
  <summary>:family: Cliente</summary>
  
  > [Criar Cliente](documentation/create_client.md) <br>
  > [Lista todas as Ofertas de Crédito do Cliente](documentation/offers_client.md). `[requer autenticação]` <br>
  
</details>

<details hidden>
  <summary>:newspaper: Ofertas</summary>
  
  > [Todas as Ofertas de Crédito de acordo com o descritivo técnico](documentation/offers.md) `[requer autenticação]` <br> 
  > [Oferta de Crédito detalhada](documentation/offers_id.md) `[requer autenticação]` <br>
  > [Realizar contratação de uma Oferta de Crédito](documentation/offers_accept.md) `[requer autenticação]` <br>
  
</details>

<p align="center">
  <a href="https://github.com/thrnkk" ><img src="https://img.shields.io/badge/github-thrnkk-24292e"></a>
</p>
