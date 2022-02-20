<select name="city" id="city"  style="width: 100%;" class="form-control  {{ $errors->has('city') ? ' is-invalid' : '' }}">
    <option value="">Choose Your City</option>
    @foreach ($city as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach

  </select>
