@extends('layouts.master')
@section('page_title', 'All Parents')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Parents List</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <table class="table datatable-button-html5-columns">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($parents as $parent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $parent->photo ?? asset('global_assets/images/placeholders/user.png') }}" alt="photo">
                            </td>
                            <td>{{ $parent->name }}</td>
                            <td>{{ $parent->username }}</td>
                            <td>{{ $parent->phone }}</td>
                            <td>{{ $parent->email }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left">
                                            <a href="{{ route('users.show', Qs::hash($parent->id)) }}" class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                            <a href="{{ route('users.edit', Qs::hash($parent->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                            @if(Qs::userIsSuperAdmin())
                                                <a href="{{ route('users.reset_pass', Qs::hash($parent->id)) }}" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>
                                                <a id="{{ Qs::hash($parent->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                <form method="post" id="item-delete-{{ Qs::hash($parent->id) }}" action="{{ route('users.destroy', Qs::hash($parent->id)) }}" class="hidden">@csrf @method('delete')</form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No parents found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection