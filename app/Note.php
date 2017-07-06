<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $guarded = [];

	/** A note belongs to a task
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function task() {

		return $this->belongsTo(Task::class);
	}

    /** A note belongs to a client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
	}

    /** A note belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
	}
}
