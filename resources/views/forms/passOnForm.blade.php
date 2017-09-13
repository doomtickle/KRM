<input type="hidden" name="client_id" value="{{ $task->client->id }}">
<div class="columns">
    <div class="column is-6-tablet">
        <div class="field">
            <label class="label" for="assigned_to">Assign to</label>
            <div class="control">
                <span class="select">
                    <select name="assigned_to" id="assigned_to" class="input" required>
                        <option value="">Select who should follow up</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </span>
            </div>
        </div>
    </div>
    <div class="column is-6-tablet">
        <div class="field" style="padding: 0 2rem;">
            <label class="label" for="due_date">Follow up by</label>
            <div class="field has-addons flatpickr">
                <div class="control">
                    <input type="hidden" name="due_date" class="input open-calendar" id="due_date"
                    placeholder="Select Date.." required>
                    <flat-pickr></flat-pickr>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label" for="description">Description</label>
            <p class="control">
                <textarea class="textarea column" name="description" id="description" rows="3" required></textarea>
            </p>
        </div>
    </div>
</div>
<div class="field">
    <p class="control">
        <button type="submit" class="button is-info is-large">Submit</button>
    </p>
</div>
