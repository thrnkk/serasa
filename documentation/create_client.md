# Cria um cliente

A função insere um cliente no banco de dados.

## :dart: Uso 

```html
[POST] http://127.0.0.1:8000/api/client/create

<!-- Exemplo -->
[BODY]
{"email": "testegmail.com", "name": "Teste", "cpf": "133.421.432-34", "password": "desafioserasa"}	
```

## :card_index: Retorno

```json
{
  "email": "teste@gmail.com",
  "name": "Teste",
  "cpf": "133.421.432-34",
  "password": "$2y$10$ifRewQ8KCxif23YS.PCWC.niJrhwsCGFfLwzVyzlBDy0YSbh0utUu",
  "api_token": "ToY0JkuYAtgGTxmgWSnkMCOFr2dBc65hRCCzDdgmVVXuKtpNFhjFXUPgtqJS"
}
```
