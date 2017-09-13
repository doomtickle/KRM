@php
    $clients = App\Client::all();
    $users = App\User::all();

foreach($clients as $client){
    $clientsJson[] = [
        'name' => $client->name,
        'value' => $client->id
    ];
}
$clientsJson = json_encode($clientsJson);

foreach($users as $user){
    $usersJson[] = [
        'name' => $user->name,
        'value' => $user->id
    ];
}
$usersJson = json_encode($usersJson);

@endphp

<form action="/task" method="post">
    {{ csrf_field() }}
    <div class="columns">
        <div class="column is-6-tablet">
            <div class="field">
                <label class="label is-large" for="client_id">Follow up with</label>
                <div class="control">
                <span class="select is-large">
                    <v-select
                        name="client_id"
                        id="client_id"
                        label="name"
                        placeholder="Select a client"
                        v-model="selection"
                        @type="search"
                        :search="true"
                        :options="{{ $clientsJson }}" >
                    </v-select>
                </span>
                </div>
            </div>
            <div class="field">
                <label class="label is-large" for="assigned_to">Assign to</label>
                <div class="control">
                <span class="select is-large">
                    <v-select
                        name="assigned_to"
                        id="assigned_to"
                        label="name"
                        placeholder="Select who should follow up"
                        v-model="selection"
                        @type="search"
                        :search="true"
                        :options="{{ $usersJson }}" >
                    </v-select>
                </span>
                </div>
            </div>
            <div class="field">
                <label class="label is-large" for="description">Description</label>
                <p class="control">
                    <textarea required class="textarea is-large" name="description" id="description" rows="3"></textarea>
                </p>
            </div>
        </div>
        <div class="column is-6-tablet">
            <div class="field" style="padding: 0 2rem;">
                <label class="label is-large" for="due_date">Follow up by</label>

                <div class="field has-addons flatpickr">
                    <div class="control">
                        <input type="hidden" name="due_date" class="input is-large open-calendar" id="due_date"
                               placeholder="Select Date.." data-input required>
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
</form>
