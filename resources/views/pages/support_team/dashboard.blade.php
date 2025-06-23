@extends('layouts.master')
@section('page_title', 'My Dashboard')
@section('content')

    @if(Qs::userIsTeamSA())
    <div class="row">
        <!-- Total Students Card -->
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('students.index') }}" style="text-decoration: none;">
                <div class="card card-body bg-blue-400 has-bg-image" style="cursor:pointer;">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-0 text-white">{{ $users->where('user_type', 'student')->count() }}</h3>
                            <span class="text-uppercase font-size-xs font-weight-bold text-white">Total Students</span>
                        </div>
                        <div class="ml-3 align-self-center">
                            <i class="icon-users4 icon-3x opacity-75 text-white"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Teachers Card -->
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('users.teachers') }}" style="text-decoration: none;">
                <div class="card card-body bg-danger-400 has-bg-image" style="cursor:pointer;">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-0 text-white">{{ $users->where('user_type', 'teacher')->count() }}</h3>
                            <span class="text-uppercase font-size-xs text-white">Total Teachers</span>
                        </div>
                        <div class="ml-3 align-self-center">
                            <i class="icon-users2 icon-3x opacity-75 text-white"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Administrators Card -->
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('users.admins') }}" style="text-decoration: none;">
                <div class="card card-body bg-success-400 has-bg-image" style="cursor:pointer;">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-pointer icon-3x opacity-75 text-white"></i>
                        </div>
                        <div class="media-body text-right">
                            <h3 class="mb-0 text-white">{{ $users->where('user_type', 'admin')->count() }}</h3>
                            <span class="text-uppercase font-size-xs text-white">Total Administrators</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Parents Card -->
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('users.parents') }}" style="text-decoration: none;">
                <div class="card card-body bg-indigo-400 has-bg-image" style="cursor:pointer;">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-user icon-3x opacity-75 text-white"></i>
                        </div>
                        <div class="media-body text-right">
                            <h3 class="mb-0 text-white">{{ $users->where('user_type', 'parent')->count() }}</h3>
                            <span class="text-uppercase font-size-xs text-white">Total Parents</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif

    @if(!empty($students_by_class) && count($students_by_class))
        <div class="card mt-4">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">My Students</h3>
                {!! Qs::getPanelOptions() !!}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="classSelect">Select Class:</label>
                    <select id="classSelect" class="form-control" onchange="showClassStudents()">
                        <option value="">-- Select Class --</option>
                        @foreach($students_by_class as $class_id => $classData)
                            <option value="class-{{ $class_id }}">{{ $classData['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                @foreach($students_by_class as $class_id => $classData)
                    <div class="students-class-table" id="class-{{ $class_id }}" style="display: none;">
                        <h6 class="font-weight-bold">{{ $classData['name'] }}</h6>
                        <table class="table datatable-button-html5-columns">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($classData['students'] as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $student->photo ?? asset('global_assets/images/placeholders/user.png') }}" alt="photo">
                                        </td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->username }}</td>
                                        <td>{{ $student->email }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No students found for this class.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            function showClassStudents() {
                var selected = document.getElementById('classSelect').value;
                document.querySelectorAll('.students-class-table').forEach(function(div) {
                    div.style.display = 'none';
                });
                if(selected) {
                    document.getElementById(selected).style.display = 'block';
                }
            }
        </script>
    @endif

    @if(Qs::userIsParent() && isset($students))
        @include('pages.parent.children_table', ['students' => $students])
    @endif



    <div class="row mt-4">
        <!-- Chart on the left -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">User Type Chart</h5>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center" style="height: 350px;">
                    <canvas id="userTypeChart" width="500%" height=400"></canvas>
                </div>
            </div>
        </div>

        <!-- Calendar on the right -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">School Events Calendar</h5>
                    {!! Qs::getPanelOptions() !!}
                </div>
                <div class="card-body" style="height: 350px;">
                    <div class="fullcalendar-basic" style="height: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
