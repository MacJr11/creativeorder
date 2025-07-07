<x-layout title="Creatives">

    <h2>Add a Creative</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('creatives.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" placeholder="Name" class="form-control" required>
            <input type="text" name="address" placeholder="Add adress" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    <h3>All Creatives</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th class="th_AllCreative">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($creatives as $creative)
                <tr data-id="{{ $creative->id }}">
                    <td class="creative-name">{{ $creative->name }}</td>
                    <td class="creative-address">{{ $creative->address }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning edit-btn">Edit</button>
                        <form method="POST" action="{{ route('creatives.destroy', $creative->id) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Edit Modal -->
    <div class="modal" id="editModal" style="display: none; background: rgba(0,0,0,0.5); position:fixed; top:0;left:0;width:100%;height:100%;">
        <div class="modal-dialog" style="margin:10% auto; background:white; padding:20px; max-width:500px;">
            <h4>Edit Creative</h4>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="name" id="editName" class="form-control mb-3">
                <input type="text" name="address" id="editAddress" class="form-control mb-3">
                <button class="btn btn-success" type="submit">Update</button>
                <button class="btn btn-secondary close-modal" type="button">Cancel</button>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        // Show edit modal
        $('.edit-btn').click(function () {
            let row = $(this).closest('tr');
            let id = row.data('id');
            let name = row.find('.creative-name').text();
            let address = row.find('.creative-address').text();

            $('#editName').val(name);
            $('#editAddress').val(address);
            $('#editForm').attr('action', '/creatives/' + id);
            $('#editModal').fadeIn();
        });

        // Close modal
        $('.close-modal').click(function () {
            $('#editModal').fadeOut();
        });
    </script>
    @endpush

</x-layout>
