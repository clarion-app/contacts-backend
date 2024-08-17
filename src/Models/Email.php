<?php

namespace ClarionApp\ContactsBackend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ClarionApp\EloquentMultiChainBridge\EloquentMultiChainBridge;
use ClarionApp\ContactsBackend\Models\Contact;

class Email extends Model
{
    use SoftDeletes, EloquentMultiChainBridge;

    protected $table = 'contacts_email';

    protected $fillable = ['contact_id', 'email_address', 'label'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
