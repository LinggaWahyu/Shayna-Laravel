@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Detail Transaksi <small>"{{ $item->uuid }}"</small></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Alamat</th>
                                        <th>Total Transaksi</th>
                                        <th class="text-center">Status Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->number }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>${{ $item->transaction_total }}</td>
                                            <td class="text-center">
                                                @if ($item->transaction_status == 'PENDING')
                                                    <span class="badge badge-info">
                                                @elseif($item->transaction_status == 'SUCCESS')
                                                    <span class="badge badge-success">
                                                @elseif($item->transaction_status == 'FAILED')
                                                    <span class="badge badge-danger">
                                                @else
                                                    <span>
                                                @endif
                                                {{ $item->transaction_status }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                <b>PEMBELIAN PRODUK</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-left">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Tipe</th>
                                                        <th class="text-left">Harga</th>
                                                    </tr>
                                                    @foreach ($item->details as $detail )
                                                        <tr>
                                                            <td>{{ $detail->product->name }}</td>
                                                            <td>{{ $detail->product->type }}</td>
                                                            <td class="text-left">${{ $detail->product->price }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
                                        <i class="fa fa-check"></i> Set Sukses
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-danger btn-block">
                                        <i class="fa fa-times"></i> Set Gagal
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('transactions.status', $item->id) }}?status=PENDING" class="btn btn-info btn-block">
                                        <i class="fa fa-spinner"></i> Set Pending
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
