# Lista todas as Ofertas de Crédito do Cliente 

A função lista todas as ofertas de crédito que o cliente autenticado contratou.

## :dart: Uso 

```html
[GET] http://127.0.0.1:8000/api/client/offers

<!-- Exemplo -->
[HEADER]
'API-Token': 'd0mEfeVrFZxEBz0FjFJyNqbIo4fLN2BVTsc07tMhZ8DEcK7Eux7spqS7TKPh' 
```

## :card_index: Retorno

```json
{
  "name": "Thomas R Reinke",
  "email": "thomas.ricardo.reinke@gmail.com",
  "cpf": "111.862.369-06",
  "api_token": "d0mEfeVrFZxEBz0FjFJyNqbIo4fLN2BVTsc07tMhZ8DEcK7Eux7spqS7TKPh",
  "offers": [
    {
      "id": 10,
      "value": 3000,
      "installments": 24,
      "installments_value": 125,
      "tax_rate_percent": 15,
      "credit_type": {
        "type": "crédito pessoal",
        "description": "O valor do empréstimo é depositado na conta corrente."
      },
      "partner": {
        "name": "Serasa",
        "description": "A Serasa é o aplicativo de crédito para compras e pagamentos.",
        "approval_percentage": 75.5
      }
    },
    {
      "id": 3,
      "value": 10000,
      "installments": 6,
      "installments_value": 500,
      "tax_rate_percent": 5,
      "credit_type": {
        "type": "crédito pessoal",
        "description": "O valor do empréstimo é depositado na conta corrente."
      },
      "partner": {
        "name": "Jeitto",
        "description": "O Jeitto é o aplicativo de crédito para compras e pagamentos.",
        "approval_percentage": 60
      }
    }
  ]
}
```
