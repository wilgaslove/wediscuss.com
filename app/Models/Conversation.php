<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id2',
        'user_id2',
        'last_message_id',
       
    ];

    public function lastmMessage() {
        return $this->belongsTo(Message::class);
    }

    public function user1() {
        return $this->belongsTo(user::class, 'user_id1');

    }

    public function user2() {
        return $this->belongsTo(user::class, 'user_id2');

    }

    /**
 * Définit une relation plusieurs-à-plusieurs entre User et Group.
 * 
 * Cette méthode établit une relation "plusieurs-à-plusieurs" entre le modèle User et le modèle Group.
 * Elle utilise une table pivot nommée 'group_user' pour associer les utilisateurs à plusieurs groupes.
 * 
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 *    Instance de la relation qui permet d'interroger les modèles Group associés.
 */
public function groups() {
    // Établit la relation en utilisant la table pivot 'group_user'
    return $this->belongsToMany(Groupe::class, 'group_user');
}

/**
 * Définit une relation un-à-plusieurs entre User et Message.
 * 
 * Cette méthode établit une relation "un-à-plusieurs" entre le modèle User et le modèle Message.
 * Cela signifie qu'un utilisateur peut avoir plusieurs messages associés à lui.
 * 
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *    Instance de la relation qui permet d'interroger les modèles Message associés.
 */
public function messages() {
    // Établit la relation où un utilisateur peut avoir plusieurs messages
    return $this->hasMany(Message::class);
}

}
