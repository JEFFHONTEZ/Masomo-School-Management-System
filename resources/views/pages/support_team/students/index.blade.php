@extends('layouts.master')
@section('page_title', 'All Students')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Students List</h6>
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
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        @php
                            // Find the StudentRecord for this user
                            $studentRecord = \App\Models\StudentRecord::where('user_id', $student->id)->first();
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $student->photo ?? asset('global_assets/images/placeholders/user.png') }}" alt="photo">
                            </td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->username }}</td>
                            <td>{{ $student->email }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left">
                                            @if($studentRecord)
                                                <a href="{{ route('students.show', Qs::hash($studentRecord->id)) }}" class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                                @if(Qs::userIsTeamSA())
                                                    <a href="{{ route('students.edit', Qs::hash($studentRecord->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                    <a href="{{ route('st.reset_pass', Qs::hash($student->id)) }}" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>
                                                @endif
                                                <a target="_blank" href="{{ route('marks.year_selector', Qs::hash($student->id)) }}" class="dropdown-item"><i class="icon-check"></i> Marksheet</a>
                                                @if(Qs::userIsSuperAdmin())
                                                    <a id="{{ Qs::hash($student->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-{{ Qs::hash($student->id) }}" action="{{ route('students.destroy', Qs::hash($student->id)) }}" class="hidden">@csrf @method('delete')</form>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection