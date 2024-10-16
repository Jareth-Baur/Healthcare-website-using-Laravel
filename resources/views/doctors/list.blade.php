<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button type="button" class="btn btn-primary ms-auto p-2 mb-3" data-bs-toggle="modal"
                    data-bs-target="#modalDoctor">
                    Add Doctor
                </button>
                  <!-- Modal -->
                  <div class="modal fade" id="modalDoctor" tabindex="-1" aria-labelledby="modalDoctorLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <form class="form" id="addDoctorForm">
                              @csrf
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add New Doctor</h5>
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
                                      <label for="dob" class="form-label">Department</label>
                                      <select name="dept" id="dept" class="form-control">
                                            @foreach($department as $dept)
                                            <option value="{{$dept->department_id}}">{{$dept->name}}</option>
                                            @endforeach
                                      </select>
                                  </div>

                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary" id="addDoctorSubmit">Submit</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
                    <table class="border-separate border-spacing-2  border-slate-500" id="doctor-dt" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Initial</th>
                                <th>Department</th>
                                <th>Date Hired</th>
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
