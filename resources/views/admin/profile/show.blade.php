@extends('layouts.layout')

@section('title')
    <title>Profil</title>
@endsection

@section('content')
    <div class="container-fluid">



        <!-- DataTales Example -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Profilim</h6>
                    </div>
                    <div class="card-body">
                        <form id="profileForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Varolan Resim</label>
                                        <div>
                                            <img class="img-thumbnail"
                                                src={{ asset('images/website-images/' . $user->image) }}
                                                alt="default user image" width="100px">

                                        </div>
                                        <label for="" class="mt-2">Resim</label>
                                        <input type="file" class="form-control-file" name="image">

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">İsim</label>
                                        <input type="text" class="form-control" value="{{ $user->name }}"
                                            name="name">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" value="{{ $user->email }}"
                                            name="email">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Telefon</label>
                                        <input type="text" class="form-control" value="{{ $user->tel_no }}"
                                            name="tel_no">

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" name="facebook" value="{{ $user->facebook_address }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" name="twitter" value="{{ $user->twitter_address }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="linkedin">LinkedIn</label>
                                        <input type="text" name="linkedin" value="{{ $user->linkedin_address }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="whatsapp">Whatsapp</label>
                                        <input type="text" name="whatsapp" value={{ $user->whatsapp_address }}
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Adres</label>
                                        <input type="text" name="address" value="{{ $user->address }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Yeni Şifre</label>
                                        <input type="password" class="form-control" name="password">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Şifreyi Onayla</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success" type="submit" id="updateProfileButton">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
