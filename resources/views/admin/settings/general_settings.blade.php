@extends('layouts.layout')

@section('title')
    <title>Genel Ayarlar</title>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="row">
            <div class="col-md-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Genel Ayarlar</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.genel-ayarlar/guncelle')}}" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="fyNW2klXefDrhZpriA9rsamyZmRFcePbsbclFzV3"> <input
                                type="hidden" name="_method" value="patch">
                            <div class="form-group">
                                <label for="">Anlık Header Logo</label>
                                <div><img src={{ asset('images/website-images/' . $generalSettings->header_logo) }} alt="logo"
                                        class="w-50"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Header Logo</label>
                                <div><input type="file" name="logo" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Anlık Footer Logo</label>
                                <div><img
                                        src={{ asset('images/website-images/' . $generalSettings->footer_logo) }}
                                        alt="footer_logo" class="w-50"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Footer Logo</label>
                                <div><input type="file" name="footer_logo" class="form-control"></div>
                            </div>


                            <div class="form-group">
                                <label for="">Anlık favicon</label>
                                <br>
                                <div style="width: 60px; height:60px"><img
                                        src={{ asset('images/website-images/' . $generalSettings->favicon) }}
                                        alt="favicon" class="w-100"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Favicon</label>
                                <div><input type="file" name="favicon" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Anlık Kullanıcı Sözleşmesi Banner</label>
                                <br>
                                <div><img
                                        src="{{ asset('images/website-images/' . $generalSettings->terms_image) }}"
                                        alt="favicon" class="w-50"></div>
                            </div>

                            <div class="form-group">
                                <label>Kullanıcı Sözleşmesi Banner Resmi</label>
                                <div><input type="file" name="favicon" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Anlık Gizlilik ve Politika Banner Resmi</label>
                                <br>
                                <div><img
                                        src="{{ asset('images/website-images/' . $generalSettings->privacy_policy_image) }}"
                                        alt="favicon" class="w-50"></div>
                            </div>

                            <div class="form-group">
                                <label>Gizlilik ve Politika Banner Resmi</label>
                                <div><input type="file" name="favicon" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Anlık İletişim Resmi</label>
                                <br>
                                <div><img
                                    src="{{ asset('images/website-images/' . $generalSettings->contact_image) }}"
                                        alt="favicon" class="w-50"></div>
                            </div>

                            <div class="form-group">
                                <label>İletişim Resmi</label>
                                <div><input type="file" name="favicon" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Anlık Hakkımızda Resmi</label>
                                <br>
                                <div><img
                                    src="{{ asset('images/website-images/' . $generalSettings->about_image) }}"
                                        alt="favicon" class="w-50"></div>
                            </div>

                            <div class="form-group">
                                <label>Hakkımızda Resmi</label>
                                <div><input type="file" name="favicon" class="form-control"></div>
                            </div>

                            <button type="submit" class="btn btn-success">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
