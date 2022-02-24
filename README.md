# Teste eSocial
## Passos para o Deploy:
### Primeiramente deve-se clonar o projeto
``` bash
git clone https://github.com/Cd4sh/eSocial-teste
```
### Depois instalar os pacotes necessários
``` bash
composer install
npm install
npm run dev
```
### Alterar o nome do arquivo .env.example para .env
``` bash
cp .env.example .env
```
### Gerar a key do projeto
``` bash
php artisan key:generate
```
### Configurar no .env, os seguintes campos para o envio de e-mail
``` bash
MAIL_MAILER=smtp
MAIL_HOST=HOST
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=
DESTINATION_MAIL=
```
### Configurar no .env, os seguintes campos para acesso ao banco de dados
``` bash
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
### Criar as tabelas necessárias no banco de dados
``` bash
php artisan:migrate
```
### Subir a aplicação
``` bash
php artisan serve
```