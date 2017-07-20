@php
    $clients = App\Client::all();
    $users = App\User::all();
@endphp
<div class="field">
    <label class="label" for="client_id">Client</label>
    <p class="control">
            <span class="select">
                <select name="client_id" id="client_id" class="input">
                    <option value="">Select a client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </span>
    </p>
</div>
<div class="field">
    <label class="label" for="assigned_to">Assign to</label>
    <p class="control">
            <span class="select">
                <select name="assigned_to" id="assigned_to" class="input">
                    <option value="">Select who should follow up</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </span>
    </p>
</div>
<div class="field">
    <label class="label" for="due_date">Follow up by date:</label>
    <p class="control">
        <input type="text" name="due_date" class="input date-input" id="due_date">
    </p>
</div>
<div class="field">
    <label class="label" for="description">Description</label>
    <p class="control">
        <textarea class="textarea" name="description" id="description" rows="3"></textarea>
    </p>
</div>
<div class="field">
    <p class="control">
        <button type="submit" class="button is-info">Submit</button>
    </p>
</div>
