@extends('template.theme')
@section('title', 'Product')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Events</h4>
        <div class="card">

            <div class="card-body">
                <div class="demo-inline-spacing">
                    <a href="{{ url('adminpages', 'events') }}/create" class="btn btn-primary">Add</a>
                </div>

                <div class="table-responsive">
                    <table id="datatable" class="table stripe">
                        <thead class="text-nowrap">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Count Participant</th>
                                <th>Startdate</th>
                                <th>Enddate</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($events as $event)
                                <tr>
                                    <td>
                                        <a href="{{ url('event') }}/{{ $event->slug }}">{{ $event->title }}</a>
                                    </td>
                                    <td>{{ $event->description }}</td>
                                    <td>
                                        <span class="badge bg-{{ $event->status == 1 ? 'success' : 'info' }}">
                                            {{ $event->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            {{ $event->rlEventMembers->count() }}
                                        </span>
                                    </td>
                                    <td>{{ $event->startdate }}</td>
                                    <td>{{ $event->enddate }}</td>
                                    <td>
                                        <a href="{{ url('adminpages', 'events') }}/{{ $event->id }}/edit"
                                            class="btn btn-xs btn-warning">Edit</a>
                                        <form id="delete"
                                            action="{{ url('adminpages', 'events') }}/{{ $event->id }}" method="post"
                                            onsubmit="return deleteAjax($event->id)">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


@endSection

@section('scriptFromAllView')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $('#datatable').DataTable();
        });

        function deleteAjax(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this product!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "<?= url('products', 'product') ?>/" + id,
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            console.log('res delete: ', response);
                            if (response == true) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                $('#datatable').DataTable().draw()
                            } else {
                                Swal.fire(
                                    'Failed!',
                                    'Your file deleted has been failed.',
                                    'error'
                                )
                            }
                        }
                    });
                } else {
                    Swal.fire(
                        'Cancel!',
                        'Your file has been cancel deleted.',
                        'success'
                    )
                }
            });
            return false;
        }
    </script>
@endSection
