<?php

namespace ClarionApp\ContactsBackend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ClarionApp\EloquentMultiChainBridge\EloquentMultiChainBridge;
use ClarionApp\ContactsBackend\Models\Contact;

class Phone extends Model
{
    use SoftDeletes, EloquentMultiChainBridge;

    protected $table = 'contacts_phones';

    protected $fillable = ['contact_id', 'phone_number', 'label'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
