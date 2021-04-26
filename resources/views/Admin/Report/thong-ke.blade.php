@extends('Admin.layout')
@section('title', 'Thống kê')
@section('body')
<div class="row">
    <div class="col-xl-12 card-box">
        <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Thống kê</h3>
    </div>
</div>
<h3 class="text-blue"><i class="fas fa-book-open"></i> Tự đánh giá Cơ sở giáo dục</h3>
<div class="row">
    <div class="col-md-6">
        <div class="card-box project-box">
            <h4 class="mt-0 mb-3">CSGD theo Thông tư 12</h4>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <h3 class="mb-0">{{ count($tt12_tieuchuan) }}</h3>
                    <p class="text-muted">Tiêu chuẩn</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">{{ $tt12_tieuchi_count }}</h3>
                    <p class="text-muted">Tiêu chí</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">757</h3>
                    <p class="text-muted">Minh chứng</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">200</h3>
                    <p class="text-danger"><strong>Đã có</strong></p>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-box project-box">
            <h4 class="mt-0 mb-3">CSGD theo Thông tư 42 (2017)</h4>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <h3 class="mb-0">10</h3>
                    <p class="text-muted">Tiêu chuẩn</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">66</h3>
                    <p class="text-muted">Tiêu chí</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">2.021</h3>
                    <p class="text-muted">Minh chứng</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">2.021</h3>
                    <p class="text-danger"><strong>Đã có</strong></p>
                </li>
            </ul>
        </div>
    </div>
</div>
<h3 class="text-blue"><i class="fas fa-book-open"></i> Tự đánh giá Chương trình đào tạo</h3>
<div class="row">
    <div class="col-md-6">
        <div class="card-box project-box">
            <h4 class="mt-0 mb-3">CTĐT Dùng chung AUN-QA</h4>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <h3 class="mb-0">11</h3>
                    <p class="text-muted">Tiêu chuẩn</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">50</h3>
                    <p class="text-muted">Tiêu chí</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">{{ number_format($dungchung_aun_3,0,",",".") }}</h3>
                    <p class="text-muted">MC cốt lõi</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">2.452</h3>
                    <p class="text-muted">Minh chứng</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">1.021</h3>
                    <p class="text-danger"><strong>Đã có</strong></p>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-box project-box">
            <h4 class="mt-0 mb-3">CTĐT AUN-QA</h4>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <h3 class="mb-0">11</h3>
                    <p class="text-muted">Tiêu chuẩn</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">50</h3>
                    <p class="text-muted">Tiêu chí</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-box project-box">
            <h4 class="mt-0 mb-3">CTĐT FIBAA</h4>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <h3 class="mb-0">5</h3>
                    <p class="text-muted">Tiêu chuẩn</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">24</h3>
                    <p class="text-muted">Tiêu chí</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">154</h3>
                    <p class="text-muted">Minh chứng</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">62</h3>
                    <p class="text-danger"><strong>Đã có</strong></p>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-box project-box">
            <h4 class="mt-0 mb-3">CTĐT Thông tư 04</h4>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <h3 class="mb-0">11</h3>
                    <p class="text-muted">Tiêu chuẩn</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">50</h3>
                    <p class="text-muted">Tiêu chí</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">302</h3>
                    <p class="text-muted">Minh chứng</p>
                </li>
                <li class="list-inline-item">
                    <h3 class="mb-0">198</h3>
                    <p class="text-danger"><strong>Đã có</strong></p>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection
