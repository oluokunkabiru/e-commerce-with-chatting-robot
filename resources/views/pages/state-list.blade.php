<select name="state_id" id="state"  style="width: 100%;" class="form-control  {{ $errors->has('state') ? ' is-invalid' : '' }}">
    <option value="">Choose Your State</option>
    @foreach ($states as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach

  </select>
