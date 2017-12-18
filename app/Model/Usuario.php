<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Model\Usuario
 *
 * @property int $id
 * @property string $nome
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string|null $cargo
 * @property string|null $remember_token
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\ProjetoVisita[] $projetos
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Usuario whereCargo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Usuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Usuario whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Usuario whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Usuario whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Usuario whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = ['nome','login','password','email','cargo','status'];

    public function projetos()
    {
        return $this->hasMany(ProjetoVisita::class,'usuario_id','id');
    }
}
