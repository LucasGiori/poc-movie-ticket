## POC - Movie Ticket 

### Endpoints
 - `/checkout`
 - `/checkout/{[1-9]}`
 - `/payment`
 - `/ticket/{[1-9]}`


### Objetivos de cada endpoint
- `/checkout`
  - Coletar dados pessoais do usuário; (Nome, Email, CPF, Telefone, Data Nascimento)
- `/checkout/{[1-9]}` 
  - Consultar checkout pelo código
- `/payment` 
  - Coletar informações do cartão de crédito e processar pagamento; (Número Cartão, CVV, Validade)
- `/ticket/{[1-9]}`
  - Retorna to ticket/ingresso comprado


### Domínio Central - `Core Domain`

- Ticket
  - O core domain é `"Ticket"` ou `"Ingresso"` no qual é disso que usuário precisa para conseguir assistir um filme no cinema esse é a razão para o sistema existir e isso que ele busca resolver.
### Subdomínios de Suporte - `Supporting subdomain`

- Checkout
  - O subdomínio de checkout é onde acontece o fluxo por completo de compra do ingresso.
- Payment
  - O subdomínio de payment é onde acontece a coleta de dados para realizar processamento do pagamento.
  