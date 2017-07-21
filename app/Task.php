<?php

namespace App;

use App\User;
use App\Client;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    /** A task belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /** A task belongs to a client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /** A task has many notes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function markComplete()
    {
        $this->update([
            'complete' => 1
        ]);

//        return $this;
    }
}
