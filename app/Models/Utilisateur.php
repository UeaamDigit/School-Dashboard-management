<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Utilisateur
 *
 * @property $id
 * @property $nom
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Utilisateur extends Model
{
    
    static $rules = [
		'nom' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nom','email'];



}
