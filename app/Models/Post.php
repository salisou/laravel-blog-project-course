<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;


/**
 * Nota il #[Fillable]attributo sulla dichiarazione di classe. 
 * Questa è una nuova funzionalità di Laravel 13 
 * che utilizza la sintassi degli attributi nativi di PHP 
 * per definire quali campi possono essere assegnati in serie. 
 * 
 * Nelle versioni precedenti, 
 * si imposta un $fillableproprietà all'interno della classe.
 * 
 * L'approccio dell'attributo mantiene la configurazione dichiarativa
 * e colocalizzata con la definizione di classe.
 */

#[Fillable(['title', 'slug', 'content', 'status'])]
class Post extends Model
{
    use HasFactory;
}
