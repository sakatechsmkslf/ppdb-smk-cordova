<a href="{{ route('gelombang.edit', $row->id) }}" class="btn btn-sm btn-warning">
    <i class="bi bi-pencil"></i>
</a>

<form action="{{ route('gelombang.destroy', $row->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger btn-delete">
        <i class="bi bi-trash"></i>
    </button>
</form>
