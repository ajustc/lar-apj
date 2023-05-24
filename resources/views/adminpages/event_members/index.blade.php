@extends('template.theme')
@section('title', 'Event Members')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Event Members</h4>
    <div class="card">

        <div class="card-body">
            <div class="demo-inline-spacing">
                <a href="{{ url('adminpages', 'event_members') }}/create" class="btn btn-primary">Add</a>
            </div>

            <div class="table-responsive">
                <table id="datatable" class="table stripe">
                    <thead class="text-nowrap">
                        <tr>
                            <th>Event Name</th>
                            <th>Company Name</th>
                            <th>Participant Name</th>
                            <th>Participant Email</th>
                            <th>Participant Phone Number</th>
                            <th>Participant Avatar</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($event_members as $member)
                        <tr>
                            <td>
                                <a href="{{ url('event') }}/{{ $member->rlEvent->slug }}">{{ $member->rlEvent->title }}</a>
                            </td>
                            <td>{{ $member->company_name }}</td>
                            <td>{{ $member->participant_name }}</td>
                            <td>{{ $member->participant_email }}</td>
                            <td>{{ $member->participant_phone_number }}</td>
                            <td>{{ $member->participant_avatar }}</td>
                            <td>
                                <a href="{{ url("adminpages", "events")}}/{{ $member->id }}/edit" class="btn btn-xs btn-warning">Edit</a>
                                <form id="delete" action="{{ url("adminpages", "events")}}/{{ $member->id }}" method="post" onsubmit="return deleteAjax($member->id)">
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
                    url: "<?= url('adminpages', 'event_members') ?>/" + id,
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