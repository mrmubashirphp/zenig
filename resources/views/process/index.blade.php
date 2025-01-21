@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md">
                        <h4>Process List</h4>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row text-end">
                    <div class="col-md my-3">
                        <a class="btn btn-primary" href="{{ route('process.create') }}">Create</a>
                    </div>
                </div>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-start">Sr</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th class="text-start">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($processes as $process)
                            <tr>
                                <td class="text-start">{{$loop->iteration}}</td>
                                <td>{{$process->name}}</td>
                                <td>{{$process->code}}</td>
                                <td class="w-50">
                                    <p class="content m-0" data-full-text="{{$process->description}}"></p>
                                    <button class="show_hide btn btn-link">Read More</button>
                                </td>

                                <td class="text-start">
                                    <a href="{{route('process.edit', $process->id)}}"
                                        class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{route('process.view', $process->id)}}" class="btn btn-success btn-xs sharp"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp delete-btn"
                                        data-id="{{ $process->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form-{{ $process->id }}"
                                        action="{{route('process.destroy', $process->id)}}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
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
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize DataTable
            let table = new DataTable('#myTable');

            // Add SweetAlert for delete confirmation
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function () {
                    let id = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`delete-form-${id}`).submit();
                        }
                    });
                });
            });

            $(".content").each(function () {

                var fullText = $(this).data("full-text").trim();
                var words = fullText.split(/\s+/);

                if (words.length > 8) {
                    var shortText = words.slice(0, 8).join(" ") + "...";
                    $(this).text(shortText);
                } else {
                    $(this).text(fullText);
                    $(this).next(".show_hide").hide();
                }
            });


            $(".show_hide").on("click", function () {
                var content = $(this).prev('.content');
                var fullText = content.data("full-text").trim();
                var words = fullText.split(/\s+/);


                if (content.text().endsWith("...")) {
                    content.text(fullText);
                    $(this).text("Go Less");
                } else {
                    var shortText = words.slice(0, 10).join(" ") + "...";
                    content.text(shortText);
                    $(this).text("Read More");
                }
            });

        });
    </script>
@endpush