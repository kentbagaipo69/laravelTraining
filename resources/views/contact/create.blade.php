<x-app-layout>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-md-0">
            <div class="row mb-2">
                <div class="col-md-2">

                    <h2>
                        <a href="{{ route('contacts.index') }}">
                            <i class="bi bi-arrow-left-circle"></i>
                        </a>
                    </h2>
                </div>

                <div class="col-md-10">
                    <h2 class="h4" style="width: 100%; margin-top: 6px">Add Contact</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12 col-xl-8">

            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Contact information</h2>

                <form method="POST" action="{{ route('contacts.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                    name="first_name" type="text" placeholder="FirstName"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control @error('email_address') is-invalid @enderror"
                                    id="email_address" name="email_address" type="email" placeholder="Email"
                                    value="{{ old('email_address') }}">
                                @error('email_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="name">Middle Name</label>
                                <input class="form-control @error('middle_name') is-invalid @enderror" id="middle_name"
                                    name="middle_name" type="text" placeholder="Middle Name"
                                    value="{{ old('middle_name') }}">
                                @error('middle_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                    name="last_name" type="text" placeholder="Last Name"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
												<div class="col-md-6 mb-3">
													<div class="form-group">
															<label for="name">Barangay</label>
															<input class="form-control @error('barangay') is-invalid @enderror" id="barangay"
																	name="barangay" type="text" placeholder="Barangay"
																	value="{{ old('barangay') }}">
															@error('barangay')
																	<div class="invalid-feedback">
																			{{ $message }}
																	</div>
															@enderror
													</div>
											</div>
											<div class="col-md-6 mb-3">
												<div class="form-group">
														<label for="name">Street</label>
														<input class="form-control @error('street') is-invalid @enderror" id="street"
																name="street" type="text" placeholder="Street"
																value="{{ old('street') }}">
														@error('street')
																<div class="invalid-feedback">
																		{{ $message }}
																</div>
														@enderror
												</div>
										</div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
