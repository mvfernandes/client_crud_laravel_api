<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Api criada na versão 8 do framework laravel

## Cadastro de cliente.

Um cliente deve possuir nome, data de nascimento e sexo(masculino,
feminino).
Cada cliente pode possuir endereços comerciais e/ou residenciais.
Um endereço possui cep obrigatoriamente, logradouro obrigatoriamente,
número
obrigatoriamente, complemento opcional, bairro opcional e UF
obrigatoriamente.

## Objetivo:
### Desenvolver sistema para cadastro de clientes e endereços com as
funcionalidades:
Exibição, inclusão, edição e exclusão de clientes.
Exibição, inclusão, edição e exclusão de endereços de clientes.

## Observação:
A remoção de clientes é independente da existência de endereços, caso um
cliente
seja excluído seus endereços devem ser apagados também.

## Funcionalidades:
Cadastrar um cliente somente quando o nome, data de nascimento e sexo
estiverem preenchidos.

Visualizar os clientes e seus dados.

Editar um cliente seguindo as regras dos seus atributos.

Excluir um cliente.

Cadastrar endereços no cliente seguindo as obrigatoriedades dos atributos
de
endereço.

Visualizar os endereços de um cliente.
Editar o endereço de um cliente seguindo as regras de seus atributos.

Excluir endereços de um cliente.

## [Vídeo criando o projeto](https://youtu.be/quhYsONAqSQ).

---

## Rodar o projeto

### Clone o repositório:
```
git clone https://github.com/mvfernandes/client_crud_laravel_api.git client_crud_laravel_api
```

### Acesse o projeto:
```
cd client_crud_laravel_api
```

### Gere o .env:
```
cp .env.example .env && php artisan key:generate

---------------------------------

No .env atribua o nome da base mysql em DB_DATABASE
```

### Instale as dependências do projeto:
```
composer install
```

### Rode o projeto:
```
php artisan serve
```

## [Respositório do front](https://github.com/mvfernandes/cliente_crud_reactjs).
