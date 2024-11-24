<div class="form-group">
    <label for="lessor_id">Lessor ID</label>
    <input type="text" class="form-control" id="lessor_id" name="lessor_id" value="{{ old('lessor_id', $property->lessor_id ?? '') }}">
</div>

<div class="form-group">
    <label for="category_id">Category ID</label>
    <input type="text" class="form-control" id="category_id" name="category_id" value="{{ old('category_id', $property->category_id ?? '') }}">
</div>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $property->name ?? '') }}">
</div>

<div class="form-group">
    <label for="location">Location</label>
    <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $property->location ?? '') }}">
</div>

<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $property->address ?? '') }}">
</div>

<div class="form-group">
    <label for="price_per_hour">Price Per Hour</label>
    <input type="text" class="form-control" id="price_per_hour" name="price_per_hour" value="{{ old('price_per_hour', $property->price_per_hour ?? '') }}">
</div>

<div class="form-group">
    <label for="availability">Availability</label>
    <select class="form-control" id="availability" name="availability">
        <option value="1" {{ (old('availability', $property->availability ?? '') == 1) ? 'selected' : '' }}>Available</option>
        <option value="0" {{ (old('availability', $property->availability ?? '') == 0) ? 'selected' : '' }}>Not Available</option>
    </select>
</div>

<div class="form-group">
    <label for="capacity">Capacity</label>
    <input type="text" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $property->capacity ?? '') }}">
</div>
