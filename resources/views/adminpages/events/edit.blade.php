@extends('template.theme')
@section('title', 'Edit Product')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Edit Product</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('adminpages', 'events') }}/{{ $event->id }}" method="POST" enctype="multipart/form-data">
                @CSRF
                @method('put')
                <!-- HTML5 Inputs -->
                <div class="mb-3 row">
                    <label for="title" class="col-md-2 col-form-label text-nowrap">Title</label>
                    <div class="col-md-10">
                        <input class="form-control" value="{{ $event->title }}" name="title" type="text" placeholder="Arch Microservices" id="title" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="col-md-2 col-form-label text-nowrap">Description</label>
                    <div class="col-md-10">
                        <textarea class="form-control" type="text" name="description" placeholder="lorem ips" id="description">{{ $event->description }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-md-2 col-form-label text-nowrap">Status</label>
                    <div class="col-md-2">
                        <select class="form-select" name="status" id="status">
                            <option value="1" {{ $event->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $event->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="startdate" class="col-md-2 col-form-label text-nowrap">Startdate</label>
                    <div class="col-md-2">
                        <input class="form-control" value="{{ $event->startdate }}" type="date" name="startdate" placeholder="2020-10-10" id="startdate" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="enddate" class="col-md-2 col-form-label text-nowrap">Enddate</label>
                    <div class="col-md-2">
                        <input class="form-control" value="{{ $event->enddate }}" type="date" name="enddate" placeholder="2020-12-10" id="enddate" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url('adminpages', 'events') }}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
</div>

@endSection

@section('scriptFromAllView')
<script src="{{ asset('assets') }}/js/dropify.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('#product_image').dropify();
    });
</script>
@endSection