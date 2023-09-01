Projeto: Controle de Acesso

Siga os seguintes passos para ativar o projeto e deixá-lo pronto para uso

NOTA: toda linha iniciada com $ refere-se a um comando que deve ser executado no terminal

1) Crie um diretório em sua maquina para clonar o repositório:

$ mkdir Aula


2) Inicialize o git:

$ git init


3) Clone o repositório:

$ git clone https://github.com/diegohoss/T01-Controle-de-Acesso-Aula.git

(fornecer as credenciais: usuário e senha)


4) Entre no diretório:

$ cd T01-Controle-de-Acesso-Aula/


5) Instale as dependências:

$ composer install --no-scripts


6) Copie o arquivo .env do exemplo para o ".env":

$ cp .env.example .env


7) Edite este arquivo e deixe com a parte do banco configurada, no meu caso fica assim:

[...]

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=Aula

DB_USERNAME=root

DB_PASSWORD=root

[...]


8) Gere a nova chave do projeto:

$ php artisan key:generate


9) Rode as migrations para criar a base:

$ php artisan migrate


10) Rode novamente as migrations agora com o --seed para povoar a base:

$ php artisan migrate:fresh --seed


11) Instale o NPM:

$ npm install


12) Rode o NPM (é necessário por causa do VITE):

$ npm run dev


13) Em outra aba do terminal execute o servidor PHP:

$ php artisan serve
# T01-Controle-de-Acesso-Aula-master
