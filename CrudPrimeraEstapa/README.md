# Guía de comandos Laravel

## Crear proyecto
composer create-project laravel/laravel x

## Breeze
1. - composer require laravel/breeze --dev
2. - php artisan breeze:install
3. - npm install
4. - npm run dev
5. - php artisan migrate (La bd ya debe estar creada)

## Bootsrap
1. - npm install bootstrap
2. - <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
(Insertar link en layout plantilla )

## Rutas
Route::resource('x', xController::class)->middleware(['auth']);

- Si queremos cambiar algo en el nombre de la url le añadimos parameters a la resource
Route::resource('centros', CentroController::class)->parameters(['centros'=>'x'])->names('centros'); 


## Resources comando (Crear controllador tipo resource y modelo)
php artisan make:controller PhotoController --model=Photo --resource

## Controller
php artisan make:controller xController
php artisan make:controller xController --resource

## Crear modelo
php artisan make:model x

## Migrar
php artisan migrate 
php artisan make:migration add_x_to_table_x
php artisan make:fresh --seed
php artisan migrate:reset
composer require doctrine/dbal (renombrar columna)

## Seeder (Mejor usar seeder llamando al factory)
php artisan make:seeder xSeeder

- Llenas con:
  -  Un array como $usuarios = [[ "name" = ... ]] en la función run
  - DB::table('users')->insert($users); esto va tras el array
  -  $this->call([UserSeeder::class]); esto va en el databaseSeeder
  - Comando para insertarlos es php artisan db:seed

## Factory
1. - php artisan make:factory xFactory
2. - php artisan migrate:fresh --seed

## Valor por default en migracion y valor por defecto en factory
$table->string('user_role')->default('propietario');
'user_role' => $this->faker->randomElement(['super_admin','admin','propietario','cliente'])
Si quieres utilizar faker con idioma actual, te vas al config/app.php y le cambias en faker_locale

## Modelo insertar datos
Poner en filleable los campos de la bd, deben llamarse igual los input names que las columnas de la bd.

protected $fillable = ['name','terminos'=> 'boolean'];

## Gates
- En App\Providers\AuthServiceProvider metes esto:

Gate::define('update-post', function (User $user, Post $post) {
     return $user->id === $post->user_id;
});

- Controlador

if (! Gate::allows('update-post', $post)) {
    abort(403);
}

## Policies
- php artisan make:policy PostPolicy --model=Post
- En App\Providers\AuthServiceProvider metes esto:
- return $user->id === $post->user_id;


## Listar routes
php artisan route:list

## Request comando 
php artisan make:request StoreRequest

## Lenguajes comando
composer require laraveles/spanish
php artisan vendor:publish --tag=lang
Config - app.php

// Ej: español
'locale'          => 'es',

Utilizar plantilla ya hecha en practica_auth

Modo rafa:
- composer require laravel-lang/lang (Idiomas)
- composer require laravel-lang/publisher (Comando anterior)
- php artisan lang:add en es ca eu gl

## Despliegue
- cp .env-example .env
- nano .env y pones credenciales
- chmod -R 777 storage
- composer update
- php artisan storage:link
- <td> <img src="{{asset("image/". $post->image) }}" width="150px"></td>











# Proyecto con laravel (CRUD_auth_authorize)
## Como funciona ?

El proyecto trata de una agenda de contactos donde podrás realizar todos las operaciones CRUD siempre que tengas los permisos para ello ya que existen tres tipos de usuarios ['admin', 'usuario', 'invitado'] por defecto cuando te registras entras como administrador.

Por defecto la base de datos trae a tres usuarios para que puedas probar el funcionamiento ya que tiene cada uno un tipo de usuario para ello ve a iniciar sessión. 

- Usuario admin: gnovel@cifpfbmoll.eu / Contraseña: mysqlroot
- Usuario usuario: ozaaj@cifpfbmoll.eu / Contraseña: mysqlroot
- Usuario invitado: dgonzalezl@cifpfbmoll.eu / Contraseña: mysqlroot

### ¡Posible error al editar en remoto!

También tenemos en el navbar diferentes paginas Home, Panel, Contactos y Crear usuario dependiendo el tipo de usuario podras acceder o no.

Por último tenemos diferentes idiomas en nustra agenda como Español o Inglés.
## Servidor Remoto 

* [Enlace al servidor remoto](http://gnovel.ifc33b.cifpfbmoll.eu/CRUD_auth_authorize/public/) 

## Archivo .env:

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:pMIMqStQust5qofG8pufWyuTJL2Z9Ftw8TipF4jN28M=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=gnovel.ifc33b.cifpfbmoll.eu
DB_PORT=5432
DB_DATABASE=gnovel_CRUD_auth_authorize
DB_USERNAME=gnovel
DB_PASSWORD=abc123.

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"