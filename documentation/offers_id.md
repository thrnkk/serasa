# Oferta de Crédito detalhada

A função lista todos os dados de uma oferta de crédito selecionada.

## :dart: Uso 

```html
[GET] http://127.0.0.1:8000/api/offers/10

<!-- Exemplo -->
[HEADER]
'API-Token': 'd0mEfeVrFZxEBz0FjFJyNqbIo4fLN2BVTsc07tMhZ8DEcK7Eux7spqS7TKPh' 
```

## :card_index: Retorno

```json
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
}
```
