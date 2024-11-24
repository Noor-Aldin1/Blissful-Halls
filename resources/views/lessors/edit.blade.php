@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Property</h1>
        <a href="{{ route('lessor.dashboard') }}" style="background-color: #fd3d57;"  class="text-white px-4 py-2 rounded hover:bg-red-600 active:bg-red-700 transition duration-200 ease-in-out">Back to Dashboard</a>
    </div>
    <form action="{{ route('lessor.update', $property->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <input type="hidden" name="removed_images" id="removedImages">

        <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
            <div class="lg:w-1/2 space-y-6">
                <div class="border-b border-gray-900/10 pb-4">
                    <h2 class="text-lg font-semibold leading-7 text-gray-900">Property Information</h2>
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <input type="text" name="name" id="name" value="{{ $property->name }}" required class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <span id="nameError" class="text-red-500 text-sm hidden">Name is required.</span>
                    </div>
                    <div class="mt-4">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <textarea name="description" id="description" rows="3" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $property->description }}</textarea>
                        <span id="descriptionError" class="text-red-500 text-sm hidden">Description is required.</span>
                    </div>
                    <div class="mt-4">
                        <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                        <select name="location" id="location" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="Amman" {{ $property->location == 'Amman' ? 'selected' : '' }}>Amman</option>
                            <option value="Zarqa" {{ $property->location == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
                            <option value="Irbid" {{ $property->location == 'Irbid' ? 'selected' : '' }}>Irbid</option>
                            <option value="Aqaba" {{ $property->location == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
                            <option value="Madaba" {{ $property->location == 'Madaba' ? 'selected' : '' }}>Madaba</option>
                            <option value="Jerash" {{ $property->location == 'Jerash' ? 'selected' : '' }}>Jerash</option>
                            <option value="Salt" {{ $property->location == 'Salt' ? 'selected' : '' }}>Salt</option>
                            <option value="Ma'an" {{ $property->location == "Ma'an" ? "selected" : "" }}>Ma'an</option>
                            <option value="Karak" {{ $property->location == 'Karak' ? 'selected' : '' }}>Karak</option>
                            <option value="Tafilah" {{ $property->location == 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
                            <option value="Ajloun" {{ $property->location == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
                            <option value="Mafraq" {{ $property->location == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
                        </select>
                        <span id="locationError" class="text-red-500 text-sm hidden">Location is required.</span>
                    </div>
                    <div class="mt-4">
                        <label for="price_per_full_day" class="block text-sm font-medium leading-6 text-gray-900">Price per Full Day</label>
                        <input type="number" name="price_per_full_day" id="price_per_full_day" value="{{ $property->price_per_full_day }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <span id="priceError" class="text-red-500 text-sm hidden">Price per Full Day is required and must be greater than 0.</span>
                    </div>
                    <div class="mt-4">
                        <label for="capacity" class="block text-sm font-medium leading-6 text-gray-900">Capacity</label>
                        <input type="number" name="capacity" id="capacity" value="{{ $property->capacity }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <span id="capacityError" class="text-red-500 text-sm hidden">Capacity is required and must be greater than 0.</span>
                    </div>
                    <div class="mt-4">
                        <label for="availability" class="block text-sm font-medium leading-6 text-gray-900">Is Available?</label>
                        <select name="availability" id="availability" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="1" {{ $property->availability ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$property->availability ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                        <select name="category_id" id="category" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $property->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <span id="categoryError" class="text-red-500 text-sm hidden">Category is required.</span>
                    </div>
                    <div class="mt-4">
                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Main Image</label>
                        <input type="file" name="image" id="image" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>

            <!-- Right Column: Image Upload -->
            <div class="lg:w-1/2">
                <div class="border-b border-gray-900/10 pb-4">
                    <h2 class="text-lg font-semibold leading-7 text-gray-900">Upload Images</h2>
                    <div class="mt-4">
                        <label class="block text-sm font-medium leading-6 text-gray-900">Property Images</label>
                        <input type="file" name="images[]" id="images" multiple class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div id="imagePreview" class="mt-4 grid grid-cols-2 gap-4">
                        @foreach($property->property_images as $image)
                            <div class="flex flex-col items-center space-y-2 mt-2">
                                <img src="{{ asset('storage/' . $image->image) }}" class="h-40 w-40 object-cover rounded-md">
                                <button type="button" class="remove-btn text-white bg-red-500 hover:bg-red-600 px-2 py-1 rounded" data-image-id="{{ $image->id }}">Remove</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const removedImages = [];

        // Handle existing images removal
        document.querySelectorAll('#imagePreview .remove-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                const imageContainer = this.parentElement;
                const imageId = this.dataset.imageId;

                removedImages.push(imageId);
                imageContainer.remove();

                updateRemovedImagesInput();
            });
        });

        // Handle new images preview
        document.getElementById('images').addEventListener('change', function (event) {
            let imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = '';
            let files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                let reader = new FileReader();
                reader.onload = function (e) {
                    let imageContainer = document.createElement('div');
                    imageContainer.className = 'flex flex-col items-center space-y-2 mt-2';

                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'h-40 w-40 object-cover rounded-md';

                    let removeButton = document.createElement('button');
                    removeButton.textContent = 'Remove';
                    removeButton.className = 'text-white bg-red-500 hover:bg-red-600 px-2 py-1 rounded';
                    removeButton.addEventListener('click', function () {
                        imageContainer.remove();
                    });

                    imageContainer.appendChild(img);
                    imageContainer.appendChild(removeButton);
                    imagePreview.appendChild(imageContainer);
                }
                reader.readAsDataURL(file);
            }
        });

        function updateRemovedImagesInput() {
            document.getElementById('removedImages').value = removedImages.join(',');
        }
    });
</script>
@endsection
