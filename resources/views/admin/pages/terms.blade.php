@extends('layouts.layout')

@section('title')
    <title>Kullanım Şartları</title>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <form action="{{route('admin.kullanim-sartlari-ekle')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-10">
                    <div class="card-header py-3">
                        <h6 class="m-0 text-secondary fs-3">Kullanım Şartları</h6>
                    </div>
                    <div class="card-body">
                        <textarea name="description" class="ckeditor">{{$terms->terms_text}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">GÖNDER</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('javascript')
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
