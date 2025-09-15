<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriberFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'email_list_id'
    ];

    public function emailList()
    {
        return $this->belongsTo(EmailList::class);
    }
}
