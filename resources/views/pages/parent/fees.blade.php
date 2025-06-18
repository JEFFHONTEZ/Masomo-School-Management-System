@extends('layouts.master')
@section('page_title', 'Manage Children Fees')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-cash2 mr-2"></i> Manage Children Fees</h5>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <table class="table datatable-button-html5-columns">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>ADM_No</th>
                    <th>Section</th>
                    <th>Payments</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $s->user->photo }}" alt="photo"></td>
                        <td>{{ $s->user->name }}</td>
                        <td>{{ $s->adm_no }}</td>
                        <td>{{ $s->my_class->name.' '.$s->section->name }}</td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="btn btn-danger" data-toggle="dropdown">Manage Payments <i class="icon-arrow-down5"></i></a>
                                <div class="dropdown-menu dropdown-menu-left">
                                    <a href="{{ route('parent.payments.invoice', [Qs::hash($s->user_id)]) }}" class="dropdown-item">All Payments</a>
                                    @foreach(Pay::getYears($s->user_id) as $py)
                                        @if($py)
                                            <a href="{{ route('parent.payments.invoice', [Qs::hash($s->user_id), $py]) }}" class="dropdown-item">{{ $py }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection