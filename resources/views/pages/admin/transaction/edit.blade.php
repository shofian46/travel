@extends('layouts.admin')

@section('title','Form Transaction')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Form Transaction {{ $item->user->name }}</h1>
          <a href="{{ route('gallery.index') }}" class="btn btn-sm btn-outline-warning shadow-lg">
            <i class="fas fa-fw fa-spinner"></i> Kembali
          </a>
      </div>
      <div class="card shadow border-bottom-primary">
          <div class="card-body">
            <form action="{{ route('transaction.update', $item->id) }}" method="post">
                @csrf
                @method('PUT')
               <div class="form-group">
                   <label for="transaction_status"></label>
                   <select name="transaction_status" id="transaction_status" class="form-control @error('transaction_status') is-invalid @enderror">
                      <option value="{{ $item->transaction_status }}">
                        Jangan Diubah {{ $item->transaction_status }}
                      </option>
                      <option value="IN_CART">In Cart</option>
                      <option value="PENDING">Pending</option>
                      <option value="SUCCESS">Success</option>
                      <option value="CANCEL">Cancel</option>
                      <option value="FAILED">Failed</option>
                   </select>
                   @error('transaction_status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
               </div>
                <div class="row my-2">
                    <div class="col-md-6 mb-2">
                        <button class="btn btn-outline-primary btn-block" type="submit">
                            Update
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
