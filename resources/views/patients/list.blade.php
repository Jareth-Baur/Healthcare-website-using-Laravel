<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex mb-3">
                        <a class="btn btn-primary" href="/patients/add" role="button">Add Patient</a>
                        <button type="button" class="btn btn-primary ms-auto p-2" data-bs-toggle="modal"
                            data-bs-target="#modalPatient">
                            Add Patient Modal
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modalPatient" tabindex="-1" aria-labelledby="modalPatientLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form" id="addPatientForm">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Patient</h5>
                                        <button type="button" class="btn-close close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert hidden" id="error-msg" role="alert"></div>
                                        
                                        <div class="mb-3">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input type="text" name="fname" id="fname" class="form-control"
                                                placeholder="First Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lname" class="form-label">Last Name</label>
                                            <input type="text" name="lname" id="lname" class="form-control"
                                                placeholder="Last Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mname" class="form-label">Middle Initial</label>
                                            <input type="text" maxlength="1" name="mname" id="mname"
                                                class="form-control" placeholder="Middle Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input type="date" name="dob" id="dob" class="form-control"
                                                placeholder="Date of Birth" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select id="gender" name="gender" class="form-control" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="addPatientSubmit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table border-separate border-spacing-2  border-slate-500" id="patients-dt">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Initial</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
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
