<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    /** A client has many tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'client_id');
    }

    /** A client has many notes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    /** Getter for phone attribute
     *
     * @param $phone
     * @return mixed
     */
    public function getPhoneAttribute($phone)
    {
        return $this->localizePhoneNumber($phone);
    }

    /** Parses a phone number to always display ###-###-####
     *
     * @param $phone
     * @return mixed
     */
    private function localizePhoneNumber($phone)
    {
        //formats a phone number regardless of how it's entered
        $numbers_only = preg_replace("/[^\d]/", "", $phone);

        return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $numbers_only);
    }
}
