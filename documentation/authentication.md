# Autentica o usuário

A função retorna informações sobre o usuário, incluindo seu token para fazer o uso da API.

## :dart: Uso 

```html
[POST] http://127.0.0.1:8000/api/auth

<!-- Exemplo -->
[BODY]
{"email": "thomas.ricardo.reinke@gmail.com", "password": "desafioserasa"}	
```

## :card_index: Retorno

```json
{
  "name": "Thomas R Reinke",
  "email": "thomas.ricardo.reinke@gmail.com",
  "cpf": "111.862.369-06",
  "api_token": "d0mEfeVrFZxEBz0FjFJyNqbIo4fLN2BVTsc07tMhZ8DEcK7Eux7spqS7TKPh"
}
```
