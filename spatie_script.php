/** Script para ativar o funcionamento basico do SPATIE no Laravel
*/
/** Permitindo acesso aos metodos das classes Role e Permission
*/
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
/**
Exemplo de comando utilizado para criar um papel
$roleAdmin = Role::create(['name' => 'admin']);
Aqui e utilizado o metodo findOrCreate para encontrar ou criar um papel
*/
$roleAdmin = Role::findOrCreate('admin');
$roleEditor = Role::findOrCreate('editor');
$roleRevisor = Role::findOrCreate('revisor');
/**
Exemplo de comando utilizado para criar uma permissao
$permissionViewNoticia = Permission::create(['name' => 'viewNoticia']);
Aqui e utilizado o metodo findOrCreate para encontrar ou criar uma
permissao
*/
$permissionViewNoticia = Permission::findOrCreate('viewNoticia');
$permissionCreateNoticia = Permission::findOrCreate('createNoticia');
$permissionUpdateNoticia = Permission::findOrCreate('updateNoticia');
$permissionDeleteNoticia = Permission::findOrCreate('deleteNoticia');
/**
O metodo assignRole e utilizado para atribuir um papel a uma permissao
*/
$permissionViewNoticia->assignRole($roleAdmin);
$permissionCreateNoticia->assignRole($roleAdmin);
$permissionUpdateNoticia->assignRole($roleAdmin);
$permissionDeleteNoticia->assignRole($roleAdmin);

/**
Buscamos o usuario com ID igual a 1 e atribuimos o papel de admin a ele
*/
$user = User::find(1);
$user->assignRole('admin');
/**
Buscamos o usuario com ID igual a 2 e atribuimos o papel de editor a ele
*/
$user = User::find(2);
$user->assignRole('editor');