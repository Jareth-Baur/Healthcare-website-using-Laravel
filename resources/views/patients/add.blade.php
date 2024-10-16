<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('record_patient') }}" method="POST">
                        @csrf
                        <input type="text" name="fname" id="fname" class="form-control mb-3" :value="old('fname')" placeholder="First Name">
                        <x-input-error :messages="$errors->get('fname')" class="mb-2" />
                        <input type="text" name="lname" id="lname" class="form-control mb-3" :value="old('lname')"placeholder="Last Name">
                        <x-input-error :messages="$errors->get('lname')" class="mb-2" />
                        <input type="text" maxlength="1" name="mname" id="mname" class="form-control mb-3" :value="old('mname')"placeholder="Middle Name">
                        <x-input-error :messages="$errors->get('mname')" class="mb-2" />
                        <input type="date" name="dob" id="dob" class="form-control mb-3" placeholder="Date of Birth" :value="old('dob')">
                        <x-input-error :messages="$errors->get('dob')" class="mb-2" />
                        <select id="gender" name="gender" class="form-control mb-3" :value="old('gender')">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mb-2" />
                       
                        <input class="btn btn-primary w-10" type="submit" name="submit" value="Add New Patient"/>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
