@extends('layouts.layout')

@section('title')
    <title>Banner Resimleri</title>
@endsection

@section('content')
    <div class="container-fluid">



        <!-- DataTales Example -->
        <div class="row">
            <div class="col-md-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Banner Resmi</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">

                            <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <form action="{{route('admin.banner-resmi-guncelle',['id' => $page->id])}}"
                                            enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <td>{{ $page->page_title }}</td>
                                            <td>
                                                <img width="200px"
                                                    src={{asset('images/website-images')."/".$banners->find($page->id)->image}}
                                                    alt="">
                                            </td>
                                            <td><input type="file" class="form-control" name="image"></td>
                                            <td>
                                                <button type="submit" class="btn btn-success">Güncelle</button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
