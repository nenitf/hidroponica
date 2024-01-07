# Hidroponica

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

4. Crie as tabelas com alguns registros

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
- `sail tinker`
- `sail artisan queue:work`
- `sail composer ide`
- `sail artisan optimize:clear`
- `sail composer i`

### Linting

```sh
./vendor/bin/sail pint
./vendor/bin/sail php ./vendor/bin/pint --dirty
```

### Teste

```sh
./vendor/bin/sail test
./vendor/bin/sail test tests/Feature/BlablaTest.php
./vendor/bin/sail test --parallel --no-coverage
./vendor/bin/sail test --filter nomeDoTeste
```
