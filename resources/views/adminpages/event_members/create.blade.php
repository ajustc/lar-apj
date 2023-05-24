@extends('template.theme')
@section('title', 'Add Event Members')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Event Members</h4>
        <div class="card">
            <div class="card-body">
                <form action="{{ url('adminpages', 'event_members') }}" method="POST" enctype="multipart/form-data">
                    @CSRF
                    <div class="mb-3 row">
                        <label for="event_id" class="col-md-2 col-form-label text-nowrap">Event</label>
                        <div class="col-md-10">
                            <select class="form-select" name="event_id" id="event_id">
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="company_name" class="col-md-2 col-form-label text-nowrap">Company Name</label>
                        <div class="col-md-10">
                            <input class="form-control" name="company_name" type="text" placeholder="PT. XXXX X XX XXX"
                                id="company_name" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="participant_name" class="col-md-2 col-form-label text-nowrap">Participant Name</label>
                        <div class="col-md-10">
                            <input class="form-control" name="participant_name" type="text" placeholder="Rio Justicio"
                                id="participant_name" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="participant_email" class="col-md-2 col-form-label text-nowrap">Participant Email</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="participant_email"
                                placeholder="riojusticiof@gmil.com" id="participant_email" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="participant_phone_number" class="col-md-2 col-form-label text-nowrap">Participant Phone
                            Number</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="participant_phone_number"
                                placeholder="081233764534" id="participant_phone_number" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="participant_avatar" class="col-md-2 col-form-label text-nowrap">Participant
                            Avatar</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="participant_avatar" name="participant_avatar">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ url('adminpages', 'event_members') }}" class="btn btn-warning">Back</a>
                </form>
            </div>
        </div>
    </div>
@endSection

@section('scriptFromAllView')
    <script src="{{ asset('assets') }}/js/dropify.js"></script>
    <!--
        {
                error: {
                    'fileSize': 'Ukuran Gambar Terlalu Besar (max ).',
                    'minWidth': 'Lebar Gambar Terlalu Kecil (min px).',
                    'maxWidth': 'Lebar Gambar Terlalu Besar (max px).',
                    'minHeight': 'Tinggi Gambar Terlalu Kecil (min px).',
                    'maxHeight': 'Tinggi Gambar Terlalu Besar (max px).',
                    'imageFormat': 'Format Gambar Tidak Diizinkan (hanya ).'
                }
            }
     -->
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('#product_image').dropify();
        });
    </script>
@endSection
