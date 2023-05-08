<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
    ];

    //checking if the user has liked the page, and can only like once
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id',$user->id);
    }

    //make sure user only deletes his or her post only
   /*  public function ownedBy(User $user)
    {
        return $user->id === $this->user_id;
    }
 */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
