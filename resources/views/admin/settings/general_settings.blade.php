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

                        <form
                            enctype="multipart/form-data" method="post" id="settingsForm">
                            <div class="form-group">
                                <label for="">Anlık Header Logo</label>
                                <div>@if ($generalSettings->header_logo)
                                    <img src="{{ asset('images/website-images/' . $generalSettings->header_logo) }}"
                                        alt="footer_logo" class="w-50">
                                @else
                                    <p class="text-danger">Herhangi bir header logo yoktur.</p>
                                @endif</div>
                            </div>

                            <div class="form-group">
                                <label for="">Header Logo</label>
                                <div><input type="file" name="header_logo" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Anlık Footer Logo</label>
                                <div>
                                    @if ($generalSettings->footer_logo)
                                        <img src="{{ asset('images/website-images/' . $generalSettings->footer_logo) }}"
                                            alt="footer_logo" class="w-50">
                                    @else
                                        <p class="text-danger">Herhangi bir footer logo yoktur.</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Footer Logo</label>
                                <div><input type="file" name="footer_logo" class="form-control"></div>
                            </div>


                            <div class="form-group">
                                <label for="">Anlık favicon</label>
                                <br>
                                <div style="width: 60px; height:60px"><img
                                        src={{ asset('images/website-images/' . $generalSettings->favicon) }} alt="favicon"
                                        class="w-100"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Favicon</label>
                                <div><input type="file" name="favicon" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Anlık Kullanıcı Sözleşmesi Banner</label>
                                <br>
                                <div><img src="{{ asset('images/website-images/' . $generalSettings->terms_image) }}"
                                        alt="favicon" class="w-50"></div>
                            </div>

                            <div class="form-group">
                                <label>Kullanıcı Sözleşmesi Banner Resmi</label>
                                <div><input type="file" name="terms_image" class="form-control"></div>
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
                                <div><input type="file" name="privacy_policy_image" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Anlık İletişim Resmi</label>
                                <br>
                                <div><img src="{{ asset('images/website-images/' . $generalSettings->contact_image) }}"
                                        alt="favicon" class="w-50"></div>
                            </div>

                            <div class="form-group">
                                <label>İletişim Resmi</label>
                                <div><input type="file" name="contact_image" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Anlık Hakkımızda Resmi</label>
                                <br>
                                <div><img src="{{ asset('images/website-images/' . $generalSettings->about_image) }}"
                                        alt="favicon" class="w-50"></div>
                            </div>

                            <div class="form-group">
                                <label>Hakkımızda Resmi</label>
                                <div><input type="file" name="about_image" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Anlık Giriş Resmi</label>
                                <br>
                                <div><img src="{{ asset('images/website-images/' . $generalSettings->entrance_image) }}"
                                        alt="favicon" class="w-50"></div>
                            </div>

                            <div class="form-group">
                                <label>Giriş Resmi</label>
                                <div><input type="file" name="entrance_image" class="form-control"></div>
                            </div>

                            <button type="submit" class="btn btn-success" id="updateGeneralSettingsButton">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
