<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pharmacies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#addPharmacy">
                        Add Pharmacy
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="addPharmacy" tabindex="-1" aria-labelledby="addPharmacyLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="form" id="addPharmacyForm">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addPharmacyLabel">Add new Pharmacy</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert hidden" id="msg" role="alert"></div>

                                        <div class="mb-3">
                                            <label for="pname" class="form-label">Name</label>
                                            <input type="text" name="pname" id="pname" class="form-control"
                                                placeholder="Pharmacy Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                placeholder="Address" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cnumber" class="form-label">Contact Number</label>
                                            <input type="text"  name="cnumber" id="cnumber"
                                                class="form-control" placeholder="Contact Number" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="addPharmacySubmit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table border-separate border-spacing-2  border-slate-500" id="pharmacy-dt">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
