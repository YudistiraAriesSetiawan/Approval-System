@extends('layouts.app')

@section('content')
    @hasrole('user')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Approval System Sederhana</div>
                        <div class="card-body">
                            <form action="Pengajuan/Store" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            placeholder="Nama subjek">
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List dan status subjek</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark">
                                <td><b>Nama</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </thead>
                            <tbody>

                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ strtoupper($item->nama )}}</td>
                                        <td>
                                            @if ($item->status === 'proses')
                                                <span class="badge bg-secondary">{{ $item->status }}</span>
                                            @elseif ($item->status === 'disetujui')
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $item->status }}</span>
                                            @endif


                                        </td>
                                        <td>
                                            @hasrole('admin')
                                                <a href="/Pengajuan/UpdateToApprove/{{ $item->id }}" class="btn btn-sm btn-success">Approve</a>
                                                <a href="/Pengajuan/UpdateToReject/{{ $item->id }}" class="btn btn-sm btn-danger">Reject</a>
                                            @else
                                                <a href="/Pengajuan/Destroy/{{ $item->id }}" class="btn btn-sm btn-danger">Cancel</a>
                                            @endrole
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
