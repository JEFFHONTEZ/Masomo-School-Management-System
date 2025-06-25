{{-- Blade template for announcements list --}}
@if(isset($announcements) && count($announcements))
    <div class="mb-4">
        @foreach($announcements as $announcement)
            @if(Qs::userIsTeamSA() || Qs::userIsAdmin())
                <div class="alert alert-info d-flex justify-content-between align-items-center" style="gap: 16px;">
                    <div style="flex: 1; min-width: 0;">
                        <strong>{{ $announcement->title }}</strong>
                        <div style="word-break: break-word; overflow-wrap: break-word; max-width: 100%;">
                            {{ $announcement->message }}
                        </div>
                        <small class="text-muted">Posted {{ $announcement->created_at->diffForHumans() }}</small>
                        <br>
                        <small>Visible to: {{ implode(', ', $announcement->visible_to ?? []) }}</small>
                    </div>
                    <div style="flex-shrink: 0; display: flex; flex-direction: column; gap: 4px;">
                        <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-sm btn-primary mb-1">Edit</a>
                        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this announcement?')">Delete</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    <strong>{{ $announcement->title }}</strong>
                    <div style="word-break: break-word; overflow-wrap: break-word;">
                        {{ $announcement->message }}
                    </div>
                    <small class="text-muted">Posted {{ $announcement->created_at->diffForHumans() }}</small>
                    <br>
                    <small>Visible to: {{ implode(', ', $announcement->visible_to ?? []) }}</small>
                </div>
            @endif
        @endforeach
    </div>
@else
    <div class="alert alert-secondary">No announcements yet.</div>
@endif