@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Create a New Property</h1>

        </div>
        <form action="{{ route('lessor.store') }}" method="POST" enctype="multipart/form-data"
            onsubmit="return validateForm()">
            @csrf
            <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                <!-- Left Column: Image Upload -->
                <div class="lg:w-1/2">
                    <div class="border-b border-gray-900/10 pb-4">
                        <h2 class="text-lg font-semibold leading-7 text-gray-900">Upload Images</h2>
                        <div class="mt-4">
                            <label class="block text-sm font-medium leading-6 text-gray-900">Property Images</label>
                            <input type="file" name="images[]" id="images" multiple required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <span class="text-red-500 text-sm hidden" id="imagesError">Please upload at least one
                                image.</span>
                        </div>
                        <div id="imagePreview" class="mt-4 grid grid-cols-2 gap-4">
                            <!-- Uploaded images will be displayed here -->
                        </div>
                    </div>
                </div>

                <!-- Right Column: Property Details -->
                <div class="lg:w-1/2 space-y-6">
                    <div class="border-b border-gray-900/10 pb-4">
                        <h2 class="text-lg font-semibold leading-7 text-gray-900">Property Information</h2>
                        <div class="mt-4">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <input type="text" name="name" id="name" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <span class="text-red-500 text-sm hidden" id="nameError">Please enter a name.</span>
                        </div>
                        <div class="mt-4">
                            <label for="description"
                                class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <textarea name="description" id="description" rows="3" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            <span class="text-red-500 text-sm hidden" id="descriptionError">Please enter a
                                description.</span>
                        </div>
                        <div class="mt-4">
                            <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                            <select name="location" id="location" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="" disabled selected>Select Location</option>
                                <option value="Amman">Amman</option>
                                <option value="Zarqa">Zarqa</option>
                                <option value="Irbid">Irbid</option>
                                <option value="Aqaba">Aqaba</option>
                                <option value="Madaba">Madaba</option>
                                <option value="Jerash">Jerash</option>
                                <option value="Salt">Salt</option>
                                <option value="Ma'an">Ma'an</option>
                                <option value="Karak">Karak</option>
                                <option value="Tafilah">Tafilah</option>
                                <option value="Ajloun">Ajloun</option>
                                <option value="Mafraq">Mafraq</option>
                            </select>
                            <span class="text-red-500 text-sm hidden" id="locationError">Please select a location.</span>
                        </div>
                        <div class="mt-4">
                            <br>
                            <br>
                            <label for="price_per_day" class="block text-sm font-medium leading-6 text-gray-900">Price per
                                Full Day</label>
                            <input type="number" name="price_per_day" id="price_per_day" required min="0"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <span class="text-red-500 text-sm hidden" id="priceError">Please enter a valid price.</span>
                        </div>

                        <div class="mt-4">

                            <label for="capacity" class="block text-sm font-medium leading-6 text-gray-900">Capacity</label>
                            <input type="number" name="capacity" id="capacity" required min="0"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <span class="text-red-500 text-sm hidden" id="capacityError">Please enter a valid
                                capacity.</span>
                        </div>
                        <div class="mt-4">
                            <label for="availability" class="block text-sm font-medium leading-6 text-gray-900">Is
                                Available?</label>
                            <select name="availability" id="availability" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <br>
                            <br>
                            <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                            <select name="category_id" id="category" required
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-red-500 text-sm hidden" id="categoryError">Please select a category.</span>
                        </div>
                        <div class="mt-4">
                            <br>
                            <br>
                            <label for="credentials" class="block text-sm font-medium leading-6 text-gray-900">Property
                                Credentials</label>
                            <input type="file" name="credentials" id="credentials"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function validateForm() {
            let isValid = true;

            const name = document.getElementById('name').value;
            const description = document.getElementById('description').value;
            const location = document.getElementById('location').value;
            const price = document.getElementById('price_per_day').value;
            const capacity = document.getElementById('capacity').value;
            const category = document.getElementById('category').value;
            const images = document.getElementById('images').files.length;

            if (!name) {
                document.getElementById('nameError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('nameError').classList.add('hidden');
            }

            if (!description) {
                document.getElementById('descriptionError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('descriptionError').classList.add('hidden');
            }

            if (!location) {
                document.getElementById('locationError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('locationError').classList.add('hidden');
            }

            if (!price || price <= 0) {
                document.getElementById('priceError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('priceError').classList.add('hidden');
            }

            if (!capacity || capacity <= 0) {
                document.getElementById('capacityError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('capacityError').classList.add('hidden');
            }

            if (!category) {
                document.getElementById('categoryError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('categoryError').classList.add('hidden');
            }

            if (images === 0) {
                document.getElementById('imagesError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('imagesError').classList.add('hidden');
            }

            return isValid;
        }

        document.getElementById('images').addEventListener('change', function(event) {
            let imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = '';
            let files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                let reader = new FileReader();
                reader.onload = function(e) {
                    let imageContainer = document.createElement('div');
                    imageContainer.className = 'flex flex-col items-center space-y-2 mt-2';

                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'h-40 w-40 object-cover rounded-md';

                    let removeButton = document.createElement('button');
                    removeButton.textContent = 'Remove';
                    removeButton.className = 'text-white bg-red-500 hover:bg-red-600 px-2 py-1 rounded';
                    removeButton.addEventListener('click', function() {
                        imageContainer.remove();
                    });

                    imageContainer.appendChild(img);
                    imageContainer.appendChild(removeButton);
                    imagePreview.appendChild(imageContainer);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
