<?php
namespace ClarionApp\ContactsBackend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ClarionApp\EloquentMultiChainBridge\EloquentMultiChainBridge;
use ClarionApp\ContactsBackend\Models\Group;
use ClarionApp\ContactsBackend\Models\Email;
use ClarionApp\ContactsBackend\Models\Phone;

class Contact extends Model
{
    use SoftDeletes, EloquentMultiChainBridge;

    protected $fillable = ['name', 'type', 'user_id'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'contacts_contact_groups');
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
