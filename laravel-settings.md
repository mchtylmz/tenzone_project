#General Set

```php
// Way 1 
settings()->status = false;
 
// Way 2 
settings()->set('off_message', 'Maintenance');
 
// Way 3 
settings()->set([
    'status'        => true,
    'off_message'   => 'Maintenance'
]);
 
// Save all settings  
settings()->save();
```

#General Get

```php
// Way 1 
// Returns string|null
settings()->status;
 
// Way 2 
// Returns string|null
settings()->get('off_message');
 
// Way 3 
// Returns Collection
$data = settings()->get(['status', 'off_message']);
echo $data->off_message->value;
```

#Inclusion in Model


```php
namespace App\Models;
 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Pharaonic\Laravel\Settings\Traits\Settingable; 
 
class User extends Authenticatable
{
    use Settingable; 
}
```

#Model Set & Get


```php
// Way 1 
$user->settings->multilingual = true;
 
// Way 2 
$user->settings->set('notifiable', true);
 
// Way 3 
$user->settings->set([
    'multilingual'  => true,
    'notifiable'    => true,
]);
 
// Save all settings 
$user->settings->save();


// Way 1 
// Returns string|null
$user->settings->notifiable;
 
// Way 2 
// Returns string|null
$user->settings->get('multilingual');
 
// Way 3 
// Returns Collection
$data = $user->settings->get(['multilingual', 'notifiable']);
echo $data->multilingual->value;
```