@extends('layouts.master')

@section('title')
Package | Add
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #e77c09 !important;
    }
    .note-editor.note-airframe, .note-editor.note-frame {
        border: 1px solid #e77c09 !important;
    }
</style>
@endpush

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="card mb-0">
                <div class="card-body">

                    <div class="page-header">
                        <div class="content-page-header">
                            <h5>Add Package</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('package.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Package Name : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Package  Name">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Select Package Type : <span class="text-danger">*</span></b></label>
                                                <select  class="form-control @error('package_type_id') is-invalid @enderror select" id="package_type_id" name="package_type_id">
                                                    <option value="">Select Package Type</option>
                                                    @foreach ($packageTypes as $value )
                                                    <option value="{{ $value->id }}" {{ (old("package_type_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('package_type_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Amount : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" placeholder="Enter Amount">

                                                @error('amount')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="input-block mt-3 mb-3">
                                                <label><b>Upload Image : </b></label>
                                                <input type="file" onchange="agentPreviewFile()" id="image" name="image"  class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" accept=".png, .jpg, .jpeg, .pdf">
                                                <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div id="preview-container">
                                                <div id="file-preview">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-12 description-box">
                                            <div class="input-block" id="summernote_container">
                                                <label class="form-control-label"><b>Description : <span class="text-danger">*</span></b></label>
                                                <textarea type="text" id="description" name="description" class="summernote form-control @error('description') is-invalid @enderror" placeholder="Type your message" value="{{ old('description') }}">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <div class="add-customer-btns text-start">
                                    <a href="{{ route('package.index') }}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{-- preview both agent image and PDF --}}
<script>
    function agentPreviewFile() {
        const fileInput = document.getElementById('image');
        const previewContainer = document.getElementById('preview-container');
        const filePreview = document.getElementById('file-preview');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {

                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" width="200spx" height="200px">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="150px" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }

    }

</script>

<script>
    var typed = "";
    $('#package_type_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#package_type_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#package_type_id').find("option[value='" + typed + "']").length) {
                $('#package_type_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#package_type_id').append(newOption).trigger('change');
            }
        }
    });
</script>
@endpush
