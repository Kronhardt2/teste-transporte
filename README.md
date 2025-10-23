Cada pasta contém uma das etapas do desafio:

- **parte1** → Exercício de lógica aplicada (combustível e entregas).  
- **parte2** → Lógica de programação complementar (cálculos e simulações). 
- **parte3** → Estrutura de banco de dados (motoristas, clientes e entregas).  
- **parte4** → Consumo de API pública (ViaCEP) e integração em ambiente web.

---

## Autor

**João Pedro Pereira Kronhardt**

---

## Como rodar os testes

### Tarefa 1 e 2

1. Abra o editor de código-fonte de sua preferência (por exemplo, **Visual Studio Code**).  
2. Abra o terminal integrado - VS Code basta usar o atalho **CTRL + '**.
3. Digite os seguintes comando: 
 **php parte1/Tarefa1.php** para executar a tarefa 1. 
 **php parte2/Tarefa2.php** para executar a tarefa 2.

Outro modo é usar o atalho **CTRL + ALT + N** (extensão Code Runner) no VS Code, assim rodará o código sem utilizar o terminal.

### Tarefa 3

1. Acesse o seu **sistema de gerenciamento de banco de dados** de preferência, com o servidor do mesmo já inicializado. 
2. Copie o conteúdo do arquivo `parte3/Tarefa3.sql`.  
3. Cole e execute o script.  
   - Ele criará o banco de dados `teste_transporte`.  
   - Criará as tabelas `motoristas`, `clientes` e `entregas`.  
   - Inserirá alguns dados de exemplo.  

4. Para visualizar os dados relacionados:
   ```sql
   SELECT 
       e.id AS id_entrega,
       e.data,
       e.destino,
       e.status,
       m.nome AS motorista,
       c.nome AS cliente,
       c.cidade AS cidade_cliente
   FROM entregas e
   LEFT JOIN motoristas m ON e.id_motorista = m.id
   INNER JOIN clientes c ON e.id_cliente = c.id
   ORDER BY e.data;


### Tarefa 4 

1. Coloque o arquivo "Tarefa4.php" na pasta htdocs (exemplo: C:\xampp\htdocs\Tarefa4.php).
2. Abra o Xampp e inicie o servidor apache.
3. No navegador, acesse o endereço: http://localhost/teste-transporte/parte4/Tarefa4.php.
4. Digite um CEP no campo exibido e clique em “Consultar”.

## Durante o desafio, consegui reforçar meus conhecimentos em lógica de programação, SQL, consumo de APIs e versionamento com Git e GitHub.