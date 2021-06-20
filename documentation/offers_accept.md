# Realizar contratação de uma Oferta de Crédito

Cria um vínculo entre cliente e oferta de crédito, podendo um cliente contratar várias ofertas e uma oferta ser contratada por vários clientes.

## :dart: Uso 

```html
[POST] http://127.0.0.1:8000/api/offers/3/accept

<!-- Exemplo -->
[HEADER]
'API-Token': 'd0mEfeVrFZxEBz0FjFJyNqbIo4fLN2BVTsc07tMhZ8DEcK7Eux7spqS7TKPh' 
```

## :card_index: Retorno

```json
{
  "id": 6,
  "client": [
    {
      "name": "Thomas R Reinke",
      "email": "thomas.ricardo.reinke@gmail.com",
      "cpf": "111.862.369-06",
      "api_token": "d0mEfeVrFZxEBz0FjFJyNqbIo4fLN2BVTsc07tMhZ8DEcK7Eux7spqS7TKPh"
    }
  ],
  "offer": [
    {
      "id": 3,
      "value": 10000,
      "installments": 6,
      "installments_value": 500,
      "tax_rate_percent": 5
    }
  ]
}
```
