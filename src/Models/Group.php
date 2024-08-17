<?php

namespace ClarionApp\ContactsBackend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ClarionApp\EloquentMultiChainBridge\EloquentMultiChainBridge;
use ClarionApp\ContactsBackend\Models\Contact;

class Group extends Model
{
    use SoftDeletes, EloquentMultiChainBridge;

    protected $table = 'contacts_groups';
    
    protected $fillable = ['name', 'group_type'];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contacts_contact_groups');
    }
}
