@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div> <br />
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Tanggal Lahir</td>
                    <td>Alamat</td>
                    <td>No. Telpon</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($prbs as $prb)
                    <tr>
                        <td>{{$prb->id}}</td>
                        <td>{{$prb->nama}}</td>
                        <td>{{$prb->tgl_lahir}}</td>
                        <td>{{$prb->alamat}}</td>
                        <td>{{$prb->telpon}}</td>
                        <td><a href="{{ route('prbs.edit', $prb->id) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('prbs.destroy',$prb->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection