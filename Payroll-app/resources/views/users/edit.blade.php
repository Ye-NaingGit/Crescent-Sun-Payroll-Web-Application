<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/users/edit.css') }}">
    <title>Edit Profile</title>
</head>

<body>
    <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
        @csrf
        <div class="container rounded bg-white mb-5" style="margin-top: 8%">
            <a href="{{ route('users.show', auth()->user()) }}"><span style="font-size: 12px">Go back to
                    Profile</span></a>
            @if (auth()->user()->id == $user->id || auth()->user()->occupation->permission == 1)
                <div class="d-flex">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center py-5">
                            <span class="font-weight-bold">Current Profile Picture</span>
                            @if ($user->image)
                                <img class="rounded-circle mt-2" width="150px" src="{{ $user->getImageURL() }}">
                            @else
                                <img class="rounded-circle mt-2" width="150px"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            @endif
                            <span class="font-weight-bold" style="margin-top: 20px">Select New Profile Picture</span>
                            <input type="file" name="image" style="margin-left: 80px; margin-top: 10px"
                                id="image">
                                <img id="preview" class="rounded-circle mt-2" width="150px" src="#" alt=""/>
                            @error('image')
                                <spam class="text-danger">{{ $message }}</spam>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Edit Profile</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">Name</label>
                                    <input name="name" type="text" class="form-control" placeholder=""
                                        value="{{ $user->name }}">
                                    @error('name')
                                        <spam class="text-danger">{{ $message }}</spam>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Email Address</label>
                                    <input name="email" type="email" class="form-control"
                                        value="{{ $user->email }}" placeholder="">
                                    @error('email')
                                        <spam class="text-danger">{{ $message }}</spam>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Phone Number</label>
                                    <input name="phone" type="text" class="form-control"
                                        value="{{ $user->phone }}">
                                    @error('phone')
                                        <spam class="text-danger">{{ $message }}</spam>
                                    @enderror
                                </div>
                                <div class="col-md-6"><label class="labels">Bank Account</label>
                                    <input name="bankAccount" type="text" class="form-control"
                                        value="{{ $user->bankAccount }}">
                                    @error('bankAccount')
                                        <spam class="text-danger">{{ $message }}</spam>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Address</label>
                                    <textarea name='address' class="form-control">{{ $user->address }}</textarea>
                                    @error('address')
                                        <spam class="text-danger">{{ $message }}</spam>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <br>
                            <br>
                            <div class="col-md-12"><label class="labels">Current Password</label>
                                <input name="old_password" type="password" class="form-control">
                                @error('old_password')
                                    <spam class="text-danger">{{ $message }}</spam>
                                @enderror
                            </div>
                            <br>
                            <div class="col-md-12"><label class="labels">New Password</label>
                                <input name="password" type="password" class="form-control">
                                @error('password')
                                    <spam class="text-danger">{{ $message }}</spam>
                                @enderror
                            </div>
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @else
        <div class="d-flex">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center py-5">

                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        Cannot edit other profiles
                    </div>
                </div>
            </div>
        </div>
        @endif

    </form>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
