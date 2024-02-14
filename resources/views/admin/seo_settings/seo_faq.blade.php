@extends('layouts.layout')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{$seo_text->page_name}}</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.sss-seo/ekle')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Başlık</label>
                                <input type="text" name="page_title"  id="page_title"  class="form-control"
                                    value="{{$seo_text->page_title}}">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Site açıklaması</label>
                                <textarea name="meta_description" id="meta_description" cols="30" rows="5" class="form-control">{{$seo_text->meta_description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success" id="seoFaqButton"> Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
