# Hidroponica

[![emojicom](https://img.shields.io/badge/emojicom-%F0%9F%90%9B%20%F0%9F%86%95%20%F0%9F%92%AF%20%F0%9F%91%AE%20%F0%9F%86%98%20%F0%9F%92%A4-%23fff)](http://neni.dev/emojicom)

Sistema de gerenciamento e API com textos traduzidos para estudar com *listening*

![Listagem de textos](screenshots/admin-text-list.png)

![Visualização do texto](screenshots/admin-text-view.png)

![Edição de sentença](screenshots/admin-sentence-edit.png)

## Desenvolvimento

### Ambiente

1. Duplique `.env.example` para `.env` e **mude o usuário (`DB_USERNAME`) e senha (`DB_PASSWORD`)**

```sh
cp .env.example .env
```

2. Baixe o Sail juntamente com as dependências do composer
```sh
docker run -v $(pwd):/var/www/html -w /var/www/html laravelsail/php82-composer:latest sh -c "composer config --global && composer install --ignore-platform-reqs"
```

3. Crie a `APP_KEY`

```sh
./vendor/bin/sail artisan key:generate
```

4. Crie a documentação de referência em `localhost/api/reference`
```sh
./vendor/bin/sail artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
./vendor/bin/sail artisan l5-swagger:generate
```

5. Crie as tabelas com alguns registros

```sh
./vendor/bin/sail artisan migrate:fresh --seed
```

### Execução

1. Inicie o backend
```sh
./vendor/bin/sail up -d
```

> Interrompa com `./vendor/bin/sail down`

2. Inicie o frontend
```sh
./vendor/bin/sail npm start
```

> Interrompa com <kbd>ctrl</kbd><kbd>c</kbd>

3. Acesse o sistema:
    - `localhost/admin`: `admin@hidroponi.ca` `123`

Outros comandos úteis durante o desenvolvimento:

- `sail bash`
- `sail psql`
- `sail tinker`
- `sail artisan queue:work`
- `sail artisan optimize:clear`
- `sail composer i`

### Linting

```sh
./vendor/bin/sail php ./vendor/bin/pint
./vendor/bin/sail php ./vendor/bin/pint --dirty
```

### Teste

```sh
./vendor/bin/sail test
./vendor/bin/sail test tests/Feature/BlablaTest.php
./vendor/bin/sail test --parallel --no-coverage
./vendor/bin/sail test --filter nomeDoTeste
```
