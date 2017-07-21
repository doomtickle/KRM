@php
    $clients = App\Client::all();
    $users = App\User::all();
@endphp

<div class="columns">
    <div class="column is-6-tablet">
        <div class="field">
            <label class="label is-large" for="client_id">Follow up with</label>
            <div class="control">
                <span class="select is-large">
                    <select name="client_id" id="client_id" class="input is-large">
                        <option value="">Select a client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </span>
            </div>
        </div>
        <div class="field">
            <label class="label is-large" for="assigned_to">Assign to</label>
            <div class="control">
                <span class="select is-large">
                    <select name="assigned_to" id="assigned_to" class="input is-large">
                        <option value="">Select who should follow up</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </span>
            </div>
        </div>
        <div class="field">
            <label class="label is-large" for="description">Description</label>
            <p class="control">
                <textarea class="textarea is-large" name="description" id="description" rows="3"></textarea>
            </p>
        </div>
    </div>
    <div class="column is-6-tablet">
        <div class="field" style="padding: 0 2rem;">
            <label class="label is-large" for="due_date">Follow up by</label>

                <div class="field has-addons flatpickr">
                    <div class="control">
                        <input type="hidden" name="due_date" class="input is-large open-calendar" id="due_date" placeholder="Select Date.." data-input>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="field">
    <p class="control">
        <button type="submit" class="button is-info is-large">Submit</button>
    </p>
</div>
