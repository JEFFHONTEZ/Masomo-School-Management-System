@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('announcements.store') }}" method="POST" class="mb-4">
    @csrf
    <div class="form-group">
        <label for="announcement-title">Title</label>
        <input type="text" name="title" id="announcement-title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="announcement-message">Message</label>
        <textarea name="message" id="announcement-message" class="form-control" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="visible_to">Visible To</label>
        <select name="visible_to[]" id="visible_to" class="form-control" multiple required>
            <option value="student">Students</option>
            <option value="teacher">Teachers</option>
            <option value="parent">Parents</option>
            <option value="accountant">Accountants</option>
        </select>
        <small>Hold Ctrl (Windows) or Cmd (Mac) to select multiple</small>
    </div>
    <button type="submit" class="btn btn-primary">Add Announcement</button>
</form>