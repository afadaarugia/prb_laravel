@extends ('layout')

@section ('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit PRB
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div> <br />
            @endif
            <form method="post" action="{{ route('prbs.update', $prb->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" name="nama" value="{{ $prb->nama }}">
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" name="tgl_lahir" value="{{ $prb->tgl_lahir }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" name="alamat" value="{{ $prb->alamat }}">
                </div>
                <div class="form-group">
                    <label for="telpon">No. Telpon:</label>
                    <input type="tel" class="form-control" name="telpon" value="{{ $prb->telpon }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection