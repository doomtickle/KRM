@php
$clients = App\Client::all();
$users = App\User::all();
@endphp
    <div class="form-group">
        <label for="client_id">Client</label>
        <select name="client_id" id="client_id" class="form-control">
            <option value="">Select a client</option>
            @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="assigned_to">Assign to</label>
        <select name="assigned_to" id="assigned_to" class="form-control">
            <option value="">Select who should follow up</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="due_date">Follow up by date:</label>
        <input type="text" name="due_date" class="form-control" id="due_date">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>        
    <button type="submit" class="btn btn-primary">Submit</button>
