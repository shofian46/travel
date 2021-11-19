@extends('layouts.admin')

@section('title','Form Gallery Travel')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Form Create Gallery Travel</h1>
          <a href="{{ route('gallery.index') }}" class="btn btn-sm btn-outline-warning shadow-lg">
            <i class="fas fa-fw fa-spinner"></i> Kembali
          </a>
      </div>
      <div class="card shadow border-bottom-primary">
          <div class="card-body">
            <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="travel_packages_id">Travel Packages</label>
                            <select name="travel_packages_id" id="travel_packages_id" class="custom-select form-control" required>
                                <option value="">-- Select --</option>
                                @foreach ($travel_packages as $travel_package)
                                    <option value="{{ $travel_package->id }}">
                                        {{ $travel_package->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="travel_packages_id" class="col-sm-2 col-form-label col-form-label-sm">Image</label>
                            <img class="img-preview img-fluid mb-4 col-sm-4">
                            <div class="custom-file col-sm-4 ml-4">
                                <input type="file" class="custom-file-input" id="image" name="image" onchange="previewImage()">
                                <label class="custom-file-label" for="image">Choose file</label>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-6 mb-2">
                        <button class="btn btn-outline-primary btn-block" type="submit">
                            Simpan
                        </button>
                    </div>
                    <div class="col-md-6 mb-2">
                        <button class="btn btn-outline-danger btn-block" type="reset">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
          </div>
      </div>

  </div>
  <!-- /.container-fluid -->
@endsection

@push('addon-script')
     <script>
         $(document).ready(function() {
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

         });

         function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
     </script>
@endpush
