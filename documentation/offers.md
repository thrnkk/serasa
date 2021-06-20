# Todas as Ofertas de Crédito de acordo com o descritivo técnico

A função lista todas as ofertas de crédito que existem no banco de acordo com o valor e a quantidade de parcelas descrito.

## :dart: Uso 

```html
[GET] http://127.0.0.1:8000/api/offers?value=3000&installments=6

<!-- Exemplo -->
[HEADER]
'API-Token': 'd0mEfeVrFZxEBz0FjFJyNqbIo4fLN2BVTsc07tMhZ8DEcK7Eux7spqS7TKPh' 
```

## :card_index: Retorno

```json
[
  {
    "id": 1,
    "value": 3000,
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
  },
  {
    "id": 7,
    "value": 3000,
    "installments": 6,
    "installments_value": 500,
    "tax_rate_percent": 7,
    "credit_type": {
      "type": "crédito pessoal",
      "description": "O valor do empréstimo é depositado na conta corrente."
    },
    "partner": {
      "name": "Serasa",
      "description": "A Serasa é o aplicativo de crédito para compras e pagamentos.",
      "approval_percentage": 75.5
    }
  }
]
```
