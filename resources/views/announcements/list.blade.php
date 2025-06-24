{{-- Blade template for announcements list --}}
@if(isset($announcements) && count($announcements))
    <div class="mb-4">
        @foreach($announcements as $announcement)
            <div class="alert alert-info d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $announcement->title }}</strong>
                    <div>{{ $announcement->message }}</div>
                    <small class="text-muted">Posted {{ $announcement->created_at->diffForHumans() }}</small>
                    <br>
                    <small>Visible to: {{ implode(', ', $announcement->visible_to ?? []) }}</small>
                </div>
                @if(Qs::userIsTeamSA() || Qs::userIsAdmin())
                    <div>
                        <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this announcement?')">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-secondary">No announcements yet.</div>
@endif