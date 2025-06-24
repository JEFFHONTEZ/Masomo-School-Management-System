@extends('layouts.master')
@section('page_title', 'Edit Announcement')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Edit Announcement</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('announcements.update', $announcement->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="announcement-title">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="announcement-title" class="form-control" value="{{ old('title', $announcement->title) }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="announcement-message">Message <span class="text-danger">*</span></label>
                        <textarea name="message" id="announcement-message" class="form-control" rows="3" required>{{ old('message', $announcement->message) }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="display_date">Display Date</label>
                        <input type="date" name="display_date" id="display_date" class="form-control" value="{{ old('display_date', $announcement->display_date) }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="visible_to">Visible To <span class="text-danger">*</span></label>
                        <select name="visible_to[]" id="visible_to" class="form-control" multiple required>
                            <option value="student" {{ in_array('student', $announcement->visible_to ?? []) ? 'selected' : '' }}>Students</option>
                            <option value="teacher" {{ in_array('teacher', $announcement->visible_to ?? []) ? 'selected' : '' }}>Teachers</option>
                            <option value="parent" {{ in_array('parent', $announcement->visible_to ?? []) ? 'selected' : '' }}>Parents</option>
                            <option value="accountant" {{ in_array('accountant', $announcement->visible_to ?? []) ? 'selected' : '' }}>Accountants</option>
                        </select>
                        <small class="form-text text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple</small>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update Announcement</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection