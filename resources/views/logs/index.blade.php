@extends('layouts.master')
@section('page_title', 'Event Logs')
@section('content')
<div class="container">
    <h1>Event Logs</h1>
    <form method="GET" class="mb-3">
        <div class="row">
            <div class="col"><input type="text" name="user" class="form-control" placeholder="User" value="{{ request('user') }}"></div>
            <div class="col"><input type="text" name="action" class="form-control" placeholder="Action" value="{{ request('action') }}"></div>
            <div class="col"><input type="text" name="log_name" class="form-control" placeholder="Module" value="{{ request('log_name') }}"></div>
            <div class="col"><input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}"></div>
            <div class="col"><input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}"></div>
            <div class="col"><button class="btn btn-primary" type="submit">Filter</button></div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>User</th>
                <th>Role</th>
                <th>Module</th>
                <th>Action</th>
                <th>IP</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
        @forelse($logs as $log)
            <tr>
                <td>{{ $log->created_at }}</td>
                <td>{{ optional($log->causer)->name ?? '-' }}</td>
                <td>{{ optional($log->causer)->role ?? '-' }}</td>
                <td>{{ $log->log_name }}</td>
                <td>{{ $log->description }}</td>
                <td>{{ $log->properties['ip'] ?? '-' }}</td>
                <td>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#logModal{{ $log->id }}">View</button>
                    <!-- Modal -->
                    <div class="modal fade" id="logModal{{ $log->id }}" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Log Details</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <pre>{{ json_encode($log->properties, JSON_PRETTY_PRINT) }}</pre>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">No logs found.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $logs->links() }}
</div>
@endsection